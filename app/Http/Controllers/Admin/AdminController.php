<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Laravel\Fortify\Contracts\LogoutResponse;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function destroy(Request $request)
    {
        Session::flush();
        
        Auth::logout();

        return redirect('login');
    }
}
