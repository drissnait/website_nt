@extends('layouts.base')

@section('title', 'Modifier mission')

@section('content')

    <h1>Modifier Mission</h1>
    <hr>
    <form action="{{url('missionModifyStore')}}" method="POST">
        @csrf

        <input type="hidden" name="id" value="{{ $mission->id }}">

        <div class="form-group row">
            <label class="col-sm-2 col-form-label font-weight-bold">Etudiant</label>
            <div class="col-sm-10">
                <input readonly class="form-control" type="text" value="{{ $mission->prenomEtud }} {{ $mission->nomEtud }}">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label font-weight-bold">Etudiant</label>
            <div class="col-sm-10">
                <input readonly class="form-control" type="text" value="{{ $mission->prenomEtud }} {{ $mission->nomEtud }}">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label font-weight-bold">Entreprise</label>
            <div class="col-sm-10">
                <input readonly class="form-control" type="text" value="{{ $mission->nomEntreprise }}">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label font-weight-bold">Manager</label>
            <div class="col-sm-10">
                <input readonly class="form-control" type="text" value="{{ $mission->nomManager }}">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label font-weight-bold">Thématique</label>
            <div class="col-sm-10">
                <input name="thematique" class="form-control" type="text" value="{{$mission->thematique}}">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label font-weight-bold">Description</label>
            <div class="col-sm-10">
                <textarea name="description" class="form-control" type="text" rows="4">{{$mission->description}}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label font-weight-bold">Date de début</label>
            <div class="col-sm-10">
                <input name="dateEntree" class="form-control" type="date" value="{{$mission->dateEntree}}">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label font-weight-bold">Date de fin</label>
            <div class="col-sm-10">
                <input name="dateSortie" class="form-control" type="date" value="{{$mission->dateSortie}}">
            </div>
        </div>

        <button type="submit" class="btn btn-success btn-lg btn-block mt-4 mb-5">Modifier</button>
    </form>
@endsection
