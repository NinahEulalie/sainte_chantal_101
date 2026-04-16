@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Liste des permissions</h2>
    <a href="{{ route('permissions.create') }}" class="btn btn-primary border border-dark">+ Ajouter</a>
</div>
@if (Session::has('success'))    
<div class="alert alert-success d-flex align-items-center gap-2 shadow-sm rounded-3">
    <span>🎉</span>
    <div>{{Session::get('success')}} </div>
</div>
@endif

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Nom de la permission </th>
            <th>Date de création </th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($permissions as $permission)
        <tr class="text-center">
            <td>{{ $permission->id }}</td>
            <td>{{ $permission->name }}</td>
            <td>{{ \Carbon\Carbon::parse($permission->created_at)->format('d M, Y') }}</td>
            <td>
                <a href="{{route("permissions.edit", $permission->id)}}" class="btn btn-warning btn-sm shadow-sm">✏️ Modifier</a>
                <a href="javascript:void()" onclick="deletePermission({{$permission->id}})" class="btn btn-danger btn-sm shadow-sm"> 🗑 Supprimer</a>
                {{-- <form action="{{route("permissions.destroy", $permission->id)}}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Supprimer</button>
                </form> --}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$permissions->links()}}
@endsection
@push('scripts')
    <script type="text/javascript">
        function deletePermission(id){
            if(confirm("Are you sure you want to delete?")){
                $.ajax({
                    url : '{{route("permissions.destroy")}}',
                    type : 'delete',
                    data : {id:id},
                    dataType : 'json',
                    headers : {
                        'x-csrf-token' : '{{csrf_token()}}'
                    },
                    success: function(response){
                        window.location.href = "{{route('permissions.list')}}";
                    }
                })
            }
        }
    </script>
@endpush

