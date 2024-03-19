<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegController extends Controller
{
    public function index()
    {
        return view("security.reg");
    }

    public function store(StoreRegRequest $request)
    {
        $user = User::create([
            "name" => $request->validated("name"),
            "email" => $request->validated("email"),
            "password" => bcrypt($request->validated("password")),
        ]);
        Auth::login($user);
        return redirect()->route("guest.home")->with("success", "You are logged");
    }
}