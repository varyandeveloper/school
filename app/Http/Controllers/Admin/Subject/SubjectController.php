<?php

namespace App\Http\Controllers\Admin\Subject;

use App\Services\SubjectService;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectRequest;

class SubjectController extends Controller
{
    protected const VIEW_PREFIX = 'admin.subject.';

    protected $subjectService;

    public function __construct(SubjectService $subjectService)
    {
        $this->subjectService = $subjectService;
    }

    public function index()
    {
        $subjects = $this->subjectService->getAll();
        return view(self::VIEW_PREFIX . __FUNCTION__, compact('subjects'));
    }

    public function create()
    {
        return view(self::VIEW_PREFIX . __FUNCTION__);
    }

    public function store(SubjectRequest $subjectRequest)
    {
        $this->subjectService->create($subjectRequest->only('title', 'description', 'min_age', 'max_age'));
        return redirect()->to(route('subjects.index'));
    }
}
