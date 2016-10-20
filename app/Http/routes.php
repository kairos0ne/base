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

/** Get user  **/

    Route::get('api/get/user', function(){
        $user = Auth::user();
        return $user;
    });

/**  All Client related api routes **/ 
    Route::post('api/post/clients', [
        'as' => 'add-client', 'uses' => 'ClientController@store'
    ]);
    // Update a single Client 
    Route::put('api/put/client/{id}', [
        'as' => 'edit-client', 'uses' => 'ClientController@update'
    ]); 
    // Get all clients associated to the logged in user
    Route::get('api/get/clients', [
        'as' => 'clients', 'uses' => 'ClientController@index'
    ]);
    Route::get('api/get/client/{id}', [
        'as' => 'client', 'uses' => 'ClientController@show'
    ]);
    Route::get('api/get/clients/{id}', [
        'as' => 'client', 'uses' => 'ClientController@show'
    ]);
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
        'as' => 'briefs', 'uses' => 'BriefController@index'
    ]);
    // Store a brief
    Route::post('api/post/briefs', [
        'as' => 'add-brief', 'uses' => 'BriefController@store'
    ]);
    // Update a single brief 
    Route::put('api/put/brief/{id}', [
        'as' => 'edit-brief', 'uses' => 'BriefController@update'
    ]);
    
    Route::get('api/get/brief/{id}', [
        'as' => 'brief', 'uses' => 'BriefController@show'
    ]);
    Route::get('api/get/briefs/{id}', [
        'as' => 'project-briefs', 'uses' => 'BriefController@getBriefsForProject'
    ]);

/**  All Feature related api routes **/ 
    // Get all features for the signed in user 
    Route::get('api/get/features', [
        'as' => 'features', 'uses' => 'FeatureController@index'
    ]);
    // Store a feature
    Route::post('api/post/feature', [
        'as' => 'add-feature', 'uses' => 'FeatureController@store'
    ]);
    // Update a single feature 
    Route::put('api/put/feature/{id}', [
        'as' => 'edit-feature', 'uses' => 'FeatureController@update'
    ]);
    
    Route::get('api/get/feature/{id}', [
        'as' => 'feature', 'uses' => 'FeatureController@show'
    ]);
    Route::get('api/get/features/{id}', [
        'as' => 'brief-features', 'uses' => 'FeatureController@getFeaturesForBrief'
    ]);
    /**  All Scenarios related api routes **/ 
    // Get all Scenarios for the signed in user 
    Route::get('api/get/scenarios', [
        'as' => 'scenarios', 'uses' => 'ScenarioController@index'
    ]);
    // Store a scenario
    Route::post('api/post/scenario', [
        'as' => 'add-scenario', 'uses' => 'ScenarioController@store'
    ]);
    // Update a single scenario 
    Route::put('api/put/scenario/{id}', [
        'as' => 'edit-scenario', 'uses' => 'ScenarioController@update'
    ]);
    // Get single Scenario
    Route::get('api/get/scenario/{id}', [
        'as' => 'scenario', 'uses' => 'ScenarioController@show'
    ]);
    // Get all scenarios for a provided feature 
    Route::get('api/get/scenarios/{id}', [
        'as' => 'feature-scenario', 'uses' => 'ScenarioController@getScenariosForFeature'
    ]);

/*
|--------------------------------------------------------------------------
| API routes count items
|--------------------------------------------------------------------------
| These routes contain the api values for item counts for persisting to the DB. 
|
*/
    Route::get('api/get/clientcount', [
        'as' => 'client-count', 'uses' => 'ClientController@clientcount'
    ]);
    Route::get('api/get/projectcount', [
        'as' => 'project-count', 'uses' => 'ProjectController@projectcount'
    ]);
    Route::get('api/get/briefcount', [
        'as' => 'brief-count', 'uses' => 'BriefController@briefcount'
    ]);
});