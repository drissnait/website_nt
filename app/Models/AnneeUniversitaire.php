<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AnneeUniversitaire extends Model
{

    protected $attributes = [
        'idAnnee' => 1,
        'idResultat' => 1,
    ];

    protected $fillable = [
        'id',
        'idEtu',
        'idPromotion',
        'idVoie',
        'idAnnee',
        'idResultat'
    ];

    public function etudiant(){
        return $this->belongsTo('App\Models\Etudiant', 'idEtu');
    }

    public function promotion(){
        return $this->hasOne('App\Models\Promotion');
    }

    public function voie(){
        return $this->hasOne('App\Models\Voie');
    }

    public function annee(){
        return $this->hasOne('App\Models\Annee');
    }

    public function resultat(){
        return $this->hasOne('App\Models\Resultat');
    }

    public static function getAnneesUPourEtud($id){
        return DB::table('annee_universitaires')
            ->join('promotions', 'annee_universitaires.idPromotion', '=', 'promotions.id')
            ->join('voies', 'annee_universitaires.idVoie', '=', 'voies.id')
            ->join('annees', 'annee_universitaires.idAnnee', '=', 'annees.id')
            ->join('resultats', 'annee_universitaires.idResultat', '=', 'resultats.id')
            ->where('idEtu', $id)
            ->get();
    }

    public static function insertNewAU($idEtu, $idPromotion, $idVoie, $idAnnee, $idResultat){
        return DB::table('annee_universitaires')->insert([
            'idEtu' => $idEtu,
            'idPromotion' => $idPromotion,
            'idVoie' => $idVoie,
            'idAnnee' => $idAnnee,
            'idResultat' => $idResultat
        ]);
    }

}
