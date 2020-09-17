@extends('layouts.app')

@section('title')
    <title>{{ Auth::user()->username }}</title>
@endsection

@section('css')
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Kaushan+Script|Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/perfil.css') }}">
@endsection

@section('search')
    <form class="form-inline my-2 my-lg-0" action="{{route('feed')}}" method="get">
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
                                {{-- <img  src="{{url("storage/".Auth::user()->url_foto)}}"> --}}
                                {{-- <img  src="/storage/{{ Auth::user()->url_foto }}"> --}}
                                {{-- <img  src="{{asset('/storage/'.Auth::user()->url_foto)}}"> --}}
                                <img  src="{{ url(Auth::user()->url_foto)}}">

                            </div>
                        </div>
                        <div class="row pt-2">
                            <p class="row mx-auto">São Paulo, SP</p>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row d-flex pb-3">
                            <div class="col-md-6 no-padding-left">
                                <h3 class="nomeUser text">{{ Auth::user()->name }}</h3>
                            </div>
                            <div class="col-md-6 text-center d-flex justify-content-end no-padding-right">
                                <a href="/user/edit/{{Auth::user()->id}}"class="text-center"><img class="icon-config pl-1 pt-1 ml-5" src="{{ url('img/edit.svg') }}" alt=""></a>
                                <a class="btn-orange btn p-1" href="{{ route('experiencias') }}">+Experiência</a>
                            <form action="/user/delete/{{ Auth::user()->id}}" method="POST">
                                @method('delete')
                                @csrf
                                <button class="btn-orange btn p-1" onclick="return confirm('Deseja mesmo deletar esse usuário?');">Delete</button>
                            </form>
                            </div>
                        </div>
                        <div class="row d-flex justify-content" id="habilidades">
                            <ul >
                                @foreach ($habilidades as $h)
                                <li>
                                    <button type="button" class="btn btn-orange btn-sm m-1">
                                    <b>{{$h->habilidade}}</b>
                                    </button>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="row d-flex justify-content" id="habilidades">
                            <p class="ml-4 no-margin-left"> <b> {{ Auth::user()->descricao }} </b> </p>
                        </div>

                    </div>
                </div>
                <hr class="my-4 ">
                <div class="row ml-0 mt-4 mr-3 pt-2" id="portfolio">
                    <div class="row px-5">
                        <h3 class="pl-5">Meus torós</h3>
                    </div>
                    <div class="row px-4">
                        <div class="container mx-2">


                                        {{-- CARDS PROJETOS CRIADOS PELO USUARIO --}}
                                        <div class="row ">
                                            @foreach ( $projetos as $p )
                                                <div class="col-md-4 clearfix d-md-block ">
                                                    <div class="card card-projeto mb-3">
                                                        <img class="card-img-top" src="{{ url($p->url_foto)}}" alt="Card image cap ">
                                                        <div class="card-body ">
                                                            <h4 class="card-title titulo-projeto">{{ $p->titulo }}</h4>
                                                            <p class="card-text descricao-projeto ">{{ $p->descricao }}</p>
                                                            <a class="btn peach-gradient btn-mais-projeto" href="/projeto/{{ $p->id }}">Perfil</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            {{-- CARDS ONDE O USUARIO É O COLABORADOR --}}
                                            @foreach ( $projetos_colaborando as $p )
                                                <div class="col-md-4 clearfix d-md-block ">
                                                    <div class="card card-projeto mb-3 bg-warning">
                                                        <img class="card-img-top" src="{{ url($p->url_foto)}}" alt="Card image cap ">
                                                        <div class="card-body ">
                                                            <div class="row">
                                                                <h4 class="col-md-10 card-title titulo-projeto">{{ $p->titulo }} - Colaborador</h4>
                                                                <img class="col-md-2 colaboracao no-padding-right" src="{{url('img/perfil-users/supervisor_account-24px.svg')}}">
                                                            </div>
                                                            <p class="card-text descricao-projeto ">{{ $p->descricao }}</p>
                                                            <a class="btn peach-gradient btn-mais-projeto" href="/projeto/{{ $p->id }}">Perfil</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>



                                        {{-- CARDS EXPERIENCIAS --}}
                                        @if ($experiences->count() > 0)
                                            <hr class="my-4">
                                            <div class="col px-5">
                                                <h3 >Experiências</h3>
                                                @foreach ( $experiences as $xp)
                                                    <div class="card card-body mb-4 m-4">
                                                        <div class="col d-flex align-content-around">
                                                            <div class="col">
                                                                <div class="d-flex align-items-center justify-content-between">
                                                                    <h4>{{ $xp->titulo }} </h4>
                                                                    <div class="d-flex">
                                                                        <a href="/home/experiencias/edit/{{ $xp->id }}"class="text-center"><img class="icon-config pl-1 pt-1 ml-5" src="{{ url('img/edit.svg') }}" alt=""></a>
                                                                        <form action="/home/experiencias/delete/{{ $xp->id }}" method="POST">
                                                                            @method('delete')
                                                                            @csrf
                                                                            <button class="btn-deep-orange btn" onclick="return confirm('Deseja mesmo deletar essa experiência?');">Delete</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <h6>{{ $xp->localizacao }} | {{ $xp->data_realizacao }}</h6>
                                                                <p>{{ $xp->descricao }}</p>
                                                            </div>
                                                            <div class="xp-foto d-none d-lg-block">
                                                                <img class="mx-auto d-flex   " src= "{{ url($xp->url_foto)}}">
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

            <div class="col-md-3 menu-dir pt-5 px-4"  id="menu-lado">
                <div id="star-rank" class="text-center">
                    <h4>Avaliação Geral</h4>
                    <span class="fa fa-star checked "></span>
                    <span class="fa fa-star checked "></span>
                    <span class="fa fa-star checked "></span>
                    <span class="fa fa-star checked "></span>
                    <span class="fa fa-star "></span> 4.6
                    <br>
                    <p>3 avaliações</p>
                    <p>Torozero Iniciante</p>
                </div>
                <hr class="my-4 ">
                <div class="row mx-auto text-center">
                    <ul id="social" class="row mx-auto">
                        <a class="redes-link" href="#"><img class="redes" src="{{ url('img/logo-do-facebook.png') }}" alt="facebook"></a>
                        <a class="redes-link" href="#"><img class="redes" src="{{ url('img/twitter.png') }}" alt="twitter"></a>
                        <a class="redes-link" href="#"><img class="redes" src="{{ url('img/instagram.png') }}" alt="instagram"></a>
                        </a>
                    </ul>
                </div>
                <hr class="my-4 ">
                <div id="user-statistics ">
                    <h6>Estatísticas</h6>
                    <ul class="estatisticas">
                        <li class="py-2"><strong>3</strong> Projetos Concluídos</li>
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


                                                            <img src="{{ url($seguidor->url_foto)}}" alt="">
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
                            <a href="#" class="mr-2" data-toggle="modal" data-target="#exampleModalCenter2"><strong>Seguindo</strong></a> {{$seguindo + $projetos_seguidos->count()}}


                            <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
                                <div class="modal-dialog modal-dialog-centered"  role="document">
                                    <div class="modal-content">
                                        <div class="modal-header modal-titulo">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Seguindo</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            @if ($seguindo > 0 || $projetos_seguidos->count() > 0)
                                                @foreach ( $seguindo_user as $seguindo )
                                                    <div class="row seguidores_user">
                                                        <div class="item-seguidor">
                                                            <div class="perfil-seguidor">
                                                                <img src="{{ url($seguindo->url_foto)}}" alt="">
                                                            </div>
                                                            <a href="/perfil/{{ $seguindo->username }}" class="ml-5">{{ $seguindo->username }}</a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                @foreach ( $projetos_seguidos as $p_s )
                                                    <div class="row seguidores_user">
                                                        <div class="item-seguidor">
                                                            <div class="perfil-seguidor">
                                                                <img src="{{ url($p_s->url_foto)}}" alt="">
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
