<?php

namespace App\Http\Requests\authentication;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|min:3|max:128|email',
            'password' => 'required|min:6|max:64',
        ];
    }
    public function messages(): array
    {
        return [
            'email.email' => 'Email must be a valid email address.',
            // 'email.min' => 'Email must be at least 3 characters.',
            // 'email.max' => 'Email may not be greater than 128 characters.',
            // 'email.email' => 'Email must be a valid email address.',
            // 'password.required' => 'Password is required.',
            // 'password.min' => 'Password must be at least 6 characters.',
            // 'password.max' => 'Password may not be greater than 64 characters.',
        ];
    }
    
}
