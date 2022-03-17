<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function UserView()
    {
        // $data['allData'] = User::where('usertype','Admin')->get();
        $data['allData'] = User::all();
        $data['roles']=Role::all();
        return view('backend.user.view_user', $data);
    }

    public function UserAdd()
    {
        $data['roles']=Role::all();
        return view('backend.user.add_user',$data);
    }

    public function UserStore(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|unique:users',
            'name' => 'required',
        ]);

        $data = new User();
        $temppass = rand(0000,9999);
        $data->assignRole($request->roles);
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

    public function UserEdit($id)
    {
        $data['editData'] = User::find($id);
        $data['roles']=Role::all();
        return view('backend.user.edit_user', $data);
    }

    public function UserUpdate(Request $request, $id)
    {
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $data->assignRole($request->roles);
        $data->save();

        $notification = array(
            'message' => 'User Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('user.view')->with($notification);
    }

    public function UserDelete($id)
    {
        $user = User::find($id);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->delete();

        $notification = array(
            'message' => 'User Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('user.view')->with($notification);
    }
}
