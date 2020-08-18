<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class novaSenhaController extends Controller
{
    public function novaSenha(){
        return view('nova-senha');
    }
}
