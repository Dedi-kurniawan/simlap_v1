<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class SubjectRequest extends FormRequest
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
        $id = isset($this->mata_pelajaran) ? $this->mata_pelajaran : '';
        return [
            'nama'=> [
                'required', 
                Rule::unique('subjects')
                    ->where('role_id', Auth::user()->RoleBidangAdmin)
                    ->where('nama', $this->nama)
                    ->ignore($id),
               ]
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => "Kolom mata pelajaran di larang kosong", 
            'nama.unique'  => "mata pelajaran sudah di gunakan", 
        ];
    }
}
