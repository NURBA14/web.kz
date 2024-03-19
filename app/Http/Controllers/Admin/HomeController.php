<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Subscription;
use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $subs = Subscription::count();
        $courses = Course::count();
        $videos = Video::count();
        $vids = Video::all();
        $views = 0;
        if ($vids) {
            foreach ($vids as $video) {
                $views += $video->views;
            }
        }
        return view("admin.index", compact("subs", "courses", "videos", "views"));
    }

    public function setActive($id)
    {
        $sub = Subscription::find($id);
        if ($sub->active == 1) {
            $sub->active = 0;
            $sub->save();
            return redirect()->back()->with("success", "{$sub->name} is not active");
        } else {
            $sub->active = 1;
            $sub->save();
            return redirect()->back()->with("success", "{$sub->name} is active");
        }
    }
}
