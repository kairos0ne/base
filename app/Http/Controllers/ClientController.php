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
        // Get all clients to check ID
        $allclients = Client::latest()->get();
        // Get the users clients
        $clients = Client::latest()->where('user_id', $user->id )->get();
        // Count the clients and and assign that to a variable
        $clientcount = count($clients);
        // Count all clients
        $allclientcount = count($allclients);
        //Count all clients to assign the new send the items id to vm
        return view('client.index', compact('clients', 'user', 'clientcount', 'allclientcount'));
    }

    /**
     * Display single briefs
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $client = Client::findOrFail($id)->get();
        return view('client.show', compact('client'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * store clients 
     */
    public function create ()
    {
        return view('client.create');
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