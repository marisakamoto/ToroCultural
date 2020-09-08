<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projeto;
use App\Categoria;
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
        $user_criador = $projeto->user_criador;
        $categorias = $projeto->categorias;
        $user_colaborador = $projeto->projeto_user_colaboradores;
        $vagas = $projeto->vagas;

        return view('show', compact('projeto', 'categorias', 'user_colaborador', 'vagas', 'user_criador'));
    }

    public function create()
    {
        $categorias = Categoria::All();
        return view ('projetos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $projeto = new Projeto;
        if($request->hasfile('url_foto') && $request->url_foto->isvalid()){
            $url_foto = $request->url_foto->store('projetos');
        }
        $projeto->url_foto = $url_foto;
        $projeto->user_id = auth()->user()->id;
        $projeto->titulo = request('titulo');
        $projeto->descricao = request('descricao');
        $projeto->localizacao = request('localizacao');
        $projeto->data_de_realizacao = request('data_de_realizacao');
        $projeto->save();

        // dd($projeto->id);
        return redirect('/projeto/'.$projeto->id);
    }

    public function createVaga()
    {
        $habilidades = Habilidade::All();
        return view ('projetos.vagas.create', compact('habilidades'));
    }


}
