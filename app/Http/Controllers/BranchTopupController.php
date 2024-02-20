<?php

namespace App\Http\Controllers;

use App\DataTables\BranchTopupsDataTable;
use App\Exports\BranchTopupExport;
use App\Exports\TransactionExport;
use App\FileManager;
use App\Models\Branch;
use App\Models\BranchServiceBalance;
use App\Models\BranchTopup;
use App\Models\ServiceBalance;
use App\Models\ServiceProvider;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BranchTopupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function index(Branch $branch)
    {
        $user = auth()->user();
        if ($user->branch && $user->branch->is_external) {
            $top_ups = $branch->topups()->where('status',BranchTopup::STATUS_APPROVED)->orderBy('created_at', 'desc')->select('branch_topups.*');
        }
        else {
            $top_ups = $branch->topups()->orderBy('created_at', 'desc')->select('branch_topups.*');
        }
        if(\request()->is_download==1){
            if (\request()->type=="pdf"){
                return PDF::loadView('admin.topups.export',['title'=>"$branch->name Branch Top-ups", 'top_ups'=>$top_ups->get()])
                    ->setPaper('a4', 'landscape')
                    ->download("branch_topups.pdf");
            }else{
                $time=time();
                $name = "branch_topups_$time.xlsx";
                return Excel::download(new BranchTopupExport($top_ups), $name);
            }
        }
        $datatable  = new BranchTopupsDataTable($top_ups);
        return $datatable->render('admin.branches.topups', compact('branch'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Branch $branch)
    {
        //check if there is enough money before top-ups
        $isEnough = $this->checkSufficientBalance($request->service_provider,$request->service, $request->amount);
        if(!$isEnough)
            return redirect()->back()->with('error',"No enough balance for chosen service");

        $previous_amount = $branch->topups()
            ->where('status', '=',BranchTopup::STATUS_APPROVED)
            ->where('service_id', '=',$request->service)
            ->sum('topup_amount');
        $top_up = new BranchTopup();
        $top_up->branch_id = $branch->id;
        $top_up->previous_amount = $previous_amount ?? 0;
        $top_up->current_amount = $previous_amount?? 0;
        $top_up->service_provider_id = $request->service_provider;
        $top_up->service_id = $request->service;
        $top_up->topup_amount = $request->amount;
        if ($request->file('attachment')) {
            $attachment = $request->file('attachment');
            $destinationPath = FileManager::TOP_UP_ATTACHMENT_PATH;
            $path = $attachment->store($destinationPath);
            $filename = str_replace($destinationPath, "", $path);
        }
        $top_up->attachment = $filename ?? null;
        $top_up->description = $request->description;
        $top_up->save();
        return redirect()->back()->with("SUCCESS", "Topup saved successfully");
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @param  \App\Models\BranchTopup  $branchTopup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch, BranchTopup $top_up)
    {
        $previous_amount = $branch->topups()
            ->where('status', '=',BranchTopup::STATUS_APPROVED)
            ->where('service', '=',$request->service)
            ->sum('topup_amount');

        $top_up->branch_id = $branch->id;
        $top_up->previous_amount = $previous_amount;
        $top_up->service_provider_id = $request->service_provider;
        $top_up->service_id = $request->service;
        $top_up->topup_amount = $request->amount;
        $top_up->current_amount = $previous_amount;
        if ($request->file('attachment')) {
            $attachment = $request->file('attachment');
            $destinationPath = FileManager::TOP_UP_ATTACHMENT_PATH;
            $path = $attachment->store($destinationPath);
            $filename = str_replace($destinationPath, "", $path);
        }
        $top_up->attachment = $filename ?? null;
        $top_up->description = $request->description;
        $top_up->save();
        return redirect()->back()->with("SUCCESS", "Top-up updated successfully");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $branch
     * @param  \App\Models\BranchTopup  $branchTopup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch, BranchTopup $top_up)
    {
        try {
            $top_up->delete();
            return redirect()->back()->with('success','Branch Top-up Deleted Successfully');
        }catch (\Exception $e) {
            return redirect()->back()->with('error','Branch Top-up could not be deleted');
        }
    }

    public function confirmBranchTopup(BranchTopup $top_up)
    {
        //check if there is enough money before top-ups
        $isEnough = $this->checkSufficientBalance($top_up->service_provider_id,$top_up->service_id, $top_up->topup_amount);
        if(!$isEnough)
            return redirect()->back()->with('error',"No enough balance for chosen service");

        $previous_amount = BranchTopup::query()
            ->where('status', '=',BranchTopup::STATUS_APPROVED)
            ->where('branch_id', '=',$top_up->branch_id)
            ->where('service_id', '=',$top_up->service_id)
            ->sum('topup_amount');
        $top_up->previous_amount = $previous_amount;
        $top_up->current_amount = $previous_amount + $top_up->topup_amount;
        $top_up->status = "CONFIRMED";
        $top_up->save();
        //update branch service balance
        $branchBalance = BranchServiceBalance::firstOrCreate(
            ['branch_id' => $top_up->branch_id, 'service_id' => $top_up->service_id , 'service_provider_id' => $top_up->service_provider_id],
            ['balance' => 0]
        );
        $branchBalance->balance = $branchBalance->balance + $top_up->topup_amount;
        $branchBalance->save();
        //deduct iposita balance
        $this->updateIpositaBalance($top_up->service_provider_id,$top_up->service_id, -$top_up->topup_amount);
        return redirect()->back()->with('success','Branch Top-up Confirmed Successfully');

//        // topup add mail attribute object
//        $top_up->setAttribute('amount', $top_up->topup_amount);
//        $top_up->setAttribute('type', 'Float');
//        $top_up->setAttribute('agency_mail', $top_up->agency->email);
//
//        TopupMailJob::dispatchNow($top_up);

        return redirect()->back()->with("SUCCESS", "Top up is Confirmed successfully");

    }

    public function reverseBranchTopup(Request $request, BranchTopup $top_up)
    {
        $previous_amount = BranchTopup::query()
            ->where('status', '=',BranchTopup::STATUS_APPROVED)
            ->where('branch_id', '=',$top_up->branch_id)
            ->where('service_id', '=',$top_up->service_id)
            ->sum('topup_amount');
        $top_up->previous_amount = $previous_amount;
        $top_up->current_amount = $previous_amount - $top_up->topup_amount;
        $top_up->status = "REVERSED";
        $top_up->reason = $request->reason;
        $top_up->save();
        //update branch service balance
        $branchBalance = BranchServiceBalance::where('branch_id', '=',$top_up->branch_id)
            ->where('service_id', '=',$top_up->service_id)
            ->where('service_provider_id', '=',$top_up->service_provider_id)
            ->first();
        $branchBalance->balance = $branchBalance->balance - $top_up->topup_amount;
        $branchBalance->save();

        $this->updateIpositaBalance($top_up->service_provider_id,$top_up->service_id,$top_up->topup_amount);

        return redirect()->back()->with('success','Branch Top-up Reversed Successfully');
    }

    public function getBalance(){
        $branch = auth()->user()->branch;
        $balances = BranchServiceBalance::where('branch_id', '=',$branch->id)
            ->get();
        $serviceProviders=ServiceProvider::query()->where("status","Active")->get();
        return view('admin.branches.balance', compact('balances','serviceProviders'));
    }

    private function checkSufficientBalance($service_provider, $service, $amount):bool
    {
        $branchBalance = ServiceBalance::query()
            ->where('service_provider_id', '=',$service_provider)
            ->where('service_id', '=',$service)
            ->first();

        if (!$branchBalance)
            return false;

        if ($branchBalance->balance < $amount)
            return false;
        return true;
    }
}
