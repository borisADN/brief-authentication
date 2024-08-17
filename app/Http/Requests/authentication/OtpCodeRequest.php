<?php

namespace App\Http\Requests\authentication;

use Illuminate\Foundation\Http\FormRequest;

class OtpCodeRequest extends FormRequest
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
            'email' => 'required|email',
            'code' => 'required|min:4|max:6',
        ];
    }

    public function messages(): array
    {
        return [
          
            'code.min' => 'le code doit contenir au moins 4 caractères',
            'code.max' => 'le code doit contenir au plus 6 caractères',
        ];
    }
}
