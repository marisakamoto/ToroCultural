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
                <div class="col-md-8 form-user">
                    <form method="POST" action ="/user/update/{{Auth::user()->id}}" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                        <div class="col-md-4 text-center pt-3">
                            <div class="mx-auto perfil-foto-cadastro m-0" >
                                <img src="{{url("storage/".Auth::user()->url_foto)}}" id="preview-img" id="preview-img" ></img>
                            </div>
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
                        
                        <div class="form-group mb-0">
                            <label for="nome">Nome de usuário</label>
                            <input class="form-control" type="text" name="username" id="username" value="{{ Auth::user()->username }}" Required>
                        </div>
                        <div class="form-group mb-0">
                            <label for="aniversario">Aniversário</label>
                            <input class="form-control" type="date" name="aniversario" id="aniversario" value="{{ Auth::user()->aniversario}}" Required>
                        </div>
                        <div class="form-group mb-0">
                            <label for="profissao">Profissão</label>
                            <input class="form-control" type="text" name="profissao" id="profissao" value="{{ Auth::user()->profissao}}" Required>
                        </div>
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <textarea name="descricao" class="form-control" id="descricao" rows="5">{{ Auth::user()->descricao}}</textarea>
                        </div>
                        <div class=" form-group my-0 p-2" style="border: solid gray 1px" >
                            <label for="pcp-habilidades">Principais Habilidades:</label></br>
                            @foreach ($habilidades as $h )
                                <div class="form-check form-check-inline">
                                <input class="form-check-input"
                                    type="checkbox"
                                    id="{{ $h->id }}"
                                    value="{{ $h->id}}"
                                    name = "checkbox[]">
                            <label class="form-check-label" for="{{ $h->habilidade }}">{{ $h->habilidade }}</label>
                        </div>
                        @endforeach
                    </div>
                    <div class="form-group my-0">
                        <label for="interesses">Interesses</label>
                        <textarea name="interesses" class="form-control my-0 p-2" id="interesse" rows="5" disabled></textarea></br>
                    </div>
                        <button class="btn-deep-orange btn " type="Submit">Atualizar</button>
                    </form>
                </div>
            </div>
        </section>


@endsection
