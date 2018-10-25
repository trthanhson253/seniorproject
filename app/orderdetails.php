<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderdetails extends Model
{
	protected $table="orderdetails";
    public function orders(){
        return $this->belongsTo('App\orders','orderid','id');
  	}
  	public function books(){
        return $this->belongsTo('App\books','bookid','id');
  	}
}
