<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'dob' => 'required|date_format:Y-m-d',
            'password' => 'required|min:6',
            'schedules' => [
                'required',
                Rule::exists('schedules', 'id')
            ]
        ];
    }
}
