<?php

namespace App\Domain\Model\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ViewedClass extends Model
{
    protected $fillable = [
        'is_watched'
    ];

    public function classRoom()
    {
        return $this->belongsTo(ClassRoom::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class);
    }

}