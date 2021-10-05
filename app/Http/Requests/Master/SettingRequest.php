<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class SettingRequest extends FormRequest
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
        $id = isset($this->pengaturan) ? $this->pengaturan : '';
        return [
            'tahun'=> [
                'required', 
                Rule::unique('settings')
                    ->where('bulan', $this->bulan)
                    ->where('tahun', $this->tahun)
                    ->where('role_id', Auth::user()->RoleBidangAdmin)
                    ->ignore($id),
            ], 
            'bulan'=> [
                'required', 
                Rule::unique('settings')
                    ->where('bulan', $this->bulan)
                    ->where('tahun', $this->tahun)
                    ->where('role_id', Auth::user()->RoleBidangAdmin)
                    ->ignore($id),
               ]
        ];
    }
}
