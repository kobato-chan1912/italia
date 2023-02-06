<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HeaderController extends Controller
{
    //
    public function index ()
    {
        $content = file_get_contents(storage_path("app/public/head.txt"));
        return view("header.header", compact('content'));
    }

    public function edit (Request $request)
    {
        $content = $request->get("header");
        file_put_contents(storage_path("app/public/head.txt"), $content);
        return redirect()->back()->with(["message" => "Cập nhật header thành công!"]);

    }
}
