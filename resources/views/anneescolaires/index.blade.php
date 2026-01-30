@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Liste des Années Scolaires</h2>
    <a href="{{ route('anneescolaires.create') }}" class="btn btn-primary">+ Ajouter</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>Nom de l'année</th>
            <th>Date de début</th>
            <th>Date de fin</th>
            <th>Statut</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($annees as $annee)
        <tr>
            <td>{{ $annee->nom_annee }}</td>
            <td>{{ \Carbon\Carbon::parse($annee->date_debut)->format('d/m/Y') }}</td>
            <td>{{ \Carbon\Carbon::parse($annee->date_fin)->format('d/m/Y') }}</td>
            <td>
                @if($annee->active)
                    <span class="badge bg-success">Active</span>
                @else
                    <span class="badge bg-secondary">Inactive</span>
                @endif
            </td>
            <td>
                <a href="{{ route('anneescolaires.show', $annee->id_annee) }}" class="btn btn-info btn-sm">Voir</a>
                <a href="{{ route('anneescolaires.edit', $annee->id_annee) }}" class="btn btn-warning btn-sm">Modifier</a>
                <form action="{{ route('anneescolaires.destroy', $annee->id_annee) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
