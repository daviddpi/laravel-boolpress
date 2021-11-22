@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{ route("admin.users.create") }}">Crea nuovo utente</a>
            </div>

            @forelse ($users as $user)
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            Nome: <a href="{{ route("admin.users.show", $user->id) }}">{{$user->name}}</a>
                        </li>
                        <li class="list-group-item">ID: {{$user->id}}</li>
                        <li class="list-group-item">Email: {{$user->email}}</li>
                    </ul>
                    <div class="col-12 m-2">
                        <a href="{{ route("admin.users.edit", $user->id) }}" class="badge badge-info">Modifica</a>
                        <a href="#" class="badge badge-danger ml-2">Elimina</a>
                    </div>
                </div>
            @empty
                <p>Nessun utente registrato</p>
            @endforelse
            
        </div>
    </div>
@endsection