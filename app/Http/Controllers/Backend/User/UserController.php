<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function UserView()
    {
        // $data['allData'] = User::where('usertype','Admin')->get();
        $data['allData'] = User::all();
        return view('backend.user.view_user', $data);
    }
}
