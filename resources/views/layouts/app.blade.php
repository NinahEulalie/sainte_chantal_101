<!DOCTYPE html>
<html lang="fr">
<head>
    @include('layouts.partials.head')
</head>

<body>

<div class="container-fluid">
    <div class="row vh-100">

        {{-- SIDEBAR --}}
        @include('layouts.partials.sidebar')

        {{-- CONTENU --}}
        <div class="col-md-9 col-lg-10 p-0 bg-light d-flex flex-column">

            {{-- NAVBAR TOP --}}
            @include('layouts.partials.navbar')

            {{-- CONTENU PAGE --}}
            <div class="p-4 flex-grow-1">
                @yield('content')
            </div>

        </div>

    </div>
</div>

{{-- SCRIPTS --}}
@include('layouts.partials.scripts')

@stack('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
@isset($script)
    {{$script}}
@endisset
</body>
</html>