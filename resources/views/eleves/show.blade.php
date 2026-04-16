@extends('layouts.app')

@section('content')

<h3 class="mb-4">Fiche de l’élève</h3>

<p><strong>Matricule :</strong> {{ $eleve->matricule }}</p>
<p><strong>Nom :</strong> {{ $eleve->nom }}</p>
<p><strong>Prénom :</strong> {{ $eleve->prenom }}</p>

<p>
    <strong>Date de naissance :</strong>
    {{ \Carbon\Carbon::parse($eleve->date_nais)->format('d/m/Y') }}
</p>

<p><strong>Lieu de naissance :</strong> {{ $eleve->lieu_nais }}</p>

<p><strong>Genre :</strong> {{ $eleve->genre }}</p>

<p><strong>Adresse :</strong> {{ $eleve->adresse }}</p>

<hr>

<h5>Informations du parent</h5>

@if($eleve->parent)
    <p><strong>Père :</strong> {{ $eleve->parent->nom_pere }}</p>
    <p><strong>Mère :</strong> {{ $eleve->parent->nom_mere }}</p>
    <p><strong>Téléphone :</strong> {{ $eleve->parent->telephone }}</p>
    <p><strong>Email :</strong> {{ $eleve->parent->email }}</p>
@else
    <p class="text-muted">Aucun parent associé</p>
@endif

<a href="{{ route('eleves.index') }}" class="btn btn-secondary mt-3">
    Retour
</a>

@endsection
