@extends('layouts.app')

@section('content')
<h2>Détails de la classe</h2>

<div class="card p-4 shadow-sm">
    <p><strong>Nom de la classe :</strong> {{ $classe->nom_classe }}</p>

    <p><strong>Effectif :</strong> {{ $classe->effectif }}</p>

    <p><strong>Niveau :</strong> {{ $classe->niveau }}</p>

    <a href="{{ route('classes.index') }}" class="btn btn-secondary">Retour</a>
</div>
@endsection
