<?php

namespace App\Http\Controllers;

use App\Exports\TransactionExport;
use App\Http\Requests\TransactionRequest;
use App\Jobs\SendSms;
use App\Mail\ReceiptMail;
use App\Models\Branch;
use App\Models\BranchServiceBalance;
use App\Models\Service;
use App\Models\ServiceCharges;
use App\Models\ServiceProvider;
use App\Models\SysParameter;
use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function index(Request $request)
    {
        // dd(Transaction::latest()->first());
        $user = auth()->user();
        // dd($user->roles);

        $data = Transaction::query()->with(["user", "branch", "serviceCharges.service", "serviceCharges.serviceProvider"])
            ->when($request->start_date, function (Builder $builder) use ($request) {
                return $builder->whereDate("created_at", '>=', $request->start_date);
            })->when($request->end_date, function (Builder $builder) use ($request) {
            return $builder->whereDate("created_at", '<=', $request->end_date);
        })->when($request->status, function (Builder $builder) use ($request) {
            return $builder->whereIn("status", $request->status);
        })->when($request->serviceProviders, function (Builder $builder) use ($request) {
            return $builder->whereHas("serviceCharges", function (Builder $builder) use ($request) {
                return $builder->whereIn("service_provider_id", $request->serviceProviders);
            });
        })->when($request->services, function (Builder $builder) use ($request) {
            return $builder->whereHas("serviceCharges", function (Builder $builder) use ($request) {
                return $builder->whereIn("service_id", $request->services);
            });
        })->when($user->branch_id, function (\Illuminate\Database\Eloquent\Builder $builder) use ($user) {
            $builder->where("branch_id", $user->branch_id);
        })->when($user->roles, function (Builder $builder) use ($user) {
                foreach ($user->roles as $role) {

                    if ($role->name == 'Officer' || $role->name == 'Taller') {
                        return $builder->where("user_id", $user->id);
                    }
                }
                // ->when($request->users, function (Builder $builder) use ($request, $user) {
                //     if ($user->is_super_admin == true) {
                //         return $builder->whereIn("user_id", $request->users);
                //     } else {
                //         return $builder->where("user_id", $user->id);
                //     }
            })->select("transactions.*");

        if ($request->is_download == 1) {
            if ($request->type == "pdf") {
                return PDF::loadView('admin.transactions.export', ['title' => 'Transactions', 'transactions' => $data->get()])
                    ->setPaper('a4', 'landscape')
                    ->download("transactions.pdf");
            } else {
                $time = time();
                $name = "transactions_$time.xlsx";
                return Excel::download(new TransactionExport($data), $name);
            }
        }
        if ($request->ajax()) {
            return $this->formatTransactions($data);
        }
        $branches = Branch::query()->where("status", "Active")->get();
        if (auth()->user()->branch_id) {
            $branches = Branch::query()->where("status", "Active")->where("id", auth()->user()->branch_id)->get();
        }
        $serviceProviders = ServiceProvider::query()->where("status", "Active")->get();
        return view("admin.transactions.index", compact('serviceProviders', 'branches'));
    }

    protected function formatTransactions($data)
    {

        return Datatables::of($data)
            ->addIndexColumn()
            ->editColumn('created_at', function ($item) {
                return $item->created_at;
            })
            ->editColumn('external_branch_commission', function ($item) {
                return $item->external_branch_commission ? $item->external_branch_commission : '-';
            })
            ->editColumn('branch_name', function ($item) {
                return $item->branch->name ?? '-';
            })->editColumn('service_name', function ($item) {
            return optional($item->serviceCharges)->service->name ?? '-';
        })->editColumn('service_provider_name', function ($item) {
            return optional($item->serviceCharges)->serviceProvider->name ?? '-';
        })
            ->editColumn('amount', function ($item) {
                return number_format($item->amount);
            })->editColumn('total_charges', function ($item) {
            return number_format($item->total_charges);
        })
            ->editColumn('user_name', function ($item) {
                return $item->user->name ?? '-';
            })->editColumn('status', function ($item) {
            if ($item->status == "Success") {
                return '<span class="badge badge-success">' . $item->status . '</span>';
            } else if ($item->status == "Pending") {
                return '<span class="badge badge-primary">' . $item->status . '</span>';
            } else {
                return '<span class="badge badge-danger">' . $item->status . '</span>';
            }
        })
            ->editColumn('is_exclusive', function ($item) {
                return $item->is_exclusive == 1 ? '<span class="label label-success">Yes</span>'
                : '<span class="label label-warning-success">NO</span>';
            })
            ->addColumn("print_btn", function ($item) {
                if ($item->status = Transaction::SUCCESS) {
                    return '
                  <div class="dropdown dropdown-inline">
                    <a href="#" class="btn btn-clean btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ki ki-bold-more-hor"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right" style="">
                        <!--begin::Navigation-->
                        <ul class="navi navi-hover py-5">
                            <li class="navi-item">
                                <a href="' . route('admin.print.receipt', $item->id) . '?type=print" target="blank" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="flaticon2-print"></i>
                                    </span>
                                    <span class="navi-text">Print</span>
                                </a>
                            </li>
                                <li class="navi-item">
                                <a href="' . route('admin.print.receipt', $item->id) . '?type=email" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="flaticon2-email"></i>
                                    </span>
                                    <span class="navi-text">Send Email</span>
                                </a>
                            </li>
                                <li class="navi-item">
                                <a href="' . route('admin.print.receipt', $item->id) . '?type=sms" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="flaticon2-sms"></i>
                                    </span>
                                    <span class="navi-text">Send SMS</span>
                                </a>
                            </li>

                        </ul>
                        <!--end::Navigation-->
                    </div>
                </div>
                  ';
                } else {
                    return '';
                }
            })
            ->rawColumns(['status', 'is_exclusive', 'print_btn'])
            ->make(true);
    }

    public function loadServices(ServiceProvider $provider, Branch $branch)
    {

        $isExternalBranch = auth()->user()->branch && (auth()->user()->branch->branch_type == Branch::BRANCH_TYPE_EXTERNAL);

        $services = Service::query()->with('charges', function ($q) use ($provider) {
            $q->with('serviceProvider')->where('service_provider_id', '=', $provider->id);
        })
            ->when($isExternalBranch, function (Builder $builder) {
                return $builder->whereIn("id", auth()->user()->branch->services->pluck("id"));
            })
            ->when($branch && ($branch->branch_type == Branch::BRANCH_TYPE_EXTERNAL), function (Builder $builder) use ($branch) {
                return $builder->whereIn("id", $branch->services->pluck("id"));
            })
            ->get();
        return $services;
    }

