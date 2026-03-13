<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-4">
    <div class="container-fluid">

        {{-- Titre + Recherche --}}
        <div class="d-flex align-items-center gap-3">

            {{-- Logo --}}
                <img 
                    src="{{ asset('assets/images/logo.png') }}" 
                    alt="Logo Sainte Chantal" 
                    style="height: 40px; width: auto;">

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
                    <a class="dropdown-item text-danger d-flex align-items-center" href="#">
                        <i class="bi bi-box-arrow-right me-2"></i>
                        Déconnexion
                    </a>
                </li>
            </ul>
        </div>

    </div>
</nav>