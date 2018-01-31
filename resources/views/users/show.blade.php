@extends('layout')

@section('title', "Usuario {$user->id}")

@section('content')
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <td colspan="2" class="text-center"><strong>Usuario #{{ $user->id }}</strong></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center">Nombre del usuario:</td>
                    <td class="text-center">{{ $user->name }}</td>
                </tr>
                <tr>
                    <td class="text-center">Correo electrónico:</td>
                    <td class="text-center">{{ $user->email }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="offset-sm-3 col-sm-3">
            <a class="btn btn-success" href="{{ route('users.edit', $user) }}" role="button">Editar usuario</a>
        </div>
        <div class="col-sm-6">
            <a class="btn btn-primary" href="{{ route('users') }}" role="button">Regresar al listado de usuarios</a>
        </div>
    </div>
@endsection