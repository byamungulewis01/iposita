<?php

namespace App\Http\Controllers;

use App\DataTables\BranchTopupsDataTable;
use App\DataTables\IpositaTopupDataTable;
use App\Exports\BranchTopupExport;
use App\Exports\IpositaTopupExport;
use App\Exports\TransactionExport;
use App\Models\Branch;
use App\Models\BranchTopup;
use App\Models\IpositaTopup;
use App\Models\ServiceProvider;
use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;

class ReportController extends Controller
{
    //branch top-ups report
    public function branchTopUps(Request $request)
    {
        $data = BranchTopup::query()
            ->when($request->has('branches'), function (Builder $query) use ($request) {
                $query->whereIn('branch_id', $request->get('branches'));
            })
            ->when($request->has('serviceProviders'), function (Builder $query) use ($request) {
                $query->whereIn('service_provider_id', $request->get('serviceProviders'));
            })
            ->when($request->services, function (Builder $query) use ($request) {
                $query->whereIn('service_id', $request->get('services'));
            })
            ->when($request->start_date, function (Builder $query) use ($request) {
                $query->whereDate('created_at', '>=', $request->get('start_date'));
            })
            ->when($request->end_date, function (Builder $query) use ($request) {
                $query->whereDate('created_at', '<=', $request->get('end_date'));
            })
            ->when($request->has('status'), function (Builder $query) use ($request) {
                $query->whereIn('status', $request->get('status'));
            })
            ->orderBy('created_at', 'desc')
            ->select('branch_topups.*');

        if(\request()->is_download==1){
            if (\request()->type=="pdf"){
                return PDF::loadView('admin.topups.export',['title'=>" Branches Top-ups", 'top_ups'=>$data->get()])
                    ->setPaper('a4', 'landscape')
                    ->download("branch_topups.pdf");
            }else{
                $time=time();
                $name = "branch_topups_$time.xlsx";
                return Excel::download(new BranchTopupExport($data), $name);
            }
        }
        $datatable = new BranchTopupsDataTable($data, $is_report=true);
        $serviceProviders=ServiceProvider::query()->where("status","Active")->get();
        $branches=Branch::query()->where("status","Active")->get();
        return $datatable->render('reports.branch_top_ups',compact("serviceProviders","branches"));
    }

    //system top-ups report
    public function systemTopUps(Request $request)
    {
        $data = IpositaTopup::query()
            ->when($request->has('serviceProviders'), function (Builder $query) use ($request) {
                $query->whereIn('service_provider_id', $request->get('serviceProviders'));
            })
            ->when($request->has('services'), function (Builder $query) use ($request) {
                $query->whereIn('service_id', $request->get('services'));
            })
            ->when($request->start_date, function (Builder $query) use ($request) {
                $query->whereDate('created_at', '>=', $request->get('start_date'));
            })
            ->when($request->start_date, function (Builder $query) use ($request) {
                $query->whereDate('created_at', '<=', $request->get('end_date'));
            })
            ->when($request->has('status'), function (Builder $query) use ($request) {
                $query->whereIn('status', $request->get('status'));
            })
            ->orderBy('created_at', 'desc')
            ->select('iposita_topups.*');

        if(\request()->is_download==1){
            if (\request()->type=="pdf"){
                return PDF::loadView('admin.topups.export',['title'=>'System Top-ups', 'top_ups'=>$data->get()])
                    ->setPaper('a4', 'landscape')
                    ->download("iposita_topups.pdf");
            }else{
                $time=time();
                $name = "iposita_topups_$time.xlsx";
                return Excel::download(new IpositaTopupExport($data), $name);
            }
        }

        $datatable = new IpositaTopupDataTable($data, $is_report=true);
        $serviceProviders=ServiceProvider::query()->where("status","Active")->get();
        return $datatable->render('reports.system_top_ups',compact("serviceProviders"));
    }

    //transactions report
    public function transactions(Request $request)
    {
        $user=auth()->user();
        $data=Transaction::query()->with(["user","branch","serviceCharges.service","serviceCharges.serviceProvider"])
            ->when($request->start_date,function (Builder $builder) use ($request){
                return $builder->whereDate("created_at",'>=',$request->start_date);
            })->when($request->end_date,function (Builder $builder) use ($request){
                return $builder->whereDate("created_at",'<=',$request->end_date);
            })->when($request->status,function (Builder $builder) use ($request){
                return $builder->whereIn("status",$request->status);
            })->when($request->serviceProviders,function (Builder $builder) use ($request){
                return $builder->whereHas("serviceCharges",function (Builder $builder) use ($request){
                    return $builder->whereIn("service_provider_id",$request->serviceProviders);
                });
            })->when($request->services,function (Builder $builder) use ($request){
                return $builder->whereHas("serviceCharges",function (Builder $builder) use ($request){
                    return $builder->whereIn("service_id",$request->services);
                });
            })->when($user->branch_id,function (\Illuminate\Database\Eloquent\Builder $builder) use ($user){
                $builder->where("branch_id",$user->branch_id);
            })
            ->when($request->users, function (Builder $builder) use ($request) {
                return $builder->whereIn("user_id",$request->users);
            })
            ->select("transactions.*");
        if($request->is_download==1){
            if ($request->type=="pdf"){
                return PDF::loadView('admin.transactions.export',['title'=>'Transactions Report', 'transactions'=>$data->get()])
                    ->setPaper('a4', 'landscape')
                    ->download("transactions.pdf");
            }else{
                $time=time();
                $name = "transactions_$time.xlsx";
                return Excel::download(new TransactionExport($data, $title = "Transactions Report"), $name);
            }
        }
        if($request->ajax()){
            return $this->formatTransactions($data);
        }
        $branches=Branch::query()->where("status","Active")->get();
        if(auth()->user()->branch_id){
            $branches=Branch::query()->where("status","Active")->where("id",auth()->user()->branch_id)->get();
        }
        $serviceProviders=ServiceProvider::query()->where("status","Active")->get();
        return view("reports.transactions",compact('serviceProviders','branches'));
    }
    protected function formatTransactions($data){

        return Datatables::of($data)
            ->addIndexColumn()
            ->editColumn('created_at', function ($item) {
                return $item->created_at;
            })
            ->editColumn('external_branch_commission', function ($item) {
                return $item->external_branch_commission ? $item->external_branch_commission : '-';
            })
            ->editColumn('branch_name', function ($item) {
                return $item->branch->name??'-';
            })->editColumn('service_name', function ($item) {
                return optional($item->serviceCharges)->service->name??'-';
            })->editColumn('service_provider_name', function ($item) {
                return optional($item->serviceCharges)->serviceProvider->name??'-';
            })
            ->editColumn('amount', function ($item) {
                return number_format($item->amount);
            })->editColumn('total_charges', function ($item) {
                return number_format($item->total_charges);
            })
            ->editColumn('user_name', function ($item) {
                return $item->user->name??'-';
            })->editColumn('status', function ($item) {
                if ($item->status == "Success") {
                    return '<span class="badge badge-success">' . $item->status. '</span>';
                }else if($item->status == "Pending"){
                    return '<span class="badge badge-primary">' . $item->status. '</span>';
                } else {
                    return '<span class="badge badge-danger">' . $item->status . '</span>';
                }
            })
            ->editColumn('is_exclusive', function ($item) {
                return $item->is_exclusive==1 ? '<span class="label label-success">Yes</span>'
                    : '<span class="label label-warning-success">NO</span>';
            })
            ->rawColumns(['status','is_exclusive'])
            ->make(true);
    }

}
