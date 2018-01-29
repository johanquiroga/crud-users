<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        $title = 'Listado de usuarios';

        return view('users.index', compact('title', 'users'));
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

        return view('users.show', compact('user', 'id'));
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
