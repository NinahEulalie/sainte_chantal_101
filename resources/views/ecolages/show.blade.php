@extends('layouts.app')

@section('content')
<h2>Détails du Paiement d'Écolage</h2>

<div class="card p-4 shadow-sm">

    <p>
        <strong>Élève :</strong>
        {{ $ecolage->eleve->matricule }}
        - {{ $ecolage->eleve->nom }}
        {{ $ecolage->eleve->prenom }}
    </p>

    <p>
        <strong>Mois concerné :</strong>
        {{ $ecolage->mois }}
    </p>

    <p>
        <strong>Montant payé :</strong>
        {{ number_format($ecolage->montant_ecolage, 0, ',', ' ') }} Ar
    </p>

    <p>
        <strong>Date de paiement :</strong>
        {{ \Carbon\Carbon::parse($ecolage->date_paiement)->format('d/m/Y') }}
    </p>

    <p>
        <strong>Année scolaire :</strong>
        {{ $ecolage->annee->nom_annee }}
    </p>

    <p>
        <strong>Statut :</strong>

        @if($ecolage->statut)
            <span class="badge bg-success">Payé</span>
        @else
            <span class="badge bg-danger">Impayé</span>
        @endif
    </p>

    <a href="{{ route('ecolages.index') }}" class="btn btn-secondary">
        Retour
    </a>

</div>
@endsection