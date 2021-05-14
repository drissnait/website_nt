<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Models\AnneeUniversitaire;
use App\Models\Annee;
use App\Models\Etudiant;
use App\Models\Promotion;
use App\Models\Voie;
use App\Models\Entreprise;
use App\Models\Manager;
use App\Models\Mission;
use App\Models\Resultat;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Export\exportData;
use Excel;


class EtudiantController extends Controller
{
    public function importFromExcel(){

        $importFile = request()->file('xlx_import')->store('public');
        $inputFileName = Storage::disk('public')->path('../' . $importFile);

        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xls');
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($inputFileName);
        $worksheet = $spreadsheet->getActiveSheet();


        $entete = ['id', 'nom', 'prenom'];
        $isIteratingEntete = true;

        foreach ($worksheet->getRowIterator() as $row) {
            if($isIteratingEntete){
                $isIteratingEntete = false;
            }
            else {
                $i = 0;
                foreach ($row->getCellIterator() as $cell) {
                    if($i < 3){
                        $etudiantData[$entete[$i]] = $cell->getValue();
                    }
                    elseif ($i == 3) {
                        $anneeUniversitaireData['idPromotion'] = DB::table('promotions')
                            ->select('id')
                            ->where('nomPromo', $cell->getValue()
                        )->first()->id;
                    }
                    elseif ($i == 4) {
                        $anneeUniversitaireData['idVoie'] = DB::table('voies')
                            ->select('id')
                            ->where('nomVoie', $cell->getValue()
                        )->first()->id;
                    }
                    $i++;
                }
                if(Etudiant::find($etudiantData['id']) == null){
                    $e = Etudiant::create($etudiantData);
                    $e->save();
                    $anneeUniversitaireData['idEtu'] = $etudiantData['id'];
                    $anneeUniversitaireData['idAnnee'] = 1;
                    $anneeUniversitaireData['idResultat'] = 1;
                    $au = AnneeUniversitaire::create($anneeUniversitaireData);
                    $au->save();
                }
            }
        }

        File::delete($inputFileName);

        return redirect('listeEtudiants');
    }
    function import(Request $request){
      $inputFileName = Storage::disk('public')->path('export.xls');
    }

    public function get_export(){
      return Excel::download(new exportData, 'export-'.request('promotionExport').'-'.request('voieExport').'.xlsx');
    }

    public function deleteAll(){
      Etudiant::truncate();
      return redirect('listeEtudiants');
    }

    public function deleteSelection(){
        foreach (request()->input() as $key => $value) {
            if($value == 'on'){
                Etudiant::deleteEtudiant($key);
            }
        }
        return redirect('listeEtudiants');
    }

    public function delete($id){
        $e = Etudiant::find($id);
        $e->delete();

        return redirect('listeEtudiants');
    }

    public function modifySelection(){
        $etudiantsAModifier = [];
        foreach (request()->input() as $key => $value) {
            if($value == 'on'){
                $etudiantsAModifier[] = $key;
            }
        }

        $annees = Annee::all();
        $promotions = Promotion::all();
        $voies = Voie::all();
        $resultats = Resultat::all();

        return view('etudiant/multipleModify', compact(
            'etudiantsAModifier',
            'annees',
            'promotions',
            'voies',
            'resultats'
        ));
    }

    public function multipleModifyStore(){
        $input = request()->input();
        foreach ($input['etudiants'] as $etudiant) {
            AnneeUniversitaire::insertNewAU($etudiant, $input['promotion'],
                $input['voie'], $input['annee'], $input['resultat']);
        }
        return redirect('listeEtudiants');
    }

    /**
    * Retourne les informations pour le formulaire d'ajout d'étudiant
    **/
    public function addEtudiant(){
        $promotions = Promotion::all();
        $voies = Voie::all();

        return view('etudiant/addEtudiant', compact(
            'promotions', 'voies'
        ));

    }

    /**
    * Ajoute un étudiant dans la base de donnée.
    **/
    public function addEtudiantStore(){

        $dataEtudiant = request()->validate([
            'id' => 'required|unique:etudiants,id|numeric',
            'nom' => 'required',
            'prenom' => 'required',
            'dateNaiss' => 'date|nullable',
            'telephone' => 'digits:10|nullable',
            'mailPerso' => 'email|nullable',
            'mailUniv' => 'email|nullable',
            'mailPro' => 'email|nullable',
            'adresse' => 'nullable'
        ]);

        Etudiant::create($dataEtudiant);

        return redirect()->back();
    }

    /**
    * Retourne la liste des étudiants.
    **/
    public function listeEtudiants(Request $req){
        $etudiants = null;
        $input = request()->input();

        $promotions = Promotion::all();
        $voies = Voie::all();

        if($input == null){
            $etudiants = Etudiant::orderBy('nom', 'asc')->get();
        }
        else if($input['filterType'] == 1){
            $etudiants = Etudiant::where('id', $input['id'])->get();
        }
        else if($input['filterType'] == 2){
            $etudiants = Etudiant::getEtudiantByFilter(
                $input['nom'],
                $input['prenom'],
                $input['promotion'],
                $input['voie']
            )
            ->orderBy('nom', 'asc')
            ->orderBy('prenom', 'asc')
            ->get();
        }

        return view('etudiant/listeEtudiants', compact(
            'etudiants',
            'promotions',
            'voies'
        ));
    }

    public function showEtudiant($id){
        $missions = Mission::getMissionForEtudiant($id);
        $e = Etudiant::where('id', $id)->with('anneesUniversitaire')->first();
        $au = AnneeUniversitaire::getAnneesUPourEtud($id);

        return view('etudiant/showEtudiant', compact(
            'e', 'au', 'missions'
        ));
    }

    public function modify($id){
        $e = Etudiant::find($id);
        $annees = AnneeUniversitaire::getAnneesUPourEtud($id);
        $promotions = Promotion::all();
        $voies = Voie::all();

        return view('etudiant/modify', compact(
            'e',
            'annees',
            'promotions',
            'voies'
        ));
    }

    public function modifyStore(){
        $dataEtudiant = request()->validate([
            'id' => 'exists:etudiants',
            'nom' => 'required',
            'prenom' => 'required',
            'dateNaiss' => 'date|nullable',
            'telephone' => 'digits:10|nullable',
            'mailPerso' => 'email|nullable',
            'mailUniv' => 'email|nullable',
            'mailPro' => 'email|nullable',
            'adresse' => 'nullable'
        ]);

        $e = Etudiant::find($dataEtudiant['id']);
        $e->update($dataEtudiant);

        return redirect()->back();
    }

}
