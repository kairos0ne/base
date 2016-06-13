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
    Route::resource('/', 'WelcomeController', array('except' => array('update', 'destroy')));
    Route::resource('portfolio', 'PortfolioController');
    Route::resource('app', 'ApplicationController');
    Route::resource('documentation', 'DocumentationController');

/*
|--------------------------------------------------------------------------
| API routes for ajax post/requests
|--------------------------------------------------------------------------
|
| This route group contains all the API routes for ajax/ recource requests
| It is within the middleware group for defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
*/
/**  All Portfolio related api routes **/ 
    Route::get('api/portfolios', function (){
        // Get the portfolio data
        $portfolios = Portfolio::latest()->get();
        return $portfolios;
    });
    Route::get('api/portfolios/{id}', function (){
        // Get single protfolio by id 
        $portfolio = Portfolio::findOrFail($id);
        return $portfolio;
    });
    Route::post('api/post/portfolios', [
        // Persist the data with the PortfolioControllers store method - review 
        'as' => 'api.portfolio.store', 'uses' => 'PortfolioController@store'
    ]);


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

/**  All Project related api routes **/ 
    Route::post('api/post/projects', [
        'as' => 'api.briefs.store', 'uses' => 'ProjectController@store'
    ]);
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
| For requesting access to the site prior to launchin it. 
|
*/
    Route::post('api/post/access', function(Request $request){
        $this->validate($request, ['name' => 'required', 'email' => 'email']);
        Access::create(
            [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
            ]
        );
    });
});