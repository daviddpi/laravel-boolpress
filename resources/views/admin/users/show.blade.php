@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Nome: {{$user->name}}</li>
                        @forelse ($user->roles as $role)
                            <li class="list-group-item">Tipo: {{$role->name}}</li>
                            <li class="list-group-item">Livello: {{$role->level}}</li>
                        @empty
                            <li class="list-group-item">Nessun Ruolo</li>
                        @endforelse
                    <li class="list-group-item">ID: {{$user->id}}</li>
                    <li class="list-group-item">Email: {{$user->email}}</li>
                </ul>
            </div>
            <div class="col-12 m-2">
                <a href="{{ route("admin.users.index") }}">Torna indietro</a>
            </div>
        </div>
    </div>
@endsection