<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateUser extends FormRequest
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
            'email' => 'nullable|email|unique:users',
            'telephone' => 'required|unique:users|regex:/^[07][0-9]{9}$/',
            'national_id' =>'required|unique:users|regex:/^[0-9]{16}$/',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nid_attachment' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Name field is required',
            'email.required' => 'Email field is required',
            'telephone.required' => 'Telephone field is required',
            'telephone.regex' => 'Telephone field must be start with 07 and must be 10 digits',
            'national_id.required' => 'National ID field is required',
            'national_id.regex' => 'National ID field must be 16 digits',
            'photo.required' => 'Photo field is required',
            'nid_attachment.required' => 'NID Attachment field is required',
        ];
    }
}
//(?=[^3,8,9])
//look for plugin that gives format of phone number while typing it
//https://www.regextester.com/
