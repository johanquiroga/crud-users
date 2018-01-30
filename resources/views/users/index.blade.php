@extends('layout')

@section('title', 'Usuarios')

@section('content')
    <h1>{{ $title }}</h1>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">E-mail</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td class="text-center">{{ $user->id }}</td>
                        <td class="text-center">{{ $user->name }}</td>
                        <td class="text-center">{{ $user->email }}</td>
                        <td class="text-center"><a href="{{ route('users.show', ['id' => $user->id]) }}">Ver detalles</a></td>
                    </tr>
                @empty
                    <tr><td colspan="4">No hay usuarios registrados.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@section('sidebar')
    @parent
@endsection