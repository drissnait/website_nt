<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voie extends Model
{
    public function anneesUniversitaire(){
        return $this->hasMany('App\Models\AnneeUniversitaire');
    }
}
