<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'business_phone' => 'required',
            'password' => 'required|min:6',
            'schedules' => [
                'required',
                Rule::exists('schedules', 'id')
            ]
        ];
    }
}
