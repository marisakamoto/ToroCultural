<?php

namespace App\Http\Controllers;

use App\User;
use App\Projeto;
use App\Publish;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function feed ()
    {
        $user = User::find(auth()->user()->id);
        
        
        $seguidores_users = $user->seguidores;
        $projetos_seguidos = $user->user_projetoSeguido;
        $seguindo_user = $user->seguindo;
        $num = $projetos_seguidos->count();
        $myTime = \Carbon\Carbon::now();
        
        $id_projetos = []; 
        for ( $i=0 ;$i< $num; $i++){
            $id_projetos[$i] = $projetos_seguidos[$i]->pivot->projetoSeguido_id;
        }

        $posts = Publish::whereIn('projeto_id', $id_projetos)->orderBy('id', 'DESC')->get();

        $pesquisa = request('search');
        if($pesquisa != null){
            $resultados = DB::table('users')
                ->where('name', 'LIKE', '%'.$pesquisa.'%')
                ->orWhere('username', 'LIKE', '%'.$pesquisa.'%')
                ->get();
        }else{
            $resultados = [];
        }
        

        // $post_autor = User::where('id',$posts->user_id)->value('url_foto');
        // $posts_projeto = Publish::

        // $post_projetos = $projetos_seguidos->legenda;

        // $id_proj_seguindo = Projeto::where('userSeguindo_id', auth()->user()->id)->projeto_id->get();
        // $posts_proj = Publish::where('projeto_id',$id_proj_seguindo);

        return view ('feed-de-noticias', compact(  'user',  'projetos_seguidos', 'id_projetos', 'num','posts', 'myTime', 'pesquisa', 'resultados'));
    }

    //PESQUISA
    function search(Request $request)
    {
        $pesquisa = request('search');
        $user = User::where('username', 'LIKE', $pesquisa, '%' );
        // dd($user);
        $users = DB::table('users')
                ->where('name', 'LIKE', '%'.$pesquisa.'%')
                ->orWhere('username', 'LIKE', '%'.$pesquisa.'%')
                ->get();
        // dd($users);
        // return redirect()->route('feed')->with(['pesquisa' => $pesquisa])->with(['users' => $users]);
        // return redirect('feed')->with('pesquisa', $pesquisa);
        return redirect('feed');
    }

    //FIM PESQUISA
}
