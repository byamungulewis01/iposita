<?php

namespace App\Http\Controllers;

use App\Http\Requests\validateTopupPayment;
use App\Models\BranchServiceBalance;
use App\Models\BranchTopupPayment;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;

class BranchTopupPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        if ($user->branch && $user->branch->is_external){
            $payments = BranchTopupPayment::where('branch_id', auth()->user()->branch_id)->get();
        }else{
            $payments = BranchTopupPayment::where('status', "<>","pending")->get();
        }

        return view('admin.branches.payments', [
            'payments' => $payments,
            'serviceProviders' => ServiceProvider::all(),
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(validateTopupPayment $request)
    {
        $payment = new BranchTopupPayment();
        $payment->branch_id = auth()->user()->branch_id;
        $payment->service_provider_id = $request->service_provider;
        $payment->service_id = $request->service;
        $payment->amount = $request->amount;
        $payment->attachment = $request->attachment->store('uploads/payments');
        $payment->save();
        return redirect()->back()->with('success', 'Payment added successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BranchTopupPayment  $branchTopupPayment
     * @return \Illuminate\Http\Response
     */
    public function update(validateTopupPayment $request, $branchTopupPayment)
    {
        $payment = BranchTopupPayment::find($branchTopupPayment);
        $payment->branch_id = auth()->user()->branch_id;
        $payment->service_provider_id = $request->service_provider;
        $payment->service_id = $request->service;
        $payment->amount = $request->amount;
        $payment->attachment = $request->attachment->store('uploads/payments');
        $payment->save();
        return redirect()->back()->with('success', 'Payment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BranchTopupPayment  $branchTopupPayment
     * @return \Illuminate\Http\Response
     */
    public function delete(BranchTopupPayment $branchTopupPayment)
    {
        try {
            $branchTopupPayment->delete();
            return redirect()->back()->with('success', 'Payment deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error deleting payment');
        }
    }

    public function submit($payment)
    {
        $payment = BranchTopupPayment::find($payment);
        $payment->status= 'Submitted';
        $payment->save();
        return redirect()->back()->with('payment submitted Successfully');

    }
    public function approve(Request $request, $payment)
    {
        $data = $request->validate([
            'decision' => 'required',
            'review_comment' => 'nullable|string'
        ]);


        $status = $data['decision'] == 'Approved' ? 'Approved' : 'Rejected';

        $payment = BranchTopupPayment::find($payment);
        $payment->status= $status;
        $payment->approved_by = auth()->user()->id;
        $payment->review_comment = \request('review_comment');
        $payment->save();

        if ($status == 'Approved'){
            $branchBalance =BranchServiceBalance::firstOrCreate([
                'branch_id' => $payment->branch_id,
                'service_provider_id' => $payment->service_provider_id,
                'service_id' => $payment->service_id,
            ]);
            $branchBalance->balance += $payment->amount;
            $branchBalance->save();
        }

        return redirect()->back()->with("payment $status Successfully");
    }
}
