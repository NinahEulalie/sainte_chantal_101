@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Liste des Activités parascolaires</h2>
    <a href="{{ route('parascolaires.create') }}" class="btn btn-primary">+ Ajouter</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>Activité à choisir</th>
            <th>Frais à payer</th>
        </tr>
    </thead>
    <tbody>
        @foreach($parascolaires as $parascolaire)
        <tr>
            <td>{{ $parascolaire->activite_choisie }}</td>
            <td>{{ $parascolaire->frais_para }} Ariary </td>
            <td>
                <a href="{{ route('parascolaires.show', $parascolaire->id_para) }}" class="btn btn-info btn-sm">Voir</a>
                <a href="{{ route('parascolaires.edit', $parascolaire->id_para) }}" class="btn btn-warning btn-sm">Modifier</a>
                <form action="{{ route('parascolaires.destroy', $parascolaire->id_para) }}" method="POST" class="d-inline">
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
