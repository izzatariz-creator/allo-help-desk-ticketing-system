<?php

namespace App\Http\Controllers\Backend\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required',
        ]);

        $data = new Comment();
        $data->user_id = auth()->user()->id;
        $data->body = $request->body;
        $data->ticket_id = $request->ticket_id;
        $data->save();

        $notification = array(
            'message' => 'New Comment Added Successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }
}
