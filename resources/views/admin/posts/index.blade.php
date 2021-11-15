@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Post da visualizzare</h2>
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
                                <h5 class="card-title">{{$post->title}}</h5>
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
            @empty
                <h3>Non ci sono contenuti da visualizzare</h3>
            @endforelse
        </div>
    </div>
    
@endsection