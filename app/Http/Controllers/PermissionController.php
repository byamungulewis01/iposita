<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(){
        if(auth()->user()->branch_id){
            $permissions = Permission::whereIn('type', ['branch', 'both'])->get();
        }else{
            $permissions = Permission::all();
        }
		return view('admin.user_management.permissions',compact('permissions'));
	}

	public function store(Request $request){
		$permission=new Permission();
		$permission->name=$request->name;
//		$permission->description=$request->description;
		$permission->save();
		return redirect()->back()->with('success','permission added successfully');
	}
    public function addPermissionToUser($user_id)
    {
        $user = User::find(decryptId($user_id));
        if (auth()->user()->branch_id) {
            $permissions = Permission::whereIn('type', ['both','branch'])->get();
        }else{
            $permissions = Permission::all();
        }
        $user->permissions();
    	return view('admin.user_management.permissions_to_users',compact('permissions','user'));
    }
    public function storePermissionToUser(Request $request){
        $id=decryptId(request()->user_id);
        $user = User::find($id);
        DB::table('model_has_permissions')->where('model_id',$user->id)->delete();
        foreach ($request->permissions??[] as $permission){
            DB::table('model_has_permissions')->insert(['permission_id'=>$permission,'model_type'=>'App\Models\User','model_id'=>$user->id]);
        }
        Artisan::call('optimize:clear');
    	return redirect()->back()->with("success","permissions for $user->name updated successfully");
    }
}
