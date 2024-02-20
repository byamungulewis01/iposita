<?php

namespace App\Http\Controllers;

use App\DataTables\ServiceProviderDataTable;
use App\Http\Requests\ValidateServiceProvider;
use App\Http\Requests\ValidateUpdateServiceProvider;
use App\Models\ServiceCharges;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;

class ServiceProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $service_providers = ServiceProvider::orderBy('created_at','desc')->get();
        $dataTable = new ServiceProviderDataTable($service_providers);
        return $dataTable->render('admin.settings.service_providers');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ValidateServiceProvider $request)
    {
        $request->validated();
        $service_provider = new ServiceProvider();
        $service_provider->name = $request->name;
        $service_provider->email = $request->email;
        $service_provider->telephone = $request->telephone;
        $service_provider->status = "Active";

        $service_provider->save();

        return redirect()->back()->with('success','Service Provider Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceProvider $serviceProvider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceProvider $serviceProvider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceProvider  $serviceProvider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ValidateUpdateServiceProvider $request, $provider_id)
    {
        $request->validated();
        $service_provider = ServiceProvider::find($provider_id);
        $service_provider->name = $request->name;
        $service_provider->email = $request->email;
        $service_provider->telephone = $request->telephone;
        $service_provider->status = $request->status;

        $service_provider->update();

        return redirect()->back()->with('success','Service Provider Updated Successfully');
    }

    public function deleteProvider ($provider_id){
        try {
            $service_provider = ServiceProvider::find($provider_id);
            $service_provider->delete();
            return redirect()->back()->with('success','Service Provider Deleted Successfully');
        }catch (\Exception $e){
            return redirect()->back()->with('error','Service Provider Cannot Be Deleted');
        }
    }


    public function storeRepresentative(Request $request, ServiceProvider $serviceProvider)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'telephone' => 'required',
        ]);

        $serviceProvider->update([
            'representative_name' => $request->name,
            'representative_email' => $request->email,
            'representative_phone' => $request->telephone,
        ]);
        return redirect()->back()->with('success','Representative Updated Successfully');
    }
}
