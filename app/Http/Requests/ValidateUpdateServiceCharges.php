<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateUpdateServiceCharges extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
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
            'charge' =>'required',
            'min'=>'required_if:charge_type,Range',
            'max'=>'required_if:charge_type,Range',
        ];

    }
}
