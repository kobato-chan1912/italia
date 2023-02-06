<?php

namespace App\Http\Controllers;

use App\Models\Song;
use File;
use Illuminate\Http\Request;

class SongController extends Controller
{
    //
    public function index(Request $request)
    {
        $songs = Song::query()
            ->sort($request)
            ->search($request)
            ->display($request)
            ->category($request)
            ->with("category")
            ->paginate(10);
        return view("songs.index", compact("songs"));
    }
    public function indexCreate()
    {
        return view("songs.form");
    }

    public function create(Request $request)
    {
        // Text
        $title = $request->get("title");
        $size = $request->get("size");
        $slug = $request->get("slug");
        $category = $request->get("category");
        $metaTitle = $request->get("meta_title");
        $metaDescription = $request->get("meta_description");
        $display = $request->get("display");

        // Music


        if(!$request->hasFile('music')) {
            $musicPath = null;
        } else {
            $music = $request->file('music');
            $music->move('uploads/songs', $music->getClientOriginalName());
            $musicPath = "/uploads/songs/". $music->getClientOriginalName();
        }

        Song::create([
            "title" => $title,
            "size" => $size,
            "slug" => $slug,
            "category_id" => $category,
            "url" => $musicPath,
            "meta_title" => $metaTitle,
            "meta_description" => $metaDescription,
            "display" => $display
        ]);
        return redirect()->route("songsIndex")->with(["message" => "Nhạc đã được cập nhật!"]);;
    }
    public function destroy($id){
        $fileName = Song::find($id)->url;
        $filePath = public_path($fileName);
        File::delete($filePath);
        Song::where("id", $id)->delete();
        return response()->json(["message" => "Đã xóa thành công."]);
    }

    public function indexEdit($id){
        $song = Song::find($id);
        if ($song){
            return view("songs.form", compact('song'));
        } else {
            echo "404";
        }
    }

    public function edit($id, Request $request){
        // Text

        $title = $request->get("title");
        $size = $request->get("size");
        $slug = $request->get("slug");
        $category = $request->get("category");
        $metaTitle = $request->get("meta_title");
        $metaDescription = $request->get("meta_description");
        $display = $request->get("display");

        // Image
        $currentSong =  Song::find($id)->url;
        $songUpdate = $request->get("hidden_url");
        if ($songUpdate == null){
            // Remove Image
            $songPath = null;
        }
        elseif ($songUpdate == $currentSong){
            // No update
            $songPath = $currentSong;
        }
        else {
            // Update new image //
            $music = $request->file('music');
            $music->move('uploads/songs', $music->getClientOriginalName());
            $songPath = "/uploads/songs/". $music->getClientOriginalName();
        }

        Song::where("id", $id)->update([
            "title" => $title,
            "size" => $size,
            "slug" => $slug,
            "category_id" => $category,
            "url" => $songPath,
            "meta_title" => $metaTitle,
            "meta_description" => $metaDescription,
            "display" => $display
        ]);
        return redirect($request->get("redirect"))->with(["message" => "Nhạc đã được cập nhật!"]);
    }
}
