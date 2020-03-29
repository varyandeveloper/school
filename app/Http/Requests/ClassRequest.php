<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ClassRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => [
                'max:255'
            ],
            'duration' => 'required|numeric',
            'location' => [
                'required',
                Rule::exists('locations', 'id')
            ],
            'subject' => [
                'required',
                Rule::exists('subjects', 'id')
            ],
            'teacher' => [
                'required',
                Rule::exists('teacher', 'user_id')
            ],
            'students' => [
                'required',
                Rule::exists('students', 'id')
            ]
        ];
    }
}
