@extends('layouts.app')

@section('title')
    <title>Feed de Notícias</title>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/feed.css') }}">
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

{{-- {{$posts}} --}}
    <div id="feed-completo" class="container-fluid px-0">
        <div class="row principal mr-0">
            <!--Coluna pesquisa-->
            <div class="col-md-3 colPesquisaAvancada">
                <div class="row pt-5" id="foto">
                    <div class="perfil-foto-user-feed mx-auto">
                        <img src="{{ url(Auth::user()->url_foto)}}" style="border-radius: 50%;">
                    </div>
                </div>
                <div class="row">
                    <p class="mx-auto"><a href="./user">{{ Auth::user()->username }}</a></p>
                </div>
                <hr class="my-2">
                <div class="btn-pesquisa-avancada text-center">
                    <button class="btn-deep-orange btn p-1" type="button" data-toggle="collapse" data-target="#nossa-pesquisa" aria-controls="nossa-pesquisa" aria-expanded="false" aria-label="Toggle navigation">
                        Busca avançada
                    </button>
                </div>
                <div id="nossa-pesquisa" class="row form-pesquisa px-0 mx-auto collapse justify-content-center">
                    <form class="mx-auto pl-1">
                        <div class="form-group mt-3">

                            <input type="email" class="form-control" id="" placeholder="Pesquisar">
                        </div>

                        <div class="form-check form-check-inline mx-0">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Torozeiro">
                            <label class="form-check-label" for="inlineCheckbox1">Torozeiro</label>
                        </div>
                        <div class="form-check form-check-inline mr-0">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Projeto">
                            <label class="form-check-label" for="inlineCheckbox2">Projeto</label>
                        </div>
                        <div class="form-check form-check-inline mr-0">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Publicação">
                            <label class="form-check-label" for="inlineCheckbox3">Publicação</label>
                        </div>

                        <div class="form-group mt-3">
                            <label for="exampleFormControlSelect1">Qual estado?</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                            <option>Escolha um Estado</option>
                            <option>Bahia</option>
                            <option>Minas Gerais</option>
                            <option>São Paulo</option>
                            <option>Rio de Janeiro</option>
                            <option>Rio Grande do Sul</option>
                        </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Qual cidade?</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                            <option>Escolha uma Cidade</option>
                            <option>Bahia</option>
                            <option>Minas Gerais</option>
                            <option>São Paulo</option>
                            <option>Rio de Janeiro</option>
                            <option>Rio Grande do Sul</option>
                            </select>
                        </div>
                        <button type="submit" class="btn-deep-orange btn ">Buscar</button>
                    </form>
                </div>
            </div>
            <!--FIM Coluna pesquisa-->

            <!--Coluna FEED-->
            <div class="col-md-9 col-feed px-0 mx-0">
                <div class="row px-0 pb-2 bg-white mr-0 ml-0 pl-4" style="width: 100%;">
                    <h2 id="titulo-feed">Feed de notícias</h2>
                </div>
                <nav>
                {{-- ABAS PESQUISA E FEED --}}
                    <div class="nav nav-tabs btn-principais-feed" id="nav-tab" role="tablist">
                        <a class="btn-feed nav-item nav-link text-center {{ count($resultados) == 0 ? 'active' : '' }}" id="nav-home-tab" data-toggle="tab" href="#feed-user" role="tab" aria-controls="nav-home" aria-selected="true">Meu Feed</a>
                        <a class="btn-feed nav-item nav-link text-center {{ count($resultados) > 0 ? 'active' : '' }}" id="nav-profile-tab" data-toggle="tab" href="#feed-site" role="tab" aria-controls="nav-profile" aria-selected="false">Pesquisa</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                {{-- CONTEUDOS - ABAS PESQUISA E FEED --}}
                    <!--área do feed do usuário-->
                    
                        <div class="conteudo-feed tab-pane fade show px-2 py-2 {{ count($resultados) == 0 ? 'active' : '' }}" id="feed-user" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="row justify-content-end">
                                <div class="my-auto">
                                    <form class="form-inline ">
                                        <input class="form-control mr-sm-1" type="search" placeholder="Pesquisar no seu feed" aria-label="Pesquisar" style="width: 65%;">
                                        <button class="btn btn-outline-success my-1 my-sm-0 py-1 px-2" type="submit"><img class="search" src="img/search.png" alt=""></button>
                                    </form>
                                </div>
                                <div class="text-secundario-feed pr-5 pb-2">
                                    <label for="exampleFormControlSelect1">Organizar por:</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                    <option>favoritos</option>
                                    <option>mais recentes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="areaDePostagens container border pt-5 pb-5">
                                <div class="row justify-content-start">
                                    <div class="feed-publicacoes mx-auto">

                                    @foreach ( $posts as $p )
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                @if($p->url_foto != null)
                                                    <a class="media-left" href="{{url("storage/".$p->url_foto)}}"><img class="img-circle img-publi"  alt="Profile Picture" src="{{ url($p->url_foto)}}"></a>
                                                @endif

                                                <div class="media-body">
                                                    <div class="mar-btm">
                                                        <div class="d-flex align-items-center m-2">
                                                            <div class="imagem-perfil-user">
                                                                <img class=""src="{{ url($p->user->url_foto)}}" alt="">
                                                            </div>
                                                            <a href="/projeto/{{ $p->projeto->id }}" class="text-semibold media-heading box-inline ml-2">{{ $p->user->username  }}</a>
                                                        
                                                            <img src="{{ url('img/arrow.svg') }}" class="arrow">
                                                            <img class="imagem-perfil-feed mt-1 mr-1" src="img/cinemateca.jpg" alt="">
                                                            <a href="/projeto/{{ $p->projeto->id }}" class="text-semibold media-heading box-inline">{{ $p->projeto->titulo  }}</a>
                                                        </div>
                                                        <p class="text-muted text-sm"><i class="fa fa-mobile fa-lg"></i> - From Mobile - há {{ $myTime->diffInDays($p->updated_at) }} dias</p>
                                                    </div>
                                                    <p>
                                                        {{ $p->legenda }}
                                                    </p>
                                                    <div class="pad-ver">
                                                        <div class="btn-group">
                                                            <a class="btn btn-sm btn-default btn-hover-success btn-curtir" href="#"><i class="fa fa-thumbs-up"></i></a>
                                                            <a class="btn btn-sm btn-default btn-hover-danger btn-curtir" href="#"><i class="fa fa-thumbs-down"></i></a>
                                                        </div>
                                                        <a class="btn btn-sm btn-default btn-hover-primary btn-curtir" href="#">Comment</a>
                                                        @if($p->user_id == Auth::user()->id || $p->projeto->user_id == Auth::user()->id )
                                                            <form action="/feed/post/delete/{{ $p->id }}" method="POST">
                                                                @method('delete')
                                                                @csrf
                                                                <button class="btn btn-sm btn-default btn-hover-primary" onclick="return confirm('Deseja mesmo apagar essa publicação?');">Delete</button>
                                                            </form>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                    @endforeach

                                    
                                        {{-- @for ( $i = 0; $i < $num;$i++)
                                                        
                                                <div class="card mb-4">
                                            <div class="card-body">
                                                <a class="media-left" href="#"><img class="img-circle img-publi"  alt="Profile Picture" src="{{ url("storage/{$posts[$i]->url_foto}") }}"></a>
                                                <div class="media-body">
                                                    <div class="mar-btm">
                                                        <img class="imagem-perfil-feed mt-1 mr-1" src="{{ url('storage/'.DB::table('projetos')->where('id',$posts[$i]->projeto_id)->value('url_foto')) }}" alt="">
                                                        <a href="#" class="text-semibold media-heading box-inline">{{ DB::table('users')->where('id',$posts[$i]->user_id)->value('username')}}</a>
                                                        <p class="text-muted text-sm"><i class="fa fa-mobile fa-lg"></i> - From Mobile - {{ $posts[$i]->created_at }}</p>
                                                    </div>
                                                    <p>
                                                        {{$posts[$i]->legenda}}
                                                    </p>
                                                    <div class="pad-ver">
                                                        <div class="btn-group">
                                                            <a class="btn btn-sm btn-default btn-hover-success btn-curtir" href="#"><i class="fa fa-thumbs-up"></i></a>
                                                            <a class="btn btn-sm btn-default btn-hover-danger btn-curtir" href="#"><i class="fa fa-thumbs-down"></i></a>
                                                        </div>
                                                        <a class="btn btn-sm btn-default btn-hover-primary btn-curtir" href="#">Comment</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endfor   --}}



                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <a class="media-left" href="#"><img class="img-circle img-publi"  alt="Profile Picture" src="img/jardim.jpg"></a>
                                                <div class="media-body">
                                                    <div class="mar-btm">
                                                        <img class="imagem-perfil-feed mt-1 mr-1" src="img/cinemateca.jpg" alt="">
                                                        <a href="#" class="text-semibold media-heading box-inline">Nome do Projeto</a>
                                                        <p class="text-muted text-sm"><i class="fa fa-mobile fa-lg"></i> - From Mobile - 11 min ago</p>
                                                    </div>
                                                    <p>
                                                        Começamos a trabalhar no jardim!
                                                    </p>
                                                    <div class="pad-ver">
                                                        <div class="btn-group">
                                                            <a class="btn btn-sm btn-default btn-hover-success btn-curtir" href="#"><i class="fa fa-thumbs-up"></i></a>
                                                            <a class="btn btn-sm btn-default btn-hover-danger btn-curtir" href="#"><i class="fa fa-thumbs-down"></i></a>
                                                        </div>
                                                        <a class="btn btn-sm btn-default btn-hover-primary btn-curtir" href="#">Comment</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Comments -->
                                        <div class="card mb-4">
                                            <div class="card-body">

                                                <a class="media-left" href="#"><img class="img-circle img-publi add-profissional" alt="Profile Picture" src="img/mulher1.jpg"></a>
                                                <div class="media-body">
                                                    <div class="mar-btm">
                                                        <img class="imagem-perfil-feed mt-1 mr-1" src="{{url('img/cinemateca.jpg')}}" alt="">
                                                        <a href="#" class="text-semibold media-heading box-inline">Inauguração da Cinemacoteca</a>
                                                        <p class="text-muted text-sm"><i class="fa fa-mobile fa-lg"></i> - From Mobile - 7 min ago</p>
                                                    </div>
                                                    <p>
                                                        Adicionou como <a href="#">Atriz</a>: <a href="#">Nome de Usuário</a>

                                                    </p>
                                                    <div class="pad-ver">
                                                        <div class="btn-group">
                                                            <a class="btn btn-sm btn-default btn-hover-success btn-curtir-active" href="#"><i class="fa fa-thumbs-up"></i> You Like it</a>
                                                            <a class="btn btn-sm btn-default btn-hover-danger btn-curtir" href="#"><i class="fa fa-thumbs-down"></i></a>
                                                        </div>
                                                        <a class="btn btn-sm btn-default btn-hover-primary btn-curtir" href="#">Comment</a>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        

                                    </div>

                                        <!--===================================================-->
                                        <!-- End Newsfeed Content -->
                                </div>
                            </div>
                        </div>
                    <!--área da pesquisa no feed-->
                        <div class="conteudo-feed tab-pane fade show px-2 pt-2 {{ count($resultados) > 0 ? 'active' : '' }}" id="feed-site" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="row justify-content-end">
                                <div class="text-secundario-feed pr-5 pb-2">
                                    <label for="exampleFormControlSelect1">Organizar por:</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                    <option>Mais recentes</option>
                                    <option>Mais seguidores</option>
                                    </select>
                                </div>
                            </div>
                            <div class="areaDePesquisa container border py-5 mb-5">
                                <div class="row">
                                    <p class="text-secundario-feed pl-5">Resultados encontrados para: <a href="#">{{ $pesquisa }}</a></p>
                                </div>
                                <div class="conteudo-meu-feed row pl-1 d-flex justify-content-around card-pesquisa mx-5 my-3">
                                @if(count($resultados) > 0)
                                    @foreach ( $resultados as $resultado)
                                        <div class="card ml-1 mb-4 d-flex flex-row p-4 flex-grow-1 card-item" >
                                            {{-- <div class="row py-3 d-flex justify-content-between"> --}}
                                                <div class="col-md-5 ">
                                                    <div class="perfil-foto-search">
                                                        <img src="{{ url($resultado->url_foto)}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-7 px-1 my-auto">
                                                    <div class="card-body">
                                                        <h4 class="text-center bold">{{ $resultado->name }}</h4>
                                                        <h5 class="card-title text-center my-auto"><a href="/perfil/{{ $resultado->username }}">{{ $resultado->username }}</a></h5>
                                                    </div>
                                                </div>
                                            {{-- </div> --}}
                                        </div>
                                    @endforeach
                                @else
                                    <div class="card ml-1 mb-4" style="width: 40%;">
                                        <div class="row py-3">
                                            <div class="col-md-5 my-auto text-center">
                                                <div class="foto-perfil">
                                                    <canvas id="UgCanvas" width="85px" height="85px" style="border:2.5px solid rgb(165, 157, 157); border-radius: 50%;"></canvas>
                                                    </canvas>
                                                </div>
                                            </div>
                                            <div class="col-md-7 px-1 my-auto">
                                                <div class="card-body">
                                                    <h5 class="card-title text-center my-auto"><a href="#"> Nome de usuário</a></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card ml-1 mb-4" style="width: 40%;">
                                        <div class="row py-3">
                                            <div class="col-md-5 my-auto text-center">
                                                <div class="foto-perfil">
                                                    <canvas id="UgCanvas" width="85px" height="85px" style="border:2.5px solid rgb(165, 157, 157); border-radius: 50%;"></canvas>
                                                    </canvas>
                                                </div>
                                            </div>
                                            <div class="col-md-7 px-1 my-auto">
                                                <div class="card-body">
                                                    <h5 class="card-title text-center"><a href="#"> Nome de usuário</a></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                    
                                </div>
                            </div>



                        </div>
                    
                </div>
            </div>
            <!--FIM Coluna FEED-->
        </div>
    </div>
@endsection

@section('scripts')
    <script src="jquery.js"></script>
@endsection
