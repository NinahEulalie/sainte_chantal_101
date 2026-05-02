@extends('layouts.app')

@section('content')
<h2>Modifier le Profil de l'utilisateur</h2>

<form action="{{ route('users.update', $user->id) }}" method="post" class="card p-4 shadow-sm">
    @csrf
    @method('POST')

    <div class="row">
        <div class="col-12 mb-3">
            <label>Matricule </label>
            <input type="text" name="matricule_parent" value="{{ old('id',$user->id)}}" class="form-control" required>
        </div>
        @error('id')
                <div class="text-danger fw-semibold">
                    {{ $message }}
                </div>
        @enderror

        <div class="col-md-6 mb-3">
            <label>Nom</label>
            <input type="text" name="name" value="{{ old('name',$user->name) }}" class="form-control">
        </div>
        @error('name')
                <div class="text-danger fw-semibold">
                    {{ $message }}
                </div>
        @enderror
        {{-- <div class="col-md-6 mb-3">
            <label>prenom</label>
            <input type="text" name="prenom" value="{{ old('prenom',$user->prenom) }}" class="form-control">
        </div>

        <div class="col-md-6 mb-3">
            <label>Téléphone</label>
            <input type="text" name="telephone" value="{{ old('telephone',$user->telephone) }}" class="form-control">
        </div> --}}
        <div class="col-md-6 mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email',$user->email) }}" class="form-control">
        </div>
        @error('email')
                <div class="text-danger fw-semibold">
                    {{ $message }}
                </div>
        @enderror

        {{-- <div class="col-12 mb-3">
            <label>Adresse</label>
            <textarea name="adresse" class="form-control">{{ $user->adresse }}</textarea>
        </div> --}}
        {{-- ROLES --}}
        <div class="mb-4">
            <label class="form-label fw-semibold mb-2">
                roles
            </label>

            <div class="row">
                @if ($roles->isNotEmpty())                    
                    @forelse ($roles as $role)
                        <div class="col-md-6 mb-2">
                            <div class="form-check ">
                                <input 
                                    {{ ($hasRoles->contains($role->id) ? 'checked' : '')}}
                                    class="form-check-input border-dark"
                                    type="checkbox" 
                                    name="role[]" 
                                    id="role-{{ $role->id }}"
                                    value="{{ $role->name }}"
                                >
                                <label class="form-check-label" for="role-{{ $role->id }}">
                                    {{ $role->name }}
                                </label>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted">Aucune role disponible</p>
                    @endforelse
                @endif
            </div>
        </div>
    </div>

    <button class="btn btn-primary">Mettre à jour</button>
</form>
@endsection