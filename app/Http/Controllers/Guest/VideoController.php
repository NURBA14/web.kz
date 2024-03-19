<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function show($id)
    {
        $video = Video::findOrFail($id);
        $video->views += 1;
        $video->save();
        return view("guest.video.show", compact("video"));
    }
}
