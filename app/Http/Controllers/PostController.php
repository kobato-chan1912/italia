<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class PostController extends Controller
{
    //
    public function index(Request $request){
        $posts = Post::query()
            ->sort($request)
            ->search($request)
            ->display($request)
            ->orderBy("id", "desc")
            ->paginate(10);
        return view("posts.index", compact('posts'));
    }

    public function destroy($id){
        Post::where("id", $id)->delete();
        return response()->json(["message" => "Đã xóa thành công."]);
    }

    public function indexCreate(){
        return view("posts.form");
    }

    public function create(Request $request) // Post Create
    {

        // Text
        $title = $request->get("title");
        $slug = $request->get("slug");
        $content = $request->get("editor");
        $metaTitle = $request->get("meta_title");
        $metaDescription = $request->get("meta_description");
        $display = $request->get("display");
        // Image

        if(!$request->hasFile('thumb_image')) {
            $imagePath = null;
        } else {
            $image = $request->file('thumb_image');
            $image->move('uploads/images', $image->getClientOriginalName());
            $imagePath = "/uploads/images/". $image->getClientOriginalName();
        }

        // Save to DB

        Post::create([
            "title" => $title,
            "slug" => $slug,
            "content" => $content,
            "thumb_url" => $imagePath,
            "meta_title" => $metaTitle,
            "meta_description" => $metaDescription,
            "display" => $display
        ]);
        $redirect = $request->get("redirect");
        return redirect($redirect)->with(["message" => "Bài viết đã được tạo!"]);

    }


    public function indexEdit($id){
        $post = Post::find($id);
        if ($post){
            return view("posts.form", compact('post'));
        } else {
            echo "404";
        }
    }

    public function edit($id, Request $request){
        // Text
        $redirect = $request->get("redirect");
        $title = $request->get("title");
        $slug = $request->get("slug");
        $content = $request->get("editor");
        $metaTitle = $request->get("meta_title");
        $metaDescription = $request->get("meta_description");
        $display = $request->get("display");

        // Image
        $currentImage = Post::find($id)->thumb_url;
        $imageUpdate = $request->get("hidden_url");
        if ($imageUpdate == null){
            // Remove Image
            $imagePath = null;
        }
        elseif ($imageUpdate == $currentImage){
            // No update
            $imagePath = $currentImage;
        }
        else {
            // Update new image //
            $image = $request->file('thumb_image');
            $image->move('uploads/images', $image->getClientOriginalName());
            $imagePath = "/uploads/images/". $image->getClientOriginalName();
        }

        Post::where("id", $id)->update([
            "title" => $title,
            "slug" => $slug,
            "content" => $content,
            "thumb_url" => $imagePath,
            "meta_title" => $metaTitle,
            "meta_description" => $metaDescription,
            "display" => $display
        ]);
        return redirect($redirect)->with(["message" => "Bài viết đã được cập nhật!"]);


    }
}
