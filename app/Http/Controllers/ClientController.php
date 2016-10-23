<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Client;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
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
        return $clients->toArray();
    }

    /**
     * Display single briefs
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
         // Get a single client that maches the id provided 
        $client = Client::findOrFail(1)->where('id', $id)->first();
        return $client;
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
    }
    /**
     * Update the specified Client.
     *
     * @param  Request  $request
     * @param  string  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        // validate the data 
        $this->validate($request, ['name' => 'required', 'business_area' => 'required', 'user_id' => 'required']);
        $client = Client::where('id', $id)
                        ->update([  'name' => $request->input('name'), 
                                    'business_area' => $request->input('business_area'),
                                    'user_id'=> $request->input('user_id')]);
    }
    /**
     * Get total client count for a user 
     *  
     * @return \Illuminate\Http\Response
     */
    public function clientcount ()
    {
        $clients = Client::latest()->get();
        $clientcount = count($clients);
        $clientnew = $clientcount + 1; 
        return $clientnew;
    }
}