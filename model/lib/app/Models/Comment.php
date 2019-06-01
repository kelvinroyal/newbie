<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = 'comment';
    protected $primaryKey = 'id_comment';
    protected $guard = [];

    function user()
    {
    	return $this->hasOne('App\Models\User', 'id', 'user_comment');
    }
}
