<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OwenIt\Auditing\Models\Audit;
use Yajra\DataTables\DataTables;

class SystemAuditController
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $audits= Audit::query()
                ->with(['user'])
                ->when($request->start_date,function ($q) use ($request){
                    $q->whereDate('created_at','>=',$request->start_date);
                })
                ->when($request->end_date,function ($q) use ($request){
                    $q->whereDate('created_at','<=',$request->end_date);
                })->when($request->event,function ($q) use ($request){
                    $q->where('event','=',$request->event);
                })->when($request->model,function ($q) use ($request){
                    $q->where('auditable_type','LIKE', '%'.$request->model.'%');
                })
                ->orderBy('id',"desc")->select("audits.*");
            return $this->formatDataTableValue($audits);
        }
        return view('admin.settings.audits');
    }

    public function formatDataTableValue($audits)
    {
        return Datatables::of($audits)
            ->addIndexColumn()
            ->editColumn('created_at', function ($item) {
                return $item->created_at;
            })->addColumn('user_name', function ($item) {
                return $item->user->name??'-';
            })->addColumn('model', function ($item) {
                return str_replace("App\\","",$item->auditable_type) ;
            })
            ->addColumn('formatted_old_values', function ($item) {
                $oldValue='<ul style="padding-left: 0 !important;margin-left: 5px !important;">';

                foreach(array_keys($item->old_values) as $value){
                    $oldValue.='<li>';
                    if(!is_array($value)){
                        $oldValue.=$value .':';
                    }
                    if(is_array($item->old_values[$value])){
                        $oldValue.=$item->old_values[$value]["date"];
                    }else{
                        $oldValue.=$item->old_values[$value];
                    }
                    $oldValue.='</li>';

                }
                $oldValue.=' </ul>';

                return $oldValue;
            })->addColumn('formatted_new_values', function ($item) {
                $newValue='<ul style="padding-left: 0 !important;margin-left: 5px !important;">';
                foreach(array_keys($item->new_values) as $value){
                    $newValue.='<li>';
                    if(!is_array($value)){
                        $newValue.=$value .':';
                    }
                    if(is_array($item->new_values[$value])){
                        $newValue.=$item->new_values[$value]["date"];
                    }else{
                        $newValue.=$item->new_values[$value];
                    }
                    $newValue.='</li>';

                }
                $newValue.=' </ul>';

                return $newValue;
            })
            ->rawColumns(['action', 'formatted_old_values', 'index','formatted_new_values'])
            ->make(true);
    }
}
