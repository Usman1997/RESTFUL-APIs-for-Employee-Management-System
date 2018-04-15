<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
   public function designations(){
       return $this->hasMany('App\Designation','dept_id');
   }

   public function employees(){
       return $this->hasMany('App\Employees');
   }
}
