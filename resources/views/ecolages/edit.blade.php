@extends('layouts.app')

@section('content')
<h2>Modifier un Paiement d'Écolage</h2>

<form action="{{ route('ecolages.update', $ecolage->id_ecolage) }}" method="POST" class="card p-4 shadow-sm">
    @csrf
    @method('PUT')

    <div class="row">

        {{-- Élève --}}
        <div class="col-md-6 mb-3">
            <label>Élève *</label>
            <select name="id_eleve" class="form-select" required>

                <option value="">-- Sélectionner un élève --</option>

                @foreach($eleves as $eleve)
                    <option value="{{ $eleve->id_eleve }}"
                        {{ old('id_eleve', $ecolage->id_eleve) == $eleve->id_eleve ? 'selected' : '' }}>
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

                <option value="Janvier" {{ old('mois', $ecolage->mois) == 'Janvier' ? 'selected' : '' }}>Janvier</option>
                <option value="Février" {{ old('mois', $ecolage->mois) == 'Février' ? 'selected' : '' }}>Février</option>
                <option value="Mars" {{ old('mois', $ecolage->mois) == 'Mars' ? 'selected' : '' }}>Mars</option>
                <option value="Avril" {{ old('mois', $ecolage->mois) == 'Avril' ? 'selected' : '' }}>Avril</option>
                <option value="Mai" {{ old('mois', $ecolage->mois) == 'Mai' ? 'selected' : '' }}>Mai</option>
                <option value="Juin" {{ old('mois', $ecolage->mois) == 'Juin' ? 'selected' : '' }}>Juin</option>
                <option value="Juillet" {{ old('mois', $ecolage->mois) == 'Juillet' ? 'selected' : '' }}>Juillet</option>
                <option value="Août" {{ old('mois', $ecolage->mois) == 'Août' ? 'selected' : '' }}>Août</option>
                <option value="Septembre" {{ old('mois', $ecolage->mois) == 'Septembre' ? 'selected' : '' }}>Septembre</option>
                <option value="Octobre" {{ old('mois', $ecolage->mois) == 'Octobre' ? 'selected' : '' }}>Octobre</option>
                <option value="Novembre" {{ old('mois', $ecolage->mois) == 'Novembre' ? 'selected' : '' }}>Novembre</option>
                <option value="Décembre" {{ old('mois', $ecolage->mois) == 'Décembre' ? 'selected' : '' }}>Décembre</option>

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
                value="{{ old('montant_ecolage', $ecolage->montant_ecolage) }}"
                required>
        </div>

        {{-- Date paiement --}}
        <div class="col-md-6 mb-3">
            <label>Date de paiement *</label>

            <input
                type="date"
                name="date_paiement"
                class="form-control"
                value="{{ old('date_paiement', $ecolage->date_paiement) }}"
                required>
        </div>

        {{-- Statut --}}
        <div class="col-md-6 mb-3">
            <label>Statut *</label>

            <select name="statut" class="form-select" required>

                <option value="1"
                    {{ old('statut', $ecolage->statut) == 1 ? 'selected' : '' }}>
                    Payé
                </option>

                <option value="0"
                    {{ old('statut', $ecolage->statut) == 0 ? 'selected' : '' }}>
                    Impayé
                </option>

            </select>
        </div>

        {{-- Année scolaire --}}
        <div class="col-md-6 mb-3">
            <label>Année scolaire</label>

            <input
                type="text"
                class="form-control"
                value="{{ $ecolage->annee->nom_annee }}"
                readonly>

            <input
                type="hidden"
                name="id_annee"
                value="{{ $ecolage->id_annee }}">
        </div>

    </div>

    <button class="btn btn-primary">
        Mettre à jour
    </button>

</form>
@endsection