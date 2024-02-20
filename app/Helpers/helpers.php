<?php

use App\Models\BranchServiceBalance;
use App\Models\ServiceBalance;
use App\Models\ServiceProvider;

function countBranches(): int
{
    $user=auth()->user();
    return \App\Models\Branch::query()
        ->when($user->branch_id,function (\Illuminate\Database\Eloquent\Builder $builder) use ($user){
            $builder->whereHas("users",function (\Illuminate\Database\Eloquent\Builder $builder) use ($user){
                $builder->where("branch_id",$user->branch_id);
            });
        })
        ->count();
}

function countServiceProviders(): int
{
    return \App\Models\ServiceProvider::query()->count();
}

function countServices(): int
{
    return \App\Models\Service::query()->count();
}
function countTransactions(): int
{
    $user=auth()->user();
    return \App\Models\Transaction::query()
        ->when($user->branch_id,function (\Illuminate\Database\Eloquent\Builder $builder) use ($user){
            $builder->where("branch_id",$user->branch_id);
            $builder->where("user_id",$user->id);
        })
        ->count();
}

function chargesPerService(): \Illuminate\Support\Collection
{
    $user=auth()->user();
   $transactions= \App\Models\Transaction::query()->join("service_charges","service_charges.id","=","transactions.service_charge_id")
        ->join("services","services.id","=","service_charges.service_id")
       ->whereYear("transactions.created_at",now()->year)
       ->where("transactions.status",\App\Models\Transaction::SUCCESS)
       ->when($user->branch_id,function (\Illuminate\Database\Eloquent\Builder $builder) use ($user){
           $builder->where("transactions.branch_id",$user->branch_id);
       })
        ->groupBy(["services.name"])
        ->select([\Illuminate\Support\Facades\DB::raw("sum(total_charges)"),"services.name"])->get();
   $data=collect();
   foreach ($transactions as $transaction){
       $data->put($transaction->name,intval($transaction->sum));
   }
   return $data;

}

function chargesPerMonth(): \Illuminate\Support\Collection
{
    $user=auth()->user();
    $transactions= \App\Models\Transaction::query()
        ->whereYear("created_at",now()->year)
        ->when($user->branch_id,function (\Illuminate\Database\Eloquent\Builder $builder) use ($user){
            $builder->where("branch_id",$user->branch_id);
            $builder->where("user_id",$user->id);
        })
        ->groupByRaw("date_part('month',created_at)")
        ->where("status",\App\Models\Transaction::SUCCESS)
        ->select([\Illuminate\Support\Facades\DB::raw("sum(total_charges)"),\Illuminate\Support\Facades\DB::raw("date_part('month',created_at) as month")])->get();
    $data=collect();

    for ($i=1;$i<=12;$i++){
        $monthName=date('F', mktime(0, 0, 0, $i, 10));
        $data->put($monthName,$transactions->where("month",$i)->sum("sum"));
    }

    return $data;

}
function salesPerMonth(): \Illuminate\Support\Collection
{
    $user=auth()->user();
    $transactions= \App\Models\Transaction::query()
        ->whereYear("created_at",now()->year)
        ->when($user->branch_id,function (\Illuminate\Database\Eloquent\Builder $builder) use ($user){
            $builder->where("branch_id",$user->branch_id);
            $builder->where("user_id",$user->id);
        })
        ->groupByRaw("date_part('month',created_at)")
        ->where("status",\App\Models\Transaction::SUCCESS)
        ->select([\Illuminate\Support\Facades\DB::raw("sum(amount)"),\Illuminate\Support\Facades\DB::raw("date_part('month',created_at) as month")])->get();
    $data=collect();

    for ($i=1;$i<=12;$i++){
        $monthName=date('F', mktime(0, 0, 0, $i, 10));
        $data->put($monthName,$transactions->where("month",$i)->sum("sum"));
    }

    return $data;

}

function monthlyAmount($value="amount")
{
    $user=auth()->user();
    return \App\Models\Transaction::query()
        ->where("status",\App\Models\Transaction::SUCCESS)
        ->when($user->branch_id,function (\Illuminate\Database\Eloquent\Builder $builder) use ($user){
            $builder->where("branch_id",$user->branch_id);
            $builder->where("user_id",$user->id);
        })
        ->whereMonth("created_at",now()->month)->sum($value);
}

function annualAmount($value="amount")
{
    $user=auth()->user();
    return \App\Models\Transaction::query()
        ->where("status",\App\Models\Transaction::SUCCESS)
        ->when($user->branch_id,function (\Illuminate\Database\Eloquent\Builder $builder) use ($user){
            $builder->where("branch_id",$user->branch_id);
            $builder->where("user_id",$user->id);
        })
        ->whereYear("created_at",now()->year)->sum($value);
}
function isNotBranch(): bool
{
    $user=auth()->user();
    return !$user->branch_id;
}

function isExternalBranch(): bool
{
    $user=auth()->user();
    return $user->branch && $user->branch->is_external;
}

function getBalance(){
    $branch = auth()->user()->branch;
    if ($branch){
        return BranchServiceBalance::where('branch_id', '=',$branch->id)
            ->get();
    }else{
        return ServiceBalance::query()->get();
    }

}
