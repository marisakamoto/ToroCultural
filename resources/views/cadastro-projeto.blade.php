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
    <main>
        <h2 id="title-form">Cadastro do Projeto</h2>
        <section class="container cadastro-projeto p-4 mb-5">
            <div class="row">
                <div class="col-md-4 text-center pt-3">
                    <canvas id="UgCanvas" width="150px" height="150px" style="border:2.1px solid rgb(165, 157, 157); border-radius: 10px;">
                    </canvas></br>
                    <button class="btn-deep-orange btn" type="button">Alterar Foto</button>
                </div>
                <div class="col-md-8 form-user">
                    <form action="">
                        <div class="form-group mb-0">
                            <label for="titulo-proj">Título do Projeto</label>
                            <input class=" form-control" type="text" name="tirulo-proj" id="titulo-proj" Required>
                        </div>
                        <div class="form-group mb-0">
                            <label for="disponivel">Data do evento</label>
                            <input class="form-control"  type="date" name="disponivel" id="disponivel" Required>
                        </div>
                        <div class="form-group mb-0">
                            <label for="localizacao">Local</label>
                            <input class="form-control" type="text" name="localizacao" id="localizacao" Required>
                        </div>
                        <div class="form-group mb-0">
                            <label for="descricaoProj">Descrição </label>
                            <textarea name="descricaoProj" id="descricaoProj" class="form-control"></textarea>
                        </div>
                        <div class="form-group mb-0">
                            <label for="categoriasProj">Categorias</label>
                            <textarea name="categoriasProj" id="categoriasProj" class="form-control">
                            </textarea></br>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <section class="container cadastro-profissionais p-3">
            <div class="row px-4">
                <h4 class="pl-3 pt-3">Profissional 1</h4>
            </div>
            <div class="row px-4 ">
                <div class="col-md-6">
                    <form action="">
                    <div class="form-group my-0">
                        <label for="tituloUser">Profissão ou nome de usuário</label>
                        <input class="form-control py-0" type="text" name="tituloUser" id="tituloUser" Required>
                    </div>
                    <div class="form-group my-0">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="my-0" for="primeiraData"> Duração de:</label>
                                <input  class="form-control" type="date" name="primeiraData" id="primeiraData" Required>
                            </div>
                            <div class="col-md-6">
                                <label  class="my-0" for="segundaData">até:</label>
                                <input  class="form-control" type="date" name="segundaData" id="segundaData" Required>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <form action="">
                        <div class="form-group my-0">
                            <label for="projHabilidades">Habilidades</label>
                            <textarea class="form-control py-0" name="projHabilidades"  id="projHabilidades"  rows="2"></textarea>
                        </div>

                        <div class="form-group my-0">
                            <div class="form-group my-0">
                                <label for="tituloUser">Remuneração até:</label>
                                <input class="form-control py-0" type="text" name="tituloUser" id="tituloUser" placeholder="R$"Required>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row px-5" >
                <form action="" class="descricaoProfissional">
                    <div class="form-group my-0">
                        <label for="descProfissional">Descrição do profissional</label>
                        <textarea class="form-control py-0" name="descProfissional"  id="descProfissional"  rows="2"></textarea>
                    </div>
                </form>
            </div>
        </section>
        <div class="add-experiencia">
            <button class="btn-exp-user" type="Submit"><img style="width: 1em; margin-right: 5px;" src="img/mais.png" alt="add-experiencia">
                    Adicionar profissional
                </button>
        </div>
        <div class="botao-final-user"><button class="btn-deep-orange btn" type="Submit" data-toggle="modal" data-target="#modalExemplo">Finalizar</button></div>

        <!-- Modal -->
        <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header modal-titulo">
                <h5 class="modal-title"  id="exampleModalLabel" >Informações salvas com sucesso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    Agora entre em seu projeto para ver como ficou!
                </div>
                <div class="modal-footer">

                <button type="button" class="btn-deep-orange btn"><a class="modal-para-perfil"href={{ route('perfilProjeto') }}"> Ir para o Meu Projeto</a></button>
                </div>
            </div>
            </div>
        </div>
        <!--fim Modal-->
    </main>
@endsection
