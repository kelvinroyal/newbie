<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HoiDong extends Model
{
    //
    protected $table = 'hoidong';
    protected $primaryKey = 'id_hoidong';
    protected $guarded = [];

    function thanhvien()
    {
    	return $this->hasOne('App\Models\ThanhVien', 'id', 'thanhvien_hoidong');
    }

    function nam()
    {
    	return $this->hasOne('App\Models\Nam', 'id_nam', 'nam_hoidong');
    }

}
