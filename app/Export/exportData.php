<?php
namespace App\Export;
use App\Models\Etudiant;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;

class exportData implements FromCollection, WithHeadings{

  public function collection(){
    //return Etudiant::all();
    #dd(request()->input());
    //dd(request()->input());
    $resultat=DB::table('etudiants')
              ->select('etudiants.id','etudiants.nom','etudiants.prenom','etudiants.mailPerso','promotions.nomPromo','voies.nomVoie')//, 'missions.thematique', 'entreprises.nom as nomEntreprise')
              ->leftJoin('annee_universitaires','etudiants.id','=','annee_universitaires.idEtu')
              ->leftJoin('voies','voies.id','=','annee_universitaires.idVoie')
             // ->join('missions','missions.idEtu','=','etudiants.id')
              //->join('entreprises','entreprises.id','=','missions.idEntreprise')
              ->leftJoin('promotions','promotions.id','=','annee_universitaires.idPromotion')
              ->where('voies.nomVoie',request()->input('voieExport'))
              ->where('promotions.nomPromo', request()->input('promotionExport'))
              ->distinct()
              ->get();

    return $resultat;
  }

  public function headings():array{
    return[
      'id',
      'nom',
      'prenom',
      'mail',
      'promotion',
      'voie',
      // 'mission',
      // 'entreprise'
    ];
  }

}
?>
