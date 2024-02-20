<?php

namespace App\Http\Controllers;

use App\DataTables\ServiceDataTable;
use App\Http\Requests\ValidateService;
use App\Http\Requests\ValidateUpdateService;
use App\Models\Service;
use App\Models\ServiceCharges;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::orderBy('created_at','desc')->get();
        $dataTable = new ServiceDataTable($services);
        return $dataTable->render('admin.settings.services');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ValidateService $request)
    {
        $service = new Service();

        $service->name = $request->name;
        $service->display_label = $request->display_label;
        $service->status = "Active";

        $service->save();
        return  redirect()->back()->with('success','New Service Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update( ValidateUpdateService $request, $service_id)
    {
        $service= Service::find($service_id);
        $service->name = $request->name;
        $service->display_label = $request->display_label;
        $service->status = $request->status;
        $service->update();
        return redirect()->back()->with('success','Service  Updated successfully');
    }

    public  function  delete($service_id){
        try {
            $service = Service::find($service_id);
            $service->delete();
            return redirect()->back()->with('success','Service Deleted Successfully');
        }catch (\Exception $e) {
            return redirect()->back()->with('error','Service could not be deleted');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
