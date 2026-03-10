<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFaqRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'questions' => 'required|string',
            'answers' => 'required|string',
            'is_published' => 'required|boolean',
            'view_count' => 'nullable|numeric'
        ];
    }

    public function messages()
    {
        return [
            'questions.required' => 'Pertanyaan wajib diisi',
            'answers.required' => 'Jawaban wajib diisi',
            'is_published.required' => 'Status wajib dipilih',
        ];
    }
}
