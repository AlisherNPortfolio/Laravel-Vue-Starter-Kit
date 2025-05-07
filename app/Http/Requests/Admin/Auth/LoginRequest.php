<?php

namespace App\Http\Requests\Admin\Auth;

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
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:6', 'max:30'],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Elektron pochta kiritilishi shart',
            'email.email' => 'Noto\'g\'ri formatdagi elektron pochta kiritdingiz',
            'password.required' => 'Parol kiritilishi shart',
            'password.min' => 'Parol kamida 6ta belgidan iborat bo\'lishi kerak',
            'password.max' => 'Parol ko\'pi bilan 30ta belgidan iborat bo\'lishi kerak'
        ];
    }
}
