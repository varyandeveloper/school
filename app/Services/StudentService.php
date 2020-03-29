<?php

namespace App\Services;

use App\Models\UserSchedule;
use App\Models\UserSubject;
use Carbon\Carbon;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class StudentService extends AbstractService
{
    protected $studentModel;

    protected $userService;

    public function __construct(Student $studentModel, UserService $userService)
    {
        $this->studentModel = $studentModel;
        $this->userService = $userService;
    }

    public function getAll()
    {
        return $this->studentModel->with('user')->get();
    }

    public function getAllContainsDateSchedule(\DateTimeInterface $start, \DateTimeInterface $end): Collection
    {
        return $this->studentModel->scheduleContains($start, $end)->get();
    }

    public function create(array $data): int
    {
        try {
            DB::beginTransaction();
            $userId = $this->userService->create($data);
            $student = $this->studentModel::query()->create([
                'user_id' => $userId,
                'dob' => $data['dob'],
                'started_at' => Carbon::now()
            ]);
            UserSchedule::insert($this->buildRelations($userId, $data['schedules']));
            UserSubject::insert($this->buildRelations($userId, $data['subjects']));
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }

        return $student->id;
    }

    protected function buildRelations(int $userId, array $ids): array
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
