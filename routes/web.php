<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/usuarios', function () {
    return 'Usuarios';
});

Route::get('/usuarios/nuevo', function () {
    return 'Crear nuevo usuario';
});

Route::get('/usuarios/{id}', function ($id) {
    return "Mostrando detalle del usuario: {$id}";
});

Route::get('/usuarios/{id}/edit', function ($id) {
    return "Editando el usuario: {$id}";
})->where('id', '\d+');

Route::get('/saludo/{name}/{nickname?}', function ($name, $nickname = null) {
    $name = ucfirst($name);

    if ($nickname) {
        return "Bienvendido {$name}, tu apodo es {$nickname}";
    } else {
        return "Bienvendido {$name}";
    }
});