<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddNamRequest extends FormRequest
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
            'so_nam' => 'unique:nam,so_nam'
        ];
    }
    public function messages(){
        return [
            'so_nam.unique'=>'Số năm đã trùng!'
        ];
    }
}
