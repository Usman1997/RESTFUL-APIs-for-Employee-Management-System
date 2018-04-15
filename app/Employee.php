<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function departments(){
        return $this->belongsTo('App\Department');
    }

    public function designations(){
        return $this->belongsTo('App\Designation');
    }

    
    
}
