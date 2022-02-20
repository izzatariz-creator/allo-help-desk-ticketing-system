<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Models\Modem;
use App\Models\RetailServiceProvider;
use App\Models\Router;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    public function ProfileView()
    {
        $id = Auth::user()->id; //retrieve authenticated user's id
        $data['user'] = User::find($id);

        return view('backend.profile.view_profile', $data);
    }

    public function ProfileEdit()
    {
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('backend.profile.edit_profile', compact('editData'));
    }

    public function ProfileStore(Request $request)
    {
        $data = User::find(Auth::user()->id);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->contact_number = $request->contact_number;
        $data->address = $request->address;

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/user_images/' . $data->image));
            $extension = $file->getClientOriginalExtension();
            $filename = date('YmdHi') . uniqid() . "." . $extension;
            $file->move(public_path('upload/user_images'), $filename);

            $data['image'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('profile.view')->with($notification);
    }

    public function PasswordView()
    {
        return view('backend.profile.edit_password');
    }

    public function PasswordUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ],
        [
            'oldpassword.required' => 'Please Input Current Password',
            'password.required' => 'Please Input New Password',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);

            $user->save();
            Auth::logout();
            return redirect()->route('login');
        } else {
            return redirect()->back();
        }
    }

    public function EquipmentEdit()
    {
        $id = Auth::user()->id;
        $data['editData'] = User::find($id);
        // dd($data['editData']->toArray());
        $data['rspData'] = RetailServiceProvider::all();
        $data['modemData'] = Modem::all();
        $data['routerData'] = Router::all();
        return view('backend.profile.edit_equipment', $data);
    }

    public function EquipmentStoreUpdate(Request $request)
    {
        $data = User::find(Auth::user()->id);

        $data->rsp_id = $request->rsp_id;
        $data->modem_id = $request->modem_id;
        $data->router_id = $request->router_id;
        $data->save();

        $notification = array(
            'message' => 'Equipment Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('profile.view')->with($notification);
    }
}
