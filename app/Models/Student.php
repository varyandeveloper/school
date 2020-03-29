<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method Builder scheduleContains(\DateTimeInterface $start, \DateTimeInterface $end)
 */
class Student extends Model
{
    protected $fillable = [
        'user_id',
        'dob',
        'started_at'
    ];

    public $timestamps = false;

    public function scopeScheduleContains(Builder $builder, \DateTimeInterface $start, \DateTimeInterface $end)
    {
        $builder
            ->join('user_schedules', $this->getTable() . '.user_id', 'user_schedules.user_id')
            ->join('schedules', 'user_schedules.schedule_id', 'schedules.id')
            ->whereDate('schedules.start_date', '<', $start)
            ->whereDate('schedules.end_date', '>', $end)
        ;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function schedules()
    {
        return $this->hasManyThrough(
            User::class,
            UserSchedule::class,
            'schedule_id',
            'id',
            null,
            'user_id'
        );
    }
}
