@extends('layout')

@section('title', 'Usuarios')

@section('content')
    <h1 class="text-center">{{ $title }}</h1>

    <div class="row">
        <div class="col">
            <p style="float: right">
                <a class="btn btn-primary" href="{{ route('users.create') }}" role="button">Crear usuario</a>
            </p>
        </div>
    </div>

    @if($users->isNotEmpty())

        <div class="table-responsive">
            <table class="table table-hover table-sm">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="text-center">Id</th>
                        <th scope="col" class="text-center">Nombre</th>
                        <th scope="col" class="text-center">Correo electrónico</th>
                        <th scope="col" class="text-center" colspan="3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row" class="text-center">{{ $user->id }}</th>
                            <td class="text-center">{{ $user->name }}</td>
                            <td class="text-center">{{ $user->email }}</td>
                            <td class="text-center">
                                <a class="btn btn-info btn-sm" href="{{ route('users.show', $user) }}" role="button"><span class="oi oi-eye"></span></a>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-warning btn-sm" href="{{ route('users.edit', $user) }}" role="button"><span class="oi oi-pencil"></span></a>
                            </td>
                            <td class="text-center">
                                <form class="form-inline" action="{{ route('users.destroy', $user) }}" method="POST">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm"><span class="oi oi-trash"></span></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="row">
            <div class="col">
                <div class="alert alert-warning fade show" role="alert">
                    <div class="text-center"><strong>No hay usuarios registrados.</strong></div>
                </div>
            </div>
        </div>
    @endif
@endsection