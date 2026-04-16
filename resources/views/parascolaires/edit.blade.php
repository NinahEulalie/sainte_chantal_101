@extends('layouts.app')

@section('content')
<h2>Modifier l'activité parascolaire</h2>

<form action="{{ route('parascolaires.update', $parascolaire->id_para) }}" method="POST" class="card p-4 shadow-sm">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-12 mb-3">
            <label>Nom de l'activité parascolaire *</label>
            <input type="text" name="activite_choisie" class="form-control"
                value="{{ old('activite_choisie', $parascolaire->activite_choisie ?? '') }}" required>
        </div>

        <div class="col-md-6 mb-3">
            <label>Frais à payer en Ariary</label>
            <input type="text" name="frais_para" class="form-control"
                value="{{ old('frais_para', $parascolaire->frais_para ?? '')}}" required>
        </div>
    </div>

    <button class="btn btn-primary">Mettre à jour</button>
</form>
@endsection
