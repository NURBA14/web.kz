<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::orderBy("created_at", "DESC")->get();
        return view("guest.course.index", compact("courses"));
    }

    public function show($id)
    {
        $course = Course::with("videos")->findOrFail($id);
        return view("guest.course.show", compact("course"));
    }
}
