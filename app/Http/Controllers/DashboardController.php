<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; // use the User model // created by auth

class DashboardController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dohvati user_id iz auth-a
        $user_id = auth() -> user() ->id;
        
        // dohvati suera na osnovu id-a
        $user = User::find($user_id);
        
        // sad pozivamo view : dashboard
        // i proslijedjujemo mu sve listinge za dohvaceni user_id
        // ovo je ta master-detail magija :: $user -> listings
        return view('dashboard')->with('listings', $user -> listings);
    }
}
