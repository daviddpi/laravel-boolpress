@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route("admin.posts.index") }}">Torna indietro</a>
        <div class="row">
            <div class="col-12">
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="{{asset("storage/". $post->image_url) }}" class="card-img" alt="immagine articolo">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                            <h5 class="card-title">{{$post->title}}</h5>
                            @if ($post->category)
                                <span class="badge badge-info px-3 mb-4">{{$post->category->name}}</span>
                            @else <span class="badge badge-warning">Nessuna categoria</span>

                            @endif

                            <div class="d-flex mb-2">
                                @forelse ($post->tags as $tag)
                                   <span class="badge m-1" style="background-color: {{$tag->color}}">{{$tag->name}}</span>
                                @empty
                                   <span class="badge badge-warning">Nessun tag</span>
                                @endforelse
                            </div>

                            <p class="card-text">
                                {{$post->post_content}}
                            </p>
                            <p class="card-text">
                                <small class="text-muted">
                                    Fatto da: {{$post->author}} il {{$post->post_date}}
                                </small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection