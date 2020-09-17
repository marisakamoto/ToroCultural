@extends('layouts.app')
{{-- @extends('layouts.templateBase') --}}


@section('title')
    <title>Cadastro do Usuário</title>
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
        <h2 id="title-form">Experiências</h2>

        <section class="container cadastro-exp-extra mb-5">
            <div class="row">
                <h3 class="pl-4 py-2">Experiências extras</h3>
            </div>
            <div class="row p-0">
                    <form class="form-user row p-3" action="/home/experiencias/store" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="col-md-3  text-center my-auto">
                            <img style = "width:130px; height:130px; object-fit: cover;" id="preview-img" >
                                    <input type="file" name="imagem" class="btn block" id="imagem" onchange="previewImagem()">
                                    {{-- NÃO CONSEGUI FAZER FUNCIONAR DEIXANDO O JS EM OUTRO ARQUIVO --}}
                                    <script>
                                        function previewImagem(){
                                            var imagem = document.querySelector('input[name=imagem]').files[0];
                                            var preview = document.querySelector('#preview-img');

                                            var reader = new FileReader();

                                            reader.onloadend = function () {
                                                preview.src = reader.result;
                                            }

                                            if(imagem){
                                                reader.readAsDataURL(imagem);
                                            }else{
                                                preview.src = "";
                                            }
                                        }
                                    </script>
                        </div>
                        <div class="col-md-9 px-4">
                            <div class="form-group my-0">
                                <label class="my-0"for="titulo">Título</label>
                                <input class="form-control py-0"  type="text" name="titulo" id="titulo" Required>
                            </div>
                            <div class="form-group my-0">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="my-0" for="data_realizacao"> Quando?</label>
                                        <input  class="form-control " type="date" name="data_realizacao" id="data_realizacao" Required>
                                    </div>
                                    <div class="col-md-6">
                                        <label  class="my-0" for="localizacao">Onde?</label>
                                        <input  class="form-control" type="texte" name="localizacao" id="lcoalizacao" Required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group my-0">
                                <label class="my-0" for="descricao">Descrição do projeto</label>
                                <textarea class="form-control" name="descricao" id="descricao"  rows="2"></textarea></br>
                            </div>
                        </div>
                        <div class="botao-final-user margin-15">
                            <button class="btn-deep-orange btn " type="Submit">Adicionar</button>
                            <a class="btn-deep-orange btn align-self-center" href="{{ URL::previous() }}" >Voltar</a>
                        </div>
                    </form>
            </div>
        </section>
@endsection
