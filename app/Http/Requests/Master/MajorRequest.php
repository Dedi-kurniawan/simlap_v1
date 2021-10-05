<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;

class MajorRequest extends FormRequest
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
        $id = isset($this->jurusan) ? $this->jurusan : '';
        return [
            'nama'  => 'required|unique:majors,nama,'.$id,
        ];
    }

    public function messages()
    {
        return [
            'nama.unique' => "jurusan sudah di gunakan", 
            'nama.required'  => "Kolom jurusan di larang kosong", 
        ];
    }
}
