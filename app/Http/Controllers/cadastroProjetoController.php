<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cadastroProjetoController extends Controller
{
    public function cadastroProjeto(){
        return view('cadastro-projeto');
    }
}
