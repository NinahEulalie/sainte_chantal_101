@extends('layouts.app')

@section('content')
<h2 class="mb-4">Liste des Années Scolaires</h2>

<div class="student-group-form">
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Rechercher par nom ...">
            </div>
        </div>
        <div class="col-lg-2">
            <div class="search-student-btn">
                <button type="btn" class="btn btn-primary">Rechercher
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </div>
    </div>
</div> <br><br>

<div class="col-lg-2">
    <div class="search-student-btn">
        <a href="{{ route('anneescolaires.create') }}" class="btn btn-primary">+ Nouvelle année</a>
    </div>
</div> <br>

<div class="table-responsive">
    <table
        class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
        <thead class="student-thread">
            <tr>
                <th>Nom de l'année</th>
                <th>Date de début</th>
                <th>Date de fin</th>
                <th>Statut</th>
                <th class="text-end">Action</th>
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
            <td class="text-end">
                <div class="actions">
                    <a href="{{ route('anneescolaires.show', $annee->id_annee) }}" class="btn btn-info btn-sm">Voir</a>
                    <a href="{{ route('anneescolaires.edit', $annee->id_annee) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('anneescolaires.destroy', $annee->id_annee) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
