<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Project;
use App\Client;
use Auth;

class ProjectController extends Controller
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

    /**
     * Store a Project in the database
     * include validation on for required fields
     * @param  Illuminate\Http\Request  $request
     * @return Response
     */
    public  function store(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'description' => 'required', 'client_id' => 'required']);
        Project::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'client_id' => $request->input('client_id')
        ]);

    }
    /**
     * Update the specified Project.
     *
     * @param  Request  $request
     * @param  string  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['name' => 'required', 'description' => 'required', 'client_id' => 'required']);
        $project = Project::where('id', $id)->update([  'name' => $request->input('name'),'description' => $request->input('description'),'client_id' => $request->input('client_id')]);
    }
    /**
     * Get the total number of clients to assign 
     * @return int
     */
    public function countProjects()
    {
        $projects = Project::latest()->get();
        $projectcount = count($projects);
        return $projectcount;
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProjectsForClient($id)
    { 
        $client = Client::findOrFail(1)->where('id', $id)->first();
        $projects = $client->projects;
        return $projects;
    }
}