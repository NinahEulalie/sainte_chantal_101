@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <h2>Affectation des élèves aux classes</h2>
            <p class="text-muted">
                Année scolaire active : 
                <strong>{{ $anneeActive->date_debut->format('Y') }} - {{ $anneeActive->date_fin->format('Y') }}</strong>
            </p>
        </div>
    </div>

    <!-- Filtres : Niveau + Nom de classe -->
    <div class="row mb-4">
        <div class="col-md-3">
            <form method="GET" action="{{ route('affectations.index') }}" id="filterForm">
                <label class="form-label">Niveau (Primaire/Collège/Lycée)</label>
                <select name="niveau" class="form-select" onchange="this.form.submit()">
                    @if($niveaux->isEmpty())
                        <option disabled selected>Aucun niveau disponible</option>
                    @else
                        @foreach($niveaux as $niveau)
                            <option value="{{ $niveau }}" {{ $niveauSelectionne == $niveau ? 'selected' : '' }}>
                                {{ ucfirst($niveau) }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </form>
        </div>

        @if($niveauSelectionne)
            <div class="col-md-3">
                <form method="GET" action="{{ route('affectations.index') }}">
                    <input type="hidden" name="niveau" value="{{ $niveauSelectionne }}">
                    <label class="form-label">Classe (9ème, 3ème, etc.)</label>
                    <select name="nom_classe" class="form-select" onchange="this.form.submit()">
                        @if($nomsClasses->isEmpty())
                            <option disabled selected>Aucune classe disponible</option>
                        @else
                            @foreach($nomsClasses as $nomClasse)
                                <option value="{{ $nomClasse }}" {{ $nomClasseSelectionne == $nomClasse ? 'selected' : '' }}>
                                    {{ $nomClasse }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </form>
            </div>
        @endif
    </div>

    @if($classes->isEmpty())
        <div class="alert alert-warning">
            @if(!$niveauSelectionne)
                Veuillez d'abord créer des classes dans la section "Classes".
            @elseif(!$nomClasseSelectionne)
                Aucune classe trouvée pour le niveau <strong>{{ $niveauSelectionne }}</strong>.
            @else
                Aucune classe parallèle trouvée pour <strong>{{ $nomClasseSelectionne }}</strong> (niveau {{ $niveauSelectionne }}).
                <br>Veuillez d'abord créer les classes (ex: {{ $nomClasseSelectionne }} A, {{ $nomClasseSelectionne }} B, etc.).
            @endif
        </div>
    @else
        <!-- Élèves non affectés -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">
                    <i class="bi bi-file-person-fill"></i> 
                    Élèves non affectés ({{ $elevesNonAffectes->count() }})
                </h5>
            </div>
            <div class="card-body">
                @if($elevesNonAffectes->isEmpty())
                    <p class="text-muted">Tous les élèves ont été affectés.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Matricule</th>
                                    <th>Nom complet</th>
                                    <th>Genre</th>
                                    <th>Date de naissance</th>
                                    <th class="text-center">Affecter à</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($elevesNonAffectes as $eleve)
                                    <tr id="eleve-row-{{ $eleve->id_eleve }}">
                                        <td>{{ $eleve->matricule }}</td>
                                        <td>
                                            <strong>{{ $eleve->nom }} {{ $eleve->prenom }}</strong>
                                        </td>
                                        <td>{{ $eleve->genre }}</td>
                                        <td>{{ \Carbon\Carbon::parse($eleve->date_nais)->format('d/m/Y') }}</td>
                                        <td class="text-center">
                                            @foreach($classes as $classe)
                                                <button 
                                                    class="btn btn-sm btn-outline-success me-1 mb-1 btn-affecter"
                                                    data-eleve-id="{{ $eleve->id_eleve }}"
                                                    data-classe-id="{{ $classe->id_classe }}"
                                                    data-eleve-nom="{{ $eleve->nom }} {{ $eleve->prenom }}"
                                                    data-classe-nom="{{ $classe->nom_classe }}">
                                                    {{ $classe->nom_classe }}
                                                    <small class="text-muted">({{ $classe->effectifActuel() }})</small>
                                                </button>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>

        <!-- Élèves déjà affectés -->
        <div class="card">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">
                    <i class="bi bi-check-circle"></i> 
                    Élèves affectés en {{ $nomClasseSelectionne }}
                </h5>
            </div>
            <div class="card-body">
                @if($elevesAffectes->isEmpty())
                    <p class="text-muted">Aucun élève affecté pour le moment.</p>
                @else
                    <div class="row">
                        @foreach($classes as $classe)
                            <div class="col-md-4 mb-3">
                                <div class="card border-success">
                                    <div class="card-header bg-success bg-opacity-10">
                                        <h6 class="mb-0">
                                            {{ $classe->nom_classe }}
                                            <span class="badge bg-success">
                                                {{ $elevesAffectes->get($classe->id_classe)?->count() ?? 0 }} élèves
                                            </span>
                                        </h6>
                                    </div>
                                    <div class="card-body p-2">
                                        @if($elevesAffectes->has($classe->id_classe))
                                            <ul class="list-group list-group-flush">
                                                @foreach($elevesAffectes->get($classe->id_classe) as $affectation)
                                                    <li class="list-group-item d-flex justify-content-between align-items-center py-2 px-2" 
                                                        id="affectation-{{ $affectation->id_eleve }}-{{ $classe->id_classe }}">
                                                        <small>
                                                            {{ $affectation->eleve->nom }} {{ $affectation->eleve->prenom }}
                                                        </small>
                                                        <button 
                                                            class="btn btn-sm btn-outline-danger btn-retirer"
                                                            data-eleve-id="{{ $affectation->id_eleve }}"
                                                            data-classe-id="{{ $classe->id_classe }}"
                                                            title="Retirer">
                                                            <i class="bi bi-x"></i>
                                                        </button>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <p class="text-muted small mb-0">Aucun élève</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    @endif
</div>

<!-- Toast pour notifications -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="toastNotification" class="toast align-items-center border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body" id="toastMessage"></div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('assets/js/affectations.js') }}">
</script>
@endsection