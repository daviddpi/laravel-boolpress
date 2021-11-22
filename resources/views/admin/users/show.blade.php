@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Nome: {{$user->name}}</li>
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