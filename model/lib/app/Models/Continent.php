<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    //
    protected $table = 'continents';
    protected $primaryKey = 'id_continents';
    protected $guarded = [];

    function nation()
    {
    	return $this->hasMany('App\Models\Nation','continents_nation');
    }
    function model()
    {
    	return $this->hasMany('App\Models\Models','continents_model');
    }
}
