<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        return view("users.index", compact('users'));

    }
    public function create(Request $request)
    {
        $email = $request->get("email");
        $password = $request->get("password");
        $name = $request->get("name");
        User::create(["email" => $email, "password" => Hash::make($password), "name" => $name]);
        return redirect()->route("usersIndex")->with(["message" => "Tạo tài khoản thành công."]);
    }

    public function destroy($id){
        User::where("id", $id)->delete();
        return response()->json(["message" => "Đã xóa thành công."]);
    }

    public function update($id, Request $request){
        $email = $request->get("email");
        $name = $request->get("name");
        $password = $request->get("password");
        if ($password == null)
        {
            User::where("id", $id)->update(["email" => $email, "name" => $name]);

        } else {
            User::where("id", $id)->update(["email" => $email, "password" => Hash::make($password), "name" => $name]);
        }
        return redirect()->route("usersIndex")->with(["message" => "Cập nhật tài khoản thành công."]);
    }

}
