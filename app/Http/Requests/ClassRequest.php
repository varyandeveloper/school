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
            'start_date' => 'required|date_format:Y-m-d H:i',
            'end_date' => 'required|date_format:Y-m-d H:i',
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
                Rule::exists('teachers', 'user_id')
            ],
            'students' => [
                'required',
                Rule::exists('students', 'id')
            ]
        ];
    }
}
