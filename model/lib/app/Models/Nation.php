<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nation extends Model
{
    //
    protected $table = 'nation';
    protected $primaryKey = 'id_nation';
    protected $guarded = [];

    function model()
    {
    	return $this->hasMany('App\Models\Models','nation_model');
    }
    function continents()
    {
    	return $this->hasOne('App\Models\Continent', 'id_continents', 'continents_nation');
    }
}
