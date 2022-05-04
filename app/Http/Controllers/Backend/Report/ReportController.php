<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use App\Models\Modem;
use App\Models\RetailServiceProvider;
use App\Models\Router;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\TicketCategory;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function ReportView()
    {
        return view('backend.report.report_view');
    }

    public function ReportByDate(Request $request)
    {

        $selected_date = $request->date;

        $data['new_registered_user'] = User::whereDate('created_at', $selected_date)->count();
        $data['by_date'] = date('d-m-Y', strtotime($selected_date));

        $data['ticket_created'] = Ticket::whereDate('created_at', $selected_date)->count();
        $data['ticket_closed'] = Ticket::whereDate('date_closed', $selected_date)->count();

        $data['categories'] = TicketCategory::withCount([
            'tickets' => function ($query) use ($selected_date) {
                $query->whereDate('created_at', $selected_date);
            }
        ])->get();

        $data['rsps'] = RetailServiceProvider::withCount([
            'tickets' => function ($query) use ($selected_date) {
                $query->whereDate('created_at', $selected_date);
            }
        ])->get();

        $data['modems'] = Modem::withCount([
            'tickets' => function ($query) use ($selected_date) {
                $query->whereDate('created_at', $selected_date);
            }
        ])->get();

        $data['routers'] = Router::withCount([
            'tickets' => function ($query) use ($selected_date) {
                $query->whereDate('created_at', $selected_date);
            }
        ])->get();

        $data['users'] = User::role('technician')->withCount([
            'tickets' => function ($query) use ($selected_date) {
                $query->whereDate('created_at', $selected_date);
            }
        ])->get();

        $pdf = PDF::loadView('backend.report.report_by_date_pdf', $data);
        return $pdf->stream('ByDateReport-allo.pdf');

    }

    public function ReportByMonth(Request $request)
    {
        return $request->all();
    }

    public function ReportByYear(Request $request)
    {
        return $request->all();
    }
}
