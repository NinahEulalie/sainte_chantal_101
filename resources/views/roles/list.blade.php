@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Liste des Rôles</h2>
    <a href="{{ route('roles.create') }}" class="btn btn-primary border border-dark">+ Ajouter</a>
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
            <th>Nom du rôle </th>
            <th>Permisssions </th>
            <th>Date de création </th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($roles as $role)
        
        <tr class="text-center">
            <td>{{ $role->id }}</td>
            <td>{{ $role->name }}</td>
            <td>{{ $role->permissions->pluck('name')->implode(", ") }}</td>
            <td>{{ \Carbon\Carbon::parse($role->created_at)->format('d M, Y') }}</td>
            <td>
                <a href="{{route("roles.edit", $role->id)}}" class="btn btn-warning btn-sm shadow-sm">✏️ Modifier</a>
                <a href="javascript:void()" onclick="deleteRole({{$role->id}})" class="btn btn-danger btn-sm shadow-sm"> 🗑 Supprimer</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$roles->links()}}
@endsection
@push('scripts')
    <script type="text/javascript">
        function deleteRole(id){
            if(confirm("Are you sure you want to delete?")){
                $.ajax({
                    url : '{{route("roles.destroy")}}',
                    type : 'delete',
                    data : {id:id},
                    dataType : 'json',
                    headers : {
                        'x-csrf-token' : '{{csrf_token()}}'
                    },
                    success: function(response){
                        window.location.href = "{{route('roles.list')}}";
                    }
                })
            }
        }
    </script>
@endpush

