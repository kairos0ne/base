<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Brief;
use Illuminate\Http\Request;
use Auth;
use App\Project;
use App\Client;


class BriefController extends Controller
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
        // Lopp through clients and get the projects for each client and if the value is not null, return the projects
        $projects = array();
        $briefs = array();
        foreach ($clients as $client) {
            if (null !== $client->projects) {
                $items = $client->projects;
            }
            foreach ($items as $item) {
                array_push($projects, $item);   
            }
        }
        foreach ($projects as $project) {
            if (null !== $project->briefs) {
                $briefitems = $project->briefs;
            }
            foreach ($briefitems as $briefitem){
                array_push($briefs, $briefitem);
            }
        }       
        return $briefs;     
    }

    /**
     * Display single brief
     * @param $id
     * @return Response
     */
    public function show($id)
    {
        // Get a single brief
        $brief = Brief::findOrFail(1)->where('id', $id)->first();
        return $brief;
    }

    /**
     * Store a brief in the database
     * include validation on for required fields
     * @param  Illuminate\Http\Request  $request
     * @return Response
     */
    public  function store(Request $request)
    {
        $this->validate($request, ['overview' => 'required', 'objective' => 'required', 'project_id' => 'required']);
        Brief::create([
            'overview' => $request->input('overview'),
            'objective' => $request->input('objective'),
            'project_id' => $request->input('project_id')
        ]);
    }

    /**
     * Update the specified Brief.
     *
     * @param  Request  $request
     * @param  string  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        // validate required data 
        $this->validate($request, ['overview' => 'required', 'objective' => 'required', 'project_id' => 'required']);
        // Do the update 
        $brief = Brief::where('id', $id)
                        ->update(['overview' => $request->input('overview'), 
                                    'objective' => $request->input('objective'),
                                    'project_id' => $request->input('project_id')]);
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getBriefsForProject($id)
    {
        
        $project = Project::findOrFail(1)->where('id', $id)->first();
        $briefs = $project->briefs;
        return $briefs;

    }
}