<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\contatoEmail;
use Illuminate\Support\Facades\Mail;

class PaginaInicialController extends Controller
{
    public function paginaInicial(){
        return view('paginaInicial'); // ir para o web.php
    }

    public function enviaContato(Request $request)
    {
        Mail::to('torocultural@gmail.com')->send(new ContatoEmail($request));

        // dd($request->all());

        return redirect('/');

        
    }
}
