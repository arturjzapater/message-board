<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Http\Request;

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

Route::get('/', 'HomeController@index');

Route::get('/messages/new', 'MessageController@newMessage');
Route::get('/messages/{id}', 'MessageController@getOne');

Route::post('/submit', 'MessageController@submitMessage');

Route::post('/submit-comment/{msg}', 'CommentController@submitComment');

Auth::routes();
