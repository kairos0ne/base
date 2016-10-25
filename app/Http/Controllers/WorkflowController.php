<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Workflow;
use App\Project;

class WorkflowController extends Controller
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
    public function index ($id)
    {
    	 // Get all workflows
    	$project = Project::findOrFail(1)->where('id', $id)->first();
        $workflows = $project->workflow;
    }

    /**
     * Show a single project 
     * @param string $id
     * @return \Illuminate\Http\Response
     */
    public function show ($id)
    {
        $workflow = Workflow::findOrFail(1)->where('id', $id)->first();
        return $workflow;
    }
    


    /**
     * Store a Project in the database
     * include validation on for required fields
     * @param  Illuminate\Http\Request  $request
     * @return Response
     */
    public  function store(Request, $request)
    {
    	//insert srote method...
    }
    /**
     * Update the specified Project.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request, $request)
    {
        

    }

}