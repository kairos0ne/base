<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use App\Brief;
use App\Feature;


class FeatureController extends Controller
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
        return $features;     
    }

    /**
     * Display single Feature
     * @param $id
     * @return Response
     */
    public function show($id)
    {
        // Get a single brief
        $feature = Feature::findOrFail(1)->where('id', $id)->first();
        return $feature;
    }

    /**
     * Store a feature in the database
     * include validation on for required fields
     * @param  Illuminate\Http\Request  $request
     * @return Response
     */
    public  function store(Request $request)
    {
        $this->validate($request, ['feature' => 'required', 'brief_id' => 'required']);
        Feature::create([
            'feature' => $request->input('feature'),
            'brief_id' => $request->input('brief_id'),

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
        $this->validate($request, ['feature' => 'required',  'brief_id' => 'required']);
        // Do the update 
        $feature = Feature::where('id', $id)
                        ->update(['feature' => $request->input('feature'), 
                                    'brief_id' => $request->input('brief_id')]);
    }

     /**
     * Get the features for a given brief object through it's ID 
     *
     * @return \Illuminate\Http\Response
     */
    public function getFeaturesForBrief($id)
    {
        
        $brief = Brief::findOrFail(1)->where('id', $id)->first();
        $features = $brief->features;
        return $features;

    }
}