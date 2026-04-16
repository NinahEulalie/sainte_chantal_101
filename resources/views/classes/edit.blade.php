@extends('layouts.app')

@section('content')
<h2>Modifier la classe</h2>

<form action="{{ route('classes.update', $classe->id_classe) }}" method="POST" class="card p-4 shadow-sm">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-12 mb-3">
            <label>Nom de la classe *</label>
            <input type="text" name="nom_classe" placeholder="ex: 4ème A" class="form-control"
                value="{{ old('nom_classe', $classe->nom_classe ?? '') }}" required>
        </div>

        <div class="col-md-6 mb-3">
            <label>Niveau</label>
            <select name="niveau" class="form-select" required>
                <option value="">-- Choisir un niveau --</option>

                <option value="Primaire"
                    {{ old('niveau', $classe->niveau ?? '') == 'Primaire' ? 'selected' : '' }}>
                    Primaire
                </option>

                <option value="Collège"
                    {{ old('niveau', $classe->niveau ?? '') == 'Collège' ? 'selected' : '' }}>
                    Collège
                </option>

                <option value="Lycée"
                    {{ old('niveau', $classe->niveau ?? '') == 'Lycée' ? 'selected' : '' }}>
                    Lycée
                </option>
            </select>
        </div>
    </div>

    <button class="btn btn-primary">Mettre à jour</button>
</form>
@endsection
