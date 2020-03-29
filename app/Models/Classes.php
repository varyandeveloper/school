<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @method Builder future
 */
class Classes extends Model
{
    protected $table = 'classes';

    protected $fillable = [
        'title',
        'location_id',
        'subject_id',
        'teacher_id',
        'duration'
    ];

    public $timestamps = false;

    public function scopeFuture(Builder $builder)
    {
        $builder->whereDate($this->getTable() . '.created_at', '>', Carbon::today()->startOfDay());
    }
}
