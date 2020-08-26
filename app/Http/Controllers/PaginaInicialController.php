<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginaInicialController extends Controller
{
    public function paginaInicial(){
        return view('paginaInicial'); // ir para o web.php
    }
}
