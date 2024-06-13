<?php

namespace App\Domain\Model\Entities;

use Illuminate\Database\Eloquent\Model;

class ViewedClass extends Model
{
    protected $fillable = [
        'is_watched'
    ];

}