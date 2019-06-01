<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThanhVien extends Model
{
    //
    protected $table = 'thanhvien';
    protected $primaryKey = 'id';
    protected $guarded = [];

    function khoa()
    {
    	return $this->hasOne('App\Models\Khoa', 'id_khoa', 'khoa_thanhvien');
    }

    function nganh()
    {
    	return $this->hasOne('App\Models\Nganh', 'id_nganh', 'nganh_thanhvien');
    }

    public function khoaluan()
    {
        return $this->belongsToMany('App\Models\KhoaLuan','tv_hd', 'thanhvien_id', 'khoaluan_id')
          ->withPivot('chuc_vu')->withTimestamps();
    }
}
