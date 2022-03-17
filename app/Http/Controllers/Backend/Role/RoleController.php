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
}
