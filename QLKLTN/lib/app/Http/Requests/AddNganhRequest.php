<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddNganhRequest extends FormRequest
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
        return [
            //
            'ten_nganh' => 'unique:nganh,ten_nganh'
        ];
    }
    public function messages(){
        return [
            'ten_nganh.unique'=>'Tên ngành đã trùng!'
        ];
    }
}
