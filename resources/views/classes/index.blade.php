@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Liste des Classes</h2>
    <a href="{{ route('classes.create') }}" class="btn btn-primary">+ Ajouter</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>Nom de la classe</th>
            <th>Effectif</th>
            <th>Niveau</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($classes as $classe)
        <tr>
            <td>{{ $classe->nom_classe }}</td>
            <td>{{ $classe->effectif }}</td>
            <td>{{ $classe->niveau }}</td>
            <td>
                <a href="{{ route('classes.show', $classe->id_classe) }}" class="btn btn-info btn-sm">Voir</a>
                <a href="{{ route('classes.edit', $classe->id_classe) }}" class="btn btn-warning btn-sm">Modifier</a>
                <form action="{{ route('classes.destroy', $classe->id_classe) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
