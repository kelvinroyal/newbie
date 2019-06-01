<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KhoaLuan extends Model
{
    //
    protected $table = 'khoaluan';
    protected $primaryKey = 'id_khoaluan';
    protected $guarded = [];

    function thanhvien()
    {
    	return $this->hasOne('App\Models\ThanhVien', 'id', 'thanhvien_khoaluan');
    }

    function nam()
    {
    	return $this->hasOne('App\Models\Nam', 'id_nam', 'nam_khoaluan');
    }

    function khoa()
    {
        return $this->hasOne('App\Models\Khoa', 'id_khoa', 'khoa_khoaluan');
    }

    public function giaovien()
    {
        return $this->belongsToMany('App\Models\ThanhVien', 'tv_hd', 'khoaluan_id', 'thanhvien_id')
          ->withTimestamps()->withPivot('chuc_vu');
    }

    function huongdan()
    {
        return $this->hasOne('App\Models\ThanhVien', 'id', 'giao_vien');
    }

    function thietlap()
    {
        return $this->hasOne('App\Models\ThietLap', 'id_thietlap', 'thietlap_khoaluan');
    }
}
