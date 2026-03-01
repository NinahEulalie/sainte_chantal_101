@extends('layouts.app')

@section('content')
<h2>Ajouter une matière</h2>

<form action="{{ route('matieres.store') }}" method="POST" class="card p-4 shadow-sm">
    @csrf

    <div class="row">
        <div class="col-12 mb-3">
            <label> Matière *</label>
            <input type="text" name="nom_matiere" class="form-control" required>
        </div>

        <div class="col-md-6 mb-3">
            <label> Coefficient *</label>
            <select name="coefficient" class="form-select" required>
                <option selected disabled>-- Choisir un coefficient --</option>
                <option value="0,5"{{ old('coefficient', $matiere->coefficient ?? '') == '0,5' ? 'selected' : '' }}>0,5</option>
                <option value="1"{{ old('coefficient', $matiere->coefficient ?? '') == '1' ? 'selected' : '' }}>1</option>
                <option value="2"{{ old('coefficient', $matiere->coefficient ?? '') == '2' ? 'selected' : '' }}>2</option>
                <option value="3"{{ old('coefficient', $matiere->coefficient ?? '') == '3' ? 'selected' : '' }}>3</option>
                <option value="4"{{ old('coefficient', $matiere->coefficient ?? '') == '4' ? 'selected' : '' }}>4</option>
                <option value="5"{{ old('coefficient', $matiere->coefficient ?? '') == '5' ? 'selected' : '' }}>5</option>
                <option value="6"{{ old('coefficient', $matiere->coefficient ?? '') == '6' ? 'selected' : '' }}>61</option>
            </select>
        </div>

        <div class="col-md-6 mb-3">
            <label> Nom du professeur en charge *</label>
            <input type="text" name="nom_prof" class="form-control" required>
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label"> Classe où la matière est enseignée*</label>
            <select name="id_classe" class="form-select" required>
                <option selected disabled>-- Sélectionner la classe --</option>
                @foreach ($classes as $classe)
                    <option value="{{ $classe->id_classe }}"
                        {{ old('id_classe') == $classe->id_classe ? 'selected' : '' }}>
                        {{ $classe->nom_classe }} — {{ $classe->niveau }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="search-student-btn">
            <button class="btn btn-success">Enregistrer</button>
        </div>
    </div>
</form>
@endsection
