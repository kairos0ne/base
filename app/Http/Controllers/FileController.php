<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Portfolio;
use App\User;
use App\Project;
use App\File;
use App\Client;
use App\Brief;

class FileController extends Controller
{
    public function index(){
     $uploads = File::latest()->get();
        return $uploads;
    }

    /**
     * @param $id
     * @return mixed
     * 
     */
    public function show($id){
        $upload =  File::FindOrFail($id);
        return $upload;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $fileuploads)
    {
        $this->validate($request, [
            'file' => 'required', 
            'portfolio_id' => 'required'
        ]);

        $file = $request->file('file');

        if ($file->isValid()) {
            $name = $file->getClientOriginalName();
            $key = '/uploads/' . $name;
            Storage::disk('s3')->put($key, file_get_contents($file));

            $portfoliofile = new File;

            $portfoliofile->name = $name;
            $portfoliofile->path = $key;
            $portfoliofile->type = $file->getClientMimeType();
            $portfoliofile->client_id = $request->input('client_id');
            $portfoliofile->project_id = $request->input('project_id');
            $portfoliofile->brief_id = $request->input('brief_id');
            $portfoliofile->user_id = $request->input('user_id');
            $portfoliofile->portfolio_id = $request->input('portfolio_id');
            $portfoliofile->save();
        }
        
    }
}