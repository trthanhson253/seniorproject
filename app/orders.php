<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
	protected $table="orders";
    public function students(){
        return $this->belongsTo('App\student','studentid','id');
  }
  public function orderdetails(){
        return $this->hasMany('App\orderdetails','orderid','id');
  }
}
