<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cadastroUsuarioController extends Controller
{
    public function cadastroUsuario(){
        return view('cadastro-usuario');
    }
}
