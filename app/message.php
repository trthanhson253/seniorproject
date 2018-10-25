<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{
	protected $table="message";
    public function student(){
        return $this->belongsTo('App\student','idStudent','id');
  }
  public function user(){
        return $this->belongsTo('App\user','idUser','id');
  }
}
