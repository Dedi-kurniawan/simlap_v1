<?php

namespace App\Http\Requests\Sd;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
        $id = isset($this->tenaga_kependidikan) ? $this->tenaga_kependidikan : '';
        return [
            'nama' => "required",
            'nip' => 'nullable|unique:sd_employees,nip,'.$id,
            'nuptk' => 'nullable|unique:sd_employees,nuptk,'.$id,
            'tmt_sekolah' => "required", 
            'tmt_jabatan' => "required", 
            'tempat_lahir' => "required", 
            'tanggal_lahir' => "required", 
            'alamat_rumah' => "required", 
            'jenis_kelamin' => "required|in:L,P", 
            'status_pegawai' => "required",
            'pendidikan' => "required", 
            'jabatan' => "required", 
            'district_id' => "required",
            'village_id' => "required",
        ];
    }

    public function messages()
    {
        return [
            'district_id.required' => "Kolom kecamatan di larang kosong", 
            'village_id.required'  => "Kolom desa di larang kosong", 
        ];
    }
}
