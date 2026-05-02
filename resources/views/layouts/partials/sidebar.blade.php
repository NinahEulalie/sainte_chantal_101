<div class="col-md-3 col-lg-2 sidebar p-3">
    <h4 class="text-center text-black mb-4">Sainte Chantal</h4>

    <div class="nav flex-column nav-pills">
        <a href="{{ route('home') }}"
           class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
            <i class="bi bi-house-door-fill me-2"></i> Accueil
        </a>
        @can('view parents')            
        <a href="{{ route('parents.index') }}"
           class="nav-link {{ request()->routeIs('parents.*') ? 'active' : '' }}">
            <i class="bi bi-people-fill me-2"></i> Parents
        </a>
        @endcan

        @can('view eleves')            
        <a href="{{ route('eleves.index') }}"
           class="nav-link {{ request()->routeIs('eleves.*') ? 'active' : '' }}">
            <i class="bi bi-file-person-fill me-2"></i> Élèves
        </a>
        @endcan

        @can('view anneescolaires')            
        <a href="{{ route('anneescolaires.index') }}"
           class="nav-link {{ request()->routeIs('anneescolaires.*') ? 'active' : '' }}">
            <i class="bi bi-calendar-event-fill me-2"></i> Années scolaires
        </a>
        @endcan

        @can('view classes')            
        <a href="{{ route('classes.index') }}"
           class="nav-link {{ request()->routeIs('classes.*') ? 'active' : '' }}">
            <i class="bi bi-mortarboard-fill me-2"></i> Classes
        </a>
        @endcan

        @can('view matieres')            
        <a href="{{ route('matieres.index') }}"
           class="nav-link {{ request()->routeIs('matieres.*') ? 'active' : '' }}">
            <i class="bi bi-book-fill me-2"></i> Matières
        </a>
        @endcan

        <a href="{{ route('affectations.index') }}"
           class="nav-link {{ request()->routeIs('affectations.*') ? 'active' : '' }}">
            <i class="bi bi-signpost-split-fill me-2"></i> Répartitions classes
        </a>

        @can('view evaluation')            
        <a href="{{ route('evaluations.index') }}"
           class="nav-link {{ request()->routeIs('evaluations.*') ? 'active' : '' }}">
            <i class="bi bi-bookmark-star-fill me-2"></i> Evaluations
        </a>
        @endcan

        @can('view parascolaires')
        <a href="{{ route('parascolaires.index') }}"
           class="nav-link {{ request()->routeIs('parascolaires.*') ? 'active' : '' }}">
            <i class="bi bi-palette-fill me-2"></i> Parascolaires
        </a>            
        @endcan

        @can('view ecolages')
        <a href="{{ route('ecolage') }}"
           class="nav-link {{ request()->routeIs('ecolage') ? 'active' : '' }}">
            <i class="bi bi-cash-stack me-2"></i> Ecolage
        </a>            
        @endcan

        @can('view inscriptions')
        <a href="{{ route('inscription') }}"
           class="nav-link {{ request()->routeIs('inscription') ? 'active' : '' }}">
            <i class="bi bi-file-diff-fill me-2"></i> Inscriptions
        </a>            
        @endcan

        @can('view users')            
        <a href="{{ route('users.list') }}"
           class="nav-link {{ request()->routeIs('users.list') ? 'active' : '' }}">
            <i class="bi bi-file-diff-fill me-2"></i> Utilisateurs
        </a>
        @endcan

        @can('view permissions')            
        <a href="{{ route('permissions.list') }}"
           class="nav-link {{ request()->routeIs('permissions.list') ? 'active' : '' }}">
            <i class="bi bi-file-diff-fill me-2"></i> Permissions
        </a>
        @endcan

        @can('view roles')            
        <a href="{{ route('roles.list') }}"
           class="nav-link {{ request()->routeIs('roles.list') ? 'active' : '' }}">
            <i class="bi bi-file-diff-fill me-2"></i> Roles
        </a>
        @endcan
    </div>
</div>