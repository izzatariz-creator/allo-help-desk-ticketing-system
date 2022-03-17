<?php

namespace App\Http\Controllers\Backend\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function PermissionView()
    {
        $data['permissions'] = Permission::all();
        return view("backend.permission.view_permission", $data);
    }

    public function PermissionAdd()
    {
        return view('backend.permission.add_permission');
    }

    public function PermissionStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        Permission::create($validatedData);

        $notification = array(
            'message' => 'New Permission Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('permission.view')->with($notification);
    }
}
