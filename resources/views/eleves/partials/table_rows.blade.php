@forelse($eleves as $eleve)
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