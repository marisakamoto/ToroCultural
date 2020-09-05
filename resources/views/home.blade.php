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
                <a class="nav-link" href="#">Meu perfil</a>
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
                                <img  src="{{ Auth::user()->url_foto }}"></img>
                            </div>
                        </div>
                        <div class="row pt-2">
                            <p class="row mx-auto">São Paulo, SP<br> Online há 1 dia</p>
                        </div>
                    

                    </div>
                    <div class="col-md-8">
                        <div class="row d-flex pb-3 ">
                            <div class="col-md-6">
                                <h3 class="nomeUser text-center">{{ Auth::user()->name }}</h3>

                            </div>
                            <div class="col-md-6 text-center">
                                <a href="{{ route('cadastroUsuario') }}"class="text-center"><img class="icon-config pl-1 pt-1 ml-5" src="img/editar.png" alt=""></a>
                                <button type="button" class="follow btn btn-outline-warning btn-sm m-1 p-2"> Seguir</button>
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

                                {{-- <li>
                                    <button type="button" class="btn btn-deep-orange  btn-sm m-1">
                                        teatro
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-deep-orange  btn-sm m-1">
                                        clown
                                    </button>
                                </li>
                                <li><button type="button" class="btn btn-deep-orange  btn-sm m-1">
                                    fotografia
                                </button></li>
                                <li><button type="button" class="btn btn-deep-orange  btn-sm m-1">
                                    edição de vídeo
                                </button></li> --}}
                            </ul>
                            <p class="ml-4" >
                                {{ Auth::user()->descricao }} </p>
                        </div>
                    </div>
                </div>
                <hr class="my-4 ">
                <div class="row ml-0 mt-4 mr-3 pt-2" id="portfolio">
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
                                        </div>


                                    {{-- <div class="carousel-item ">
                                        <div class="row ">
                                            <div class="col-md-4 ">
                                                <div class="card mb-2 ">
                                                    <img class="card-img-top " src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg " alt="Card image cap ">
                                                    <div class="card-body ">
                                                        <h4 class="card-title ">Card title</h4>
                                                        <p class="card-text ">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                        <a class="btn btn-primary ">Button</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4 clearfix d-none d-md-block ">
                                                <div class="card mb-2 ">
                                                    <img class="card-img-top " src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(47).jpg " alt="Card image cap ">
                                                    <div class="card-body ">
                                                        <h4 class="card-title ">Card title</h4>
                                                        <p class="card-text ">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                        <a class="btn btn-primary ">Button</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4 clearfix d-none d-md-block ">
                                                <div class="card mb-2 ">
                                                    <img class="card-img-top " src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(48).jpg " alt="Card image cap ">
                                                    <div class="card-body ">
                                                        <h4 class="card-title ">Card title</h4>
                                                        <p class="card-text ">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                        <a class="btn btn-primary ">Button</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <!--/.Second slide-->
                                    <hr class="my-4 ">
                        
                                        <div class="row px-5">
                                            <h3 >Experiências</h3>

                                            {{-- CARD DE EXPERIENCIAS DO USUARIO FORA DO TORO --}}
                                            @foreach ( $experiences as $xp)
                                            <div class="card card-body mb-4 ">
                                                <div class="col d-flex align-content-around">
                                                    <div class="col">
                                                        <h4>{{ $xp->titulo }} </h4>
                                                        <hr> 
                                                        <h6>{{ $xp->localizacao }} | {{ $xp->data_realizacao }}</h6>
                                                        
                                                        <p>{{ $xp->descricao }}</p>

                                                    </div>                        
                                                    <div class="xp-foto d-none d-lg-block">
                                                        
                                                        <img class="mx-auto d-flex   " src= {{ $xp->url_foto }}>

                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
 
 
                                        </div>
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
                        <a class="redes-link" href="#"><img class="redes" src="img/logo-do-facebook.png" alt="facebook"></a>
                        <a class="redes-link" href="#"><img class="redes" src="img/twitter.png" alt="twitter"></a>
                        <a class="redes-link" href="#"><img class="redes" src="img/instagram.png" alt="instagram"></a>
                        </a>
                    </ul>
                </div>

                <!--                    <hr class="my-4 ">
                <button type="button " class="btn btn-danger">Enviar Projeto</button>-->

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
                <div id="user-network ">
                    <h6>Rede Toró</h6>
                    <ul class="seguidores">
                        <li>
                        <p><strong>Seguidores</strong> {{$seguidores}}</p>
                        </li>
                        <li>
                        <p><strong>Seguindo</strong> {{$seguindo}}</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
