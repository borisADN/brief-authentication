<?php

namespace App\Http\Requests\authentication;

use Illuminate\Foundation\Http\FormRequest;

class RegisterationRequest extends FormRequest
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
            'name' => 'required|min:3|max:128|unique:users',
            'email' => 'required|min:3|max:128|email|unique:users',
            'password' => 'required|min:6|max:64',
            'passwordConfirm' => 'same:password',
        ];
    }

    public function messages(): array
    {
        return [
            'passwordConfirm.same' => 'Les mots de passe ne sont pas identiques',
            
            'name.min' => 'Le nom doit contenir au moins 3 caractères',
     
            'name.unique' => 'Le nom est déjà pris',
            'email.unique' => 'L\'email est déjà pris',
         
           
            'email.email' => 'L\'email doit être valide',
        ];
    }
}
