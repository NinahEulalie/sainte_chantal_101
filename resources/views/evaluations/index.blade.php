@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h2>Liste des évaluations</h2>
            <a href="{{ route('evaluations.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Nouvelle évaluation
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Matière</th>
                            <th>Classe</th>
                            <th>Type</th>
                            <th>Période</th>
                            <th>Barème</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($evaluations as $evaluation)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($evaluation->date_evaluation)->format('d/m/Y') }}</td>
                                <td>{{ $evaluation->matiere->nom_matiere }}</td>
                                <td>{{ $evaluation->matiere->classe->nom_classe }}</td>
                                <td>{{ $evaluation->type_evaluation }}</td>
                                <td>{{ $evaluation->periode }}</td>
                                <td>/{{ $evaluation->bareme }}</td>
                                <td>
                                    <a href="{{ route('evaluations.saisie', $evaluation->id_evaluation) }}" 
                                       class="btn btn-sm btn-primary" 
                                       title="Saisir/Modifier les notes">
                                        <i class="bi bi-pencil-square"></i> Notes
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted">Aucune évaluation créée</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection