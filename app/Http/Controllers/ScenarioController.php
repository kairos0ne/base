<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use App\Scenario;
use App\Feature;


class ScenarioController extends Controller
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
        $features = array();
        $scenarios = arra();
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
        foreach ($briefs as $brief) {
           	if (null !== $brief->features) {
               	$featureitems = $brief->features;
           	}
       		foreach ($featureitems as $featureitem) {
               	array_push($features, $featureitem);
               	}
           }
       foreach ($features as $feature) {
       		if (null !== $feature->scenarios) {
              	$scenarioitems = $feature->scenarios;
            }
       		foreach ($scenarioitems as $scenarioitem) {
              	array_push($scenarios, $scenarioitem);
            }
		}       
        return $scenarios;     
    }

    /**
     * Display single Scenario
     * @param $id
     * @return Response
     */
    public function show($id)
    {
        // Get a single brief
        $scenario = Scenario::findOrFail(1)->where('id', $id)->first();
        return $scenario;
    }

    /**
     * Store a scenario in the database
     * include validation on for required fields
     * @param  Illuminate\Http\Request  $request
     * @return Response
     */
    public  function store(Request $request)
    {
        $this->validate($request, ['user_context' => 'required', 'feature_id' => 'required']);
        Scenario::create([
            'user_context' => $request->input('user_context'),
            'feature_id' => $request->input('feature_id'),

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
        $this->validate($request, ['user_context' => 'required',  'feature_id' => 'required']);
        // Do the update 
        $scenario = Scenario::where('id', $id)
                        ->update(['user_context' => $request->input('user_context'), 
                                    'feature_id' => $request->input('feature_id')]);
    }

     /**
     * Get the scenarios for a given feature object through it's ID 
     * @return \Illuminate\Http\Response
     */
    public function getScenariosForFeature($id)
    {
        
        $feature = Feature::findOrFail(1)->where('id', $id)->first();
        $scenarios = $feature->scenarios;
        return $scenarios;

    }
}