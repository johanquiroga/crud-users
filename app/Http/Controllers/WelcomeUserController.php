<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeUserController extends Controller
{
    public function index($name)
    {
        $name = ucfirst($name);

        return "Bienvendido {$name}";
    }

    public function indexNickname($name, $nickname)
    {
        return $this->index($name) . ", tu apodo es $nickname";
    }
}
