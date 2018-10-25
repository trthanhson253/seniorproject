<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subCates extends Model
{
    protected $table="subCates";
    public function cates(){
    	return $this->belongsTo('App\cates','idCates','id');
    }
    public function books(){
    	return $this->hasMany('App\books','idsubCates','id');
    }
}
