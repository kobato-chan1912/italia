<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function randomSong(): \Illuminate\Http\JsonResponse
    {
        $arrayTitle = explode("\n", file_get_contents(storage_path("app/public/random_title.txt")));
        $title = $arrayTitle[rand(0, count($arrayTitle) - 1)];
        $arrayDes = explode("\n", file_get_contents(storage_path("app/public/random_description.txt")));
        $description = $arrayDes[rand(0, count($arrayDes) - 1)];
        return response()->json([
            "status" => 200,
            "title" => $title,
            "description" => $description
        ], 200);

    }

    public function randomCategory(): \Illuminate\Http\JsonResponse
    {
        $arrayCate = explode("\n", file_get_contents(storage_path("app/public/random_categories.txt")));
        $desCategory = $arrayCate[rand(0, count($arrayCate) - 1)];
        return response()->json([
            "status" => 200,
            "description" => $desCategory,
        ], 200);
    }

    public function checkSong(Request $request): \Illuminate\Http\JsonResponse
    {
        $song = $request->get("song_name");
        $search_song = Song::where("title", $song)->first();
        if ($search_song == null){
            $status = 0;
        } else {
            $status = 1;
        }

        return response()->json(["status" => 100, "duplicate" => $status], 200);

    }
}
