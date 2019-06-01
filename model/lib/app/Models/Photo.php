<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $table = 'photo';
    protected $primaryKey = 'id_photo';
    protected $guarded = [];

    function model()
    {
    	return $this->hasOne('App\Models\Models', 'id_model', 'model_photo');
    }
}
