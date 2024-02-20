<?php

namespace App\Http\Controllers;

use App\DataTables\IpositaBalanceDataTable;
use App\DataTables\IpositaTopupDataTable;
use App\Exports\BranchTopupExport;
use App\Exports\IpositaTopupExport;
use App\FileManager;
use App\Models\BranchTopup;
use App\Models\IpositaTopup;
use App\Models\ServiceBalance;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class IpositaTopupController extends Controller
{
    public function index()
    {
        $top_ups = IpositaTopup::select('*');

        if(\request()->is_download==1){
            if (\request()->type=="pdf"){
                return PDF::loadView('admin.topups.export',['title'=>'Top-ups', 'top_ups'=>$top_ups->get()])
                    ->setPaper('a4', 'landscape')
                    ->download("iposita_topups.pdf");
            }else{
                $time=time();
                $name = "iposita_topups_$time.xlsx";
                return Excel::download(new IpositaTopupExport($top_ups), $name);
            }
        }

        $datatable  = new IpositaTopupDataTable($top_ups);
        return $datatable->render('admin.topups.iposita_topups');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $previous_amount = IpositaTopup::query()
            ->where('status', '=',BranchTopup::STATUS_APPROVED)
            ->where('service_id', '=',$request->service)
            ->sum('topup_amount');
        $top_up = new IpositaTopup();
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
    public function show(){}
    public function confirmBranchTopup(Request $request,IpositaTopup $top_up)
    {
//        "decision" => "Approved"
//        "review_comment" => "ok"

        $top_up->status = $request->decision;
        $top_up->review_comment = $request->review_comment;
        $top_up->reviewed_by = auth()->user()->id;
        $top_up->reviewed_at = now();
        $top_up->save();
        if ($request->decision == "Approved") {
            $previous_amount = IpositaTopup::query()
                ->where('status', '=', BranchTopup::STATUS_APPROVED)
                ->where('service_id', '=', $top_up->service_id)
                ->sum('topup_amount');
            $top_up->previous_amount = $previous_amount;
            $top_up->current_amount = $previous_amount + $top_up->topup_amount;
            $top_up->status = "CONFIRMED";
            $top_up->save();
            //update branch service balance
            $balance = ServiceBalance::firstOrCreate(
                ['service_provider_id' => $top_up->service_provider_id, 'service_id' => $top_up->service_id]
            );
            $balance->balance = $balance->balance + $top_up->topup_amount;
            $balance->save();
            return redirect()->back()->with('success', 'Top-up Confirmed Successfully');
        }
        return redirect()->back()->with('success', 'Top-up Rejected Successfully');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IpositaTopup  $ipositaTopup
     * @return \Illuminate\Http\Response
     */
    public function edit(IpositaTopup $ipositaTopup)
    {
        //
    }

    public function update(Request $request, IpositaTopup $iposita_topup)
    {
        $top_up = $iposita_topup;
        $previous_amount = IpositaTopup::query()
            ->where('status', '=',BranchTopup::STATUS_APPROVED)
            ->where('service_id', '=',$request->service)
            ->sum('topup_amount');

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
    public function destroy(IpositaTopup $iposita_topup)
    {
        $top_up = $iposita_topup;
        try {
            $top_up->delete();
            return redirect()->back()->with('success','Top-up Deleted Successfully');
        }catch (\Exception $e) {
            return redirect()->back()->with('error','Top-up could not be deleted');
        }
    }

    public function getBalance()
    {
        $balance = ServiceBalance::select('*');
        $datatable  = new IpositaBalanceDataTable($balance);
        return $datatable->render('admin.topups.balance');
    }

    public function submitTopup(IpositaTopup $top_up)
    {
        $top_up->status = "SUBMITTED";
        $top_up->submitted_by = auth()->user()->id;
        $top_up->save();
        return redirect()->back()->with('success','Top-up Submitted Successfully');
    }
}
