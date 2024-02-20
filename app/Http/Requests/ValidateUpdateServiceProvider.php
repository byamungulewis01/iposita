<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateUpdateServiceProvider extends FormRequest
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
            'email' => 'nullable|email|unique:service_providers,email,'.request()->route()->parameter('provider_id'),
            'telephone' => 'required|unique:service_providers,telephone,'.request()->route()->parameter('provider_id'),
        ];
    }
}
