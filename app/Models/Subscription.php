<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "price",
        "active"
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class)->withTimestamps();
    }
}
