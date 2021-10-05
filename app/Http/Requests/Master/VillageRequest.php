<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VillageRequest extends FormRequest
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
        $id = isset($this->desa) ? $this->desa : '';
        // return [
        //     'district_id'  => 'required',
        //     'nama'=> [
        //         'required', 
        //         Rule::unique('villages')
        //             ->where('district_id', $this->district_id)
        //             ->where('nama', $this->nama)
        //             ->ignore($id),
        //     ],
        // ];
        return [
            'nama'  => 'required|unique:villages,nama,'.$id,
        ];
    }

    public function messages()
    {
        return [
            'district_id.required' => "Kolom kecamatan di larang kosong",
            'nama.unique' => "desa sudah di gunakan",  
            'nama.required'  => "Kolom desa di larang kosong", 
        ];
    }
}
