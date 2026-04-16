@extends('layouts.app')

@section('content')
<h2>Modifier Parent</h2>

<form action="{{ route('parents.update', $parent->id_parent) }}" method="POST" class="card p-4 shadow-sm">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-12 mb-3">
            <label>Matricule *</label>
            <input type="text" name="matricule_parent" value="{{ $parent->matricule_parent }}" class="form-control" required>
        </div>

        <div class="col-md-6 mb-3">
            <label>Nom du Père</label>
            <input type="text" name="nom_pere" value="{{ $parent->nom_pere }}" class="form-control">
        </div>
        <div class="col-md-6 mb-3">
            <label>Profession du Père</label>
            <input type="text" name="profession_pere" value="{{ $parent->profession_pere }}" class="form-control">
        </div>

        <div class="col-md-6 mb-3">
            <label>Nom de la Mère</label>
            <input type="text" name="nom_mere" value="{{ $parent->nom_mere }}" class="form-control">
        </div>
        <div class="col-md-6 mb-3">
            <label>Profession de la Mère</label>
            <input type="text" name="profession_mere" value="{{ $parent->profession_mere }}" class="form-control">
        </div>

        <div class="col-md-6 mb-3">
            <label>Téléphone</label>
            <input type="text" name="telephone" value="{{ $parent->telephone }}" class="form-control">
        </div>
        <div class="col-md-6 mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ $parent->email }}" class="form-control">
        </div>

        <div class="col-12 mb-3">
            <label>Adresse</label>
            <textarea name="adresse_parent" class="form-control">{{ $parent->adresse_parent }}</textarea>
        </div>
    </div>

    <button class="btn btn-primary">Mettre à jour</button>
</form>
@endsection
