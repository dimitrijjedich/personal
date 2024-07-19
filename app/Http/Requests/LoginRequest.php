<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required','alpha'],
            'email' => ['required','email'],
            'password' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Der Username darf nicht leer sein.',
            'name.alpha' => 'Der Username darf nur aus Buchstaben bestehen.',
            'email.required' => 'Der Email darf nicht leer sein.',
        ];
    }
}
