<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method Builder scheduleContains(\DateTimeInterface $date)
 */
class Student extends Model
{
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'dob'
    ];

    public function scopeScheduleContains(Builder $builder, \DateTimeInterface $date)
    {
        $builder
            ->join('user_schedules', $this->getTable() . '.user_id', 'user_schedules.user_id')
            ->join('schedules', 'user_schedules.schedule_id', 'schedules.id')
            ->whereDate('schedules.start_date', '<', $date)
            ->whereDate('schedules.end_date', '>', $date)
        ;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
