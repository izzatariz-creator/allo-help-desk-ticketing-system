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
}
