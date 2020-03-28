<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'name',
        'start_date',
        'end_date'
    ];

    public $timestamps = false;
}
