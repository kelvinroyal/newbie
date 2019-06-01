<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Models extends Model
{
    //
    protected $table = 'model';
    protected $primaryKey = 'id_model';
    protected $guarded = [];

    function continents()
    {
    	return $this->hasOne('App\Models\Continent', 'id_continents', 'continents_model');
    }
    function nation()
    {
    	return $this->hasOne('App\Models\Nation', 'id_nation', 'nation_model');
    }
}
