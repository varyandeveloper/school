<?php

namespace App\Services;

use App\Models\Scopes\AvailableTeacher;
use App\Models\Teacher;
use App\Models\UserSubject;
use App\Models\UserSchedule;
use App\Models\Scopes\Subject;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class TeacherService extends AbstractService
{
    protected $teacherModel;

    protected $userService;

    public function __construct(Teacher $teacher, UserService $userService, SubjectService $subjectService)
    {
        $this->teacherModel = $teacher;
        $this->userService = $userService;
    }

    public function getAllBySubject(int $subjectId, int $duration): Collection
    {
        $this->teacherModel::addGlobalScope(new Subject($subjectId));
        $this->teacherModel::addGlobalScope(new AvailableTeacher($duration));
        return $this->teacherModel->with('user')->get();
    }

    public function create(array $data)
    {
        try {
            DB::beginTransaction();
            $userId = $this->userService->create($data);
            $teacher = $this->teacherModel::query()->create([
                'user_id' => $userId,
                'business_phone' => $data['business_phone']
            ]);
            UserSchedule::insert($this->buildSchedules($userId, $data['schedules']));
            UserSubject::insert($this->buildRelations($userId, $data['subjects']));
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }

        return $teacher->id;
    }

    public function getAll()
    {
        return $this->teacherModel->all();
    }

    protected function buildRelations(int $userId, $ids): array
    {
        $result = [];
        foreach ($ids as $id) {
            $result[] = [
                'user_id' => $userId,
                'schedule_id' => $id
            ];
        }
        return $result;
    }
}
