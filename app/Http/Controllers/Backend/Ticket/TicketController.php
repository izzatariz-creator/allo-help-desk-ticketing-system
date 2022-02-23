<?php

namespace App\Http\Controllers\Backend\Ticket;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function TicketView()
    {
        $data['allData'] = Ticket::all();
        return view('backend.ticket.view_ticket', $data);
    }
}
