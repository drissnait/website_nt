@extends('layouts.base')

@section('title', 'Etudiant : ' . $e->prenom . ' ' . $e->nom)

@section('content')
    <h1 class="mb-3">{{$e->prenom}} {{$e->nom}}</h1>
    <a class="btn btn-success" href="{{ url('/etudiant/' . $e->id . '/modify') }}">Modifier</a>
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#suppressionModal">
        Supprimer
    </button>

<div class="cotainer mt-4">
    <hr>
    <div class="row mt-4">
        <div class="col-sm border-right">
            <div>
                <span class="font-weight-bold">Numéro étudiant :</span> {{$e->id}}
            </div>
            <div>
                <span class="font-weight-bold">Nom :</span>
                @if ($e->nom != null)
                    {{$e->nom}}
                @endif
            </div>
            <div>
                <span class="font-weight-bold">Prénom :</span> {{$e->prenom}}
            </div>
            <div>
                <span class="font-weight-bold">Téléphone :</span>
                @if ($e->telephone != null)
                    {{$e->telephone}}
                @else
                    <span class="font-italic">Non renseigné</span>
                @endif
            </div>
            <div>
                <span class="font-weight-bold">Date de naissance :</span>
                @if ($e->dateNaiss != null)
                    {{$e->dateNaiss}}
                @else
                    <span class="font-italic">Non renseigné</span>
                @endif
            </div>
            <div>
                <span class="font-weight-bold">Mail Perso :</span>
                @if ($e->mailPerso != null)
                    {{$e->mailPerso}}
                @else
                    <span class="font-italic">Non renseigné</span>
                @endif
            </div>
            <div>
                <span class="font-weight-bold">Mail Université :</span>
                @if ($e->mailUniv != null)
                    {{$e->mailUniv}}
                @else
                    <span class="font-italic">Non renseigné</span>
                @endif
            </div>
            <div>
                <span class="font-weight-bold">Mail Pro :</span>
                @if ($e->mailPro != null)
                    {{$e->mailPro}}
                @else
                    <span class="font-italic">Non renseigné</span>
                @endif
            </div>
            <div>
                <span class="font-weight-bold">Adresse :</span>
                @if ($e->adresse != null)
                    {{$e->adresse}}
                @else
                    <span class="font-italic">Non renseigné</span>
                @endif
            </div>
        </div>
        <div class="col-sm border-left">
            @foreach ($au as $annee)
                <div class="mb-4">
                    <span class="font-weight-bold h4">{{ $annee->nomAnnee }}</span>
                    <div>
                        <span class="font-weight-bold">Promotion :</span> {{ $annee->nomPromo }} {{ $annee->nomVoie }}
                    </div>
                    <div>
                        <span class="font-weight-bold">Résultat :</span> {{ $annee->nomResultat }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="modal fade" id="suppressionModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog" role="document">
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

<div class="mt-5">
    <h3>Missions</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Type</th>
                <th scope="col">Entreprise</th>
                <th scope="col">Thématique</th>
                <th scope="col">Date de début</th>
                <th scope="col">Date de fin</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($missions as $mission)
                <tr>
                    <th score="row">{{ $mission->nomType }}</th>
                    <td>{{ $mission->nomEntreprise }}</td>
                    <td>{{ $mission->thematique }}</td>
                    <td>{{ date( 'd/m/Y', strtotime($mission->dateEntree)) }}</td>
                    <td>
                        @if($mission->dateSortie != null)
                            {{ date( 'd/m/Y', strtotime($mission->dateSortie)) }}
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-primary" href='{{ url("/modifyMission/$mission->id") }}' role="button">PLUS</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection
