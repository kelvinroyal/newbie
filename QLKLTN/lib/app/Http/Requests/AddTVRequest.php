<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddTVRequest extends FormRequest
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
            'anh' => 'image',
            'ma_thanhvien' => 'unique:thanhvien,ma_thanhvien'
        ];
    }
    public function messages(){
        return [
            'anh.image' => 'Ảnh không hợp lệ!',
            'ma_thanhvien.unique'=>'Mã thành viên đã trùng!'
        ];
    }
}
