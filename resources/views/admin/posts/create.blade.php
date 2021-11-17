@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route("admin.posts.index")}}">Torna indietro</a>
        <form action="{{ route("admin.posts.store") }}" method="POST">
        @csrf
            <div class="form-group">
                <label for="title">Inserisci il titolo</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Titolo">
            </div>
            <div class="form-group">
                <label for="author">Inserisci l'autore</label>
                <input type="text" class="form-control" name="author" id="author" placeholder="Autore">
            </div>
            <div class="form-group">
                <select name="category_id" id="category_id">
                    <option>Nessuna categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="post_content">Inserisci il contenuto</label>
                <textarea type="text" class="form-control" name="post_content" id="post_content" placeholder="Contenuto ...">
                </textarea>
            </div>
            <div class="form-group">
                <label for="image_url">Inserisci l'url dell'immagine</label>
                <input type="text" class="form-control" name="image_url" id="image_url" placeholder="Url ..">
            </div>
            <button class="btn btn-primary" type="submit">Salva</button>
            <button class="btn btn-secondary" type="reset">Svuota campi</button>

        </form>
        
    </div>
@endsection