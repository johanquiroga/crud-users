@extends('layout')

@section('title', 'Usuarios')

@section('content')
    <h1 class="text-center">{{ $title }}</h1>

    <p style="float: right">
        <a class="btn btn-primary" href="{{ route('users.create') }}" role="button">Crear usuario</a>
    </p>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Correo electrónico</th>
                    <th class="text-center" colspan="3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td class="text-center">{{ $user->id }}</td>
                        <td class="text-center">{{ $user->name }}</td>
                        <td class="text-center">{{ $user->email }}</td>
                        <td class="text-center">
                            <a class="btn btn-info btn-sm" href="{{ route('users.show', $user) }}" role="button">Ver detalles</a>
                        </td>
                        <td class="text-center">
                            <a class="btn btn-success btn-sm" href="{{ route('users.edit', $user) }}" role="button">Editar</a>
                        </td>
                        <td class="text-center">
                            <form class="form-inline" action="{{ route('users.destroy', $user) }}" method="POST">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6">No hay usuarios registrados.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@section('sidebar')
    @parent
@endsection