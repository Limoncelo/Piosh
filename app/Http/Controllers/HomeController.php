<?php

namespace App\Http\Controllers;

use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timeline = DB::table('articles')->where('category_id', 2)->get();
        $actus = DB::table('articles')->where('category_id', 3)->get();

        return view('home', ['timeline' => $timeline, 'actus' => $actus]);
    }
}
