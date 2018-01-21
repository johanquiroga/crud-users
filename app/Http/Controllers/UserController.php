<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        if (request()->has('empty')) {
            $users = [];
        } else {
            $users = ['Joel','Ellie','Tess','Tommy','Bill'];
        }

        $title = 'Listado de usuarios';

        return view('users', compact('title', 'users'));
    }

    public function show($id)
    {
        if (request()->has('empty')) {
            $user = [];
        } else {
            $user = [
                'id' => $id,
                'name' => 'Johan Quiroga',
                'nickname' => 'johanquiroga',
                'website' => 'http://johanquiroga.me'
            ];
        }

        $title = "Mostrando detalle del usuario: {$id}";

        return view('details', compact('user', 'title'));
    }

    public function create()
    {
        return 'Crear nuevo usuario';
    }

    public function edit($id)
    {
        return "Editando el usuario: {$id}";
    }
}
