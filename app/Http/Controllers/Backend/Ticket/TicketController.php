<?php

namespace App\Http\Controllers\Backend\Ticket;

use App\Http\Controllers\Controller;
use App\Mail\NewTicketMail;
use App\Models\Comment;
use App\Models\Modem;
use App\Models\RetailServiceProvider;
use App\Models\Router;
use App\Models\Ticket;
use App\Models\TicketCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    public function TicketView()
    {
        if(Auth::user()->hasRole('admin')){
            $data['allData'] = Ticket::select('ticket_ref','user_id','title','status','category_id','priority','rsp_id','created_at','id')->get();
            return view('backend.ticket.view_ticket', $data);
        }
        else if(Auth::user()->hasRole('technician')){
            $data['allData'] = Ticket::select('ticket_ref','user_id','title','status','category_id','priority','rsp_id','created_at','id')->get();
            return view('backend.ticket.view_ticket', $data);
        }
        else{
            $data['allData'] = Ticket::where('user_id',Auth::user()->id)->get();
            return view('backend.ticket.view_ticket_user', $data);
        }
    }

    public function TicketViewAssigned()
    {
        $data['allData'] = Ticket::where('technician_id',Auth::user()->id)->get();
        return view('backend.ticket.assigned_ticket', $data);
    }

    public function TicketViewOpen()
    {
        $data['allData'] = Ticket::select('ticket_ref','user_id','title','status','category_id','priority','rsp_id','created_at','id')->where('status','Open')->get();
        return view('backend.ticket.view_ticket', $data);
    }

    public function TicketViewPending()
    {
        $data['allData'] = Ticket::select('ticket_ref','user_id','title','status','category_id','priority','rsp_id','created_at','id')->where('status','Pending')->get();
        return view('backend.ticket.view_ticket', $data);
    }

    public function TicketViewOnHold()
    {
        $data['allData'] = Ticket::select('ticket_ref','user_id','title','status','category_id','priority','rsp_id','created_at','id')->where('status','On Hold')->get();
        return view('backend.ticket.view_ticket', $data);
    }

    public function TicketViewSolved()
    {
        $data['allData'] = Ticket::select('ticket_ref','user_id','title','status','category_id','priority','rsp_id','created_at','id')->where('status','Solved')->get();
        return view('backend.ticket.view_ticket', $data);
    }

    public function TicketViewClosed()
    {
        $data['allData'] = Ticket::select('ticket_ref','user_id','title','status','category_id','priority','rsp_id','created_at','id')->where('status','Closed')->get();
        return view('backend.ticket.view_ticket', $data);
    }

    public function TicketCreate()
    {
        $id = Auth::user()->id;

        $data['editData'] = User::find($id);
        $data['categoryData'] = TicketCategory::orderBy('name', 'asc')->get();
        $data['rspData'] = RetailServiceProvider::orderBy('name', 'asc')->get();
        $data['modemData'] = Modem::orderBy('name', 'asc')->get();
        $data['routerData'] = Router::orderBy('name', 'asc')->get();

        return view('backend.ticket.create_ticket', $data);
    }

    public function TicketStore(Request $request)
    {

        DB::transaction(function () use ($request) {
            $validatedData = $request->validate([
                'title' => 'required',
                'category_id' => 'required',
                'description' => 'required',
                'priority' => 'required',
                'rsp_id' => 'required',
                'modem_id' => 'required',
                'router_id' => 'required',
                'address' => 'required',
            ]);

            $ticket = Ticket::orderBy('id', 'DESC')->first();

            if ($ticket == null) {
                $firstTick = 0;
                $referenceId = $firstTick + 1;
                if ($referenceId < 10) {
                    $id_no = '000' . $referenceId;
                } elseif ($referenceId < 100) {
                    $id_no = '00' . $referenceId;
                } elseif ($referenceId < 1000) {
                    $id_no = '0' . $referenceId;
                }
            } else {
                $ticket = Ticket::orderBy('id', 'DESC')->first()->id;
                $referenceId = $ticket + 1;
                if ($referenceId < 10) {
                    $id_no = '000' . $referenceId;
                } elseif ($referenceId < 100) {
                    $id_no = '00' . $referenceId;
                } elseif ($referenceId < 1000) {
                    $id_no = '0' . $referenceId;
                }
            } // end else 

            $final_ref_id = "TID" . $id_no;

            $ticket = new Ticket();
            $ticket->ticket_ref = $final_ref_id;
            $ticket->user_id = Auth::user()->id;
            $ticket->title = $request->title;
            $ticket->description = $request->description;
            $ticket->status = "Open";
            $ticket->category_id = $request->category_id;
            $ticket->priority = $request->priority;
            $ticket->address = $request->address;
            $ticket->rsp_id = $request->rsp_id;
            $ticket->modem_id = $request->modem_id;
            $ticket->router_id = $request->router_id;

            $data = array(
                'ticket_user' => Auth::user()->name,
                'ticket_title' => $request->title,
                'ticket_desc' => $request->description,
            );

            Mail::to('info@allo.com')->send(new NewTicketMail($data));

            $ticket->save();
        });

        $notification = array(
            'message' => 'Ticket Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('ticket.view')->with($notification);
    }

    public function TicketEdit($id)
    {
        $data['editData'] = Ticket::find($id);

        $data['userData'] = User::all();
        $data['techData'] = User::role('technician')->get();

        $data['categoryData'] = TicketCategory::orderBy('name', 'asc')->get();
        $data['rspData'] = RetailServiceProvider::orderBy('name', 'asc')->get();
        $data['modemData'] = Modem::orderBy('name', 'asc')->get();
        $data['routerData'] = Router::orderBy('name', 'asc')->get();

        return view('backend.ticket.edit_ticket', $data);
    }

    public function TicketStoreUpdate(Request $request, $id){

        $data = Ticket::find($id);

        $data->title = $request->title;
        $data->category_id = $request->category_id;
        $data->description = $request->description;
        $data->status = $request->status;
        $data->priority = $request->priority;
        $data->address = $request->address;
        $data->rsp_id = $request->rsp_id;
        $data->modem_id = $request->modem_id;
        $data->router_id = $request->router_id;
        $data->technician_id = $request->technician_id;
        
        $data->save();

        $notification = array(
            'message' => 'Ticket Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('ticket.view')->with($notification);

    }

    public function TicketDelete($id){

        $ticket = Ticket::find($id);
        $ticket->delete();

        $notification = array(
            'message' => 'Ticket Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('ticket.view')->with($notification);

    }

    public function TicketViewDetail($id, Ticket $ticket)
    {
        $data['editData'] = Ticket::find($id);

        $data['userData'] = User::all();
        $data['techData'] = User::role('technician')->get();

        $data['categoryData'] = TicketCategory::orderBy('name', 'asc')->get();
        $data['rspData'] = RetailServiceProvider::orderBy('name', 'asc')->get();
        $data['modemData'] = Modem::orderBy('name', 'asc')->get();
        $data['routerData'] = Router::orderBy('name', 'asc')->get();

        $data['comments'] = Comment::where('ticket_id', $id)->orderBy('created_at','DESC')->get();

        return view('backend.ticket.view_ticket_detail', $data);
    }

    public function TicketDetailsPDF($id)
    {
        $data['editData'] = Ticket::find($id);

        $pdf = PDF::loadView('backend.ticket.ticket_detail_pdf', $data);
		return $pdf->stream('document.pdf');
    }
    
    public function TicketClose(Request $request, $id)
    {

        $validatedData = $request->validate([
            'remark' => 'required',
        ]);

        $data = Ticket::find($id);

        $data->remark = $request->remark;
        $data->status = "Closed";
        $data->date_closed = Carbon::now();
        
        $data->save();

        $notification = array(
            'message' => 'Ticket Closed Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('ticket.view')->with($notification);
    }
}
