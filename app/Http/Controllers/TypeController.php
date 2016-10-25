<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TypeController extends Controller
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
    public function index ()
    {
    	 // Get the current signed in user
        $user = Auth::user();
        // Get the users clients
        $clients = $user->clients;
        $projects = array();
        foreach ($clients as $client) {
            $items = $client->projects;
            foreach ($items as $item) {
                array_push($projects, $item);
            }
        }
        return $projects;
    }
}
