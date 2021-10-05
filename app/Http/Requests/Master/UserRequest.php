<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
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
        $id = isset($this->akun) ? $this->akun : '';
        $role = isset($this->role_id) ? $this->role_id : Auth::user()->RoleBidangAdmin;
        return [
            'name'=> "required", 
            'email'=> "email|required", 
            'school_id'=> [
                'required', 
                Rule::unique('users')
                    ->where('school_id', $this->school_id)
                    ->where('role_id', $role)
                    ->ignore($id),
               ]
        ];
    }

    public function messages()
    {
        return [
            'school_id.required' => "Kolom sekolah di larang kosong", 
            'school_id.unique'  => "sekolah sudah di gunakan", 
        ];
    }
}
