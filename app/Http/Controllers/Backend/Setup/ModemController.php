<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modem;

class ModemController extends Controller
{
    public function ModemView()
    {
        $data['allData'] = Modem::all();
        return view('backend.setup.modem.view_modem', $data);
    }

    public function ModemAdd()
    {
        return view('backend.setup.modem.add_modem');
    }

    public function ModemStore(Request $request)
    {
        $validatedData = $request->validate([
            'brand' => 'required|unique:modems,brand',
            'model' => 'required|unique:modems,model',
        ]);

        $data = new Modem();
        $data->brand = $request->brand;
        $data->model = $request->model;
        $data->save();

        $notification = array(
            'message' => 'New Modem Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('modem.view')->with($notification);
    }
}
