<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cates extends Model
{
    protected $table="cates";

    public function subCates(){

    	return $this->hasMany('App\subCates','idCates','id');
    }

    public function books(){

    	return $this->hasManyThrough('App\books','App\subCates','idCates','idsubCates','id');
    }
}
