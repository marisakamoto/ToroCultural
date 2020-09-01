<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projeto;

class PerfilProjeto extends Controller
{
    public function  perfilProjeto ()
    {
        return view ('perfil-projeto');
    }

    public function show($id)
    {
        $projeto = Projeto::find($id);
        return view('perfil-projeto', compact('projeto'));
    }
}
