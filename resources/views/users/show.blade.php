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
                    <td class="text-center">E-mail:</td>
                    <td class="text-center">{{ $user->email }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection