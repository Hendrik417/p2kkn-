<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VillageUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'district_id' => 'required|exists:districts,id',
            'type' => 'required|in:Kelurahan,Desa',
            'geojson' => 'nullable',
            'color' => 'nullable|string|max:50',
            'is_active' => 'nullable|boolean'
        ];
    }
}
