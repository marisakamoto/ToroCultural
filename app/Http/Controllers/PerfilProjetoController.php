<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projeto;



class PerfilProjetoController extends Controller
{
    public function  perfilProjeto ()
    {
        return view ('perfil-projeto');
    }

    
    
    public function show($id)
    {   
        //Como as tabelas estão relacionadas, posso chamá-las através do model projeto
        $projeto = Projeto::find($id); 
        $user_criador = $projeto->user_criador;
        $categorias = $projeto->categorias;
        $user_colaborador = $projeto->projeto_user_colaboradores;
        $vagas = $projeto->vagas;
        return view('show', compact('projeto', 'categorias', 'user_colaborador', 'vagas', 'user_criador'));
    }


}
