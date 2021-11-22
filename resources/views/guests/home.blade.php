@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Guests Home</h1>
            <a href="{{route("admin.posts.index")}}">Visualizza i post</a>
            <br>
            <a href="{{route("admin.users.index")}}">Visualizza gli utenti</a>
        </div>
    </div>
</div>
@endsection
