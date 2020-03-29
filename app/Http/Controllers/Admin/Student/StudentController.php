<?php

namespace App\Http\Controllers\Admin\Student;

use App\Services\ScheduleService;
use App\Services\StudentService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Services\SubjectService;

class StudentController extends Controller
{
    protected const VIEW_PREFIX = 'admin.student.';

    protected $studentService;

    protected $scheduleService;

    protected $subjectService;

    public function __construct(
        StudentService $studentService,
        ScheduleService $scheduleService,
        SubjectService $subjectService
    )
    {
        $this->studentService = $studentService;
        $this->scheduleService = $scheduleService;
        $this->subjectService = $subjectService;
    }

    public function index()
    {
        $students = $this->studentService->getAll();
        return view(self::VIEW_PREFIX . __FUNCTION__, compact('students'));
    }

    public function create()
    {
        $schedules = $this->scheduleService->getAll();
        $subjects = $this->subjectService->getAll();
        return view(self::VIEW_PREFIX . __FUNCTION__, compact(
            'schedules',
            'subjects'
        ));
    }

    public function store(StudentRequest $studentRequest)
    {
        $this->studentService->create($studentRequest->only('name', 'email', 'password', 'dob', 'schedules'));
        return redirect()->to(route('students.index'));
    }
}
