@extends('layouts.base')

@section('title', 'Informations Carriere Professionnelle')

@section('content')

    <h1>Informations sur la carrière professionnelle</h1>

    <form action="/public/informationCarriereProfessionnelle" method="POST">
        @csrf

        <div class="form-group">
            <label for="idEtudiant">Identifiant</label>
            <input name="idEtudiant" type="text" class="form-control" placeholder="Entrer votre ancien numéro d'étudiant" id="idEtudiant">
        </div>

        <div class="form-group">
            <label for="nomEntreprise">Nom Entreprise</label>
            <input name="nomEntreprise" type="text" class="form-control" placeholder="Entrer le nom de l'entreprise" id="nomEntreprise">
        </div>

        <div class="form-group">
            <label for="telEntreprise">Téléphone Entreprise</label>
            <input name="telEntreprise" type="text" class="form-control" placeholder="Entrer le num de téléphone de l'entreprise" id="telEntreprise">
            @error('telEntreprise')
              <div class="invalid-feedback">
                Le numéro de télephone est invalide.
              </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="adresseEntreprise">Adresse Entreprise</label>
            <input name="adresseEntreprise" type="text" class="form-control" placeholder="Entrer l'adresse de l'entreprise" id="adresseEntreprise">
        </div>

        <div class="form-group">
            <label for="mission">Mission</label>
            <input name="mission" type="text" class="form-control" placeholder="Entrer votre mission principale" id="mission">
        </div>

        <div class="form-group">
            <label for="dateEntree">Date de début du contrat</label>
            <input name="dateEntree" type="date" class="form-control" placeholder="Entrer la date de début de votre mission" id="dateSortie">
        </div>

        <div class="form-group">
            <label for="descriptionMission">Description</label>
            <textarea name="descriptionMission" type="text" class="form-control" placeholder="Description de votre mission" rows="3" id="descriptionMission"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
@endsection
