<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Laravel\Fortify\Contracts\LogoutResponse;

class AdminController extends Controller
{
    public function destroy(Request $request) : LogoutResponse
    {
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        
        return app(LogoutResponse::class);
    }
}
