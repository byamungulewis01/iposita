<?php

namespace App\Http\Controllers;

use App\Models\EuclPassword;
use App\Models\SysParameter;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class EuclController extends Controller
{

   
    public function index()
    {
        return view('admin.eucl.index');
    }
    public function accountSammary()
    {
        $todayDate = Carbon::now()->format('YmdHim');
        $uuid = Str::orderedUuid();
        $url = config('services.IPOSITA_EUCL_URL') . "/vendor.ws";

        $data = [
            "request" => ["header" => ["h0" => "Vendor-WS",
                "h1" => "1.0.2", "h2" => "VL00", "h3" => $uuid,
                "h4" => "iposita", "h5" => $this->password,
                "h6" => "RW3500010001000100160903", "h7" => "Laptop",
                "h8" => "DB4N0Q1", "h9" => "14:fe:b5:ae:6e:2c",
                "h10" => "10.10.82.118", "h11" => $todayDate,
                "h12" => "IPOSITA Vending System", "h13" => "1.0.0",
                "h14" => "rw"],
                "body" => []],
        ];

        //    return response($url);

        $response2 = Http::withoutVerifying()->post($url, $data);

        if ($response2->ok()) {
            $json_data = json_decode($response2);
            if ($json_data->response->body) {
                $paras1 = SysParameter::updateOrCreate(['name' => 'P0'], ['value' => $json_data->response->body[0]->p0]);
                $paras = SysParameter::updateOrCreate(['name' => 'P1'], ['value' => $json_data->response->body[0]->p1]);

                $p0 = $json_data->response->body[0]->p0;
                $p1 = $json_data->response->body[0]->p1;
                $data2 = [
                    "request" => ["header" => ["h0" => "Vendor-WS",
                        "h1" => "1.0.2", "h2" => "AS03", "h3" => $uuid,
                        "h4" => $p0, "h5" => $p1, "h6" => "RW3500010001000100160903",
                        "h7" => "Laptop", "h8" => "DB4N0Q1", "h9" => "14:fe:b5:ae:6e:2c",
                        "h10" => "10.10.82.118", "h11" => $todayDate, "h12" => "IPOSITA Vending System",
                        "h13" => "1.0.0", "h14" => "rw"],
                        "body" => []]];
                $response = Http::withoutVerifying()->post($url, $data2);

                if ($response->ok()) {
                    $json_data = json_decode($response);
                    if ($json_data->response->body) {
                        return \response()->json($json_data->response->body[0], 200);
                    } else {
                        return \response()->json([
                            'messages' => "No Response Found",
                        ], 400);
                    }
                } else {
                    return \response()->json([
                        'messagess' => "server not reachable ",
                    ], 500);
                }
            } else {
                return \response()->json([
                    'messagess' => "Nothing Found in Response",
                ], 200);
            }
        } else {
            return \response()->json(['messagess' => "server not reachable ",
            ], 500);
        }
    }
    public function accountHistory()
    {
        return view('admin.eucl.history');
    }
    public function paymentRetry($id)
    {
        $title = "Payment Retry";
        $todayDate = Carbon::now()->format('YmdHim');
        $uuid = Str::orderedUuid();
        $request_id = Transaction::findorfail($id)->request_id;
        $data = [
            "request" => ["header" => ["h0" => "Vendor-WS",
                "h1" => "1.0.2",
                "h2" => "PR06",
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
                "body" => [["p0" => $request_id]]],
        ];

        $url = config('services.IPOSITA_EUCL_URL') . "/vendor.ws";
        $response2 = Http::withoutVerifying()->post($url, $data);
        if ($response2->ok()) {
            $json_data = json_decode($response2);
            if ($json_data->response->body) {
                $output = $json_data->response->body[0];
                return view('admin.eucl.show', compact('output', 'title'));

            } else {
                return redirect()->back()->with("warning", "No Record Found");
            }
        } else {
            return redirect()->back()->with("warning", "server not reachable");

        }

        // return view('admin.eucl.show', compact('title'));
        // dd(Transaction::findorfail($id)->request_id);
    }
    public function paymentCopy($id)
    {
        $title = "Payment Receipt Copy";
        $todayDate = Carbon::now()->format('YmdHim');
        $uuid = Str::orderedUuid();
        $external_transaction_id = Transaction::findorfail($id)->external_transaction_id;
        $data = [
            "request" => ["header" => ["h0" => "Vendor-WS",
                "h1" => "1.0.2",
                "h2" => "RC07",
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
                "body" => [["p0" => $external_transaction_id]]],
        ];

        $url = config('services.IPOSITA_EUCL_URL') . "/vendor.ws";
        $response2 = Http::withoutVerifying()->post($url, $data);
        if ($response2->ok()) {
            $json_data = json_decode($response2);
            if ($json_data->response->body) {
                $output = $json_data->response->body[0];
                return view('admin.eucl.show', compact('output', 'title'));

            } else {
                return redirect()->back()->with("warning", "No Record Found");
            }
        } else {
            return redirect()->back()->with("warning", "server not reachable");

        }

        // return view('admin.eucl.show', compact('title'));
        // dd(Transaction::findorfail($id)->request_id);
    }
    public function accountHistoryApi()
    {
        $todayDate = Carbon::now()->format('YmdHim');
        $uuid = Str::orderedUuid();

        $data = [
            "request" => ["header" => ["h0" => "Vendor-WS",
                "h1" => "1.0.2",
                "h2" => "VH09",
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
                "body" => [["p0" => "20"]]],
        ];

        // return response()->json($data);
        // die();

        $url = config('services.IPOSITA_EUCL_URL') . "/vendor.ws";
        //   echo $url;

        $response2 = Http::withoutVerifying()->post($url, $data);
        if ($response2->ok()) {
            $json_data = json_decode($response2);
            if ($json_data->response->body) {
                return \response()->json($json_data->response->body, 200);
            } else {
                return \response()->json([
                    'messagess' => "No Response Found",
                ], 400);
            }
        } else {
            return \response()->json([
                'messagess' => "server not reachable ",
            ]);
        }

    }
    public function meterHistory()
    {
        $uuid = Str::orderedUuid();

        $todayDate = Carbon::now()->format('YmdHim');

        $meter_number = request('meter_number');

        $uuid = Str::orderedUuid();
        $data = [
            "request" => ["header" => ["h0" => "Vendor-WS",
                "h1" => "1.0.2",
                "h2" => "MH08",
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
                "body" => [["p0" => $meter_number, "p1" => 10]]],
        ];

        $url = config('services.IPOSITA_EUCL_URL') . "/vendor.ws";

        $response2 = Http::withoutVerifying()->post($url, $data);
        if ($response2->ok()) {
            $json_data = json_decode($response2);
            if ($json_data->response->body) {
                return \response()->json($json_data->response->body, 200);
            } else {
                return \response()->json([
                    'messagess' => "Meter number not found",
                ], 200);
            }
        } else {
            return \response()->json([
                'messagess' => "server not reachable ",
            ], 200);
        }
    }
    public function login()
    {
        $uuid = Str::orderedUuid();

        $todayDate = Carbon::now()->format('YmdHim');

        $username = request('username');
        $password = request('password');

        $data = [
            "request" => ["header" => ["h0" => "Vendor-WS",
                "h1" => "1.0.2",
                "h2" => "VL00",
                "h3" => $uuid,
                "h4" => $username,
                "h5" => $password,
                "h6" => "RW3500010001000100160903",
                "h7" => "Laptop",
                "h8" => "DB4N0Q1",
                "h9" => "14:fe:b5:ae:6e:2c",
                "h10" => "10.10.82.118",
                "h11" => $todayDate,
                "h12" => "IPOSITA Vending System",
                "h13" => "1.0.0",
                "h14" => "rw"],
                "body" => []],
        ];

        $url = config('services.IPOSITA_EUCL_URL') . "/vendor.ws";
        //    return response($url);

        $response2 = Http::withoutVerifying()->post($url, $data);

        if ($response2->ok()) {
            $json_data = json_decode($response2);
            if ($json_data->response->body) {
                $paras1 = SysParameter::updateOrCreate(['name' => 'P0'],
                    ['value' => $json_data->response->body[0]->p0]);
                $paras = SysParameter::updateOrCreate(['name' => 'P1'],
                    ['value' => $json_data->response->body[0]->p1]);
                return \response()->json($json_data->response->body, 200);
            } else {
                return \response()->json([
                    'messages' => "Not Found",
                ], 200);
            }
        } else {
            return \response()->json(['messagess' => "server not reachable ",
            ], 500);
        }
    }
    public function changePassword()
    {
        $currect_password = request('currect_password');
        $new_password = request('new_password');
        $confirm_password = request('confirm_password');

        $todayDate = Carbon::now()->format('YmdHim');
        $uuid = Str::orderedUuid();

        $data = [
            "request" => ["header" => ["h0" => "Vendor-WS",
                "h1" => "1.0.2",
                "h2" => "CP02",
                "h3" => $uuid,
                "h4" => "iposita",
                "h5" => $currect_password,
                "h6" => "RW3500010001000100160903",
                "h7" => "Laptop",
                "h8" => "DB4N0Q1",
                "h9" => "14:fe:b5:ae:6e:2c",
                "h10" => "10.10.82.118",
                "h11" => $todayDate,
                "h12" => "IPOSITA Vending System",
                "h13" => "1.0.0",
                "h14" => "rw"],
                "body" => [["p0" => $currect_password,
                    "p1" => $new_password,
                    "p2" => $confirm_password,
                ]]],
        ];

        $url = config('services.IPOSITA_EUCL_URL') . "/vendor.ws";
        //    return response($url);

        $response2 = Http::withoutVerifying()->post($url, $data);

        if ($response2->ok()) {
            $json_data = json_decode($response2);
            if ($json_data->response->body) {
                EuclPassword::create(['password' => $new_password]);
                return \response()->json($json_data->response->body, 200);
            } else {
                return \response()->json([
                    'messages' => "Not Found",
                ], 200);
            }
        } else {
            return \response()->json(['messagess' => "server not reachable ",
            ], 500);
        }
    }
}
