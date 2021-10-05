<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => "required", 
            'email' => "required|string|email|max:255|unique:users", 
            'password' => "required|min:6"
        ];
    }

    public function messages()
    {
        return [
            'email.unique'  => "email sudah di gunakan oleh operator lain", 
            'password.min'  => "password minimal 6 karakter", 
        ];
    }
}
