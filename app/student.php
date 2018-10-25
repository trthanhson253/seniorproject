<?php

namespace App;
 
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use \Illuminate\Support\Facades\Cache;

class student extends Authenticatable
{
  use Notifiable;
 
  protected $guard = 'students';
  protected $table = 'students';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'student_id','email','phone','address',
  ];
  public $timestamps = false;
  
  protected $hidden = [
      'password',
  ];

  public function issue(){
        return $this->hasMany('App\issue','studentid','id');
    }
  public function comment(){
        return $this->hasMany('App\comment','idStudent','id');
  }
  public function message(){
        return $this->hasMany('App\message','idStudent','id');
  }
   public function orders(){
        return $this->hasMany('App\orders','studentid','id');
  }
  public function returns(){
        return $this->hasMany('App\returns','studentid','id');
    }

  public function isOnline(){
        return Cache::has('user-online-'.$this->id);
    }
}