<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('index');
});

Route::post('/importSave', 'EtudiantController@importFromExcel');

Route::get('import', function(){
    return view('etudiant/import');
});


Route::get('/exportData', function(){
  return view('etudiant/export');
});
Route::post('/export', 'EtudiantController@get_export')->name('export');

Route::get('/addEtudiant','EtudiantController@addEtudiant');

Route::post('/addEtudiantStore', 'EtudiantController@addEtudiantStore');

Route::get('/informationStage','MissionController@getDataType');

Route::post('/informationStage', 'MissionController@getInformationStage');

Route::get('/informationCarriereProfessionnelle',function(){
  return view('etudiant/informationCarriereProfessionnelle');
});

Route::post('/informationCarriereProfessionnelle','MissionController@getInformationCarriereProfessionnelle');

Route::get('/listeEtudiants', 'EtudiantController@listeEtudiants');
Route::get('/etudiant/{id}', 'EtudiantController@showEtudiant');
Route::get('/etudiant/{id}/modify', 'EtudiantController@modify');
Route::post('/etudiant/modifyStore', 'EtudiantController@modifyStore');
Route::get('/etudiant/{id}/delete', 'EtudiantController@delete');
Route::get('/deleteAll', 'EtudiantController@deleteAll');
Route::post('/etudiantDeleteSelection', 'EtudiantController@deleteSelection');
Route::get('/etudiantModifySelection', 'EtudiantController@modifySelection');
Route::post('/etudiantMultipleModifyStore', 'EtudiantController@multipleModifyStore');

Route::get('/modifyMission/{id}', 'MissionController@modify');
Route::post('/missionModifyStore', 'MissionController@modifyStore');
