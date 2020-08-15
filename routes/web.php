<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

Route::get('/new-message', function() {
    return view('new-message');
});

Route::post('/submit', function(Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'body' => 'required',
        'author' => 'required|max:255',
    ]);

    $msg = new Message($data);
    $msg->save();

    return redirect('/');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
