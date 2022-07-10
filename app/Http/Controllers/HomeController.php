<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
        $user = User::findOrFail(Auth::id());
        $totalFiles = $user->files;
        $translates = $totalFiles->where('translated', 1);
        $latestFiles = $translates->take(-6)->sortDesc();

        return view('home', [
            'total_files' => $totalFiles->count(),
            'translates_count' => $translates->count(),
            'user_name' => $user->firstName . ' ' . $user->lastName,
            'avatar' => $user->avatar_link,
            'email' => $user->email,
            'latest_translates' => $latestFiles
        ]);
    }
}
