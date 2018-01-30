@extends('layout')

@section('title', 'Crear Usuario')

@section('content')
    <h1 class="text-center">Crear nuevo usuario</h1>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Por favor corrige los errores debajo:</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <form method="POST" action="{{ url('usuarios') }}">
        {{ csrf_field() }}

        <div class="form-group row">
            <label for="name" class="col-2 col-form-label">Nombre:</label>
            <div class="col-10">
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name') }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-2 col-form-label">Correo electrónico:</label>
            <div class="col-10">
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-2 col-form-label">Contraseña:</label>
            <div class="col-10">
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password">
                @if($errors->has('password'))
                    <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="offset-sm-3 col-sm-3">
                <button type="submit" class="btn btn-success">Crear usuario</button>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-primary" href="{{ route('users') }}" role="button">Regresar al listado de usuarios</a>
            </div>
        </div>
    </form>
@endsection