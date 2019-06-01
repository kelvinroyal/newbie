<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddKhoaRequest extends FormRequest
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
            'ten_khoa' => 'unique:khoa,ten_khoa'
        ];
    }
    public function messages(){
        return [
            'ten_khoa.unique'=>'Tên khoa đã trùng!'
        ];
    }
}
