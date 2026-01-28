@extends('layouts.app')

@section('content')
<h2>Détails Parent</h2>

<div class="card p-4 shadow-sm">
    <p><strong>Matricule:</strong> {{ $parent->matricule_parent }}</p>
    <p><strong>Père:</strong> {{ $parent->nom_pere }} ({{ $parent->profession_pere }})</p>
    <p><strong>Mère:</strong> {{ $parent->nom_mere }} ({{ $parent->profession_mere }})</p>
    <p><strong>Tuteur:</strong> {{ $parent->nom_tuteur }} ({{ $parent->profession_tuteur }})</p>
    <p><strong>Téléphone:</strong> {{ $parent->telephone }}</p>
    <p><strong>Email:</strong> {{ $parent->email }}</p>
    <p><strong>Adresse:</strong> {{ $parent->adresse_parent }}</p>

    <a href="{{ route('parents.index') }}" class="btn btn-secondary">Retour</a>
</div>
@endsection
