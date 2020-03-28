<?php

namespace App\Http\Controllers\Admin\Schedule;

use App\Services\ScheduleService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ScheduleRequest;

class ScheduleController extends Controller
{
    protected const VIEW_PREFIX = 'admin.schedule.';

    protected $scheduleService;

    public function __construct(ScheduleService $scheduleService)
    {
        $this->scheduleService = $scheduleService;
    }

    public function index()
    {
        $schedules = $this->scheduleService->getAll();
        return view(self::VIEW_PREFIX . __FUNCTION__, compact(
            'schedules'
        ));
    }

    public function create()
    {
        return view(self::VIEW_PREFIX . __FUNCTION__);
    }

    public function store(ScheduleRequest $scheduleRequest)
    {
        $this->scheduleService->create($scheduleRequest->only('name', 'start_date', 'end_date'));
        return redirect()->to(route('schedules.index'));
    }
}
