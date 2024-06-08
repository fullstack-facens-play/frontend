<?php

namespace App\Domain\Model\Entities;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title', 'description'
    ];

}