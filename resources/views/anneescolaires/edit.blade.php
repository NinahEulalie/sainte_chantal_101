@extends('layouts.app')

@section('content')
<h2>Modifier Année</h2>

<form action="{{ route('anneescolaires.update', $annee->id_annee) }}" method="POST" class="card p-4 shadow-sm">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-12 mb-3">
            <label>Nom de l'année scolaire *</label>
            <input type="text" name="nom_annee" placeholder="ex: Année scolaire 2025-2026" class="form-control"
                value="{{ old('nom_annee', $annee->nom_annee ?? '') }}" required>
        </div>

        <div class="col-md-6 mb-3">
            <label>Date de début d'année scolaire</label>
            <input type="date" name="date_debut" class="form-control"
                value="{{ old('date_debut', isset($annee) ? $annee->date_debut : '') }}" required>
        </div>

        <div class="col-md-6 mb-3">
            <label>Date de fin d'année scolaire</label>
            <input type="date" name="date_fin" class="form-control"
                value="{{ old('date_fin', isset($annee) ? $annee->date_fin : '') }}" required>
        </div>

        <div class="col-md-6 mb-3">
            <input type="checkbox" name="active" class="form-check-input" value="1"
                {{ old('active', $annee->active ?? false) ? 'checked' : '' }}>
            <label class="form-check-label">Année active</label>
        </div>
    </div>

    <button class="btn btn-primary">Mettre à jour</button>
</form>
@endsection
