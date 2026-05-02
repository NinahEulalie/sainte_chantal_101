@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Liste des utilisateurs</h2>
    <a href="{{route('show.register')}}" class="btn btn-primary border border-dark">+ Ajouter</a>
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
            <th>Nom</th>
            <th>email</th>
            <th>role</th>
            <th>Date d'ajout </th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        
        <tr class="text-center">
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->roles->pluck('name')->implode(" | ") }}</td>
            <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d M, Y') }}</td>
            <td>
                <a href="{{route("users.edit", $user->id)}}" class="btn btn-warning btn-sm shadow-sm">✏️ Modifier</a>
                <a href="javascript:void()" onclick="deleteUser({{$user->id}})" class="btn btn-danger btn-sm shadow-sm"> 🗑 Supprimer</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$users->links()}}
@endsection
@push('scripts')
    <script type="text/javascript">
        function deleteUser(id){
            if(confirm("Are you sure you want to delete?")){
                $.ajax({
                    url : '{{route("users.destroy")}}',
                    type : 'delete',
                    data : {id:id},
                    dataType : 'json',
                    headers : {
                        'x-csrf-token' : '{{csrf_token()}}'
                    },
                    success: function(response){
                        window.location.href = "{{route('users.list')}}";
                    }
                })
            }
        }
    </script>
@endpush