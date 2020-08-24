<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;

class CommentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function deleteOne($msg, $id)
    {
        if (Comment::find($id)->user_id === Auth::user()->id) {
            Comment::destroy($id);
        }

        return redirect('/messages/' . $msg);
    }

    public function submitComment(Request $request, $msg)
    {
        $data = $request->validate([
            'body' => 'required',
        ]);
    
        $comment = new Comment($data);
        $comment->message_id = $msg;
        $comment->user_id = Auth::user()->id;
        $comment->save();
    
        return redirect('/messages/' . $msg);
    }
}
