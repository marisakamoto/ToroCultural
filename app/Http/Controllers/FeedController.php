<?php

namespace App\Http\Controllers;

use App\User;
use App\Projeto;
use App\Publish;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function feed (){
        $user = User::find(auth()->user()->id);
        
        
        $seguidores_users = $user->seguidores;
        $projetos_seguidos = $user->user_projetoSeguido;
        $seguindo_user = $user->seguindo;
        $num = $projetos_seguidos->count();
        
        for ( $i=0 ;$i< $num; $i++){
            $id_projetos[$i] = $projetos_seguidos[$i]->pivot->projetoSeguido_id;
        }

        $posts = Publish::whereIn('projeto_id', $id_projetos)->get();

        // $post_autor = User::where('id',$posts->user_id)->value('url_foto');
        // $posts_projeto = Publish::

        // $post_projetos = $projetos_seguidos->legenda;

        // $id_proj_seguindo = Projeto::where('userSeguindo_id', auth()->user()->id)->projeto_id->get();
        // $posts_proj = Publish::where('projeto_id',$id_proj_seguindo);

        return view ('feed-de-noticias', compact(  'user',  'projetos_seguidos', 'id_projetos', 'num','posts'));
    }
}
