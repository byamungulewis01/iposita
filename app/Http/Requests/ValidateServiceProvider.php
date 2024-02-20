<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateServiceProvider extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'=>'required|unique:service_providers',
            'email' => 'nullable|email|unique:branches',
            'telephone' => 'required|unique:branches'];
    }

    public function messages()
    {
        return [
            'province_id.required' => 'Province field is required',
            'district_id.required' => 'District field is required',
            'sector_id.required' => 'Sector field is required',
        ];
    }
}
