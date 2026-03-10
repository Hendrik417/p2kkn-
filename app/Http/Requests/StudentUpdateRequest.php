<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'groups' => 'required|string|max:255',
            'faculties' => 'required|string|max:255',
            'bacth' => 'required|string|max:255',
            'locations' => 'required|string|max:255',
            'status' => 'required|in:0,1'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Username wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'groups.required' => 'Group wajib diisi',
            'faculties.required' => 'Fakultas wajib diisi',
            'bacth.required' => 'Batch wajib diisi',
            'locations.required' => 'Lokasi wajib diisi',
            'status.required' => 'Status wajib dipilih'
        ];
    }
}
