<?php

namespace App\Http\Requests\Sd;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class StudentRequest extends FormRequest
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
        $id = isset($this->peserta_didik) ? $this->peserta_didik : '';
        return [ 
            'siswa_l' => 'required|integer|min:0', 
            'siswa_p' => 'required|integer|min:0', 
            'usia_6' => 'required|integer|min:0', 
            'usia_7' => 'required|integer|min:0', 
            'usia_8' => 'required|integer|min:0', 
            'usia_9' => 'required|integer|min:0', 
            'usia_10' => 'required|integer|min:0', 
            'usia_11' => 'required|integer|min:0', 
            'usia_12' => 'required|integer|min:0', 
            'usia_13' => 'required|integer|min:0', 
            'usia_14' => 'required|integer|min:0', 
            'usia_15' => 'required|integer|min:0', 
            'islam' => 'required|integer|min:0', 
            'katolik' => 'required|integer|min:0', 
            'protestan' => 'required|integer|min:0', 
            'hindu' => 'required|integer|min:0', 
            'budha' => 'required|integer|min:0', 
            'lain' => 'required|integer|min:0', 
            'room_id'=> [
                'required', 
                Rule::unique('sd_students')
                    ->where('school_id', Auth::user()->school_id)
                    ->ignore($id),
               ]
        ];
    }

    public function messages()
    {
        return [
            'room_id.required' => "Kolom kelas di larang kosong", 
            'room_id.unique'  => "kelas sudah di gunakan", 
        ];
    }
}
