@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <h2>Saisie des notes</h2>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $evaluation->matiere->nom_matiere }} - {{ $evaluation->matiere->classe->nom_classe }}</h5>
                    <p class="mb-1"><strong>Type :</strong> {{ $evaluation->type_evaluation }}</p>
                    <p class="mb-1"><strong>Date :</strong> {{ \Carbon\Carbon::parse($evaluation->date_evaluation)->format('d/m/Y') }}</p>
                    <p class="mb-1"><strong>Période :</strong> {{ $evaluation->periode }}</p>
                    <p class="mb-1"><strong>Barème :</strong> /{{ $evaluation->bareme }}</p>
                </div>
            </div>
        </div>
    </div>

    @if($eleves->isEmpty())
        <div class="alert alert-warning">
            Aucun élève n'est affecté à cette classe pour l'année scolaire active.
        </div>
    @else
        <form action="{{ route('evaluations.enregistrer', $evaluation->id_evaluation) }}" method="POST">
            @csrf

            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        <i class="bi bi-pencil-square"></i> 
                        Élèves de {{ $evaluation->matiere->classe->nom_classe }} ({{ $eleves->count() }} élèves)
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 10%">Matricule</th>
                                    <th style="width: 50%">Nom et Prénom</th>
                                    <th style="width: 20%">Genre</th>
                                    <th style="width: 20%">Note /{{ $evaluation->bareme }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($eleves as $eleve)
                                    <tr>
                                        <td>{{ $eleve->matricule }}</td>
                                        <td>
                                            <strong>{{ $eleve->nom }} {{ $eleve->prenom }}</strong>
                                        </td>
                                        <td>{{ $eleve->genre }}</td>
                                        <td>
                                            <input 
                                                type="number" 
                                                name="notes[{{ $eleve->id_eleve }}]" 
                                                class="form-control" 
                                                min="0" 
                                                max="{{ $evaluation->bareme }}" 
                                                step="0.25"
                                                value="{{ $notesExistantes[$eleve->id_eleve] ?? '' }}"
                                                placeholder="Note">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('evaluations.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Annuler
                        </a>
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-check-circle"></i> Enregistrer toutes les notes
                        </button>
                    </div>
                </div>
            </div>
        </form>
    @endif
</div>
@endsection