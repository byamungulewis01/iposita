<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateUpdateUser extends FormRequest
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
            'email' => 'nullable|email|unique:users,email,'.request()->route()->parameter('user_id'),
            'telephone' => 'required|regex:/^[07][0-9]{9}$/|unique:users,telephone,'.request()->route()->parameter('user_id'),
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nid_attachment' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
            'national_id' =>'required|regex:/^[0-9]{16}$/|unique:users,national_id,'.request()->route()->parameter('user_id'),
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Name field is required',
            'email.required' => 'Email field is required',
            'telephone.required' => 'Telephone field is required',
            'telephone.regex' => 'Telephone field must be start with 07 and must be 10 digits',
            'photo.required' => 'Photo field is required',
            'nid_attachment.required' => 'NID Attachment field is required',
            'national_id.required' => 'National ID field is required',
            'national_id.regex' => 'National ID field must be 16 digits',
            'national_id.unique' => 'National ID already exists',
        ];
    }
}
