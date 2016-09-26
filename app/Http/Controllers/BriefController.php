<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Brief;
use Illuminate\Http\Request;


class BriefController extends Controller
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
        $briefs = Brief::latest()->get();
        return $briefs;
    }

    /**
     * Display single briefs
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $brief = Brief::findOrFail($id)->get();
        return $brief;
    }

    /**
     * Store a brief in the database
     * include validation on for required fields
     * @param  Illuminate\Http\Request  $request
     * @return Response
     */
    public  function store(Request $request)
    {
        $this->validate($request, ['overview' => 'required', 'objective' => 'required', 'project_id' => 'required']);
        Brief::create([
            'overview' => $request->input('overview'),
            'objective' => $request->input('objective'),
            'project_id' => $request->input('project_id')
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
        $this->validate($request, ['overview' => 'required', 'objective' => 'required', 'project_id' => 'required']);
        // Do the update 
        $brief = Brief::where('id', $id)
                        ->update(['overview' => $request->input('overview'), 
                                    'objective' => $request->input('objective'),
                                    'project_id' => $request->input('project_id')]);
    }
}