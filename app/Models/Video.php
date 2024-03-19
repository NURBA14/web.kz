<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Video extends Model
{
    use HasFactory;

    protected $fillable = ["name", "description", "path", "course_id", "views"];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }


    public function getVideo()
    {
        return "storage/{$this->path}";
    }
}
