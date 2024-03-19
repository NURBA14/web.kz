<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Models\Course;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::with("course")->orderBy("created_at", 'DESC')->get();
        return view("admin.video.index", compact("videos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::pluck("name", "id");
        return view("admin.video.create", compact("courses"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVideoRequest $request)
    {
        $folder = date("Y-m-d");
        $path = $request->file("video")->store("video/{$folder}");
        $video = Video::create([
            "name" => $request->validated("name"),
            "description" => $request->validated("description"),
            "course_id" => $request->validated("course_id"),
            "path" => $path,
        ]);
        return redirect()->route("videos.index")->with("success", "Video is saved");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = Video::with("course")->findOrFail($id);
        return view("admin.video.show", compact("video"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Video::with("course")->findOrFail($id);
        $courses = Course::pluck("name", "id");
        return view("admin.video.edit", compact("video", "courses"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVideoRequest $request, $id)
    {
        $video = Video::findOrFail($id);
        if ($request->hasFile("video")) {
            Storage::delete($video->path);
            $folder = date("Y-m-d");
            $path = $request->file("video")->store("video/{$folder}");
        }
        $video->update([
            "name" => $request->validated("name"),
            "description" => $request->validated("description", null),
            "course_id" => $request->validated("course_id"),
            "path" => $path ?? $video->path
        ]);
        return redirect()->route("videos.index")->with("success", "Changes is saved");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        Storage::delete($video->path);
        $video->delete();
        return redirect()->route("videos.index")->with("success", "Video is deleted");
    }
}
