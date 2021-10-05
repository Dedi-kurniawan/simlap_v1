<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;

class PositionRequest extends FormRequest
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
        $id = isset($this->jabatan) ? $this->jabatan : '';
        return [
            'nama'  => 'required|unique:positions,nama,'.$id,
        ];
    }

    public function messages()
    {
        return [
            'nama.unique' => "jabatan sudah di gunakan", 
            'nama.required'  => "Kolom jabatan di larang kosong", 
        ];
    }
}
