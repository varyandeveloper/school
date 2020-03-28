<?php

namespace App\Services;

use App\Models\Student;

class StudentService extends AbstractService
{
    protected $studentModel;

    public function __construct(Student $studentModel)
    {
        $this->studentModel = $studentModel;
    }

    public function getAllContainsDateSchedule(\DateTimeInterface $dateTime)
    {
        return $this->studentModel->scheduleContains($dateTime)->get();
    }

    public function create(array $data): int
    {
        $schedule = $this->studentModel::query()->create($data);
        return $schedule->id;
    }
}
