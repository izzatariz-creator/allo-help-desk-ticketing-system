<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RetailServiceProvider;

class RetailServiceProviderController extends Controller
{
    public function RetailServiceProviderView()
    {
        $data['allData'] = RetailServiceProvider::all();
        return view('backend.setup.rsp.view_rsp', $data);
    }

    public function RetailServiceProviderAdd()
    {
        return view('backend.setup.rsp.add_rsp');
    }

    public function RetailServiceProviderStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:retail_service_providers,name',
        ]);

        $data = new RetailServiceProvider();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'New RSP Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('rsp.view')->with($notification);
    }
}
