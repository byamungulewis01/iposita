<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
    public function rules()
    {
        return [
            //
            'customer_name'=>'required',
            "customer_phone"=>'required',
            "service"=>'required',
            "service_provider"=>'required',
            "reference_number"=>'required',
            "amount"=>'required|numeric',
            "customer_email"=>'required_if:notification_type,Email',
        ];
    }
}
