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
}
