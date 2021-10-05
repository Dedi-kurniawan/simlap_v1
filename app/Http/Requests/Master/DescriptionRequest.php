<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class DescriptionRequest extends FormRequest
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
        $id = isset($this->fasilitas) ? $this->fasilitas : '';
        return [
            'nama' => 'required|unique:descriptions,nama,'.$id,            
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => "Kolom uraian di larang kosong", 
            'nama.unique' => "uraian sudah di gunakan",  
        ];
    }
}
