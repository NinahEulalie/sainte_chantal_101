@extends('layouts.app')

@section('content')
<h2>Détails de l"activité parascolaire</h2>

<div class="card p-4 shadow-sm">
    <p><strong>Nom de l'activité parascolaire :</strong> {{ $parascolaire->activite_choisie }}</p>

    <p><strong>Frais à payer en Ariary :</strong> {{ $parascolaire->frais_para }}</p>

    <a href="{{ route('parascolaires.index') }}" class="btn btn-secondary">Retour</a>
</div>
@endsection
