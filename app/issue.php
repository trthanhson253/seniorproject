<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class issue extends Model
{
    protected $table="issue";

    public function books(){
    	return $this->belongsTo('App\books','bookid','id');
    }

     public function students(){
    	return $this->belongsTo('App\student','studentid','id');
    }


}
