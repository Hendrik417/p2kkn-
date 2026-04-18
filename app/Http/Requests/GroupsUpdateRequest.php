<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupsUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'periods' => 'required|string|max:255',
            'groups_names' => 'required|string|max:255',
            'villages' => 'required|string|max:255',
            'districts' => 'required|string|max:255',
            'regency' => 'required|string|max:255',
            'survising_lectures' => 'required|string|max:255'
        ];
    }

    public function messages()
    {
        return [
            'periods.required' => 'Periode wajib diisi',
            'groups_names.required' => 'Nama group wajib diisi',
            'villages.required' => 'Desa wajib diisi',
            'districts.required' => 'Kecamatan wajib diisi',
            'regency.required' => 'Kabupaten wajib diisi',
            'survising_lectures.required' => 'Dosen pembimbing wajib diisi'
        ];
    }
}
