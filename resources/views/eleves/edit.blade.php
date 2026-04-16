@extends('layouts.app')

@section('content')

<h3 class="mb-4">Modifier l’élève</h3>

<form action="{{ route('eleves.update', $eleve->id_eleve) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Matricule</label>
        <input type="text" name="matricule" class="form-control"
               value="{{ old('matricule', $eleve->matricule) }}" required>
    </div>

    <div class="mb-3">
        <label>Nom</label>
        <input type="text" name="nom" class="form-control"
               value="{{ old('nom', $eleve->nom) }}" required>
    </div>

    <div class="mb-3">
        <label>Prénom</label>
        <input type="text" name="prenom" class="form-control"
               value="{{ old('prenom', $eleve->prenom) }}" required>
    </div>

    <div class="mb-3">
        <label>Date de naissance</label>
        <input type="date" name="date_nais" class="form-control"
               value="{{ old('date_nais', $eleve->date_nais) }}" required>
    </div>

    <div class="mb-3">
        <label>Lieu de naissance</label>
        <input type="text" name="lieu_nais" class="form-control"
               value="{{ old('lieu_nais', $eleve->lieu_nais) }}" required>
    </div>

    <div class="mb-3">
        <label>Genre</label>
        <select name="genre" class="form-control" required>
            <option value="Masculin" {{ $eleve->genre == 'Masculin' ? 'selected' : '' }}>Masculin</option>
            <option value="Féminin" {{ $eleve->genre == 'Féminin' ? 'selected' : '' }}>Féminin</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Parent</label>
        <select name="parent_id" class="form-control">
            <option value="">-- Choisir un parent --</option>
            @foreach($parents as $parent)
                <option value="{{ $parent->id }}"
                    {{ $eleve->parent_id == $parent->id ? 'selected' : '' }}>
                    {{ $parent->matricule_parent }} - {{ $parent->nom_pere }}
                </option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-success">Mettre à jour</button>
    <a href="{{ route('eleves.index') }}" class="btn btn-secondary">Annuler</a>
</form>

@endsection
