<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view("security.login");
    }


    public function store(StoreLoginRequest $request)
    {
        if (Auth::attempt(["email" => $request->validated("email"), "password" => $request->validated("password")], $request->validated("remember_me", false))) {
            return redirect()->route("guest.home")->with("success", "You are logged");
        }
        return redirect()->back()->with("error", "Icorrect email or password");
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route("login.index")->with("success", "You are logout");
    }
}
