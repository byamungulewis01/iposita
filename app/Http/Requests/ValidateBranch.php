<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateBranch extends FormRequest
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
            'name'=>'required',
            'email' => 'nullable|email|unique:branches',
            'telephone' => 'required|unique:branches',
            'province_id'=>'required',
            'district_id'=>'required',
            'sector_id'=>'required',
            'contract'=>'required_if:branch_type,External',
        ];
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
