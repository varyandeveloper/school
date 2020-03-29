<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'title',
        'description',
        'min_age',
        'max_age'
    ];

    public $timestamps = false;
}
