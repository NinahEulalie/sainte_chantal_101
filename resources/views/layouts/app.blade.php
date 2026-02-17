<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Sainte Chantal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .sidebar {
            background-color: #1e1e1e;
            min-height: 100vh;
        }

        .sidebar .nav-link {
            color: white;
            border-radius: 8px;
            margin-bottom: 5px;
            transition: 0.2s;
        }

        .sidebar .nav-link:hover {
            background-color: #2c2c2c;
        }

        .sidebar .nav-link.active {
            background-color: #973131 !important;
            color: white !important;
            font-weight: 600;
        }
    </style>
</head>

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


<body>

<div class="container-fluid">
    <div class="row vh-100">

        {{-- SIDEBAR --}}
        <div class="col-md-3 col-lg-2 sidebar p-3">

            <h4 class="text-center text-white mb-4">Sainte Chantal</h4>

            <div class="nav flex-column nav-pills">

                <a href="{{ route('home') }}"
                class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                    Accueil
                </a>

                <a href="{{ route('parents.index') }}"
                class="nav-link {{ request()->routeIs('parents.*') ? 'active' : '' }}">
                    Parents
                </a>

                <a href="{{ route('eleves.index') }}"
                class="nav-link {{ request()->routeIs('eleves.*') ? 'active' : '' }}">
                    Élèves
                </a>

                <a href="{{ route('anneescolaires.index') }}"
                class="nav-link {{ request()->routeIs('anneescolaires.*') ? 'active' : '' }}">
                    Années scolaires
                </a>

                <a href="{{ route('classes.index') }}"
                class="nav-link {{ request()->routeIs('classes.*') ? 'active' : '' }}">
                    Classes
                </a>

                <a href="{{ route('parascolaires.index') }}"
                class="nav-link {{ request()->routeIs('parascolaires.*') ? 'active' : '' }}">
                    Parascolaires
                </a>

                <a href="{{ route('ecolage') }}"
                class="nav-link {{ request()->routeIs('ecolage') ? 'active' : '' }}">
                    Ecolage
                </a>

                <a href="{{ route('inscription') }}"
                class="nav-link {{ request()->routeIs('inscription') ? 'active' : '' }}">
                    Inscriptions/Réinscriptions
                </a>
            </div>
        </div>


        {{-- CONTENU --}}
        <div class="col-md-9 col-lg-10 p-0 bg-light d-flex flex-column">

            {{-- NAVBAR TOP --}}
            <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-4">
                
                <div class="container-fluid">

                    {{-- Titre dynamique --}}
                    <span class="navbar-brand fw-bold">
                        @yield('page-title', '')
                    </span>

                    {{-- Barre de recherche --}}
                    <form class="d-flex" role="search" onsubmit="return false;">
                        <input
                            type="search"
                            id="search-eleve"
                            class="form-control"
                            placeholder="Rechercher..."
                        >
                    </form>

                </div>
            </nav>

            {{-- CONTENU PAGE --}}
            <div class="p-4 flex-grow-1">
                @yield('content')
            </div>

        </div>


    </div>
</div>

</body>
</html>
