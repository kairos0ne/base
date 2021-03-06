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
     * Show a single project 
     * @param string $id
     * @return \Illuminate\Http\Response
     */
    public function show ($id)
    {
        $project = Project::findOrFail(1)->where('id', $id)->first();
        return $project;
    }
    /**
     * Store a Project in the database
     * include validation on for required fields
     * @param  Illuminate\Http\Request  $request
     * @return Response
     */
    public  function store(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'description' => 'required', 'client_id' => 'required', 'status' => 'required', 'status_value' => 'required', 'type' => 'required']);
        Project::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'client_id' => $request->input('client_id'),
            'status' => $request->input('status'),
            'status_value' => $request->input('status_value'),
            'type'=> $request->input('type')
        ]);

    }
    /**
     * Update the specified Project.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['name' => 'required', 'description' => 'required', 'client_id' => 'required', 'status' => 'required', 'status_value' => 'required', 'type' => 'required']);
        $project = Project::where('id', $id)->update(['name' => $request->input('name'),
                                                        'description' => $request->input('description'),
                                                        'client_id' => $request->input('client_id'), 
                                                        'status' => $request->input('status'), 
                                                        'status_value' => $request->input('status_value'),
                                                        'type' => $request->input('type')
        ]);
    }
    /**
     * Get the total number of clients to assign 
     * @return \Illuminate\Http\Response
     */
    public function countProjects()
    {
        $projects = Project::latest()->get();
        $projectcount = count($projects);
        return $projectcount;
    }
    /**
     * Show the application dashboard.
     * @param  $id clients id
     * @return string $projects \Illuminate\Http\Response
     */
    public function getProjectsForClient($id)
    { 
        $client = Client::findOrFail(1)->where('id', $id)->first();
        $projects = $client->projects;
        return $projects;
    }
    
    /**
     * Get the project count and incriment for new projects
     * @return int $projectnew \Illuminate\Http\Response
     */
    public function projectcount ()
    {
        $projects = Project::latest()->get();
        $projectcount = count($projects);
        $projectnew = $projectcount + 1;
        return $projectnew;
    }

    /**
     * [getProjectsType description]
     * @param  int $id id of the project
     * @return string $type \Illuminate\Http\Response
     */
    public function getProjectsType ($id)
    {
        $project = Project::findOrFail(1)->where('id', $id)->first();
        $type = $project->type;
        return $type;
    }

}