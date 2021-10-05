<?php

namespace App\Http\Requests\Sd;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class FacilityRequest extends FormRequest
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
        $id = isset($this->sarana_prasarana) ? $this->sarana_prasarana : '';
        return [ 
            'baik' => 'required|integer|min:0', 
            'rusak_ringan' => 'required|integer|min:0', 
            'rusak_sedang' => 'required|integer|min:0', 
            'rusak_berat' => 'required|integer|min:0', 
            'kebutuhan' => 'required|integer|min:0', 
            'uraian'=> [
                'required', 
                Rule::unique('sd_facilities')
                    ->where('school_id', Auth::user()->school->id)
                    ->ignore($id),
               ]
        ];
    }
}
