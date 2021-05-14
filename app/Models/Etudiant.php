<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Etudiant extends Model
{

    protected $fillable = [
        'id',
        'nom',
        'prenom',
        'dateNaiss',
        'telephone',
        'mailPerso',
        'mailUniv',
        'mailPro',
        'adresse',
        'mailPerso',

    ];

    protected $guarded = [];

    public function missions(){
        return $this->hasMany('App\Models\Mission', 'idEtu');
    }

    public function anneesUniversitaire(){
        return $this->hasMany('App\Models\AnneeUniversitaire', 'idEtu');
    }

    public static function getEtudiantByFilter($nom, $prenom, $promotion, $voie){
        $query =  DB::table('etudiants')
            ->leftJoin('annee_universitaires', 'etudiants.id', 'annee_universitaires.idEtu')
            ->leftJoin('resultats', 'resultats.id', 'annee_universitaires.idResultat')
            ->select('etudiants.*')
            ->where('nom', 'like', $nom . '%')
            ->where('prenom', 'like', $prenom . '%');

        if($promotion != null){
            $query->where('idPromotion', $promotion)
                ->where('nomResultat', 'En cours');
        }
        if($voie != null){
            $query->where('idVoie', $voie)
                ->where('nomResultat', 'En cours');
        }

        return $query->distinct();
    }

    public static function deleteEtudiant($id){
        DB::table('etudiants')->where('id', $id)->delete();
    }
}
