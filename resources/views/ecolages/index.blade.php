@extends('layouts.app')

@section('content')

<h2 class="mb-4">Liste des Écolages</h2>

<div class="student-group-form">
    <div class="row">

        <div class="col-lg-3 col-md-6">
            <div class="form-group">
                <input type="text"
                       class="form-control"
                       placeholder="Rechercher par matricule ...">
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="form-group">
                <input type="text"
                       class="form-control"
                       placeholder="Rechercher par mois ...">
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="form-group">
                <input type="date"
                       class="form-control">
            </div>
        </div>

        <div class="col-lg-2">
            <button type="button" class="btn btn-primary">
                Rechercher
                <i class="bi bi-search"></i>
            </button>
        </div>

    </div>
</div>

<br>

<div class="col-lg-3 mb-3">
    <a href="{{ route('ecolages.create') }}"
       class="btn btn-primary">
        + Nouveau paiement
    </a>
</div>

<div class="table-responsive">
    <table class="table border-0 table-hover table-striped">

        <thead class="table-dark">
            <tr>
                <th>Date de paiement</th>
                <th>Mois</th>
                <th>Matricule</th>
                <th>Élève</th>
                <th>Montant</th>
                <th>Statut</th>
                <th>Année scolaire</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>

        <tbody>

            @forelse($ecolages as $ecolage)

                <tr>

                    <td>
                        {{ \Carbon\Carbon::parse($ecolage->date_paiement)->format('d/m/Y') }}
                    </td>

                    <td>
                        {{ $ecolage->mois }}
                    </td>

                    <td>
                        {{ $ecolage->eleve?->matricule }}
                    </td>

                    <td>
                        {{ $ecolage->eleve?->nom }}
                        {{ $ecolage->eleve?->prenom }}
                    </td>

                    <td>
                        {{ number_format($ecolage->montant_ecolage, 0, ',', ' ') }} Ar
                    </td>

                    <td>
                        @if($ecolage->statut)
                            <span class="badge bg-success">
                                Payé
                            </span>
                        @else
                            <span class="badge bg-danger">
                                Impayé
                            </span>
                        @endif
                    </td>

                    <td>
                        {{ $ecolage->annee?->nom_annee }}
                    </td>

                    <td class="text-end">

                        <a href="{{ route('ecolages.show', $ecolage->id_ecolage) }}"
                           class="btn btn-info btn-sm">
                            Voir
                        </a>

                        <a href="{{ route('ecolages.edit', $ecolage->id_ecolage) }}"
                           class="btn btn-warning btn-sm">
                            Modifier
                        </a>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="8" class="text-center text-muted">
                        Aucun paiement enregistré
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>
</div>

@endsection