<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function ProfileView()
    {
        $id = Auth::user()->id; //retrieve authenticated user's id
        $user = User::find($id);

        return view('backend.profile.view_profile', compact('user'));
    }

    
}
