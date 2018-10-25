<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $table="comment";

     public function books(){
    	return $this->belongsTo('App\books','idBooks','id');
    }

    public function student(){
    	return $this->belongsTo('App\student','idStudent','id');
    }
}
