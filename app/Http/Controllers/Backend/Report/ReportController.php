<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function ReportView()
    {
        return view('backend.report.report_view');
    }

    public function ReportByDate(Request $request){
        return $request->all();
    }

    public function ReportByMonth(Request $request){
        return $request->all();
    }

    public function ReportByYear(Request $request){
        return $request->all();
    }
}
