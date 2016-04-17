<?php

namespace App\Http\Controllers;



use App\Brief;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Portfolio;
use App\User;
use App\File;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class PortfolioController extends Controller
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
        $portfolios = Portfolio::latest()->get();
        return view('portfolio.index',compact('portfolios'));
    }
    public function show($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('portfolio.show',compact('portfolio'));
    }
    public function create()
    {
        return view('portfolio.create');
    }


}




