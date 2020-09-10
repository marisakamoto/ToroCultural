@extends('layouts.app')
{{-- @extends('layouts.templateBase') --}}


@section('title')
    <title>Cadastro do Usuário</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/cadastro.css') }}">
@endsection

{{-- @section(rota-logo)
    ./feed
@endsection --}}

@section('search')
    <form class="form-inline my-2 my-lg-0" action="./feed">
        <input class="form-control  search" type="search" placeholder="Pesquisar" aria-label="Pesquisar" style="width: 65%;">
        <button class="btn btn-orange btn-search" type="submit">
            <img class="search" src="img/search.png" alt="">
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
        <h2 id="title-form">Cadastro Usuário</h2>
        
        <section class="container cadastro-exp-extra pb-3">
            <div class="row">
                <h3 class="pl-4 py-2">Experiências extras</h3>
            </div>
            <div class="row p-0">
                <div class="col-md-3  text-center my-auto">
                        <canvas id="UgCanvas" width="90px" height="100px" style="background-color: white; border:2.2px solid rgb(165, 157, 157);">
                        </canvas></br>
                        <button class="btn-deep-orange btn" type="button">Adicionar foto</button></br>
                </div>
                <div class="col-md-9 px-4">
                    <form class="form-user">
                        <div class="form-group my-0">
                            <label class="my-0"for="titulo">Título</label>
                            <input class="form-control py-0"  type="text" name="titulo" id="titulo" Required>
                        </div>
                        <div class="form-group my-0">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="my-0" for="primeiraData"> Duração de:</label>
                                    <input  class="form-control " type="date" name="primeiraData" id="primeiraData" Required>
                                </div>
                                <div class="col-md-6">
                                    <label  class="my-0" for="segundaData">até:</label>
                                    <input  class="form-control" type="date" name="segundaData" id="segundaData" Required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group my-0">
                            <label class="my-0" for="desc-proj-avulso">Descrição do projeto</label>
                            <textarea class="form-control" name="desc-proj-avulso" id="desc-proj-avulso"  rows="2"></textarea></br>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <div class="botao-final-user">
            <button class="btn-deep-orange btn " type="Submit" data-toggle="modal" data-target="#modalExemplo">Adicionar</button>
        </div>

@endsection
