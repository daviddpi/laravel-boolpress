@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="card-body">
                <a href="{{route("admin.users.index")}}">Torna indietro</a>

                <form method="POST" action="{{ route('admin.users.update', $user) }}">
                    @method("PATCH")
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>

                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Salva modifiche') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection