@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Liste des Parents</h2>
    <a href="{{ route('parents.create') }}" class="btn btn-primary">+ Ajouter</a>
</div>

<table class="table table-bordered table-striped">
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
</table>
@endsection
