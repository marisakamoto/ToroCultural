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
            $projetos = Projeto::where('user_id', auth()->user()->id)->get();
            $users = User::find(auth()->user()->id);
                $habilidades = $users->habilidades;   
            // $habilidades = Habilidade::where('user_id', auth()->user()->id)->get();
            return view('home', compact('projetos', 'habilidades'));
        }
        


        
    }
}
