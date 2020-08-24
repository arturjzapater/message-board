<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::post('/messages', 'MessageController@submitMessage');
Route::get('/messages/new', 'MessageController@newMessage');
Route::get('/messages/{id}', 'MessageController@getOne');
Route::delete('/messages/{id}', 'MessageController@deleteOne');

Route::post('/messages/{msg}/comments', 'CommentController@submitComment');
Route::delete('/messages/{msg}/comments/{id}', 'CommentController@deleteOne');

Auth::routes();
