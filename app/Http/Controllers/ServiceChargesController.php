<?php

namespace App\Http\Controllers;

use App\DataTables\ServiceChargeDataTable;
use App\Http\Requests\ValidateServiceCharges;
use App\Http\Requests\ValidateUpdateServiceCharges;
use App\Models\Branch;
use App\Models\Service;
use App\Models\ServiceCharges;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;

class ServiceChargesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function index()
    {
        $services = Service::all();
        $providers = ServiceProvider::all();
        $charges = ServiceCharges::orderBy('created_at', 'desc')->with(['service', 'serviceProvider'])->get();
        $dataTable = new ServiceChargeDataTable($charges);

        return $dataTable->render('admin.settings.charges', compact('services', 'providers'));
    }

    public function update(ValidateUpdateServiceCharges $request, $charge_id)
    {
//        dd($request->all());
        $service_charge = ServiceCharges::find($charge_id);

        $service_charge->service_provider_id = $request->provider_id;
        $service_charge->service_id = $request->service_id;
        $service_charge->charges_type = $request->charge_type;
        $service_charge->min = $request->charge_type == 'Range' ? $request->min : null;
        $service_charge->max = $request->charge_type == 'Range' ? $request->max : null;
        $service_charge->charges = $request->charge;
        $service_charge->charge_customer = $request->input('customer_charge', 0);
        $service_charge->save();
        return redirect()->back()->with('success', 'Service Charge Updated successfully');
    }

    public function deleteCharge($charge_id)
    {
        try {
            $service_charge = ServiceCharges::find($charge_id);
            $service_charge->delete();
            return redirect()->back()->with('success', 'Service Charge Deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Service Charge cannot be deleted');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ValidateServiceCharges $request)
    {
        if ($request->charge_type == 'Range') {
            foreach ($request->charges as $key => $value) {
                if (!$request->min[$key] || !$request->max[$key] || !$value)
                    continue;
                $service_charge = new ServiceCharges();
                $service_charge->service_provider_id = $request->provider_id;
                $service_charge->service_id = $request->service_id;
                $service_charge->charges_type = $request->charge_type;
                $service_charge->min = $request->min[$key];
                $service_charge->max = $request->max[$key];
                $service_charge->charges = $value;
                $service_charge->save();
            }
        } else {
            $service_charge = new ServiceCharges();
            $service_charge->service_provider_id = $request->provider_id;
            $service_charge->service_id = $request->service_id;
            $service_charge->charges_type = $request->charge_type;
            $service_charge->charges = $request->charge;
            $service_charge->charge_customer = $request->input('customer_charge', 0);
            $service_charge->save();
        }
        return redirect()->back()->with('success', 'Service Charges Created Successfully');
    }
    public function setExternalBranchPercentage(Request $request)
    {
        $branch = Branch::find(decryptId($request->branch_id));
        $branch->percentage = $request->percentage;
        $branch->save();
        return redirect()->back()->with('success', 'External Branch Percentage Updated Successfully');
    }
}
