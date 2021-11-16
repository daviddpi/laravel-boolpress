@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route("admin.posts.index")}}">Torna indietro</a>
        <form action="{{ route("admin.posts.update", $post) }}" method="POST">
        @method("PATCH")
        @csrf
            <div class="form-group">
                <label for="title">Inserisci il titolo</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Titolo"
                value="{{$post->title}}">
            </div>
            <div class="form-group">
                <label for="author">Inserisci l'autore</label>
                <input type="text" class="form-control" name="author" id="author" placeholder="Autore"
                value="{{$post->author}}">
            </div>
            <div class="form-group">
                <label for="post_content">Inserisci il contenuto</label>
                <textarea type="text" class="form-control" name="post_content" id="post_content" placeholder="Contenuto ...">
                    {{$post->post_content}}
                </textarea>
            </div>
            <div class="form-group">
                <label for="image_url">Inserisci l'url dell'immagine</label>
                <input type="text" class="form-control" name="image_url" id="image_url" placeholder="Url .."
                value="{{$post->image_url}}">
            </div>
            <button class="btn btn-primary" type="submit">Salva</button>
            <button class="btn btn-secondary" type="reset">Svuota campi</button>

        </form>
    </div>
@endsection