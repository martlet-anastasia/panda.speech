<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $username = Auth::user()->firstName . ' ' . Auth::user()->lastName;
        $avatar = Auth::user()->avatar_link;
        return view('app.home', [
            'username' => $username,
            'avatar' => $avatar
        ]);
    }
}
