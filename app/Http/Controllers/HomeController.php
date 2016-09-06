<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Access;
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
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            // Get the current signed in user
            $user = Auth::user();
            // Get the users clients
            $clients = $user->clients;
            // Count the clients and and assign that to a variable
            $clientcount = count($clients);
            // If clients exist, return the dashboard with clients and user data
            if ($clientcount > 0) {
                return view('home', compact('user','clients'));
            }
            // If no clients exist, return the 'getting started' page
            elseif ($clientcount < 1) {
                return view('home', compact('user'));
            }
        }
    }

}
