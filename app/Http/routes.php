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
    // Update a single Client 
    Route::put('api/put/client/{id}', [
        'as' => 'api.client.update', 'uses' => 'ClientController@update'
    ]); 
    // Get all clients associated to the logged in user
    Route::get('api/get/clients', [
        'as' => 'api.get.clients', 'uses' => 'ClientController@index'
    ]);
    Route::get('api/get/client/{id}', function($id){
        // Get the users project where the 
        $client = Client::findOrFail(1)->where('id', $id)->first();
        return $client;
    });
    // Get the parent client for the parsed brief using the client_id attribute 
    Route::get('api/get/clients/{id}', function($id){
        // Get the users client where the ID is equal to the parsed ID
        $client = Client::findOrFail(1)->where('id', $id)->first();
        return $client;
    });
/**  All Project related api routes **/
    // Get all projects for the signed in user
    Route::get('api/get/projects', [
        'as' => 'projects', 'uses' => 'ProjectController@index'
    ]);
    // Get a single project
    Route::get('api/get/project/{id}', [
        'as' => 'project', 'uses' => 'ProjectController@show'
    ]);
    // Post to a new Project to the DB
    Route::post('api/post/projects', [
        'as' => 'add-project', 'uses' => 'ProjectController@store'
    ]);
    // Update a single Project 
    Route::put('api/put/project/{id}', [
        'as' => 'edit-project', 'uses' => 'ProjectController@update'
    ]);
    // Get all projects for the parsed client  
    Route::get('api/get/projects/{id}', [
        'as' => 'client-projects', 'uses' => 'ProjectController@getProjectsForClient'
    ]);

/**  All Brief related api routes **/ 
    // Get all briefs for the signed in user 
    Route::get('api/get/briefs', [
        'as' => 'api.get.briefs', 'uses' => 'BriefController@index'
    ]);
    // Store a brief
    Route::post('api/post/briefs', [
        'as' => 'api.briefs.store', 'uses' => 'BriefController@store'
    ]);
    // Update a single brief 
    Route::put('api/put/brief/{id}', [
        'as' => 'api.brief.update', 'uses' => 'BriefController@update'
    ]);
    
    Route::get('api/get/brief/{id}', [
        'as' => 'project-briefs', 'uses' => 'BriefController@show'
    ]);
    Route::get('api/get/briefs/{id}', [
        'as' => 'projects.briefs', 'uses' => 'BriefController@getBriefsForProject'
    ]);
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
});