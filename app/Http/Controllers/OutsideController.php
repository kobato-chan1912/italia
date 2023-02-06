<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OutsideController extends Controller
{
    //
    public function indexPost(){
        $content = file_get_contents(storage_path("app/public/post_outside.txt"));
        return view("outside.post", compact('content'));
    }

    public function editPost(Request $request){
        $content = $request->get("editor");
        file_put_contents(storage_path("app/public/post_outside.txt"), $content);
        return redirect()->back()->with(["message" => "Cập nhật bài viết thành công!"]);

    }

    public function previewPost(){
        $content = file_get_contents(storage_path("app/public/post_outside.txt"));
        return view("outside.post_preview", compact('content'));

    }

}
