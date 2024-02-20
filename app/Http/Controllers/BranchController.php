<?php

namespace App\Http\Controllers;

use App\DataTables\BranchDataTable;
use App\DataTables\UserDataTable;
use App\FileManager;
use App\Http\Requests\ValidateBranch;
use App\Http\Requests\ValidateUpdateBranch;
use App\Models\Branch;
use App\Models\Province;
use App\Models\Service;
use App\Models\ServiceCharges;
use App\Models\ServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Branch::with(['province','district','sector'])->orderBy('created_at','desc')->select("branches.*")->get();
        $dataTable = new BranchDataTable($data);
        $provinces = Province::all();
        return $dataTable->render('admin.settings.branches',compact('provinces'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ValidateBranch $request)
    {
        $request->validated();

        $branch = new Branch();
        $branch->name = $request->name;
        $branch->email = $request->email;
        $branch->telephone=$request->telephone;
        $branch->province_id = $request->province_id;
        $branch->district_id = $request->district_id;
        $branch->sector_id = $request->sector_id;
        $branch->branch_type = $request->branch_type;
        $branch->status = "Active";

        if ($request->file('contract')) {
            $attachment = $request->file('contract');
            $destinationPath = FileManager::BRANCH_CONTRACT_PATH;
            $path = $attachment->store($destinationPath);
            $filename = str_replace($destinationPath, "", $path);
        }
        $branch->contract = $filename ?? null;
        $branch->save();
        return redirect()->back()->with('success','Branch Created Successfully');
    }

    public function deleteBranch($branch_id)
    {
        $service_charge= Branch::find($branch_id);
        $service_charge->delete();
        return redirect()->back()->with('success','Branch Deleted successfully');

    }

    public function getBranchUsers($branch_id)
    {
        $branch=Branch::query()->where("status","Active")->where('id',$branch_id)->first();
        $users = User::with(["permissions"])->orderBy('created_at','desc')->where('branch_id',$branch_id)->get();
        $dataTable = new UserDataTable($users);
        return $dataTable->render('admin.settings.branch_users',compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ValidateUpdateBranch $request,$branch_id)
    {
        $request->validated();
        $branch = Branch::find($branch_id);

        $branch->name = $request->name;
        $branch->email = $request->email;
        $branch->telephone=$request->telephone;
        $branch->province_id = $request->province_id;
        $branch->district_id = $request->district_id;
        $branch->sector_id = $request->sector_id;
        $branch->branch_type = $request->branch_type;
        $branch->status = $request->status;
        if ($request->file('contract')) {
            $attachment = $request->file('contract');
            $destinationPath = FileManager::BRANCH_CONTRACT_PATH;
            $path = $attachment->store($destinationPath);
            $filename = str_replace($destinationPath, "", $path);
        }
        $branch->contract = $filename ?? null;
        $branch->update();

        return redirect()->back()->with('success','Branch Updated successfully');
    }

    public function usersByBranch(Request $request)
    {
        $branches = $request->branches;
        if($branches){
            return User::whereIn("branch_id",$branches)->get();
        }
        return [];
    }

    public function getBranchServices(Branch $branch)
    {
        $providers = ServiceProvider::with('services')->has('services')->get();
        return view('admin.branches.services',compact('providers','branch'));
    }

    public function storeBranchServices(Request $request,Branch $branch)
    {
        $services = $request->services;
        $branch->services()->detach();
        if($services){
           foreach ($services as $service){
               $branch->services()->attach($service['service_id'],['service_provider_id' => $service['service_provider_id']]);
              }
        }
        return response()->json(['status'=>true,'message'=>'Services updated Successfully']);
    }
}
