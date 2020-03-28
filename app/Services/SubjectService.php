<?php

namespace App\Services;

use App\Models\Subject;

class SubjectService extends AbstractService
{
    protected $subjectModel;

    public function __construct(Subject $subject)
    {
        $this->subjectModel = $subject;
    }

    public function getAll()
    {
        return $this->subjectModel->all();
    }
}
