<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Khoa extends Model
{
    //
    protected $table = 'khoa';
    protected $primaryKey = 'id_khoa';
    protected $guarded = [];

    function nganh()
    {
    	return $this->hasMany('App\Models\Nganh','khoa_nganh');
    }
}
