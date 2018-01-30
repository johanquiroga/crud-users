@extends('layout')

@section('title', "Página no encontrada")

@section('content')
    <div class="row">
        <img src="{{ asset('img/404.png') }}" class="img img-responsive" alt="404">
    </div>
    <br>
    <div class="row">
        <h1>Página no encontrada</h1>
    </div>
    <br>
    <a href="{{ route('users') }}" class="btn btn-outline-primary btn-lg">Vuelve al inicio</a>
@endsection