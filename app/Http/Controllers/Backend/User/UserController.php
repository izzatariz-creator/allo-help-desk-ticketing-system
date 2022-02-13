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

    public function UserAdd()
    {
        return view('backend.user.add_user');
    }

    public function UserStore(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|unique:users',
            'name' => 'required',
        ]);

        $data = new User();
        $temppass = rand(0000,9999);
        $data->role = $request->role;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($temppass); //encrypt temppass
        $data->temppass = $temppass;
        $data->save();

        $notification = array(
            'message' => 'New User Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('user.view')->with($notification);
    }
}
