<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;

class DistrictRequest extends FormRequest
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
        $id = isset($this->kecamatan) ? $this->kecamatan : '';
        return [
            'nama'  => 'required|unique:districts,nama,'.$id,
        ];
    }

    public function messages()
    {
        return [
            'nama.unique' => "kecamatan sudah di gunakan", 
            'nama.required'  => "Kolom kecamatan di larang kosong", 
        ];
    }
}
