@extends('layout')

@section('title', "Usuario {$id}")

@section('menu-items')
    @parent
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/usuarios') }}">Usuarios nueva</a>
    </li>
@endsection

@section('content')
    <h1>Mostrando detalle del usuario: {{ $id }}</h1>

    <ul>
        @forelse ($user as $key => $value)
            <li><strong>{{ $key }}:</strong> {{ $value }}</li>
        @empty
            <li>No existe el usuario</li>
        @endforelse
    </ul>
@endsection