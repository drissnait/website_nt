@extends('layouts.base')

@section('title', 'Modifier la séléction')

@section('content')

<form action="etudiantMultipleModifyStore" method="post">
    @csrf
    @foreach($etudiantsAModifier as $etudiant)
        <input type="hidden" name="etudiants[]" value="{{$etudiant}}">
    @endforeach
    <div class="form-group row">
        <label class="col-sm-2 col-form-label font-weight-bold">Promotion</label>
        <div class="col-sm-10">
            <select name="promotion" class="form-control">
                @foreach($promotions as $promotion)
                    <option value="{{ $promotion->id }}">{{ $promotion->nomPromo }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label font-weight-bold">Voie</label>
        <div class="col-sm-10">
            <select name="voie" class="form-control">
                @foreach($voies as $voie)
                    <option value="{{ $voie->id }}">{{$voie->nomVoie}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label font-weight-bold">Année</label>
        <div class="col-sm-10">
            <select name="annee" class="form-control">
                @foreach($annees as $annee)
                    <option value="{{ $annee->id }}">{{$annee->nomAnnee}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label font-weight-bold">Résultat</label>
        <div class="col-sm-10">
            <select name="resultat" class="form-control">
                @foreach($resultats as $resultat)
                    <option value="{{ $resultat->id }}">{{$resultat->nomResultat}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <button type="submit" class="btn btn-primary" name="button">Valider</button>
</form>


@endsection
