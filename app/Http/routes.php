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
|
*/

    /**  All portfolios related api routes **/ 
    Route::get('api/portfolios', function (){
        $portfolios = Portfolio::latest()->get();
        return $portfolios;
    });
    Route::get('api/portfolios/{id}', function (){
        $portfolio = Portfolio::findOrFail($id);
        return $portfolio;
    });
    Route::post('api/post/portfolios', [
        'as' => 'api.portfolio.store', 'uses' => 'PortfolioController@store'
    ]);
    Route::post('api/post/briefs', [
        'as' => 'api.briefs.store', 'uses' => 'BriefController@store'
    ]);
    Route::post('api/post/projects', [
        'as' => 'api.briefs.store', 'uses' => 'ProjectController@store'
    ]);
    Route::post('api/post/clients', [
        'as' => 'api.clients.store', 'uses' => 'ClientController@store'
    ]);
    Route::get('api/get/clients', function (){
        // Get the current signed in user
        $user = Auth::user();
        // Get the users clients
        $clients = Client::where('user_id', $user->id)->get();
        return $clients->toArray();
    });
    Route::get('api/get/projects', function (){
        // Get the current signed in user
        $user = Auth::user();
        // Get the users clients
        $clients = Client::where('user_id', $user->id)->get();
        foreach ($clients as $client){
            // Get the clients projects 
        $projects = Project::where('client_id', $client->id)->get();
        }
        return $projects->toArray();
    });
    Route::get('api/get/briefs', function(){
        // Get the current signed in user
        $user = Auth::user();
        // Get the users clients
        $clients = Client::where('user_id', $user->id)->get();
        foreach ($clients as $client) {
            $projects = Project::where('client_id', $client->id)->get(); 
        }
        // Get the clients projects
        foreach ($projects as $project) {
            $briefs = Brief::where('project_id', $project->id)->get();
        }
        return $briefs->toArray();
    });
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