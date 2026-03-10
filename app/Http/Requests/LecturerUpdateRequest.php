<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LecturerUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'username' => 'required|string|max:100',
            'email' => 'required|email',
            'groups' => 'required|string|max:100',
            'faculties' => 'required|string|max:100',
            'study_programs' => 'required|string|max:100',
            'number_of_groups' => 'required|integer',
            'locations' => 'required|string|max:255'
        ];
    }
}
