@extends('layouts.app')

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

        <tbody>
        @forelse ($eleves as $eleve)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $eleve->matricule }}</td>
            <td>{{ $eleve->nom }}</td>
            <td>{{ $eleve->prenom }}</td>

            <td>
                {{ \Carbon\Carbon::parse($eleve->date_nais)->format('d/m/Y') }}
            </td>

            <td>{{ $eleve->lieu_nais }}</td>

            <td>{{ $eleve->genre }}</td>

            <td>
                @if($eleve->parent)
                    <strong>Père :</strong> {{ $eleve->parent->nom_pere }} <br>
                    <strong>Mère :</strong> {{ $eleve->parent->nom_mere }}
                @else
                    <span class="text-muted">Non renseigné</span>
                @endif
            </td>

            <td>
                <a href="{{ route('eleves.show', $eleve->id_eleve) }}" class="btn btn-sm btn-info">Voir</a>
                <a href="{{ route('eleves.edit', $eleve->id_eleve) }}" class="btn btn-sm btn-warning">Modifier</a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="9" class="text-center text-muted">
                Aucun élève enregistré
            </td>
        </tr>
        @endforelse
        </tbody>

</table>

@endsection
