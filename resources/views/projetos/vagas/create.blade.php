@extends('layouts.app')

@section('title')
    <title>Cadastro do Projeto</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/cadastro.css') }}">
@endsection

@section('search')
    <form class="form-inline my-2 my-lg-0" action="{{ route('feed') }}" method="GET">
        @csrf
        <input class="form-control  search" type="search" placeholder="Pesquisar" aria-label="Pesquisar" style="width: 65%;" name="search">
        <button class="btn btn-orange btn-search" type="submit">
            <img class="search" src="{{ url('img/search.png') }}" alt="">
        </button>
    </form>
@endsection

@section('nav-links')
    @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
        @else
            <li class="nav-item active">
                <a class="nav-link" href="{{  route('home') }}">Meu perfil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('feed') }}">Feed</a></li>
            </li>
            <li class="nav-item">
                <a class="nav-link" href={{ route('cadastroProjeto') }}>Enviar projeto</a>
            </li>
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
    @endguest
@endsection

@section('content')
    <main>
        <h2 id="title-form">Vagas e colaboradores</h2>
        <section class="container cadastro-profissionais p-3 mb-5">
            <div class="row px-4">
                <h4 class="pl-3 pt-3">Profissional 1</h4>
            </div>
            <div class="row px-4">
                <div class="col-md-12">
                    <form action="">
                        <div class="form-group my-0">
                            <label for="titulo">Vaga ou nome de usuário</label>
                            <input class="form-control py-0" type="text" name="titulo" id="titulo" >
                        </div>
                        <div class="form-group my-0">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="my-0" for="primeiraData"> Duração de:</label>
                                    <input  class="form-control" type="date" name="primeiraData" id="primeiraData" >
                                </div>
                                <div class="col-md-6">
                                    <label  class="my-0" for="segundaData">até:</label>
                                    <input  class="form-control" type="date" name="segundaData" id="segundaData" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-0 my-2 p-2" style="border: solid gray 1px">
                            <label for="categoria">Habilidades:</label></br>
                            @foreach ($habilidades as $habilidade )
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="{{ $habilidade->habilidade }}" value="{{ $habilidade->habilidade }}">
                                <label class="form-check-label" for="{{ $habilidade->habilidade }}">{{ $habilidade->habilidade }}</label>
                            </div>
                            @endforeach
                        </div>
                        <div class="form-group my-0">
                            <div class="form-group my-0">
                                <label for="tituloUser">Remuneração até:</label>
                                <input class="form-control py-0" type="text" name="tituloUser" id="tituloUser" placeholder="R$">
                            </div>
                        </div>
                        <div class="form-group my-0">
                        <label for="descProfissional">Descrição do profissional</label>
                            <textarea class="form-control py-0" name="descProfissional"  id="descProfissional"  rows="2"></textarea>
                         </div>
                        <button class="btn-deep-orange btn" type="Submit"><img style="width: 1em; margin-right: 5px;" src="{{ url('img/mais.png') }}" alt="add-experiencia">
                            Adicionar profissional
                        </button>
                    </form>
                </div>
            </div>

        </section>

    </main>
@endsection
