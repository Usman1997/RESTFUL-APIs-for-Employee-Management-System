<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
 public function departments(){
     return $this->belongsTo('App\Department');
 }
  public function employees(){
      return $this->hasOne('App\Employee');
  }
}
