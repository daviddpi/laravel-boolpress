@extends('layouts.app')

@section('content')
    <div class="container">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <a href="{{route("admin.posts.index")}}">Torna indietro</a>
        <form action="{{ route("admin.posts.update", $post) }}" method="POST"
        enctype="multipart/form-data">
        @method("PATCH")
        @csrf
            <div class="form-group">
                <label for="title">Inserisci il titolo</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Titolo"
                value="{{old("title",$post->title)}}">
            </div>
            <div class="form-group">
                <label for="author">Inserisci l'autore</label>
                <input type="text" class="form-control" name="author" id="author" placeholder="Autore"
                value="{{old("author", $post->author)}}">
            </div>
            <div class="form-group">
                <select name="category_id" id="category_id">
                    <option value="{{null}}">Nessuna categoria</option>
                    @foreach ($categories as $category)
                        <option @if (old("category_id", $post->category->id) == $category->id) selected @endif
                        value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <legend>Tag</legend>
                @foreach ($tags as $tag)
                    <div class="form-check-inline mx-3">
                        <input class="form-check-input" type="checkbox" id="tag-{{$tag->id}}" name="tags[]"
                        @if (in_array($tag->id, old("tags", $tagIds ? $tagIds : []))) checked @endif
                        value="{{$tag->id}}">
                        <label class="form-check-label" for="tag-{{$tag->id}}">{{$tag->name}}</label>
                    </div>
                @endforeach
            </div>
            <div class="form-group">
                <label for="post_content">Inserisci il contenuto</label>
                <textarea type="text" class="form-control" name="post_content" id="post_content" placeholder="Contenuto ...">
                    {{old("post_content", $post->post_content)}}
                </textarea>
            </div>
            <div class="form-group">
                <label for="image_url">Inserisci l'immagine</label>
                <input type="file" class="form-control" name="image_url" id="image_url" placeholder="..."
                value="{{old("image_url", $post->image_url)}}">
            </div>
            <button class="btn btn-primary" type="submit">Salva</button>
            <button class="btn btn-secondary" type="reset">Svuota campi</button>

        </form>
    </div>
@endsection