<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Access;

class AccessController extends Controller
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
        // Add if required
    }
    public function show($id)
    {
       //Add if required
    }
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'email' => 'email']);
        Access::create(
            [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
            ]
        );
    }
}