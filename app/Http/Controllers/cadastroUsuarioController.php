<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Habilidade;

class cadastroUsuarioController extends Controller
{
    public function cadastroUsuario()
    {
        $habilidades = Habilidade::all();
        return view('users.edit', compact('habilidades'));
    }

    public function experiencia()
    {
        return view('users.experiencias.create');
    }


}
