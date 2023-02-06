<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Psy\Output\PassthruPager;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function GetLogin(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        if (Auth::check()){
            return redirect()->route("dashboard");
        }
        else {
            $request->session()->put("previous", url()->previous());
            $request->session()->put("current", url()->current());
            return view('auth.login');
        }
    }

    //
    public function Login(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $user = User::where('email', '=', $request->get("email"))->first();
        if ($user){
            if (Auth::attempt(["email" => $request->get("email"), "password" => $request->get("password")]))
            {
                if (session("previous") != (session("current"))) {
                    if (str_contains(session("previous"), "register")){ //found register.
                        return redirect()->route('dashboard');
                    }
                    else {
                        return redirect(session('previous'));
                    }
                }
                else {
                    return redirect()->route('dashboard');
                }
            }
            else {
                return redirect()->route("login")->with(["message" => "Mật khẩu không đúng."]);
            }
        }
        else {
            return redirect()->route("login")->with(["message" => "Tài khoản không tồn tại."]);

        }
    }
    public function logout(Request $request){
        Auth::logout();
        return redirect()->route("login");
    }




}
