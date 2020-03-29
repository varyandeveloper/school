<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class Subject implements Scope
{
    protected $subjectId;

    public function __construct(int $subjectId)
    {
        $this->subjectId = $subjectId;
    }

    public function apply(Builder $builder, Model $model)
    {
        $builder
            ->join('user_subjects', 'user_subjects.user_id', $model->getTable() . '.user_id')
            ->where('user_subjects.subject_id', $this->subjectId)
            ->groupBy($model->getTable() . '.' . $model->getKeyName())
        ;
    }
}
