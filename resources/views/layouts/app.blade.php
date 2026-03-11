<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sainte Chantal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
        .sidebar {
            background-color: #ffffff;
            min-height: 100vh;
        }

        .sidebar .nav-link {
            color: black;
            border-radius: 8px;
            margin-bottom: 5px;
            transition: 0.2s;
            display: flex;
            align-items: center;
        }

        .sidebar .nav-link:hover {
            background-color: #deb887;
        }

        .sidebar .nav-link.active {
            background-color: #973131 !important;
            color: white !important;
            font-weight: 600;
        }

        #dropdownUser:hover i {
            color: #973131;
            transition: 0.2s;
        }
    </style>
</head>

<body>

<div class="container-fluid">
    <div class="row vh-100">

        {{-- SIDEBAR --}}
        <div class="col-md-3 col-lg-2 sidebar p-3">

            <h4 class="text-center text-black mb-4">Sainte Chantal</h4>

            <div class="nav flex-column nav-pills">

                <a href="{{ route('home') }}"
                class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                    <i class="bi bi-house-door-fill me-2"></i> Accueil
                </a>

                <a href="{{ route('parents.index') }}"
                class="nav-link {{ request()->routeIs('parents.*') ? 'active' : '' }}">
                    <i class="bi bi-people-fill me-2"></i> Parents
                </a>

                <a href="{{ route('eleves.index') }}"
                class="nav-link {{ request()->routeIs('eleves.*') ? 'active' : '' }}">
                    <i class="bi bi-file-person-fill me-2"></i> Élèves
                </a>

                <a href="{{ route('anneescolaires.index') }}"
                class="nav-link {{ request()->routeIs('anneescolaires.*') ? 'active' : '' }}">
                    <i class="bi bi-calendar-event-fill me-2"></i> Années scolaires
                </a>

                <a href="{{ route('classes.index') }}"
                class="nav-link {{ request()->routeIs('classes.*') ? 'active' : '' }}">
                    <i class="bi bi-mortarboard-fill me-2"></i> Classes
                </a>

                <a href="{{ route('affectations.index') }}"
                class="nav-link {{ request()->routeIs('affectations.*') ? 'active' : '' }}">
                    <i class="bi bi-mortarboard-fill me-2"></i> Répartitions classes
                </a>

                <a href="{{ route('matieres.index') }}"
                class="nav-link {{ request()->routeIs('matieres.*') ? 'active' : '' }}">
                    <i class="bi bi-book-fill me-2"></i> Matières
                </a>

                <a href="{{ route('evaluations.create') }}"
                class="nav-link {{ request()->routeIs('evaluations.*') ? 'active' : '' }}">
                    <i class="bi bi-book-fill me-2"></i> Evaluations
                </a>

                <a href="{{ route('parascolaires.index') }}"
                class="nav-link {{ request()->routeIs('parascolaires.*') ? 'active' : '' }}">
                    <i class="bi bi-palette-fill me-2"></i> Parascolaires
                </a>

                <a href="{{ route('ecolage') }}"
                class="nav-link {{ request()->routeIs('ecolage') ? 'active' : '' }}">
                    <i class="bi bi-cash-stack me-2"></i> Ecolage
                </a>

                <a href="{{ route('inscription') }}"
                class="nav-link {{ request()->routeIs('inscription') ? 'active' : '' }}">
                    <i class="bi bi-file-diff-fill me-2"></i> Inscriptions
                </a>
            </div>
        </div>


        {{-- CONTENU --}}
        <div class="col-md-9 col-lg-10 p-0 bg-light d-flex flex-column">

            {{-- NAVBAR TOP --}}
            <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-4">
                <div class="container-fluid">

                    {{-- Titre + Recherche --}}
                    <div class="d-flex align-items-center gap-3">

                        {{-- Titre dynamique --}}
                        <span class="navbar-brand fw-bold mb-0">
                            @yield('page-title', '')
                        </span>

                        {{-- Barre de recherche --}}
                        <form class="d-flex" role="search" onsubmit="return false;">
                            <div class="input-group" style="width: 600px;">

                                <input
                                    type="search"
                                    id="search-eleve"
                                    class="form-control"
                                    placeholder="Rechercher..."
                                >

                                <button class="btn btn-outline-secondary" type="button">
                                    <i class="bi bi-search"></i>
                                </button>

                            </div>
                        </form>

                    </div>

                    {{-- Profil utilisateur --}}
                    <div class="dropdown">

                        <button 
                            class="btn p-0 d-flex align-items-center text-dark"
                            id="dropdownUser"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                            style="border: none; background: none;">

                            <i class="bi bi-person-circle fs-4"></i>
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end shadow"
                            aria-labelledby="dropdownUser"
                            style="min-width: 220px;">

                            <li class="dropdown-header">
                                <strong>Utilisateur</strong>
                            </li>

                            <li class="px-3 py-1 text-muted small">
                                Nom : Admin
                            </li>

                            <li class="px-3 py-1 text-muted small">
                                Rôle : Administrateur
                            </li>

                            <li><hr class="dropdown-divider"></li>

                            <li>
                                <a class="dropdown-item text-danger d-flex align-items-center"
                                href="#">
                                    <i class="bi bi-box-arrow-right me-2"></i>
                                    Déconnexion
                                </a>
                            </li>

                        </ul>

                    </div>

                </div>
            </nav>


            {{-- CONTENU PAGE --}}
            <div class="p-4 flex-grow-1">
                @yield('content')
            </div>

        </div>

    </div>
</div>

<!-- Bootstrap JS - DOIT ÊTRE AVANT vos scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Script de recherche d'élèves -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    let searchInput = document.getElementById("search-eleve");

    if (searchInput) {
        searchInput.addEventListener("keyup", function () {
            let query = this.value;

            fetch(`/eleves-recherche?q=${query}`)
                .then(response => response.text())
                .then(data => {
                    document.getElementById("eleves-table").innerHTML = data;
                });
        });
    }
});
</script>

<!-- Scripts des pages -->
@yield('scripts')

</body>
</html>