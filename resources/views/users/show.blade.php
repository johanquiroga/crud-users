@extends('layout')

@section('title', "Usuario {$user->id}")

@section('content')
    <h1>Usuario #{{ $user->id }}</h1>

    <ul>
        <li>Nombre del usuario: {{ $user->name }}</li>
        <li>Correo electrónico: {{ $user->email }}</li>
    </ul>
@endsection