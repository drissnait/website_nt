@extends('layouts.base')

@section('title', 'Modifier étudiant : '  . $e->prenom . ' ' . $e->nom)

@section('content')

@error('mailPerso')
{{$message}}
@enderror

    <h1>Modifier étudiant</h1>
    <hr>
    <h2 class="mb-3"> {{ $e->prenom }} {{ $e->nom }}</h2>

    <form action="/public/etudiant/modifyStore" method="POST">
        @csrf

        <div class="form-group row">
            <label class="col-sm-2 col-form-label font-weight-bold">Numéro étudiant</label>
            <div class="col-sm-10">
                <input name="id" type="text" readonly class="form-control-plaintext" value="{{$e->id}}">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label font-weight-bold">Nom</label>
            <div class="col-sm-10">
                <input name="nom" type="text" class="form-control @error('nom') is-invalid @enderror" value="{{$e->nom}}">
                @error('nom')
                    <div class="invalid-feedback">
                        Le nom est invalide.
                    </div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label font-weight-bold">Prénom</label>
            <div class="col-sm-10">
                <input name="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" value="{{$e->prenom}}">
                @error('prenom')
                    <div class="invalid-feedback">
                        Le prénom est invalide.
                    </div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label font-weight-bold">Date de naissance</label>
            <div class="col-sm-10">
                <input name="dateNaiss" type="date" class="form-control @error('dateNaiss') is-invalid @enderror" value="{{$e->dateNaiss}}">
                @error('dateNaiss')
                    <div class="invalid-feedback">
                        La date de naissance est invalide.
                    </div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label font-weight-bold">Numéro de téléphone</label>
            <div class="col-sm-10">
                <input name="telephone" type="text" class="form-control @error('telephone') is-invalid @enderror" value="{{$e->telephone}}">
                @error('telephone')
                    <div class="invalid-feedback">
                        Le numéro de téléphone est invalide.
                    </div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label font-weight-bold">Adresse email</label>
            <div class="col-sm-10">
                <input name="mailPerso" type="email" class="form-control" value="{{$e->mailPerso}}">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label font-weight-bold">Adresse email de l'université</label>
            <div class="col-sm-10">
                <input name="mailUniv" type="email" class="form-control" value="{{$e->mailUniv}}">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label font-weight-bold">Adresse email professionnel</label>
            <div class="col-sm-10">
                <input name="mailPro" type="email" class="form-control" value="{{$e->mailPro}}">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label font-weight-bold">Adresse</label>
            <div class="col-sm-10">
                <input name="adresse" type="text" class="form-control" value="{{$e->adresse}}">
            </div>
        </div>

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

        <button type="submit" class="btn btn-success btn-lg btn-block mt-4 mb-5">Valider</button>
    </form>
@endsection
