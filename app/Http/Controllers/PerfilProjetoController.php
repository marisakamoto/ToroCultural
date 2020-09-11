<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projeto;
use App\Categoria;
use App\Habilidade;
use Illuminate\Support\Facades\Storage;
use App\Publish;

class PerfilProjetoController extends Controller
{
    public function __contruct()
    {//a pessoa precisa estar logada para construir um projeto
	    $this->middlewate('auth');
    }

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
        $posts = Publish::where('projeto_id',  $id)->get();

        return view('show', compact('projeto', 'categorias', 'user_colaborador', 'vagas', 'user_criador','posts' ));
    }

    public function create()
    {
        $categorias = Categoria::All();
        return view ('projetos.create', compact('categorias'));
    }

    public function store(Request $request)
    {

        $projeto = new Projeto;


        //Ele salvará a imagem com o caminho 
        if($request->hasfile('url_foto') && $request->url_foto->isvalid()){ //name do input
            $url_foto = $request->url_foto->store('projetos');          //salvar o caminho da imagem
            $projeto->url_foto = $url_foto;
        }
        
        $projeto->user_id = auth()->user()->id;
        $projeto->titulo = request('titulo');
        $projeto->descricao = request('descricao');
        $projeto->localizacao = request('localizacao');
        $projeto->data_de_realizacao = request('data_de_realizacao');
        
        $categorias = $request->get('checkbox'); //array:[2, 3, 8]
        $projeto->save(); //id
        $projeto->categorias()->attach($categorias, ['projeto_id' => $projeto->id]);
        // dd($projeto->id);
        return redirect('/projeto/'.$projeto->id);
    }

    public function image($imagem) // $projeto->url_foto => projetos/hsdjhsajhaksjhdjkas.jpg
    {
        $caminho = "projetos/$imagem";
        $arquivo = Storage::get($caminho); //binário
        $type = Storage::mimeType($caminho); //formato do arquivo png ou jpg

        return response($arquivo, 200)->header('Content-Type', $type);
    }



    //RETORNA VIEW COM FORMULÁRIO PARA EDITAR
    public function edit($id)
    {
        $projeto = Projeto::find($id);
        return view('projetos.edit', compact('projeto'));
    }
    

    public function update($id, Request $request)
    {
        
        
        $projeto = Projeto::find($id);
        //Ele salvará a imagem com o caminho 
        if($request->hasfile('url_foto') && $request->url_foto->isvalid()){
            $url_foto = $request->url_foto->store('projetos');
            $projeto->url_foto = $url_foto;
        }

        $projeto->titulo = request('titulo');
        $projeto->descricao = request('descricao');
        $projeto->localizacao = request('localizacao');
        $projeto->data_de_realizacao = request('data_de_realizacao');
        $projeto->save();

        // dd($projeto->id);
        return redirect('/projeto/'.$projeto->id);
    }

    public function delete($id)
    {
        Projeto::find($id)->delete();
        return redirect('/home');

    }

    public function createVaga()
    {
        $habilidades = Habilidade::All();
        return view ('projetos.vagas.create', compact('habilidades'));
    }


}
