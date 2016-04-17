<?php

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
|
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
    /**  All portfolios related api routes **/
    Route::get('api/briefs/{id}', [
        'as' => 'api.brief.show', 'uses' => 'BriefController@show'
    ]);
    Route::get('api/get/briefs', [
        'as' => 'api.briefs.index', 'uses' => 'BriefController@index'
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
        // Get all clients to check ID
        $allclients = Client::latest()->get();
        // Get the users clients
        $clients = Client::latest()->where('user_id', $user->id )->get();
        // Count the clients and and assign that to a variable
        $clientcount = count($clients);
        // Count all clients
        $allclientcount = count($allclients);
        return $clients;
    });
    Route::get('api/get/projects', function (){
        // Get the current signed in user
        $user = Auth::user();
        // Get the users clients
        $clients = Client::latest()->where('user_id', $user->id )->get();
        // Get the projects associated with the user clients
        foreach ($clients as $client);
        $projects = Project::latest()->where('client_id', $client->id)->get();
        $projectcount = count($projects);
        return $projects;
    });
    Route::get('api/get/briefs', [
        'as' => 'api.briefs.get', 'uses' => 'BriefController@index'
    ]);
    Route::get('api/get/clientcount', [
        'as' => 'api.clientcount.get', 'uses'=> 'ClientController@countClients'
    ]);
    Route::get('api/get/projectcount', [
        'as' => 'api.projectcount.get', 'uses'=> 'ProjectController@countProjects'
    ]);
    Route::get('api/get/briefcount', [
        'as' => 'api.briefcount.get', 'uses'=> 'BriefController@countBriefs'
    ]);
    Route::post('api/post/files', [
        'as' => 'api.files.store', 'uses' => 'FileController@store'
    ]);
    Route::get('api/get/files', [
        'as' => 'api.files.index', 'uses' => 'FileController@store'
    ]);
    Route::post('api/post/access', [
        'as' => 'api.access.store', 'uses' => 'AccessController@store'
    ]);
    Route::get('api/get/access', [
        'as' => 'api.access.index', 'uses' => 'AccessController@index'
    ]);
});