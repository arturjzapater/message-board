<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use \App\Comment;
use \App\Message;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $messages = Message::orderBy('created_at', 'desc')->get();

    return view('home', [
        'messages' => $messages,
    ]);
});

Route::get('/messages/{id}', function($id) {
    $message = Message::find($id);

    return view('message', [
        'message' => $message,
        'comments' => $message->comments,
    ]);
});

Route::get('/new-message', function() {
    return view('new-message');
})->middleware('auth');

Route::post('/submit', function(Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'body' => 'required',
    ]);

    $msg = new Message($data);
    $msg->user_id = Auth::user()->id;
    $msg->save();

    return redirect('/');
})->middleware('auth');

Route::post('/submit-comment/{msg}', function(Request $request, $msg) {
    $data = $request->validate([
        'body' => 'required',
    ]);

    $comment = new Comment($data);
    $comment->message_id = $msg;
    $comment->user_id = Auth::user()->id;
    $comment->save();

    return redirect('/messages/' . $msg);
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
