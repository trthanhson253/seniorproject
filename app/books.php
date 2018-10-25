<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    protected $table="books";

    public function subCates(){
    	return $this->belongsTo('App\subCates','idsubCates','id');
    }

    public function comment(){
    	return $this->hasMany('App\comment','idBooks','id');
    }

     public function issue(){
    	return $this->hasMany('App\issue','bookid','id');
    }
     public function orderdetails(){
        return $this->hasMany('App\orderdetails','bookid','id');
    }
    public function returns(){
        return $this->hasMany('App\returns','bookid','id');
    }
}
