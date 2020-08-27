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
        <section class="container cadastro-user p-4 mb-5">
            <div class="row">
                <div class="col-md-4 text-center pt-3">
                    <img src="{{ Auth::user()->url_foto }}" style="border-radius: 50%;"></img>
                    {{-- <canvas id="UgCanvas" width="150px" height="150px" style="border:2.1px solid rgb(165, 157, 157); border-radius: 50%;">
                    </canvas></br> --}}
                    <button class="btn-deep-orange btn" type="button">Alterar foto</button>
                </div>
                <div class="col-md-8 form-user">
                    <form>
                        <div class="form-group mb-0">
                            <label for="nome">Nome de usuário</label>
                            <input class="form-control" type="text" name="nome-usuario" id="nome-usuario" Required>
                        </div>
                        <div class="form-group mb-0">
                            <label for="aniversario">Aniversário</label>
                            <input class="form-control" type="date" name="aniversario" id="aniversario" Required>
                        </div>
                        <div class="form-group mb-0">
                            <label for="profissao">Profissão</label>
                            <input class="form-control" type="text" name="profissao" id="profissao" Required>
                        </div>
                        <div class="form-group">
                            <label for="descricao-user">Descrição</label>
                            <textarea name="descricao-user" class="form-control" id="descricao-user" rows="5"></textarea>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <form class="form-user formHabilidadesInteresses m-3">
                    <div class=" form-group my-0">
                        <label for="pcp-habilidades">Principais Habilidades</label>
                        <textarea name="pcp-habilidades" class="form-control  my-0 py-0" id="pcp-habilidade" rows="5"></textarea></br>
                    </div>
                    <div class="form-group my-0">
                        <label for="interesses">Interesses</label>
                        <textarea name="interesses" class="form-control my-0 py-0" id="interesse" rows="5"></textarea></br>
                    </div>
                </form>
            </div>
        </section>
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
        <div class="text-center">
            <button class="btn-exp-user" type="Submit"><img style="width: 1em; margin-right: 5px;" src="img/mais.png" alt="add-experiencia">
                Adicionar experiência
            </button>
        </div>
        <div class="botao-final-user">
            <button class="btn-deep-orange btn " type="Submit" data-toggle="modal" data-target="#modalExemplo">Finalizar</button>
        </div>

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
                    Agora entre em seu perfil para ver como ficou!
                </div>
                <div class="modal-footer">
                <button type="button" class="btn-deep-orange btn "><a class="modal-para-perfil" href="{{  route('home') }}"> Ir para o Meu Perfil</a></button>
                </div>
            </div>
            </div>
        </div>
@endsection
