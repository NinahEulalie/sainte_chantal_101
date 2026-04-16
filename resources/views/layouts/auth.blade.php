<!DOCTYPE html>
<html lang="fr">
<head>
    @include('layouts.partials.head')
</head>

<body>
            {{-- CONTENU PAGE --}}
            <div>
                @yield('content')
            </div>

{{-- SCRIPTS --}}
@include('layouts.partials.scripts')

</body>
</html>