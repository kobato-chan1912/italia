<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RandomController extends Controller
{
    //
    public function indexTitle()
    {
        $content = file_get_contents(storage_path("app/public/random_title.txt"));
        return view("random.random", compact('content'));
    }

    public function editTitle(Request $request){
        $titleContent = $request->get("random_title");
        file_put_contents(storage_path("app/public/random_title.txt"), $titleContent);
        return redirect()->back()->with(["message" => "Cập nhật danh sách random thành công!"]);
    }

    public function indexDescription()
    {
        $content = file_get_contents(storage_path("app/public/random_description.txt"));
        return view("random.random", compact('content'));
    }
    public function editDescription(Request $request): \Illuminate\Http\RedirectResponse
    {
        $descriptionContent = $request->get("random_title");
        file_put_contents(storage_path("app/public/random_description.txt"), $descriptionContent);
        return redirect()->back()->with(["message" => "Cập nhật danh sách random thành công!"]);
    }


    public function indexCategories()
    {
        $content = file_get_contents(storage_path("app/public/random_categories.txt"));
        return view("random.random", compact('content'));
    }

    public function editCategories(Request $request): \Illuminate\Http\RedirectResponse
    {
        $titleContent = $request->get("random_title");
        file_put_contents(storage_path("app/public/random_categories.txt"), $titleContent);
        return redirect()->back()->with(["message" => "Cập nhật danh sách random thành công!"]);
    }
}
