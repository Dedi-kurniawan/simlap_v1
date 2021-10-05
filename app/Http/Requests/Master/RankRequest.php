<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;

class RankRequest extends FormRequest
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
        $id = isset($this->pangkat) ? $this->pangkat : '';
        return [
            'nama'  => 'required|unique:ranks,nama,'.$id,
        ];
    }

    public function messages()
    {
        return [
            'nama.unique' => "pangkat sudah di gunakan", 
            'nama.required'  => "Kolom pangkat di larang kosong", 
        ];
    }
}
