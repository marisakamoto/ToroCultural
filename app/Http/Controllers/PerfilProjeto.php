<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilProjeto extends Controller
{
    public function  perfilProjeto (){
        return view ('perfil-projeto');
    }
}
