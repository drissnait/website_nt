@extends('layouts.base')

@section('title', 'Ajouter un étudiant')

@section('content')

<h1>Importer des étudiants</h1>
<hr>

<form action="{{ url('/importSave') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Veuillez fournir un fichier .xlx</label>
        <input type="file" name="xlx_import" class="form-control-file">
    </div>
    <button type="submit" class="btn btn-primary">Importer</button>
</form>

@endsection
