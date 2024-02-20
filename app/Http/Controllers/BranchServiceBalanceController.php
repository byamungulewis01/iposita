<?php

namespace App\Http\Controllers;

use App\Models\BranchServiceBalance;
use App\Models\ServiceCharges;
use Illuminate\Http\Request;

class BranchServiceBalanceController extends Controller
{

    public function checkBranchBalance(Request $request)
    {
        $user = auth()->user();
        $branch = $user->branch;
        $amount = $request->amount;
        $is_exclusive = $request->is_exclusive;
        $service_id = $request->service_id;
        $service_provider_id = $request->service_provider_id;
        $charges = ServiceCharges::query()->where('service_id', $service_id)->where('service_provider_id', $service_provider_id)->first();
        if ($charges->charge_type == 'percentage') {
            $charge_amount = $amount * ($charges->charge_amount / 100);
        } else {
            $charge_amount = $charges->charge_amount;
        }
        if ($branch && $branch->is_external) {
            // check if the branch has enough balance
            $balance = BranchServiceBalance::where('branch_id', $branch->id)
                ->where('service_id', $service_id)
                ->first();
            if ($balance) {
                if ($is_exclusive) {
                    if ($balance->balance >= $amount) {
                        return response()->json(['success' => true]);
                    } else {
                        return response()->json(['success' => false]);
                    }
                } else {
                    if ($balance->balance >= ($amount - $charge_amount)) {
                        return response()->json(['success' => true]);
                    } else {
                        return response()->json(['success' => false]);
                    }
                }
            } else {
                return response()->json(['success' => false]);
            }
        } else {
            return response()->json(['success' => true]);
        }
    }
}
