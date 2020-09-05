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
            $projetos = Projeto::where('user_id', auth()->user()->id)->take(3)->get();
            $users = User::find(auth()->user()->id);
                $habilidades = $users->habilidades;
                // conta quantas pessoas o usuario segue
                $seguindo = $users->seguindo()->count();
                $seguidores = $users->seguidores()->count();

                $experiences = $users->experience()->get();
                // $seguindo = seguindo()->user_seguindo_id;
                // echo $seguindo;
            return view('home', compact('projetos', 'habilidades', 'seguindo', 'seguidores','experiences'));
        }

    }

    
}
