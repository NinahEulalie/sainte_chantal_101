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
            <label>Effectif</label>
            <input type="text" name="effectif" class="form-control"
                value="{{ old('effectif', $classe->effectif ?? '')}}" required>
        </div>

        <div class="col-md-6 mb-3">
            <label>Niveau</label>
            <input type="dattexte" name="niveau" class="form-control"
                value="{{ old('niveau', $classe->niveau ?? '') }}" required>
        </div>
    </div>

    <button class="btn btn-primary">Mettre à jour</button>
</form>
@endsection
