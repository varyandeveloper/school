<?php

namespace App\Models;

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
        'start_date',
        'end_date'
    ];

    public $timestamps = false;

    public function scopeFuture(Builder $builder)
    {
        $builder->whereDate($this->getTable() . '.start_date', '>', new \DateTime);
    }
}
