<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrongSo extends Model
{
    //
    protected $table = 'trongso';
    protected $primaryKey = 'id_trongso';
    protected $guarded = [];

    function hoidong()
    {
    	return $this->hasOne('App\Models\HoiDong', 'id_hoidong', 'hoidong_trongso');
    }
}
