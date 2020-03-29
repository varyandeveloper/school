<?php

namespace App\Services;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Collection;

class SubjectService extends AbstractService
{
    protected $subjectModel;

    public function __construct(Subject $subject)
    {
        $this->subjectModel = $subject;
    }

    public function getAll(): Collection
    {
        return $this->subjectModel->all();
    }

    public function create(array $data): int
    {
        $subject = $this->subjectModel::query()->create($data);
        return $subject->id;
    }
}
