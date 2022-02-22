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
            'name' => 'required|unique:modems,name',
        ]);

        $data = new Modem();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'New Modem Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('modem.view')->with($notification);
    }

    public function ModemEdit($id)
    {
        $editData = Modem::find($id);
        return view('backend.setup.modem.edit_modem', compact('editData'));
    }

    public function ModemStoreUpdate(Request $request, $id)
    {
        $data = Modem::find($id);

        $validatedData = $request->validate([
            'name' => 'required|unique:modems,name',
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Modem Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('modem.view')->with($notification);
    }

    public function ModemDelete($id)
    {
        $user = Modem::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Modem Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('modem.view')->with($notification);
    }
}
