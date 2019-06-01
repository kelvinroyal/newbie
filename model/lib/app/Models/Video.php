<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //
    protected $table = 'video';
    protected $primaryKey = 'id_video';
    protected $guarded = [];

    function model()
    {
    	return $this->hasOne('App\Models\Models', 'id_model', 'model_video');
    }
}
