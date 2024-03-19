<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subs = Subscription::with("courses")->where("active", "=", 1)->get();
        return view("guest.subscription.index", compact("subs"));
    }
    public function show($id)
    {
        $sub = Subscription::with("courses")->findOrFail($id);
        return view("guest.subscription.show", compact("sub"));
    }

}