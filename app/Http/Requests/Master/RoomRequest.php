<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;


class RoomRequest extends FormRequest
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
        $id = isset($this->kelas_siswa) ? $this->kelas_siswa : '';
        return [
            'no_urut'=> "required",
            'kelas'  => 'required|unique:rooms,kelas,'.$id,
        ];
    }
}
