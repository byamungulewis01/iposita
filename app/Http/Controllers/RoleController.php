<?php

namespace App\Http\Controllers;


use App\Http\Requests\ValidateRole;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function index()
    {
        $user=auth()->user();
        $roles = Role::query()->get();
        return view('admin.user_management.roles', compact('roles'));
    }


    public function store(ValidateRole $request)
    {

        Role::create($request->validated());
        return redirect()->back()->with("success","Role created successfully");
    }
    public function update(ValidateRole $request, Role $role){
        $role->update($request->validated());
        return redirect()->back()->with("success","role updated successfully");
    }
    public function addPermissionToRole($role_id){
        $role=Role::findorFail($role_id);
        $permissions =Permission::query()->get();
        return view('admin.user_management.permissions_to_roles',compact('permissions','role'));
    }
    public function addRoleToUser($user_id){
        $user=User::findorFail($user_id);
        $roles = Role::query()->get();;
        return view('admin.user_management.roles_to_users',compact('roles','user'));
    }
    public function storeRoleToUser(Request $request){
        $user=User::findorFail($request->user_id);
        $user->syncRoles($request->roles);
        return redirect()->back()->with("success","roles for $user->name updated successfully");



    }
    public function storePermissionToRole(Request $request){
        $role=Role::findorFail($request->role_id);
        $role->syncPermissions($request->permissions);
        return redirect()->back()->with("success","permissions for $role->name updated successfully");
    }


    public function show(Role $role)
    {
        return $role;
    }


    public function destroy(Role $role)
    {
        $role->delete();
        return back();
    }
}
