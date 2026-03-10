<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DistrictStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:districts,name',
            'regency_id' => 'required|exists:tb_regency,id',
            'is_active' => 'required|boolean',
            'geojson' => 'nullable|json',
            'color' => 'nullable|string|max:50',
            // type bisa diisi otomatis di controller
        ];
    }

    /**
     * Optional: custom attribute names
     */
    public function attributes(): array
    {
        return [
            'regency_id' => 'Regency',
        ];
    }
}
