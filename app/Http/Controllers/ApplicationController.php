<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Brief;
use App\Client;
use App\Project;
use App\User;
use DB;
use Auth;

class ApplicationController extends Controller
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
        // Get the current signed in user 
        $user = Auth::user();
        // Get the users clients 
        $clients = $user->clients;  
        // Count the clients and and assign that to a variable 
        $clientcount = count($clients);
        // If clients exist, return the dashboard with clients and user data 
        if ($clientcount > 0) {
            return view('dashboard', compact('user','clients'));
        }
        // If no clients exist, return the 'getting started' page
        elseif ($clientcount < 1) {
           return view('application', compact('user')); 
        } 
    }
     /**
     * Store a client in the database
     * include validation on for required fields
     * @param  Illuminate\Http\Request  $request
     * @return Response
     */
    public  function store(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'business_area' => 'required', 'user_id' => 'required']);
        Client::create([
            'name' => $request->input('name'),
            'business_area' => $request->input('business_area'),
            'user_id' => $request->input('user_id'),
        ]);
        return view('project.create');
    }
    
}