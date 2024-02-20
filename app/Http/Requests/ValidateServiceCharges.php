<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateServiceCharges extends FormRequest
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
            'customer_charge' => 'nullable',
            'provider_id'=>'required',
            'service_id' => 'required',
            'charge_type' => 'required',
            'charge' =>'required_unless:charge_type,Range',
            "min" => [
                'required_if:charge_type,Range',
                'array' // input must be an array
            ],
            "max" => [
                'required_if:charge_type,Range',
                'array' // input must be an array
            ],
            "charges" => [
                'required_if:charge_type,Range',
                'array' // input must be an array
            ],
            "min.*" => [
                'nullable',
                'numeric',
            ],
            "max.*" => [
                'nullable',
                'numeric',
            ],
            "charges.*" => [
                'nullable',
                'numeric',
            ],

        ];

    }

    public function messages()
    {
        return [
            'provider_id.required' => 'Service Provider field is required',
            'service_id.required' => 'Service field is required',
        ];
    }
}
