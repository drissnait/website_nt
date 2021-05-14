<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    public function entreprise(){
        return $this->hasOne('App\Models\Entreprise');
    }

    public function missions(){
        return $this->hasMany('App\Models\Mission');
    }
}
