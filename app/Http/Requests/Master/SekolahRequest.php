<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;

class SekolahRequest extends FormRequest
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
        $id = isset($this->sekolah) ? $this->sekolah : '';
        return [
            'nama_sekolah' => "required",
            'npsn'  => 'required|unique:schools,npsn,'.$id,
            'status_sekolah' => "required", 
            'tahun_berdiri' => "required", 
            'akreditasi' => "required", 
            'nilai_akreditasi' => "required", 
            'alamat_sekolah' => "required", 
            'district_id' => "required", 
            'village_id' => "required", 
            'telepon_sekolah' => "required", 
            'kurikulum' => "required", 
            'koordinator_id' => "required", 
            'kepala_sekolah' => "required", 
            'nip_kepala_sekolah' => "required", 
            'sertifikasi_kepala_sekolah' => "required", 
            'hp_kepala_sekolah' => "required",        
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
