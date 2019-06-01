<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeTai extends Model
{
    //
    protected $table = 'detai';
    protected $primaryKey = 'id_detai';
    protected $guarded = [];

    function thanhvien()
    {
    	return $this->hasOne('App\Models\ThanhVien', 'id', 'thanhvien_detai');
    }

    function nam()
    {
    	return $this->hasOne('App\Models\Nam', 'id_nam', 'nam_detai');
    }


}
