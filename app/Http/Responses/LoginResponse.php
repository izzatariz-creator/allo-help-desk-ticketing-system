<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as ContractsLoginResponse;
use Illuminate\Support\Facades\Auth;

class LoginResponse implements ContractsLoginResponse
{
    public function toResponse($request)
    {
        // here i am checking if the currently logout in users has a role_id of 2 which make him a regular user and then redirect to the users dashboard else the admin dashboard

        if (Auth::user()->hasRole('admin')) {
            return redirect()->route('dashboard');
        }
        else if(Auth::user()->hasRole('technician')){
            return redirect()->route('dashboard');
        }
        return redirect()->route('ticket.view');
    }
}
