<?php

namespace App\Domain\Model\Entities;

use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    protected $fillable = [
        'title', 'description'
    ];

}