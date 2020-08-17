<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Message;

class HomeController extends Controller
{
    /**
     * Show the application home page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        return view('home', [
            'messages' =>  Message::orderBy('created_at', 'desc')->get(),
        ]);
    }
}