//->whereHas("charges",function (Builder $builder) use ($provider){
    //            return $builder->where("service_provider_id",'=',$provider->id);
    //        })

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(TransactionRequest $request)
    {
        // dd('Under Maintanance');
        $request->validated();
        $serviceCharges = ServiceCharges::find($request->service_charges_id);
        if (!$serviceCharges) {
            return redirect()->back()->with("error", "Service Charges not found");
        }
        $totalCharges = $serviceCharges->charges;
        if ($serviceCharges->charges_type == "Percentage") {
            $totalCharges = ceil($request->amount * $serviceCharges->charges / 100);
        }
        $user = auth()->user();

        $todayDate = Carbon::now()->format('YmdHim');
        $po = SysParameter::where('name', '=', 'P0')->first();
        $p1 = SysParameter::where('name', '=', 'P1')->first();
        $uuid = Str::orderedUuid();
        if ($request->is_exclusive) {
            $topup_amount = $request->amount;
        } else {
            $topup_amount = $request->amount - $totalCharges;
        }

        $data = [
            "request" => ["header" => ["h0" => "Vendor-WS",
                "h1" => "1.0.2",
                "h2" => "PC05",
                "h3" => $uuid,
                "h4" => "iposita",
                "h5" => $this->password,
                "h6" => "RW3500010001000100160903",
                "h7" => "Laptop",
                "h8" => "DB4N0Q1",
                "h9" => "14:fe:b5:ae:6e:2c",
                "h10" => "10.10.82.118",
                "h11" => $todayDate,
                "h12" => "IPOSITA Vending System",
                "h13" => "1.0.0",
                "h14" => "rw"],
                "body" => [["p0" => $request->reference_number,
                    "p1" => $topup_amount,

                ]]],
        ];


        $lastrecord = Transaction::where('reference_number', $request->reference_number)->latest()->first();

        // dd($lastrecord,now());

        if ($lastrecord && Carbon::now()->diffInMinutes($lastrecord->created_at) < 5) {
            return redirect()->back()->with("warning", "Cannot create a new Transaction  within 5 minutes");
        }
        



        $url = config('services.IPOSITA_EUCL_URL') . "/vendor.ws";
//       echo $url;

        $response2 = Http::withoutVerifying()->post($url, $data);
        if ($response2->ok()) {

            $json_data = json_decode($response2);
            if ($json_data->response->body) {
                $tokenn = $json_data->response->body[0]->p30;
                if ($json_data->response->body[0]->p31) {
                    $token_p31 = $json_data->response->body[0]->p31;
                            // Token p31
                            $data_p31 = str_split($token_p31, 4);
                            $formated_token_p31 = $data_p31[0] . '-' . $data_p31[1] . '-' . $data_p31[2] . '-' . $data_p31[3] . '-' . $data_p31[4];
                } else {
                    // Set $token_p31 to null if p31 is not available
                    $token_p31 = null;
                    $formated_token_p31 = null;
                }
                if ($json_data->response->body[0]->p32) {
                    $token_p32 = $json_data->response->body[0]->p32;
                           // Token p32
                           $data_p32 = str_split($token_p32, 4);
                           $formated_token_p32 = $data_p32[0] . '-' . $data_p32[1] . '-' . $data_p32[2] . '-' . $data_p32[3] . '-' . $data_p32[4];
                } else {
                    // Set $token_p31 to null if p31 is not available
                    $token_p32 = null;
                    $formated_token_p32 = null;
                }
 
                $units = $json_data->response->body[0]->p25;
                $internal_transaction_id = $uuid;
                $external_transaction_id = $json_data->response->body[0]->p14;
                $residential_rate = $json_data->response->body[0]->p65;
                $units_rate = $json_data->response->body[0]->p66;
                $request_id = $json_data->response->body[0]->p6;
                $eucl_status = $json_data->response->body[0]->p20;

                $electricity = $json_data->response->body[0]->p26;
                $tva = $json_data->response->body[0]->p27;
                $fees = $json_data->response->body[0]->p90;
                $date_from_eucl = $json_data->response->body[0]->p12;
                // Token p30
                $dataa = str_split($tokenn, 4);
                $formated_token = $dataa[0] . '-' . $dataa[1] . '-' . $dataa[2] . '-' . $dataa[3] . '-' . $dataa[4];
    

                $transaction = new Transaction();
                $transaction->service_charge_id = $request->service_charges_id;
                $transaction->customer_name = $request->customer_name;
                $transaction->customer_phone = $request->customer_phone;
                $transaction->customer_email = $request->customer_email;
                $transaction->amount = $request->amount;
                $transaction->reference_number = $request->reference_number;
                $transaction->charges = $serviceCharges->charges;
                $transaction->charges_type = $serviceCharges->charges_type;
                $transaction->total_charges = $totalCharges;
                $transaction->units = $units;
                $transaction->internal_transaction_id = $internal_transaction_id;
                $transaction->external_transaction_id = $external_transaction_id;
                $transaction->residential_rate = $residential_rate;
                $transaction->units_rate = $units_rate;
                $transaction->branch_id = $user->branch_id;
                $transaction->request_id = $request_id;
                $transaction->eucl_status = $eucl_status;

                $transaction->electricity = $electricity;
                $transaction->tva = $tva;
                $transaction->fees = $fees;
                $transaction->date_from_eucl = $date_from_eucl;

                //        if is external branch calculate the commission
                $branch = $user->branch;
                if ($branch && $branch->branch_type == "External") {
                    $transaction->external_branch_commission = $totalCharges * $branch->percentage / 100;
                }
                $transaction->user_id = $user->id;
                $transaction->status = "Success";
                $transaction->token = $formated_token;
                $transaction->token_p31 = $formated_token_p31;
                $transaction->token_p32 = $formated_token_p32;
                $transaction->is_exclusive = $request->is_exclusive;
                $transaction->save();

                if ($branch && $branch->branch_type == "External") {
                    $branchServiceBalance = BranchServiceBalance::where("branch_id", $branch->id)->where("service_id", $serviceCharges->service_id)->first();
                    if ($branchServiceBalance) {
                        $branchServiceBalance->balance = $branchServiceBalance->balance - $request->amount;
                        $branchServiceBalance->save();
                    }
                } else {
                    $this->updateIpositaBalance($request->service_provider, $request->service, -$request->amount);
                }

                //notify the customer
                if ($request->notification_type == "Email") {
                    $this->sendEmail($transaction);
                } elseif ($request->notification_type == "SMS") {
                    $this->sendSMS($transaction);
                }
                return redirect()->back()->with("success", "Transaction is created Successfully");
            } else {
                return redirect()->back()->with("warning", "Transaction not created external Api issues");
            }
        }

        //deduct the amount from the balance if it is external branch

    }

    public function printReceipt(Transaction $transaction)
    {
        if (\request()->type == "sms") {
            $this->sendSms($transaction);
            return redirect()->back()->with("success", "SMS is sent Successfully");
        } elseif (\request()->type == "email") {
            $this->sendEmail($transaction);
            return redirect()->back()->with("success", "Email is sent Successfully");
        } else {
            $pdf = PDF::loadView('admin.transactions.receiptTest', compact('transaction'));
            return $pdf->stream('receipt.pdf');
            // return view('admin.transactions.receiptTest', compact('transaction'));
        }
    }

    protected function sendSms(Transaction $transaction)
    {
        // $message = "Dear " . $transaction->customer_name . ", \r\nYour Cash Power account is  " . $transaction->reference_number;

        $message = "Dear " . $transaction->customer_name;

        if ($transaction->token_p31 != null) {
            $message .= " Your Token 1# :" . $transaction->token . " Your Token 2# :" . $transaction->token_p31 ." And Token 3# :" . $transaction->token_p32;
        } else {
            $message .= " Your Voucher# :" . $transaction->token;
        }
        
        $message .= " Amount: RWF" . number_format($transaction->amount) . " Units#: " . number_format($transaction->units, 2) . " kWh \r\nThank you for using our service.";

        $this->dispatch(new SendSms($transaction->customer_phone, $message));
    }

    private function sendEmail(Transaction $transaction)
    {
        \Mail::to($transaction->customer_email)->send(new ReceiptMail($transaction));
    }

    public function fetchMeterFromEUCL()
    {
        $meter_number = request('meter_number');
        $todayDate = Carbon::now()->format('YmdHim');
        $po = SysParameter::where('name', '=', 'P0')->first();
        $p1 = SysParameter::where('name', '=', 'P1')->first();
        $data = [
            "request" => ["header" => ["h0" => "Vendor-WS",
                "h1" => "1.0.2",
                "h2" => "CC04",
                "h3" => "529bd3ed-9153-4aad-ba64-8911806a0b31",
                "h4" => "iposita",
                "h5" => $this->password,
                "h6" => "RW3500010001000100160903",
                "h7" => "Laptop",
                "h8" => "DB4N0Q1",
                "h9" => "14:fe:b5:ae:6e:2c",
                "h10" => "10.10.82.118",
                "h11" => $todayDate,
                "h12" => "IPOSITA Vending System",
                "h13" => "1.0.0",
                "h14" => "rw"],
                "body" => [["p0" => $meter_number,

                ]]],
        ];

        $url = config('services.IPOSITA_EUCL_URL') . "/vendor.ws";

        $response2 = Http::withoutVerifying()->post($url, $data);

        if ($response2->ok()) {
            $json_data = json_decode($response2);
            if ($json_data->response->body) {
                return \response()->json([
                    'meter_number' => $meter_number,
                    'meter_name' => $json_data->response->body[0]->p2,
                ], 200);
            } else {
                return \response()->json([
                    'meter_number' => $meter_number,
                    'messagess' => "Meter number not found",
                ], 200);
            }
        } else {
            return \response()->json([
                'meter_number' => $meter_number,
                'messagess' => "server not reachable ",
            ], 200);
        }

    }
}
