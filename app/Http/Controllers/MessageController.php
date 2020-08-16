<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use \App\Message;

class MessageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('getOne');
    }

    public function getOne($id)
    {
        $message = Message::find($id);

        return view('message', [
            'message' => $message,
            'comments' => $message->comments,
        ]);
    }

    public function newMessage()
    {
        return view('new-message');
    }

    public function submitMessage(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);
    
        $msg = new Message($data);
        $msg->user_id = Auth::user()->id;
        $msg->save();
    
        return redirect('/');
    }
}