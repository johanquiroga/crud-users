@extends('layout')

@section('title', "Página no encontrada")

@section('content')
    <div class="text-center">
        <img src="{{ asset('img/404.png') }}" class="img img-responsive" alt="404">
    </div>
    <br>
    <h1 class="text-center">Página no encontrada</h1>
    <br>
    <div class="text-center">
        <a href="{{ route('users') }}" class="btn btn-outline-primary btn-lg" role="button">Vuelve al inicio</a>
    </div>
@endsection