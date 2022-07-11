<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = DB::table('users')->count();
        $chauffeurs = DB::table('users')->where('role_name','Chauffeur')->count();
        $societes = DB::table('societes')->count();
        $associationlist = DB::table('societes')->get();
        $user_activity_logs = DB::table('user_activity_logs')->count();
        $activity_logs = DB::table('activity_logs')->count();
        return view('home',compact('chauffeurs','societes','users','user_activity_logs','activity_logs','associationlist'));
    }
}
