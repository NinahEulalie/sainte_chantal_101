@extends('layouts.app')

@section('content')

<div class="text-center mb-5">
    <h1 class="fw-bold">Système de Gestion Scolaire</h1>
    <p class="text-muted">Choisissez un module</p>
</div>

<div class="row justify-content-center g-4">

    <div class="col-md-4">
        <div class="card shadow text-center p-4">
            <h4> Gestion des Parents</h4>
            <a href="{{ route('parents.index') }}" class="btn btn-primary mt-3">
                Accéder
            </a>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow text-center p-4">
            <h4> Années Scolaires</h4>
            <a href="{{ route('anneescolaires.index') }}" class="btn btn-success mt-3">
                Accéder
            </a>
        </div>
    </div>

</div>

@endsection
