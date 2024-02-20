<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateTopupTransfer;
use App\Models\BranchServiceBalance;
use App\Models\TopupTransfer;
use Illuminate\Http\Request;

class TopupTransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.branches.topup_transfers', [
            'topup_transfers' => TopupTransfer::where('branch_id', auth()->user()->branch_id)->get(),
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateTopupTransfer $request)
    {
//        dd($request->all());
        $fromBalance = BranchServiceBalance::query()
            ->where('branch_id', auth()->user()->branch_id)
            ->where('service_provider_id', $request->from_service_provider)
            ->where('service_id', $request->from_service)
            ->first();

        $toBalance = BranchServiceBalance::firstOrCreate([
            'branch_id' => auth()->user()->branch_id,
            'service_provider_id' => $request->to_service_provider,
            'service_id' => $request->to_service
        ]);

        if ($fromBalance == $toBalance) {
            return redirect()->back()->with('error', 'Cannot transfer to same account');
        }

        if($fromBalance){
        if ($fromBalance->balance < $request->amount) {
            return redirect()->back()->with('error', 'Insufficient balance');
        }


        $fromBalance->balance -= $request->amount;
        $toBalance->balance += $request->amount;

        $fromBalance->save();
        $toBalance->save();

        $topupTransfer = new TopupTransfer();
        $topupTransfer->branch_id = auth()->user()->branch_id;
        $topupTransfer->from_service_provider_id = $request->from_service_provider;
        $topupTransfer->from_service_id = $request->from_service;
        $topupTransfer->to_service_provider_id = $request->to_service_provider;
        $topupTransfer->to_service_id = $request->to_service;
        $topupTransfer->amount = $request->amount;
        $topupTransfer->save();

        return redirect()->back()->with('success', 'Topup transfer successful');
        }else{
            return redirect()->back()->with('error', 'Insufficient balance');
        }
    }
}
