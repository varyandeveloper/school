<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocationRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'capacity' => 'required|numeric'
        ];
    }
}
