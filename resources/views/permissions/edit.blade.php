@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center align-items-center" style="min-height: 85vh; background: linear-gradient(to right, #5e1f1f, #a15f33d3);">

    <form action="{{route('permissions.update', $permission->id)}}" method="post" 
          class="card p-5 shadow-lg border-0 rounded-4" style="width: 100%; max-width: 600px;">
        @csrf

        <h4 class="text-center mb-4 fw-bold"> Modifier la permission: <span class="text-danger">{{$permission->name}}</span> </h4>

        <div class="mb-4">
            <label for="name" class="form-label fw-semibold fw-bold">Nom de la permission</label>
            <input 
            value="{{old('name', $permission->name)}}"
                style="font-size:14px;"
                type="text" 
                id="name_permission"
                name="name" 
                class="form-control form-control-lg rounded-3"
                required
            >
            @error('name')
                <div class="text-danger fw-semibold">
                    {{ $message }}
                </div>
            @enderror
        </div>
     
        <button type="submit" class="btn btn-secondary w-100 rounded-3 fw-semibold">Modifier la permission</button>

    </form>
</div>
@endsection
