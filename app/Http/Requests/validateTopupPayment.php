<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validateTopupPayment extends FormRequest
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
            'service_provider' => 'required',
            'service' => 'required',
            'amount' => 'required',
            'attachment' => 'required|mimes:jpeg,jpg,png,pdf,doc,docx,xls,xlsx,ppt,pptx',
        ];
    }
}
