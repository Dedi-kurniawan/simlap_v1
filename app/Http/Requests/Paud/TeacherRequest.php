<?php

namespace App\Http\Requests\Paud;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
        $id = isset($this->tenaga_pendidik) ? $this->tenaga_pendidik : '';
        return [
            'nama' => "required",
            'nip' => 'nullable|unique:tk_teachers,nip,'.$id,
            'tanggal_mulai_bekerja' => "required", 
            'jabatan' => "required", 
            'tempat_lahir' => "required", 
            'tanggal_lahir' => "required", 
            'alamat_rumah' => "required", 
            'tugas_mengajar' => "required", 
            'sertifikasi' => "required|in:0,1",
            'jenis_kelamin' => "required|in:L,P", 
            'status_pegawai' => "required",
            'pendidikan' => "required|in:SMA,D1,D2,D3,S1,S2,S3", 
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
