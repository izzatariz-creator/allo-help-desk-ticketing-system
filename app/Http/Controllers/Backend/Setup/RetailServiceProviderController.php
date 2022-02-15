<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RetailServiceProvider;

class RetailServiceProviderController extends Controller
{
    public function RetailServiceProviderView(){
        $data['allData'] = RetailServiceProvider::all();
        return view('backend.setup.rsp.view_rsp', $data);
    }
}
