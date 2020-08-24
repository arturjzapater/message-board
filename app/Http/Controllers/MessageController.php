<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Message;

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

    public function deleteOne($id)
    {
        if (Message::find($id)->user_id === Auth::user()->id) {
            Message::destroy($id);
        }

        return redirect('/');
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
        if (Auth::check()) {
            $data = $request->validate([
                'title' => 'required|max:255',
                'body' => 'required',
            ]);
        
            $msg = new Message($data);
            $msg->user_id = Auth::user()->id;
            $msg->save();
        }
    
        return redirect('/');
    }
}
