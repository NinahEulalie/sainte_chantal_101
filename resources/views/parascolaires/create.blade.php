@extends('layouts.app')

@section('content')
<h2>Ajouter une activité parascolaire</h2>

<form action="{{ route('parascolaires.store') }}" method="POST" class="card p-4 shadow-sm">
    @csrf

    <div class="row">
        <div class="col-12 mb-3">
            <label>Nom de l'activité parascolaire *</label>
            <input type="text" name="activite_choisie" class="form-control"
                value="{{ old('activite_choisie', $parascolaire->activite_choisie ?? '') }}" required>
        </div>

        <div class="col-md-6 mb-3">
            <label>Frais à payer en Ariary </label>
            <input type="text" name="frais_para" class="form-control"
                value="{{ old('frais_para',  $parascolaire->frais_para ??'') }}" required>
        </div>
    </div>

    <button class="btn btn-success">Enregistrer</button>
</form>
@endsection
