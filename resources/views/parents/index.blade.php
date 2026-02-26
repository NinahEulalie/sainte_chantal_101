@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Liste des Parents</h2>
</div>

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
        <div class="col-lg-4 col-md-6">
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
        <a href="{{ route('parents.create') }}" class="btn btn-primary">+ Ajouter un parent</a>
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
                <th>Matricule</th>
                <th>Père</th>
                <th>Mère</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th class="text-end">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($parents as $parent )
            <tr>
                <td>
                    <div class="form-check check-tables">
                        <input class="form-check-input" type="checkbox" value="something">
                    </div>
                </td>
                <td>{{ $parent->matricule_parent }}</td>
                <td>{{ $parent->nom_pere }}</td>
                <td>{{ $parent->nom_mere }}</td>
                <td>{{ $parent->telephone }}</td>
                <td>{{ $parent->email }}</td>
                <td class="text-end">
                    <div class="actions">
                        <a href="{{ route('parents.show', $parent->id_parent) }}" class="btn btn-info btn-sm">
                            <i class="bi bi-eye me-1"></i> Voir</a>
                        <a href="{{ route('parents.edit', $parent->id_parent) }}" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil-square me-1"></i> Modifier</a>
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- <table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>Matricule</th>
            <th>Père</th>
            <th>Mère</th>
            <th>Téléphone</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($parents as $parent)
        <tr>
            <td>{{ $parent->matricule_parent }}</td>
            <td>{{ $parent->nom_pere }}</td>
            <td>{{ $parent->nom_mere }}</td>
            <td>{{ $parent->telephone }}</td>
            <td>{{ $parent->email }}</td>
            <td>
                <a href="{{ route('parents.show', $parent->id_parent) }}" class="btn btn-info btn-sm d-flex align-items-center">
                    <i class="bi bi-eye me-1"></i> Voir</a>
                <a href="{{ route('parents.edit', $parent->id_parent) }}" class="btn btn-warning btn-sm d-flex align-items-center">
                    <i class="bi bi-pencil-square me-1"></i> Modifier</a>
                <form action="{{ route('parents.destroy', $parent->id_parent) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm d-flex align-items-center">
                        <i class="bi bi-trash me-1"></i> Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table> -->

@endsection
