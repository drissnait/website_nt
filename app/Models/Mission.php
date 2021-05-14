<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mission extends Model
{
    public function etudiant(){
        return $this->belongsTo('App\Models\Etudiant', 'idEtu');
    }

    public function manager(){
        return $this->hasOne('App\Models\Manager');
    }

    public function entreprise(){
        return $this->hasOne('App\Models\Entreprise');
    }

    public function typeMission(){
        return $this->hasOne('App\Models\TypeMission');
    }

    protected $attributes=[
      'idManager'=>NULL,
    ];

    protected $guarded=[];

    public static function getMissionForEtudiant($idEtudiant){

        $query = DB::table('missions')
            ->select(
                'missions.id',
                'missions.thematique',
                'missions.description',
                'missions.thematique',
                'missions.dateEntree',
                'missions.dateSortie',
                'managers.nom as nomManager',
                'entreprises.nom as nomEntreprise',
                'type_missions.libelle as nomType',
                )
            ->leftJoin('managers', 'missions.idManager', 'managers.id')
            ->leftJoin('entreprises', 'missions.idEntreprise', 'entreprises.id')
            ->leftJoin('type_missions', 'missions.idType', 'type_missions.id')
            ->leftJoin('etudiants', 'missions.idEtu', 'etudiants.id')
            ->orderBy('missions.dateEntree', 'asc');

            return $query->get();
    }

    public static function getMission($id){
        $query = DB::table('missions')
            ->select(
                'missions.id',
                'missions.thematique',
                'missions.description',
                'missions.thematique',
                'missions.dateEntree',
                'missions.dateSortie',
                'managers.nom as nomManager',
                'entreprises.nom as nomEntreprise',
                'type_missions.libelle as nomType',
                'etudiants.nom as nomEtud',
                'etudiants.prenom as prenomEtud',
                )
            ->leftJoin('managers', 'missions.idManager', 'managers.id')
            ->leftJoin('entreprises', 'missions.idEntreprise', 'entreprises.id')
            ->leftJoin('type_missions', 'missions.idType', 'type_missions.id')
            ->leftJoin('etudiants', 'missions.idEtu', 'etudiants.id')
            ->where('missions.id', $id)
            ->orderBy('missions.dateEntree', 'asc');

            return $query->first();
    }

}
