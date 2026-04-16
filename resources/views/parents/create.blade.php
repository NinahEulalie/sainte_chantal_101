@extends('layouts.app')

@section('content')
<h2>Ajouter un Parent</h2>

<form action="{{ route('parents.store') }}" method="POST" class="card p-4 shadow-sm">
    @csrf

    <div class="row">
        <div class="col-12 mb-3">
            <label>Matricule *</label>
            <input type="text" name="matricule_parent" class="form-control" required>
        </div>

        <div class="col-md-6 mb-3">
            <label>Nom du Père</label>
            <input type="text" name="nom_pere" class="form-control">
        </div>
        <div class="col-md-6 mb-3">
            <label>Profession du Père</label>
            <input type="text" name="profession_pere" class="form-control">
        </div>

        <div class="col-md-6 mb-3">
            <label>Nom de la Mère</label>
            <input type="text" name="nom_mere" class="form-control">
        </div>
        <div class="col-md-6 mb-3">
            <label>Profession de la Mère</label>
            <input type="text" name="profession_mere" class="form-control">
        </div>

        <div class="col-md-6 mb-3">
            <label>Nom du Tuteur</label>
            <input type="text" name="nom_tuteur" class="form-control">
        </div>
        <div class="col-md-6 mb-3">
            <label>Profession du Tuteur</label>
            <input type="text" name="profession_tuteur" class="form-control">
        </div>

        <div class="col-md-6 mb-3">
            <label>Téléphone *</label>
            <input type="text" name="telephone" class="form-control" required>
        </div>
        <div class="col-md-6 mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="col-12 mb-3">
            <label>Adresse *</label>
            <textarea name="adresse_parent" class="form-control" required></textarea>
        </div>
    </div>

    <button class="btn btn-success">Enregistrer</button>
</form>
@endsection
