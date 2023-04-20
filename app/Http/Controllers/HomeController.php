<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use App\Models\;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $result = DB::table(HOME_PAGE)->where('page_name', 'home')->get();
        $blog = DB::table(BLOGS)->get();
        $creator = DB::table(CREATORS)->get();
        $tournament = DB::table(TOURNAMENT)->whereDate('tournament_date', '>=', date("Y-m-d"))->get();
        return view('front/index')->with(compact('result', 'blog', 'tournament', 'creator'));
    }

   

}
