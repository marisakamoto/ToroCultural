<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projeto;
use App\User;
use App\Habilidade;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        //     // $projetos = Projeto::all();

        if (Auth::check()){
            // $projetos = Projeto::search('')->where('user_id', auth()->user()->id);
            $projetos = Projeto::where('user_id', auth()->user()->id)->take(5)->get();
            $users = User::find(auth()->user()->id);
            $projetos_colaborando = $users->projeto_user_colaborador;
                $habilidades = $users->habilidades;
                // conta quantas pessoas o usuario segue
                $seguindo = $users->seguindo()->count();
                $seguindo_user = $users->seguindo;
                $seguidores = $users->seguidores()->count();
                $seguidores_users = $users->seguidores;
                $experiences = $users->experience()->get();
                $projetos_seguidos = $users->user_projetoSeguido;
                // $seguindo = seguindo()->user_seguindo_id;
                // echo $seguindo;
            return view('home', compact('projetos', 'habilidades', 'seguindo', 'seguindo_user', 'seguidores','seguidores_users', 'experiences', 'projetos_seguidos', 'projetos_colaborando'));
        }
    }

    public function show($username)
    {
        //Abre a página de outro usuario

        $user = User::where('username', $username)->first();
        $projetos = Projeto::where('user_id', $user->id)->take(3)->get();
        $projetos_colaborando = $user->projeto_user_colaborador()->take(3)->get();
        $username = $user->username;
        $habilidades = $user->habilidades;
        // conta quantas pessoas o usuario segue
        $seguindo = $user->seguindo()->count();
        $seguindo_user = $user->seguindo;
        $seguidores = $user->seguidores()->count();
        $seguidores_users = $user->seguidores;
        $experiences = $user->experience()->get();
        $projetos_seguidos = $user->user_projetoSeguido;
        // $seguindo = seguindo()->user_seguindo_id;
        // echo $seguindo;

        // $habilidades = $vagas->habilidades;
        // Não dá certo, porque $vagas é um array de vagas, então, preciso entrar em cada vaga para buscar as habilidades
        return view('show-user', compact('user', 'username','projetos', 'habilidades', 'seguindo', 'seguindo_user', 'seguidores','seguidores_users', 'experiences', 'projetos_seguidos', 'projetos_colaborando'));
    }

}
