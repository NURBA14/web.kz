<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::withCount("subscriptions", "videos")->get();
        return view("admin.course.index", compact("courses"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.course.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourseRequest $request)
    {
        $course = Course::create([
            "name" => $request->validated("name"),
            "description" => $request->validated("description")
        ]);
        return redirect()->route("courses.index")->with("success", "Course is saved");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::with("subscriptions", "videos")->withCount("videos")->findOrFail($id);
        return view("admin.course.show", compact("course"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view("admin.course.edit", compact("course"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCourseRequest $request, $id)
    {
        $course = Course::findOrFail($id);
        $course->update([
            "name" => $request->validated("name"),
            "description" => $request->validated("description")
        ]);
        return redirect()->route("courses.index")->with("success", "Changes is saved");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        if ($course->videos->count()) {
            return redirect()->back()->with("error", "This Course have videos");
        }
        $course->subscriptions()->sync([]);
        $course->delete();
        return redirect()->route("courses.index")->with("success", "Course is deleted");
    }
}
