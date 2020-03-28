<?php

namespace App\Http\Controllers\Admin\Classes;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClassRequest;
use App\Services\ClassService;
use App\Services\LocationService;

class ClassController extends Controller
{
    protected const VIEW_PREFIX = 'admin.classes.';

    protected $classService;

    protected $locationService;

    public function __construct(
        ClassService $classService,
        LocationService $locationService
    )
    {
        $this->classService = $classService;
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
        return view(self::VIEW_PREFIX . __FUNCTION__);
    }

    public function store(ClassRequest $classRequest)
    {
        return redirect()->to(route('classes.index'));
    }
}
