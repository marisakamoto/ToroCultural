@extends('layouts.app')

@section('title')
    <title>Cadastro do Projeto</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/cadastro.css') }}">
@endsection

@section('search')
    <form class="form-inline my-2 my-lg-0" action="{{ route('feed') }}">
        <input class="form-control  search" type="search" placeholder="Pesquisar" aria-label="Pesquisar" style="width: 65%;">
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
        <h2 id="title-form">Atualizar</h2>
        <section class="container cadastro-projeto p-4 mb-5">
            <div class="row">
                <div class="col">
                    <form action="/projeto/update/{{ $projeto->id }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                        <div class="d-flex align-items-center content-projeto">
                            {{-- <div class="col-md-4 text-center pt-3 d-flex align-items-center flex-column">
                                <canvas id="UgCanvas" width="150px" height="150px" style="border:2.1px solid rgb(165, 157, 157); border-radius: 10px;">
                                </canvas></br>
                                <input type="file" name="url_foto" class="btn block">
                            </div> --}} 
                            {{-- Alterar para col-md-8 quando descomentar --}}
                            <div class="col-md-12 form-user">
                                <div class="form-group mb-0">
                                    <label for="titulo">Título do Projeto</label>
                                    <input class=" form-control" type="text" name="titulo" id="titulo" value="{{ $projeto->titulo }}" >
                                </div>
                                <div class="form-group mb-0">
                                    <label for="data_de_realizacao">Data do evento</label>
                                    <input class="form-control"  type="date" name="data_de_realizacao" id="data_de_realizacao" value="{{ $projeto->data_de_realizacao }}" >
                                </div>
                                <div class="form-group mb-0">
                                    <label for="localizacao">Local</label>
                                    <input class="form-control" type="text" name="localizacao" id="localizacao" value="{{ $projeto->localizacao }}">
                                </div>
                                <div class="form-group mb-0">
                                    <label for="descricao">Descrição </label>
                                    <textarea name="descricao" id="descricao" class="form-control" >{{ $projeto->descricao }}</textarea>
                                </div>
                            </div>
                        </div>
                        <button class="btn-deep-orange btn align-self-center" type="Submit">Atualizar</button>
                        
                    </form>
                </div>
            </div>
        </section>
    </main>
@endsection
