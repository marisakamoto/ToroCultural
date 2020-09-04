<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projeto;
use App\Categoria;
use App\Vaga;
use App\Habilidade;


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
        $categorias = $projeto->categorias;
        $user_colaborador = $projeto->projeto_user_colaboradores;
        $vagas = $projeto->vagas;
        // $habilidades = $vagas->habilidades;  
        // Não dá certo, porque $vagas é um array de vagas, então, preciso entrar em cada vaga para buscar as habilidades
    
        
        return view('show', compact('projeto', 'categorias', 'user_colaborador', 'vagas'));
    }


}
