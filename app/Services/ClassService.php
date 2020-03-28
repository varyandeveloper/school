<?php

namespace App\Services;

use App\Models\Classes;

class ClassService extends AbstractService
{
    protected $classModel;

    public function __construct(Classes $classes)
    {
        $this->classModel = $classes;
    }

    public function getFutureClasses()
    {
        return $this->classModel->future()->get();
    }
}
