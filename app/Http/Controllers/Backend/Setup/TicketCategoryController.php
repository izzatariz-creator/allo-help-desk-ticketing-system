<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TicketCategory;

class TicketCategoryController extends Controller
{
    public function TicketCategoryView()
    {
        $data['allData'] = TicketCategory::all();
        return view('backend.setup.ticket_category.view_ticket_category', $data);
    }

    public function TicketCategoryAdd()
    {
        return view('backend.setup.ticket_category.add_ticket_category');
    }

    public function TicketCategoryStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:ticket_categories,name',
        ]);

        $data = new TicketCategory();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'New Ticket Category Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('ticket.category.view')->with($notification);
    }

    public function TicketCategoryEdit($id)
    {
        $editData = TicketCategory::find($id);
        return view('backend.setup.ticket_category.edit_ticket_category', compact('editData'));
    }

    public function TicketCategoryStoreUpdate(Request $request, $id)
    {
        $data = TicketCategory::find($id);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Ticket Category Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('ticket.category.view')->with($notification);
    }

    public function TicketCategoryDelete($id)
    {
        $user = TicketCategory::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Ticket Category Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('ticket.category.view')->with($notification);
    }
}
