<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddNationRequest extends FormRequest
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
            'name_nation'=>'unique:nation,name_nation'
        ];
    }

    public function messages(){
        return [
            'name_nation.unique'=>'Nation already exists!'
        ];
    }
}
