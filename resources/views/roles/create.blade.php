{{-- @extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center align-items-center" style="min-height: 85vh; background: linear-gradient(to right, #5e1f1f, #a15f33d3);">

    <form action="#" method="post" 
          class="card p-5 shadow-lg border-0 rounded-4" style="width: 100%; max-width: 600px;">
        @csrf

        <h4 class="text-center mb-4 fw-bold"> Créer un rôle </h4>

        <div class="mb-4">
            <label for="name" class="form-label fw-semibold fw-bold">Nom du rôle</label>
            <input 
            value="{{old('name')}}"
                style="font-size:14px;"
                type="text" 
                id="name_permission"
                name="name" 
                class="form-control form-control-lg rounded-3"
                placeholder="Entrez le nom du nouveau rôle."
                required
            >
            @error('name')
                <div class="text-danger fw-semibold">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="grid grid-col-4">
            @if ($permissions->isNotEmpty())
                @foreach ($permissions as $permission )
                    <div class="mt-3">
                        <input type="checkbox" class="rounded" name="permission[]" id="permission-{{$permission->id}}" value="{{$permission->name}}">
                        <label for="permission-{{$permission->id}}">{{$permission->name}}</label>
                    </div>
                @endforeach
            @endif
        </div>
     
        <button type="submit" class="btn btn-secondary w-100 rounded-3 fw-semibold">Enregistrer</button>

    </form>
</div>
@endsection --}}



@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center align-items-center" 
     style="min-height: 85vh; background: linear-gradient(to right, #5e1f1f, #a15f33d3);">

    <form action="{{ route('roles.store') }}" method="post" 
          class="card p-5 shadow-lg border-0 rounded-4" 
          style="width: 100%; max-width: 650px;">
        @csrf

        {{-- TITRE --}}
        <h4 class="text-center mb-4 fw-bold text-dark">
            🎭 Créer un rôle
        </h4>

        {{-- INPUT --}}
        <div class="mb-4">
            <label for="name" class="form-label fw-semibold">
                Nom du rôle
            </label>

            <input 
                value="{{ old('name') }}"
                type="text" 
                id="name"
                name="name" 
                class="form-control form-control-lg rounded-3 @error('name') is-invalid @enderror"
                placeholder="Entrez le nom du nouveau rôle..."
                required
            >

            @error('name')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- PERMISSIONS --}}
        <div class="mb-4">
            <label class="form-label fw-semibold mb-2">
                Permissions
            </label>

            <div class="row">
                @forelse ($permissions as $permission)
                    <div class="col-md-6 mb-2">
                        <div class="form-check">
                            <input 
                                class="form-check-input"
                                type="checkbox" 
                                name="permissions[]" 
                                id="permission-{{ $permission->id }}"
                                value="{{ $permission->name }}"
                            >
                            <label class="form-check-label" for="permission-{{ $permission->id }}">
                                {{ $permission->name }}
                            </label>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">Aucune permission disponible</p>
                @endforelse
            </div>
        </div>

        {{-- BUTTON --}}
        <button type="submit" 
                class="btn btn-dark w-100 rounded-3 fw-semibold shadow-sm">
              Enregistrer
        </button>

    </form>
</div>

@endsection