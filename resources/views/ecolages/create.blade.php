@extends('layouts.app')

@section('content')
<h2>Enregistrer un Paiement d'Écolage</h2>

<form action="{{ route('ecolages.store') }}" method="POST" class="card p-4 shadow-sm">
    @csrf

    <div class="row">

        {{-- Élève --}}
        <div class="col-md-6 mb-3">
            <label>Élève *</label>
            <select name="id_eleve" class="form-select" required>
                <option value="">-- Sélectionner un élève --</option>

                @foreach($eleves as $eleve)
                    <option value="{{ $eleve->id_eleve }}"
                        {{ old('id_eleve') == $eleve->id_eleve ? 'selected' : '' }}>
                        {{ $eleve->matricule }}
                        - {{ $eleve->nom }}
                        {{ $eleve->prenom }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Mois --}}
        <div class="col-md-6 mb-3">
            <label>Mois concerné *</label>
            <select name="mois" class="form-select" required>

                <option value="">-- Choisir un mois --</option>

                <option value="Janvier">Janvier</option>
                <option value="Février">Février</option>
                <option value="Mars">Mars</option>
                <option value="Avril">Avril</option>
                <option value="Mai">Mai</option>
                <option value="Juin">Juin</option>
                <option value="Juillet">Juillet</option>
                <option value="Août">Août</option>
                <option value="Septembre">Septembre</option>
                <option value="Octobre">Octobre</option>
                <option value="Novembre">Novembre</option>
                <option value="Décembre">Décembre</option>

            </select>
        </div>

        {{-- Montant --}}
        <div class="col-md-6 mb-3">
            <label>Montant payé (Ar) *</label>
            <input
                type="number"
                name="montant_ecolage"
                class="form-control"
                min="0"
                value="{{ old('montant_ecolage') }}"
                required>
        </div>

        {{-- Date paiement --}}
        <div class="col-md-6 mb-3">
            <label>Date de paiement *</label>
            <input
                type="date"
                name="date_paiement"
                class="form-control"
                value="{{ old('date_paiement', date('Y-m-d')) }}"
                required>
        </div>

        {{-- Statut --}}
        <div class="col-md-6 mb-3">
            <label>Statut *</label>

            <select name="statut" class="form-select" required>
                <option value="1"
                    {{ old('statut', 1) == 1 ? 'selected' : '' }}>
                    Payé
                </option>

                <option value="0"
                    {{ old('statut') == 0 ? 'selected' : '' }}>
                    Impayé
                </option>
            </select>
        </div>

        {{-- Année scolaire active --}}
        <div class="col-md-6 mb-3">
            <label>Année scolaire</label>

            <input
                type="text"
                class="form-control"
                value="{{ $anneeActive->nom_annee }}"
                readonly>

            <input
                type="hidden"
                name="id_annee"
                value="{{ $anneeActive->id_annee }}">
        </div>

    </div>

    <button class="btn btn-success">
        Enregistrer
    </button>

</form>
@endsection