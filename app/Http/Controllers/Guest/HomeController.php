<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Subscription;
use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $subs = Subscription::where("active", "=", 1)->count();
        $courses = Course::count();
        $videos = Video::count();
        return view("guest.index", compact("subs", "courses", "videos"));
    }
}
