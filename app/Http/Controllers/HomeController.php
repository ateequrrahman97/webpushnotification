<?php

namespace App\Http\Controllers;

use App\Traits\PushNotification;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use PushNotification;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $this->sendWebPushNotification("Hello Ateeq!");
        
        return view('welcome');
        return view('home');
    }
}
