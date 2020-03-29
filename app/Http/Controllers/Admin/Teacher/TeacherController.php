<?php

namespace App\Http\Controllers\Admin\Teacher;

use App\Services\SubjectService;
use App\Services\TeacherService;
use App\Services\ScheduleService;
use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherRequest;

class TeacherController extends Controller
{
    protected const VIEW_PREFIX = 'admin.teacher.';

    protected $teacherService;

    protected $scheduleService;

    protected $subjectService;

    public function __construct(
        TeacherService $teacherService,
        ScheduleService $scheduleService,
        SubjectService $subjectService
    )
    {
        $this->teacherService = $teacherService;
        $this->scheduleService = $scheduleService;
        $this->subjectService = $subjectService;
    }

    public function ajaxGetBySubject(int $subject)
    {
        $duration = request()->get('duration');
        $teachers = $this->teacherService->getAllBySubject($subject, $duration);
        return response()->json([
            'teachers' => $teachers
        ]);
    }

    public function index()
    {
        $teachers = $this->teacherService->getAll();
        return view(self::VIEW_PREFIX . __FUNCTION__, compact('teachers'));
    }

    public function create()
    {
        $schedules = $this->scheduleService->getAll();
        $subjects = $this->subjectService->getAll();
        return view(self::VIEW_PREFIX . __FUNCTION__, compact('schedules', 'subjects'));
    }

    public function store(TeacherRequest $teacherRequest)
    {
        $this->teacherService->create($teacherRequest->only('name', 'email', 'password', 'business_phone', 'schedules'));
        return redirect()->to(route('teachers.index'));
    }
}
