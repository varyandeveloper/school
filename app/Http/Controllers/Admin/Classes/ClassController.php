<?php

namespace App\Http\Controllers\Admin\Classes;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClassRequest;
use App\Services\ClassService;
use App\Services\LocationService;
use App\Services\SubjectService;

class ClassController extends Controller
{
    protected const VIEW_PREFIX = 'admin.classes.';

    protected $classService;

    protected $subjectService;

    protected $locationService;

    public function __construct(
        ClassService $classService,
        SubjectService $subjectService,
        LocationService $locationService
    )
    {
        $this->classService = $classService;
        $this->subjectService = $subjectService;
        $this->locationService = $locationService;
    }

    public function index()
    {
        $classes = $this->classService->getFutureClasses();
        return view(self::VIEW_PREFIX . __FUNCTION__, compact(
            'classes'
        ));
    }

    public function create()
    {
        $subjects = $this->subjectService->getAll();
        $locations = $this->locationService->getAll();
        return view(self::VIEW_PREFIX . __FUNCTION__, compact(
            'subjects',
            'locations'
        ));
    }

    public function store(ClassRequest $classRequest)
    {
        return redirect()->to(route('classes.index'));
    }
}
