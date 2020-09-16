<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projeto;
use App\Categoria;
use App\Habilidade;
use Illuminate\Support\Facades\Storage;
use App\Publish;
use App\User;
use Illuminate\Support\Facades\DB;

class PerfilProjetoController extends Controller
{
    public function __contruct()
    {//a pessoa precisa estar logada para construir um projeto
	$this->middlewate('auth');
    }

    public function show($id)
    {
        //Como as tabelas estão relacionadas, posso chamá-las através do model projeto
        $projeto = Projeto::find($id);
        $user_criador = $projeto->user_criador;
        $categorias = $projeto->categorias;
        $user_colaborador = $projeto->projeto_user_colaboradores;
        $vagas = $projeto->vagas;
        $posts = Publish::where('projeto_id',  $id)->orderBy('id', 'DESC')->get();
        $seguidores = $projeto->user_projetoSeguido()->get();
        $myTime = \Carbon\Carbon::now();

        $data_realizacao = $projeto->data_de_realizacao;
        $data_date = date_create_from_format('d/m/Y',$data_realizacao);

        $month = $data_date->format('F');
        $year = $data_date->format('Y');
        $day = $data_date->format('d');
        
        function pegaIdSeguidores($seguidores)
        {
            $id_seguidores = [];
            for ($i=0; $i < count($seguidores); $i++) { 
                $id_seguidores[] = $seguidores[$i]->id;
            }
            return $id_seguidores;
        }

        $id_seguidores = pegaIdSeguidores($seguidores);

        function verificaId($id_seguidores)
        {
            if(in_array(auth()->user()->id, $id_seguidores)){
                return true;
            }
        }

        $seguidoPeloLogado = verificaId($id_seguidores);
  

        return view('show', compact('projeto', 'categorias', 'user_colaborador', 'vagas', 'user_criador','posts', 'seguidoPeloLogado', 'seguidores', 'myTime', 'month', 'year', 'day'));
    }

    public function create()
    {
        $categorias = Categoria::All();
        return view ('projetos.create', compact('categorias'));
    }

    
    public function store(Request $request)
    {
        $projeto = new Projeto;

        if($request->hasfile('imagem') && $request->imagem->isvalid()){
            $destination_path = 'img/users';
            $image = $request->file('imagem');
            $image_name = $image->getClientOriginalName();
            $imageExt = $image->getClientOriginalExtension();
            $imageFinal = $image_name.date('Y-m-d-H-i-s').".".$imageExt;
            $path = $request->file('imagem')->storeAs($destination_path, $imageFinal, 'public');
            $projeto->url_foto = $path;
        }

        $projeto->user_id = auth()->user()->id;
        $projeto->titulo = request('titulo');
        $projeto->descricao = request('descricao');
        $projeto->localizacao = request('localizacao');
        $projeto->data_de_realizacao = request('data_de_realizacao');

        $categorias = $request->get('checkbox'); //array:[2, 3, 8]
        $projeto->save(); //id
        $projeto->categorias()->attach($categorias, ['projeto_id' => $projeto->id]);
        $projeto->user_projetoSeguido()->attach( ['userSeguindo_id' => $projeto->user_id], ['projetoSeguido_id' => $projeto->id]);



        // dd($projeto->id);
        return redirect('/projeto/'.$projeto->id);
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
        if($request->hasfile('imagem') && $request->imagem->isvalid()){
            $destination_path = 'img/users';
            $image = $request->file('imagem');
            $image_name = $image->getClientOriginalName();
            $imageExt = $image->getClientOriginalExtension();
            $imageFinal = $image_name.date('Y-m-d-H-i-s').".".$imageExt;
            $path = $request->file('imagem')->storeAs($destination_path, $imageFinal, 'public');
            $projeto->url_foto = $path;
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

    public function storePost($projeto_id, Request $request)
    {
        $publicacao = new Publish();   
        $publicacao->user_id = auth()->user()->id;
        $publicacao->projeto_id = $projeto_id;
        $publicacao->legenda = request('postagem');
        
        

        // $publicacao->url_foto = '/img/publishes/cinema.jpg';
        if($request->hasfile('imagePost') && $request->imagePost->isvalid()){
            $destination_path = 'img/publishes';
            $image = $request->file('imagePost');
            $image_name = $image->getClientOriginalName();
            $imageExt = $image->getClientOriginalExtension();
            $imageFinal = $image_name.date('Y-m-d-H-i-s').".".$imageExt;
            $path = $request->file('imagePost')->storeAs($destination_path, $imageFinal, 'public');
            $publicacao->url_foto = $path;
        }
        
        
        function timeago($date) {
           $timestamp = strtotime($date);	
           
           $strTime = array("second", "minute", "hour", "day", "month", "year");
           $length = array("60","60","24","30","12","10");
    
           $currentTime = time();
           if($currentTime >= $timestamp) {
                $diff     = time()- $timestamp;
                for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
                $diff = $diff / $length[$i];
                }
    
                $diff = round($diff);
                return $diff . " " . $strTime[$i] . "(s) ago ";
           }
        }

        
        $strTimeAgo = timeago($publicacao->created_at);



        $publicacao->save();
        return redirect('/projeto/'.$publicacao->projeto_id);
    }

    public function deletePost($projeto_id,$id)
    {
        Publish::find($id)->delete();
        // $projeto = $publicacao->projeto_id;
        
        return redirect('/projeto/'.$projeto_id);
    }

    //SEGUIR
    public function seguirProjeto($id)
    {
        $user_logado = User::find(auth()->user()->id);
        $projeto_seguido = Projeto::find($id);
        //$id -> quem será seguido -> user_id
        //auth::user()->id -> user_seguindo_id
        $projeto_seguido->user_projetoSeguido()->attach( ['userSeguindo_id' => $user_logado->id], ['projetoSeguido_id' => $projeto_seguido->id]);
       

        return redirect('/projeto/'.$projeto_seguido->id);
    }

    public function unfollowProjeto($id)
    {
        DB::table('user_projetoSeguido')
                ->where('projetoSeguido_id', $id)
                ->where('userSeguindo_id', auth()->user()->id)
                ->delete();

                return redirect('/projeto/'.$id);
    }
    //FIM SEGUIR
}
