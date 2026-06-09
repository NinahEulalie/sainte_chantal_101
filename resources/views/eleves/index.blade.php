@extends('layouts.app')

@section('page-title', 'Gestion des Élèves')
@section('content')

<h2 class="mb-4">Liste des élèves</h2>

<div class="student-group-form">
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Rechercher par matricule ...">
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Rechercher par nom ...">
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Rechercher par téléphone ...">
            </div>
        </div>
        <div class="col-lg-2">
            <div class="search-student-btn">
                <button type="btn" class="btn btn-primary">Rechercher
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </div>
    </div>
</div> <br><br>

<div class="col-lg-2">
    <div class="search-student-btn">
        <a href="{{ route('eleves.create') }}" class="btn btn-primary mb-3">
            + Ajouter un élève
        </a>
    </div>
</div> <br>

<div class="table-responsive">
    <table
        class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
        <thead class="student-thread">
            <tr>
                <th>
                    <div class="form-check check-tables">
                        <input class="form-check-input" type="checkbox" value="something">
                    </div>
                </th>
                <th>ID</th>
                <th>Matricule</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de naissance</th>
                <th>Lieu de naissance</th>
                <th>Genre</th>
                <th>Parent/Tuteur</th>
                <th class="text-end">Action</th>
            </tr>
        </thead>
        <tbody id="eleves-table">
            @include('eleves.partials.table_rows', ['eleves' => $eleves])
        </tbody>
    </table>
</div>
<!-- <table class="table table-bordered table-hover align-middle">
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

</table> -->

@endsection
