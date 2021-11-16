@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Guests Home</h1>
            <a href="{{route("admin.posts.index")}}">Vai a Admin</a>
        </div>
    </div>
</div>
@endsection
