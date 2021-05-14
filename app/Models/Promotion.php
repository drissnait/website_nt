<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    public function anneesUniversitaire(){
        return $this->hasMany('App\Models\AnneeUniversitaire');
    }
}
