@extends('layouts.app')

@section('content')
<h2>Détails Annéé</h2>

<div class="card p-4 shadow-sm">
    <p><strong>Nom de l'année :</strong> {{ $annee->nom_annee }}</p>

    <p><strong>Date de début :</strong>
        {{ \Carbon\Carbon::parse($annee->date_debut)->format('d/m/Y') }}
    </p>

    <p><strong>Date de fin :</strong>
        {{ \Carbon\Carbon::parse($annee->date_fin)->format('d/m/Y') }}
    </p>

    <p><strong>Statut :</strong>
        @if($annee->active)
            <span class="badge bg-success">Année active</span>
        @else
            <span class="badge bg-secondary">Année inactive</span>
        @endif
    </p>

    <a href="{{ route('anneescolaires.index') }}" class="btn btn-secondary">Retour</a>
</div>
@endsection
