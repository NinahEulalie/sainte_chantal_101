@extends('layouts.app')

@section('content')
<h2>Ajouter un élève</h2>

<form action="{{ route('eleves.store') }}" method="POST" class="card p-4 shadow-sm">
    @csrf

    <div class="row">
        <div class="col-12 mb-3">
            <label>Matricule de l'élève *</label>
            <input type="text" name="matricule" class="form-control" required>
        </div>

        <div class="col-md-6 mb-3">
            <label>Nom de l'élève *</label>
            <input type="text" name="nom" class="form-control" required>
        </div>
        <div class="col-md-6 mb-3">
            <label>Prénom de l'élève *</label>
            <input type="text" name="prenom" class="form-control" required>
        </div>

        <div class="col-md-6 mb-3">
            <label>Date de naissance *</label>
            <input type="date" name="date_nais" class="form-control"
                value="{{ old('date_nais', isset($eleve) ? $eleve->date_nais : '') }}" required>
        </div>
        <div class="col-md-6 mb-3">
            <label>Lieu de naissance *</label>
            <input type="text" name="lieu_nais" class="form-control" required>
        </div>

        <div class="col-md-6 mb-3">
            <label>Adresse *</label>
            <input type="text" name="adresse" class="form-control" required>
        </div>

        <div class="col-md-6 mb-3">
            <label>Genre *</label>
            <select name="genre" class="form-select" required>
                <option value="">-- Choisir un genre --</option>

                <option value="Masculin"
                    {{ old('genre', $eleve->genre ?? '') == 'Masculin' ? 'selected' : '' }}>
                    Masculin
                </option>

                <option value="Féminin"
                    {{ old('genre', $eleve->genre ?? '') == 'Féminin' ? 'selected' : '' }}>
                    Féminin
                </option>
            </select>
        </div>

        <div class="col-md-6 mb-3">
            <label>Année d'entrée à l'école *</label>
            <input type="text" name="annee_scolaire_entree" placeholder="ex: Année scolaire 2018_2019" class="form-control" required>
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Parent *</label>
            <select name="id_parent" class="form-select" required>
                <option value="">-- Sélectionner un parent --</option>

                @foreach ($parents as $parent)
                    <option value="{{ $parent->id_parent }}"
                        {{ old('id_parent') == $parent->id_parent ? 'selected' : '' }}>
                        {{ $parent->matricule_parent }} — {{ $parent->nom_pere }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <button class="btn btn-success">Enregistrer</button>
</form>
@endsection
