<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voie;
use App\Models\Entreprise;
use App\Models\Manager;
use App\Models\Mission;
use App\Models\TypeMission;
use App\Models\Etudiant;

class MissionController extends Controller
{

  public function getDataType(){
    $types= TypeMission::all();
    return view('etudiant/informationStage', compact('types'));
  }


  public function getInformationStage(Request $request){
    $etudiant = new Etudiant;
    $etudiant->id=$request->input('idEtudiant');

    $e = new Entreprise;
    #$e->nom=1;
    $e->nom = $request->input('nomEntreprise');
    $e->telephone = $request->input('telEntreprise');
    $e->adresse = $request->input('adresseEntreprise');
    $e->save();

    $m = new Manager;
    $m->nom=$request->input('nomMaitreDeStage');
    $m->prenom=$request->input('prenomMaitreDeStage');
    $m->idEntreprise = $e->id;
    $m->mail=$request->input('mailProMaitreDeStage');
    $m->telephone=$request->input('telephoneMaitreDeStage');
    $m->save();

    $mi=new Mission;
    $mi->idEtu=$etudiant->id;
    $mi->idManager=$m->id;
    $mi->idEntreprise=$e->id;
    $mi->idType =1;
    $mi->thematique=$request->input('thematique');
    $mi->description=$request->input('descriptionStage');
    $mi->dateEntree=$request->input('dateEntree');
    $mi->dateSortie=$request->input('dateSortie');

    $mi->save();
    return view('etudiant/informationStage');
  }

  public function getInformationCarriereProfessionnelle(Request $request){

    // $e=request()->validate([
    //   'nom'=>'required',
    //   'telephone'=>'digits:10|nullable',
    //   'adresse'=>'nullable',
    // ]);
    //
    // $entreprise = Entreprise::create($e);



    $etudiant = new Etudiant;
    $etudiant->id=$request->input('idEtudiant');

    $e = new Entreprise;
    #$e->nom=1;
    $e->nom = $request->input('nomEntreprise');
    $e->telephone = $request->input('telEntreprise');
    $e->adresse = $request->input('adresseEntreprise');
    $e->save();

    $mi=new Mission;
    $mi->idEtu=$etudiant->id;
    #$mi->idManager=$m->id;
    $mi->idEntreprise=$e->id;
    $mi->idType =2;
    $mi->thematique=$request->input('mission');
    $mi->description=$request->input('descriptionMission');
    $mi->dateEntree=$request->input('dateEntree');

    $mi->save();
    return view('etudiant/informationCarriereProfessionnelle');
  }


  public function modify($id){
      //dd(Mission::getMission($id));
      $mission = Mission::getMission($id);
      return view('mission/modify', compact(
          'mission'
      ));
  }

  public function modifyStore(){
      //dd(request()->input());

      $dataMission = request()->validate([
          'id' => 'exists:missions',
          'thematique' => 'nullable',
          'description' => 'nullable',
          'dateEntree' => 'date|nullable',
          'dateSortie' => 'date|nullable',
      ]);

      $mission = Mission::find($dataMission['id']);
      $mission->update($dataMission);

      return redirect()->back();
  }


}
