<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class AvailableTeacher implements Scope
{
    protected $duration;

    public function __construct(int $duration)
    {
        $this->duration = $duration;
    }

    public function apply(Builder $builder, Model $model)
    {
        $builder
            ->join('user_schedules', 'user_schedules.user_id', $model->getTable() . '.user_id')
            ->join('schedules', 'user_schedules.schedule_id', 'schedules.id')
            ->leftJoin('classes', 'classes.teacher_id', $model->getTable() . '.' . $model->getKeyName())
            ->whereRaw(
                DB::raw('DATE_SUB(schedules.end_date, INTERVAL '.$this->duration.' MINUTE) > CURDATE()')
            )
            ->whereNull('classes.id')
            ->groupBy($model->getTable() . '.' . $model->getKeyName())
        ;
    }
}
