<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePeriodRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'periods' => 'required|string|max:255',
            'active_dates' => 'required|date',
            'status' => 'required|in:0,1'
        ];
    }

    public function messages()
    {
        return [
            'periods.required' => 'Nama periode wajib diisi',
            'active_dates.required' => 'Tanggal aktif wajib diisi',
            'active_dates.date' => 'Format tanggal tidak valid',
            'status.required' => 'Status wajib dipilih'
        ];
    }
}
