<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index(Request $request){
//        $categories = Category::orderBy("id", "desc")->paginate(5);

        $categories = Category::query()
            ->sort($request)
            ->search($request)
            ->display($request)
            ->orderBy("id", "desc")
            ->paginate(10);
        return view("categories.index", compact('categories'));
    }

    public function create(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'category_name' => 'required',
            'category_slug' => 'required'
        ]);

        $categoryName = $request->get("category_name");
        $categorySlug = $request->get("category_slug");
        $display = $request->get("display");
        $meta_title = $request->get("category_meta_title");
        $meta_des = $request->get("category_meta_description");

        Category::create(['category_name' => $categoryName, "category_slug" => $categorySlug, "meta_title" => $meta_title, "meta_description" => $meta_des, "display" => $display]);
        return redirect()->back()->with(["message" => "Danh mục đã được thêm!"]);
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        // Delete all songs in Category
        $songController = new SongController();
        $songs = Category::find($id)->song()->get();
        foreach ($songs as $song){
            $songController->destroy($song->id);
        }

        Category::where("id", $id)->delete();
        return response()->json(["message" => "Đã xóa thành công."]);
    }

    public function edit($id, Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'category_name' => 'required',
            'category_slug' => 'required'
        ]);
        $categoryName = $request->get("category_name");
        $categorySlug = $request->get("category_slug");
        $meta_title = $request->get("category_meta_title");
        $meta_des = $request->get("category_meta_description");
        $display = $request->get("display");
        Category::where("id", $id)->update(['category_name' => $categoryName, "category_slug" => $categorySlug, "meta_title" => $meta_title, "meta_description" => $meta_des, "display" => $display]);
        return redirect()->back()->with(["message" => "Danh mục đã được cập nhật!"]);
    }
}
