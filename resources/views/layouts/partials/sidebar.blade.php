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
            <i class="bi bi-signpost-split-fill me-2"></i> Répartitions classes
        </a>

        <a href="{{ route('evaluations.index') }}"
           class="nav-link {{ request()->routeIs('evaluations.*') ? 'active' : '' }}">
            <i class="bi bi-bookmark-star-fill me-2"></i> Evaluations
        </a>

        <a href="{{ route('parascolaires.index') }}"
           class="nav-link {{ request()->routeIs('parascolaires.*') ? 'active' : '' }}">
            <i class="bi bi-palette-fill me-2"></i> Parascolaires
        </a>

        <a href="{{ route('ecolages.index') }}"
           class="nav-link {{ request()->routeIs('ecolages.*') ? 'active' : '' }}">
            <i class="bi bi-cash-stack me-2"></i> Ecolage
        </a>

        <a href="{{ route('inscription') }}"
           class="nav-link {{ request()->routeIs('inscription') ? 'active' : '' }}">
            <i class="bi bi-file-diff-fill me-2"></i> Inscriptions
        </a>
    </div>
</div>