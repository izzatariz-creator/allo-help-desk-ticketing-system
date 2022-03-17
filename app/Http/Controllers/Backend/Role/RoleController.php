<?php

namespace App\Http\Controllers\Backend\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

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

    public function RoleEdit($id)
    {
        $editData = Role::find($id);
        return view('backend.role.edit_role', compact('editData'));
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
}
