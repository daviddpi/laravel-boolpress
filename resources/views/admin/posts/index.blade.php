@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Post da visualizzare</h2>
                <a href="{{ route("admin.posts.create") }}">
                    <h6>Crea nuovo post</h6>
                </a>
                @if (session('delete'))
                    <div class="alert alert-success" role="alert">
                        {{ session('delete') }} Cancellazione eseguita correttamente!
                    </div>
                @endif
            </div>
            @forelse ($posts as $post)
                <div class="col-12">
                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="{{$post->image_url}}" class="card-img" alt="immagine articolo">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">

                                    <a href="{{ route("admin.posts.show", $post) }}">
                                        <h5 class="card-title">{{$post->title}}</h5>
                                    </a>

                                @if ($post->category)
                                    <span class="badge badge-info px-3 mb-4">{{$post->category->name}}</span>
                                @else <span class="badge badge-warning">Nessuna categoria</span>

                                @endif

                                <p class="card-text">
                                    {{$post->post_content}}
                                </p>
                                <p class="card-text">
                                    <small class="text-muted">
                                        Fatto da: {{$post->author}} il {{$post->post_date}}
                                    </small>
                                </p>
                                <div class="d-flex align-items-center">
                                    <a class="card-text" href="{{ route("admin.posts.edit", $post) }}">
                                        <h6>Modifica post</h6>
                                    </a>
                                    <form class="card-text mx-3" action="{{route("admin.posts.destroy", $post)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                        <button type="submit" class="btn btn-danger">
                                            Cancella post
                                        </button>
                                    </form>
                                </div>
                            </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <h3>Non ci sono contenuti da visualizzare</h3>
            @endforelse
        </div>
    </div>
    
@endsection