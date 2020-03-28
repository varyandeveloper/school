<?php

namespace App\Services;

use App\Models\Schedule;

class ScheduleService extends AbstractService
{
    protected $scheduleModel;

    public function __construct(Schedule $scheduleModel)
    {
        $this->scheduleModel = $scheduleModel;
    }

    public function getAll()
    {
        return $this->scheduleModel->all();
    }

    public function create(array $data): int
    {
        $schedule = $this->scheduleModel::query()->create($data);
        return $schedule->id;
    }
}
