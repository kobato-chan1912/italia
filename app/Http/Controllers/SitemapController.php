<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    //
    public function index()
    {
        $songs = Song::all();
        $lastTime = Song::latest()->first()->created_at;
        return response()->view('webpage.sitemap.index', compact('songs', 'lastTime'))
            ->header('Content-Type', 'text/xml');

    }
}
