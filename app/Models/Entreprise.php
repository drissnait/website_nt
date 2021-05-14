<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    public function managers(){
        return $this->hasMany('App\Models\Manager');
    }

    public function missions(){
        return $this->hasMany('App\Models\Missions');
    }
    protected $guarded=[];
}
