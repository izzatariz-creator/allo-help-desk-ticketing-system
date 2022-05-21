<?php

namespace App\Http\Controllers\Backend\Comment;

use App\Http\Controllers\Controller;
use App\Mail\NewCommentMail;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

        if(Auth::user()->hasAnyRole(['technician', 'admin'])){
            $commentinguser = $data['ticket']['user_id'];
            $useremail = User::select('email')->where('id',"=", $commentinguser)->first();
        }
        else{
            $useremail = 'thd@allo.com';
        }
        
        $commentdata = array(
            'comment_user' => Auth::user()->name,
            'comment_body' => $request->body,
        );

        Mail::send(new NewCommentMail($commentdata, $useremail));

        $notification = array(
            'message' => 'New Comment Added Successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }
}
