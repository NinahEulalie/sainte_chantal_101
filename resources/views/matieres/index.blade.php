@extends('layouts.app')

@section('page-title', '')
@section('content')

<h2 class="mb-4">Liste des matières</h2>

<div class="student-group-form">
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Rechercher par nom ...">
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Rechercher par classe ...">
            </div>
        </div>
        <div class="col-lg-2">
            <div class="search-student-btn">
                <button type="btn" class="btn btn-primary">Rechercher
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </div>
    </div>
</div> <br><br>

<div class="col-lg-4">
    <div class="search-student-btn">
        <a href="{{ route('matieres.create') }}" class="btn btn-primary mb-3">
            + Ajouter une matière
        </a>
    </div>
</div> <br>

<div class="table-responsive">
    <table
        class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
        <thead class="student-thread">
            <tr>
                <th>
                    <div class="form-check check-tables">
                        <input class="form-check-input" type="checkbox" value="something">
                    </div>
                </th>
                <th>Matière</th>
                <th>Coefficient</th>
                <th>Enseignant/Professeur</th>
                <th>Classe</th>
                <th class="text-end">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($matieres as $matiere)
            <tr>
                <td>
                    <div class="form-check check-tables">
                        <input class="form-check-input" type="checkbox" value="something">
                    </div>
                </td>
                <td>{{ $matiere->nom_matiere }}</td>
                <td>{{ $matiere->coefficient }}</td>
                <td>{{ $matiere->nom_prof }}</td>

                <td>
                    @if($matiere->classe)
                        <strong>Classe :</strong> {{ $matiere->classe->nom_classe }}
                    @else
                        <span class="text-muted">Non renseigné</span>
                    @endif
                </td>

                <td class="text-end">
                    <div class="actions">
                        <a href="{{ route('matieres.show', $matiere->id_matiere) }}" class="btn btn-sm btn-info">
                            <i class="bi bi-eye me-1"></i> Voir</a>
                        <a href="{{ route('matieres.edit', $matiere->id_matiere) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil-square me-1"></i> Modifier</a>
                            <form action="{{ route('matieres.destroy', $matiere->id_matiere) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="9" class="text-center text-muted">
                    Aucune matière enregistrée
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
