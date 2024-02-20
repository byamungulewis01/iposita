<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateTopupTransfer extends FormRequest
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
     * @return
     */
    public function rules()
    {
        return [
            //amount must be less than or equal to the current amount field
//            'amount' => 'required|lte:current_amount',
            'amount' => 'required|numeric|min:1',
            'from_service_provider' => 'required|exists:service_providers,id',
            'from_service' => 'required|exists:services,id',
            'to_service_provider' => 'required|exists:service_providers,id',
            'to_service' => 'required|exists:services,id',
        ];
    }
}
