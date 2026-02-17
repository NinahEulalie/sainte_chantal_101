@extends('layouts.app')

@section('page-title', 'Gestion des Élèves')
@section('content')

<h2 class="mb-4">Liste des élèves</h2>

<a href="{{ route('eleves.create') }}" class="btn btn-primary mb-3">
    + Nouvel élève
</a>

<table class="table table-bordered table-hover align-middle">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Matricule</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de naissance</th>
            <th>Lieu de naissance</th>
            <th>Genre</th>
            <th>Parent (Père / Mère)</th>
            <th>Actions</th>
        </tr>
        </thead>

        <tbody id="eleves-table">
        @include('eleves.partials.table_rows', ['eleves' => $eleves])
        </tbody>

</table>

@endsection
