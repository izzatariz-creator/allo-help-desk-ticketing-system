<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Router;

class RouterController extends Controller
{
    public function RouterView()
    {
        $data['allData'] = Router::all();
        return view('backend.setup.router.view_router', $data);
    }

    public function RouterAdd()
    {
        return view('backend.setup.router.add_router');
    }

    public function RouterStore(Request $request)
    {
        $validatedData = $request->validate([
            'model' => 'required|unique:modems,model',
        ]);

        $data = new Router();
        $data->brand = $request->brand;
        $data->model = $request->model;
        $data->save();

        $notification = array(
            'message' => 'New Router Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('router.view')->with($notification);
    }

    public function RouterEdit($id)
    {
        $editData = Router::find($id);
        return view('backend.setup.router.edit_router', compact('editData'));
    }

    public function RouterStoreUpdate(Request $request, $id)
    {
        $data = Router::find($id);

        $data->brand = $request->brand;
        $data->model = $request->model;
        $data->save();

        $notification = array(
            'message' => 'Router Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('router.view')->with($notification);
    }

    public function RouterDelete($id)
    {
        $user = Router::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Router Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('router.view')->with($notification);
    }
}
