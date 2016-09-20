<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Client;
use App\User;
use App\Project;
use App\Brief;


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
*/

Route::group(['middleware' => 'web'], function () {

    Route::auth();
    Route::resource('home', 'HomeController', array('except' => array('create', 'store', 'update', 'destroy')));
    Route::resource('/', 'HomeController', array('except' => array('create', 'store', 'update', 'destroy')));



/*
|--------------------------------------------------------------------------
| REST API Routes for Clients, Projects, Briefs
|--------------------------------------------------------------------------
|
| This route group contains all the API routes for ajax/ recource requests
| It is within the middleware group for defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
*/

/**
 * Get user
 */

    Route::get('api/get/user', function(){
        $user = Auth::user();
        return $user;
    });

/**  All Client related api routes **/ 
    Route::post('api/post/clients', [
        'as' => 'api.clients.store', 'uses' => 'ClientController@store'
    ]);
    Route::get('api/get/clients', function (){
        // Get the current signed in user
        $user = Auth::user();
        // Get the users clients
        $clients = $user->clients;
        return $clients->toArray();
    });
    // Get the parent client for the parsed brief using the client_id attribute 
    Route::get('api/get/clients/{id}', function($id){
        // Get the users project where the 
        $client = Client::findOrFail(1)->where('id', $id)->first();
        return $client;
    });
/**  All Project related api routes **/
    // Post to a new Project to the DB
    Route::post('api/post/projects', [
        'as' => 'api.projects.store', 'uses' => 'ProjectController@store'
    ]);
    // Get all projects for the signed in user
    Route::get('api/get/projects', function (){
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
    });
    // Get the parent project for the parsed brief using the project_id attribute 
    Route::get('api/get/projects/{id}', function($id){
        // Get the users project where the 
        $project = Project::findOrFail(1)->where('id', $id)->first();
        return $project;
    });

/**  All Brief related api routes **/ 
    Route::post('api/post/briefs', [
        'as' => 'api.briefs.store', 'uses' => 'BriefController@store'
    ]);
    Route::get('api/get/briefs', function(){
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
    });
/*
|--------------------------------------------------------------------------
| API routes count items
|--------------------------------------------------------------------------
| These routes contain the api values for item counts for persisting to the DB. 
|
*/
    Route::get('api/get/clientcount', function(){
        $clients = Client::latest()->get();
        $clientcount = count($clients);
        return $clientcount;
    });
    Route::get('api/get/projectcount', function(){
        $projects = Project::latest()->get();
        $projectcount = count($projects);
        return $projectcount;
    });
    Route::get('api/get/briefcount', function(){
        $briefs = Brief::latest()->get();
        $briefcount = count($briefs);
        return $briefcount;
    });
    /*
|--------------------------------------------------------------------------
| API routes request access - to be removed
|--------------------------------------------------------------------------
| For requesting access to the site prior to launching it. 
|
*/
    Route::post('api/post/access', [
        // Persist the data with the PortfolioControllers store method - review 
        'as' => 'api.access.store', 'uses' => 'AccessController@store'
    ]);
});