<?php

namespace App\Services;

use App\User;
use Illuminate\Support\Facades\Hash;

class UserService extends AbstractService
{
    protected $userModel;

    public function __construct(User $user)
    {
        $this->userModel = $user;
    }

    public function create(array $data)
    {
        $user = $this->userModel::query()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
        return $user->id;
    }
}
