@extends('layouts.app')

@section('content')
<h2>Relevé des notes des élèves</h2>

<form action="{{ route('evaluations.store') }}" method="POST" class="card p-4 shadow-sm">
    @csrf

    <div class="row">
        <div class="col-12 mb-3">
            <label> Type d'évaluation effectuée *</label>
            <select name="type_evaluation" class="form-select" required>
                <option selected disabled>-- Choisir --</option>
                <option value="Test"{{ old('Test', $evaluation->type_evaluation ?? '') == 'Test' ? 'selected' : '' }}>Test</option>
                <option value="Examen"{{ old('Examen', $evaluation->type_evaluation ?? '') == 'Examen' ? 'selected' : '' }}>Examen</option>
            </select>
        </div>

        <div class="col-md-6 mb-3">
            <label>Date de l'évaluation *</label>
            <input type="date" name="date_evaluation" class="form-control"
                value="{{ old('date_evaluation', isset($evaluation) ? $evaluation->date_evaluation : '') }}" required>
        </div>

        <div class="col-md-6 mb-3">
            <label> Période de l'évaluation *</label>
            <select name="periode" class="form-select" required>
                <option selected disabled>-- Choisir --</option>
                <option value="Trimestre I"{{ old('Trimestre I', $evaluation->periode ?? '') == 'Trimestre I' ? 'selected' : '' }}>Trimestre I</option>
                <option value="Trimestre II"{{ old('Trimestre II', $evaluation->periode ?? '') == 'Trimestre II' ? 'selected' : '' }}>Trimestre II</option>
                <option value="Trimestre III"{{ old('Trimestre III', $evaluation->periode ?? '') == 'Trimestre III' ? 'selected' : '' }}>Trimestre III</option>
            </select>
        </div>

        <div class="col-md-6 mb-3">
            <label> Barème (note sur ) *</label>
            <select name="bareme" class="form-select" required>
                <option selected disabled>-- Choisir le barème --</option>
                <option value="10"{{ old('bareme', $evaluation->bareme ?? '') == '10' ? 'selected' : '' }}>10</option>
                <option value="20"{{ old('bareme', $evaluation->bareme ?? '') == '20' ? 'selected' : '' }}>20</option>
                <option value="40"{{ old('bareme', $evaluation->bareme ?? '') == '40' ? 'selected' : '' }}>40</option>
                <option value="60"{{ old('bareme', $evaluation->bareme ?? '') == '60' ? 'selected' : '' }}>60</option>
                <option value="80"{{ old('bareme', $evaluation->bareme ?? '') == '80' ? 'selected' : '' }}>80</option>
                <option value="100"{{ old('bareme', $evaluation->bareme ?? '') == '100' ? 'selected' : '' }}>100</option>
                <option value="120"{{ old('bareme', $evaluation->bareme ?? '') == '120' ? 'selected' : '' }}>120</option>
            </select>
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label"> Matière évaluée *</label>
            <select name="id_matiere" class="form-select" required>
                <option selected disabled>-- Sélectionner la matière --</option>
                @foreach ($matieres as $matiere)
                    <option value="{{ $matiere->id_matiere }}"
                        {{ old('id_matiere') == $matiere->id_matiere ? 'selected' : '' }}>
                        {{ $matiere->nom_matiere }} — {{ $matiere->nom_classe }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="d-flex justify-content-between mt-3">
        <a href="{{ route('evaluations.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Annuler
        </a>
        <button type="submit" class="btn btn-success">
            <i class="bi bi-check-circle"></i> Créer l'évaluation et saisir les notes
        </button>
    </div>
</form>
@endsection
