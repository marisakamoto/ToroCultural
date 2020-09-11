@extends('layouts.app')

@section('title')
    <title>{{ $user->username }}</title>
@endsection

@section('css')
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Kaushan+Script|Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/perfil.css') }}">
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
                <a class="nav-link" href="{{route('home')}}">Meu perfil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('feed') }}">Feed</a></li>
            </li>
            <li class="nav-item">
                <a class="nav-link" href={{ route('cadastroProjeto') }}>Enviar projeto</a>
            </li>
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->username }}
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
        <div class="container-fluid colborder" id="main-conteudo">
        <div class="row">
            <div class="col-md-9">
                <div class="row ml-0 mt-4 mr-3" id="main-info">
                    <div class="col-md-4 mx-auto" id="foto">
                        <div class="row foto-perfil">
                            <div class="mx-auto perfil-foto m-0">
                                <img  src="{{  $user->url_foto }}"></img>
                            </div>
                        </div>
                        <div class="row pt-2">
                            <p class="row mx-auto">São Paulo, SP<br> Online há 1 dia</p>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="col d-flex pb-3 justify-content-between">
                            <div class="col-md-6">
                                <h3 class="nomeUser text-center">{{  $user->name }}</h3>
                            </div>
                            <div class="row-md-6 text-center">
                        @if($seguidores > 0)
                            @for ($i = 0 ; $i < count($seguidores_users) ; $i++)
                                @if($seguidores_users[$i]->id == Auth::user()->id)
                                    <button type="button" class="follow btn btn-outline-warning btn-sm m-1 p-2"> Deixar de Seguir</button>
                                    @break
                                @elseif($seguidores_users[$i]->id != Auth::user()->id)
                                    <form action="/user/seguir/{{ $user->id }}" method="POST">
                                        @csrf
                                        <button type="button" class="follow btn btn-outline-warning btn-sm m-1 p-2"> Seguir</button>
                                    </form>
                               
                                @endif
                            @endfor
                        @elseif($seguidores == 0)
                            <form action="/user/seguir/{{ $user->id }}" method="POST">
                                @csrf
                                <button type="button" class="follow btn btn-outline-warning btn-sm m-1 p-2"> Seguir</button>
                            </form>
                        @endif
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center" id="habilidades">
                            <ul>
                                @foreach ($habilidades as $h)
                                <li>
                                    <button type="button" class="btn btn-deep-orange  btn-sm m-1">
                                    {{$h->habilidade}}  
                                    </button>
                                </li>
                                @endforeach
                            </ul>
                        
                        </div>
                        <div class="row d-flex justify-content-center"> 
                            <p class=" ml-4" >    {{ $user->descricao }} </p>
                        </div>
                    </div>
                </div>
                <hr class="my-4 ">
                <div class="col ml-0 mt-4 mr-3 pt-2" id="portfolio">
                    <div class="row px-5">
                        <h3 class="pl-5">Meus torós</h3>
                    </div>
                    <div class="row px-4">
                        <div class="container  mx-1 ">
                            <!--Carousel Wrapper-->
                            <div id="multi-item-example " class="carousel slide carousel-multi-item " data-ride="carousel ">

                                <!--Controls-->
                                {{-- <div class="controls-top ">
                                    <a class="btn-floating " href="#multi-item-example " data-slide="prev "><i class="fa fa-chevron-left "></i></a>
                                    <a class="btn-floating " href="#multi-item-example " data-slide="next "><i class="fa fa-chevron-right "></i></a>
                                </div> --}}
                                <!--/.Controls-->

                                <!--Indicators-->
                                {{-- <ol class="carousel-indicators ">
                                    <li data-target="#multi-item-example " data-slide-to="0 " class="active "></li>
                                    <li data-target="#multi-item-example " data-slide-to="1 "></li>
                                    <li data-target="#multi-item-example " data-slide-to="2 "></li>
                                </ol> --}}
                                <!--/.Indicators-->


                                <!--Slides-->
                                
                                    <!--First slide-->
                                    
                                        <div class="row ">
                                            @foreach ( $projetos as $p )
                                                <div class="col-md-4 clearfix d-none d-md-block ">
                                                    <div class="card card-projeto mb-3">
                                                        <img class="card-img-top" src="{{ $p->url_foto}}" alt="Card image cap ">
                                                        <div class="card-body ">
                                                            <h4 class="card-title titulo-projeto">{{ $p->titulo }}</h4>
                                                            <p class="card-text descricao-projeto ">{{ $p->descricao }}</p>
                                                            <a class="btn peach-gradient btn-mais-projeto" href="/projeto/{{ $p->id }}">Perfil</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            @foreach ( $projetos_colaborando as $p )
                                                <div class="col-md-4 clearfix d-none d-md-block ">
                                                    <div class="card card-projeto mb-3 bg-warning">
                                                        <img class="card-img-top" src="{{ $p->url_foto}}" alt="Card image cap ">
                                                        <div class="card-body ">
                                                            <h4 class="card-title titulo-projeto">{{ $p->titulo }}</h4>
                                                            <p class="card-text descricao-projeto ">{{ $p->descricao }}</p>
                                                            <a class="btn peach-gradient btn-mais-projeto" href="/projeto/{{ $p->id }}">Perfil</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
 
                                        
                                        @if ($experiences->count() > 0)
                                            <hr class="my-4">
                                            <div class="col px-5">
                                                <h3 >Experiências</h3>
                                                {{-- CARD DE EXPERIENCIAS DO USUARIO FORA DO TORO --}}
                                                @foreach ( $experiences as $xp)
                                                    <div class="card card-body mb-4 m-4">
                                                        <div class="col d-flex align-content-around">
                                                            <div class="col">
                                                                <h4>{{ $xp->titulo }} </h4>
                                                                <hr> 
                                                                <h6>{{ $xp->localizacao }} | {{ $xp->data_realizacao }}</h6>
                                                                <p>{{ $xp->descricao }}</p>
                                                            </div>                        
                                                            <div class="xp-foto d-none d-lg-block">
                                                                <img class="mx-auto d-flex   " src= "{{ $xp->url_foto }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>    
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 menu-dir pt-5 px-4"  id="menu-lado">
                <div id="star-rank" class="text-center">
                    <h4>Avaliação Geral</h4>

                    <span class="fa fa-star checked "></span>
                    <span class="fa fa-star checked "></span>
                    <span class="fa fa-star checked "></span>
                    <span class="fa fa-star "></span>
                    <span class="fa fa-star "></span> 3.0
                    <br>
                    <p>30 avaliações</p>
                    <p>Torozero Iniciante</p>
                </div>
                <hr class="my-4 ">
                <div class="row mx-auto text-center">
                    <ul id="social" class="row mx-auto">
                        <a class="redes-link" href="#"><img class="redes" src="{{ url('./img/logo-do-facebook.png') }}" alt="facebook"></a>
                        <a class="redes-link" href="#"><img class="redes" src="{{ url('./img/twitter.png') }}" alt="twitter"></a>
                        <a class="redes-link" href="#"><img class="redes" src="{{ url('./img/instagram.png') }}" alt="instagram"></a>
                        </a>
                    </ul>
                </div>

                <hr class="my-4 ">
                <div id="user-statistics ">
                    <h6>Estatísticas</h6>
                    <ul class="estatisticas">
                        <li class="py-2"><strong>{{$user->projetos->count()}}</strong> Projetos Concluídos</li>
                        <li class="py-2">Recomendam o trabalho <strong>94%</strong> </li>
                        <li class="py-2"><strong>80%</strong>Taxa de resposta</li>
                    </ul>
                    <p class="text-center">Ingressou há 2 meses</p>
                </div>
                <hr class="my-4 ">
                <div class="user-network ">
                    <h6>Rede Toró</h6>
                    <ul class="seguidores">
                        <li>
                            <a href="#" class="mr-2" data-toggle="modal" data-target="#exampleModalCenter"><strong>Seguidores</strong></a> {{$seguidores}}
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header modal-titulo">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Seguidores</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @if($seguidores > 0)
                                            @foreach ( $seguidores_users as $seguidor )
                                                <div class="row seguidores_user">
                                                    <div class="item-seguidor">
                                                        <div class="perfil-seguidor">
                                                            <img src="{{ $seguidor->url_foto }}" alt="">
                                                        </div>
                                                        <a href="/perfil/{{ $seguidor->username }}" class="ml-5">{{ $seguidor->username }}</a>
                                                    </div>
                                                </div>
                                            @endforeach
                                            @elseif ($seguidores == 0)
                                                <p>No momento, não há seguidores.</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </li>
                        <li>
                            <a href="#" class="mr-2" data-toggle="modal" data-target="#exampleModalCenter2"><strong>Seguindo</strong></a> {{$seguindo}}

                            <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header modal-titulo">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Seguindo</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @if ($seguindo > 0)
                                                @foreach ( $seguindo_user as $seguindo )
                                                    <div class="row seguidores_user">
                                                        <div class="item-seguidor">
                                                            <div class="perfil-seguidor">
                                                                <img src="{{ $seguindo->url_foto }}" alt="">
                                                            </div>
                                                            <a href="/perfil/{{ $seguindo->username }}" class="ml-5">{{ $seguindo->username }}</a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                @foreach ( $projetos_seguidos as $p_s )
                                                    <div class="row seguidores_user">
                                                        <div class="item-seguidor">
                                                            <div class="perfil-seguidor">
                                                                <img src="{{ $p_s->url_foto }}" alt="">
                                                            </div>
                                                            <a href="/projeto/{{ $p_s->id }}" class="ml-5">{{ $p_s->titulo }}</a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @elseif ($seguindo == 0 && $projetos_seguidos->count() == 0)
                                                <p>No momento, você não segue ninguém.</p>
                                            @endif
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection