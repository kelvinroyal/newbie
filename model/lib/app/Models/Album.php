<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    //
    protected $table = 'album';
    protected $primaryKey = 'id_album';
    protected $guarded = [];

    function model()
    {
    	return $this->hasOne('App\Models\Models', 'id_model', 'model_album');
    }
}
