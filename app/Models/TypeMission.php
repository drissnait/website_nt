<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeMission extends Model
{
    public function missions(){
        return $this->hasMany('App\Models\Mission');
    }
}
