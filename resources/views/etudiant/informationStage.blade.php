@extends('layouts.base')

@section('title', 'Informations Stage')

@section('content')

    <h1>Informations sur le stage</h1>

    <form action="/public/informationStage" method="POST">
        @csrf

        <div class="form-group">
            <label for="idEtudiant">Identifiant</label>
            <input name="idEtudiant" type="text" class="form-control" placeholder="Entrer votre numéro d'étudiant" id="idEtudiant">
        </div>

        <div class="form-group">
            <label for="nomEntreprise">Nom Entreprise</label>
            <input name="nomEntreprise" type="text" class="form-control" placeholder="Entrer le nom de l'entreprise" id="nomEntreprise">
        </div>

        <div class="form-group">
            <label for="telEntreprise">Téléphone Entreprise</label>
            <input name="telEntreprise" type="text" class="form-control" placeholder="Entrer le num de téléphone de l'entreprise" id="telEntreprise">
        </div>

        <div class="form-group">
            <label for="adresseEntreprise">Adresse Entreprise</label>
            <input name="adresseEntreprise" type="text" class="form-control" placeholder="Entrer l'adresse de l'entreprise" id="adresseEntreprise">
        </div>

        <div class="form-group">
            <label for="nomMaitreDeStage">Nom MDS</label>
            <input name="nomMaitreDeStage" type="text" class="form-control" placeholder="Entrer le nom de votre maitre de stage" id="nomMaitreDeStage">
        </div>

        <div class="form-group">
            <label for="prenomMaitreDeStage">Prénom MDS</label>
            <input name="prenomMaitreDeStage" type="text" class="form-control" placeholder="Entrer le prénom de votre maitre de stage" id="prenomMaitreDeStage">
        </div>

        <div class="form-group">
            <label for="telephoneMaitreDeStage">Numéro de téléphone MDS</label>
            <input name="telephoneMaitreDeStage" type="text" class="form-control" placeholder="Entrer numéro de téléphone de votre maitre de stage" id="telephoneMaitreDeStage">
        </div>

        <div class="form-group">
            <label for="mailProMaitreDeStage">Adresse email professionnel MDS</label>
            <input name="mailProMaitreDeStage" type="email" class="form-control" placeholder="Entrer l'adresse email de votre maitre de stage" id="mailProMaitreDeStage">
        </div>

        <div class="form-group">
            <label for="thematique">Thématique de stage</label>
            <input name="thematique" type="text" class="form-control" placeholder="Entrer la thématique de votre mission" id="thematique">
        </div>

        <div class="form-group">
            <label for="dateEntree">Date de début du stage</label>
            <input name="dateEntree" type="date" class="form-control" placeholder="Entrer la date de début de votre stage" id="dateSortie">
        </div>

        <div class="form-group">
            <label for="dateSortie">Date de fin du stage</label>
            <input name="dateSortie" type="date" class="form-control" placeholder="Entrer la date de fin de votre stage" id="dateFinStage">
        </div>

        <div class="form-group">
            <label for="descriptionStage">Description</label>
            <textarea name="descriptionStage" type="text" class="form-control" placeholder="Description de votre stage" rows="3" id="descriptionStage"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
@endsection
