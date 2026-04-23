@extends('layouts.app')

@section('content')
<h2 class="mb-4">Liste des Classes</h2>

<div class="student-group-form">
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Rechercher par nom ...">
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
        <a href="{{ route('classes.create') }}" class="btn btn-primary">+ Nouvelle classe</a>
    </div>
</div> <br>

<div class="table-responsive">
    <table
        class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
        <thead class="student-thread">
            <tr>
                <th>Nom de la classe</th>
                <th>Niveau</th>
                <th class="text-end">Actions</th>
            </tr>
    </thead>
    <tbody>
        @foreach($classes as $classe)
        <tr>
            <td>{{ $classe->nom_classe }}</td>
            <td>{{ $classe->niveau }}</td>
            <td class="text-end">
                <div class="actions">
                    <a href="{{ route('classes.show', $classe->id_classe) }}" class="btn btn-info btn-sm">Voir</a>
                    <a href="{{ route('classes.edit', $classe->id_classe) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('classes.destroy', $classe->id_classe) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
