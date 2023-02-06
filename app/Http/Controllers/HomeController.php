<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;
use Carbon\Carbon;
class HomeController extends Controller
{
    //
    public function index(){
        $date = Carbon::now();
        $topSongs = Song::with("category")->orderBy("songs.listeners", "desc")->take(5)->get();
        return view ("home.index", ["date" => $date, "topSongs" => $topSongs]);
    }
}
