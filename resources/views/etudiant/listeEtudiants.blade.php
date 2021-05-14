@extends('layouts.base')

@section('title', 'Liste étudiants')

@section('content')

<button class="btn btn-primary btn-block mt-3 mb-5" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="true" aria-controls="collapseExample">
  Afficher/Cacher les filtres
</button>

<div class="container collapse show" id="collapseExample">
    <div class="row">
        <div class="col border-right">
            <h2 class="mb-3">Filtre multiple</h2>
            <form class="form">
                <input type="hidden" name="filterType" value="2">

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label font-weight-bold">Nom</label>
                    <div class="col-sm-10">
                        <input name="nom" type="text" class="form-control" placeholder="Entrer le nom">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label font-weight-bold">Prénom</label>
                    <div class="col-sm-10">
                        <input name="prenom" type="text" class="form-control" placeholder="Entrer le prénom">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label font-weight-bold">Promotion</label>
                    <div class="col-sm-10">
                        <select name="promotion" class="form-control">
                            <option value="">Choisir la promotion</option>
                            @foreach($promotions as $promotion)
                                <option value="{{ $promotion->id }}">{{ $promotion->nomPromo }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label font-weight-bold">Voies</label>
                    <div class="col-sm-10">
                        <select name="voie" class="form-control">
                            <option value="">Choisir la voie</option>
                            @foreach($voies as $voie)
                                <option value="{{ $voie->id }}">{{ $voie->nomVoie }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-success btn-block mb-2">Filtrer</button>
            </form>
        </div>
        <div class="col border-left">
            <h2 class="mb-3">Filtre par numéro étudiant</h2>
            <form class="form">
                <input type="hidden" name="filterType" value="1">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label font-weight-bold">Numéro étudiant</label>
                    <div class="col-sm-10">
                        <input name="id" type="text" class="form-control" placeholder="Entrer le numéro étudiant">
                    </div>
                </div>
                <button type="submit" class="btn btn-success mb-2 btn-block">Filtrer</button>
            </form>
        </div>
    </div>
</div>




<form action="index.html" method="post">
    @csrf
    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">
                    <input type="checkbox" id="checkAll">
                </th>
                <th scope="col">Numéro étudiant</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($etudiants as $e)
                <tr>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" name="{{ $e->id }}">
                        </div>
                    </td>
                    <th score="row">{{ $e->id }}</th>
                    <td>{{$e->nom}}</td>
                    <td>{{$e->prenom}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ url("/etudiant/$e->id") }}" role="button">Profil</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#suppressionModal{{$e->id}}">
                            Supprimer
                        </button>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="container">
        <div class="row">
            <div class="col">
                <button class="btn btn-success btn-block" formaction="{{ url('etudiantModifySelection') }}"
                    formmethod="get" type="submit" name="button">Modifier la sélection</button>
            </div>
            <div class="col">
                <button class="btn btn-dark btn-block" formaction="{{ url('etudiantDeleteSelection') }}"
                    type="submit" name="button">Supprimer la sélection</button>
            </div>
        </div>
    </div>
</form>

<a href = "{{URL::to('deleteAll')}}"  class="btn btn-danger btn-block" >Supprimer tous les étudiants</a><br>

@foreach($etudiants as $e)
<div class="modal fade" id="suppressionModal{{$e->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer cet étudiant ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <a class="btn btn-danger" href="{{ url("/etudiant/$e->id/delete") }}">Supprimer</a>
            </div>
        </div>
    </div>
</div>
@endforeach
<script type="text/javascript">
$('#checkAll').click(function () {
    $('input:checkbox').prop('checked', this.checked);
});
</script>
@endsection
