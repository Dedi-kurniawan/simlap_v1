<?php

namespace App\Http\Requests\Sd;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class NeedRequest extends FormRequest
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
        $id = isset($this->kebutuhan_guru) ? $this->kebutuhan_guru : '';
        return [
            'rombel'=> "required", 
            'jam_rombel'=> "required",
            'jam_perminggu'=> "required",
            'jumlah_guru'=> "required",
            'status_kepegawaian' => "required", 
            'keterangan'=> "required",
            'mapel'=> [
                'required', 
                Rule::unique('sd_needs')
                    ->where('school_id', Auth::user()->school->id)
                    ->ignore($id),
               ]
        ];
    }
}
