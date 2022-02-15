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
}
