<?php

namespace App\Http\Controllers\Backend\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function RoleView()
    {
        $data['roles'] = Role::all();
        return view("backend.role.view_role", $data);
    }

    public function RoleAdd()
    {
        return view('backend.role.add_role');
    }

    public function RoleStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        Role::create($validatedData);

        $notification = array(
            'message' => 'New Role Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('role.view')->with($notification);
    }

    public function RoleEdit(Role $role)
    {
        $permissions = Permission::all();
        return view('backend.role.edit_role', compact('role','permissions'));
    }

    public function RoleStoreUpdate(Request $request, $id)
    {
        $data = Role::find($id);

        $validatedData = $request->validate([
            'name' => 'required'
        ]);

        $data->update($validatedData);

        $notification = array(
            'message' => 'Role Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('role.view')->with($notification);
    }

    public function RoleDelete($id)
    {
        $data = Role::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Role Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('role.view')->with($notification);
    }

    public function RolePermissionAssign(Request $request, Role $role)
    {

        if($role->hasPermissionTo($request->permission)){
            $notification = array(
                'message' => 'Permission Existed',
                'alert-type' => 'warning'
            );
            return back()->with($notification);
        }

        $role->givePermissionTo($request->permission);
        $notification = array(
            'message' => 'Permission Added Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    public function RolePermissionRevoke(Role $role, Permission $permission)
    {
        if($role->hasPermissionTo($permission)){
            $role->revokePermissionTo($permission);
            $notification = array(
                'message' => 'Permission Revoked Successfully',
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }
        $notification = array(
            'message' => 'Permission Not Existed',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
}
