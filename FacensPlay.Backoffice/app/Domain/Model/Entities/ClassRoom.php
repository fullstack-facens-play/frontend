<?php

namespace App\Domain\Model\Entities;

use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    protected $fillable = [
        'name', 'description', 'duration', 'video_src'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

}