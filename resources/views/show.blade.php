@extends('layouts.app')

@section('title')
    <title>{{ $projeto->titulo }}</title>
@endsection

@section('css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Kaushan+Script|Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/perfil.css') }}">
    <link rel="stylesheet" href="{{ asset('css/feed.css') }}">
    <link rel="stylesheet" href="{{ asset('css/feed-giu.css') }}">
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
    <div class=" d-flex flex-row-reverse flex-wrap " >
        <div class="col-lg-10 py-3 px-5" id="main-conteudo">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row d-flex align-items-center">
                        <div class=" titulo-secao">
                            Projeto:
                            <div class="nomeProjeto">

                            </div>
                        </div>
                        <div id="nomeProjeto d-flex flex-row">
                            <h1 class="">{{ $projeto->titulo }}</h1>
                        </div>

                    {{-- para teste de imagem    --}}
                    {{-- <img src="{{url("storage/{$projeto->url_foto}")}}"> --}}


                    </div>
                    <div class="row mb-2" id="categoriasProjeto ">
                        @foreach ($categorias as $c )
                            <button type="button " class="btn btn-deep-orange  btn-sm m-1 ">{{ $c->categoria }}</button>
                        @endforeach
                    </div>
                    <div class="row">
                        <p class="data-realizacao">Data: {{$projeto->data_de_realizacao}}</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    @if ( $projeto->user_id == Auth::user()->id )
                        <div class="config d-flex">
                            <a href="/projeto/edit/{{ $projeto->id }}"class="text-center"><img class="icon-config pl-1 pt-1 ml-5" src="{{ url('img/edit.svg') }}" alt=""></a>

                            <a class="btn btn-orange p-1" href="{{ route('cadastroVaga') }}">Vaga</a>

                            <form action="/projeto/delete/{{ $projeto->id }}" method="POST">
                                @method('delete')
                                @csrf
                                <button class="btn-orange btn p-1" onclick="return confirm('Deseja mesmo deletar esse projeto?');">Delete</button>
                            </form>

                        </div>

                    @elseif($projeto->user_id != Auth::user()->id)
                        @if($seguidoPeloLogado)
                            <form action="/projeto/unfollow/{{ $projeto->id }}" method="POST">
                                @method('delete')
                                @csrf
                                <button class="follow btn btn-orange font-weight-bold btn-sm m-1 p-2"> Deixar de Seguir</button>
                            </form>
                        @else
                            <form action="/projeto/seguir/{{ $projeto->id }}" method="POST">
                                @csrf
                                <button class="follow btn btn-outline-warning btn-sm m-1 p-2"> Seguir</button>
                            </form>
                        @endif

                    @endif
                </div>
            </div>

            <nav>
                <div class="nav nav-tabs btn-principais-feed" id="nav-tab" role="tablist">
                    <a class="btn-feed nav-item nav-link active text-center" id="nav-home-tab" data-toggle="tab" href="#feed-user" role="tab" aria-controls="nav-home" aria-selected="true">Sobre</a>
                    <a class="btn-feed nav-item nav-link text-center" id="nav-profile-tab" data-toggle="tab" href="#feed-site" role="tab" aria-controls="nav-profile" aria-selected="false">Linha do Tempo</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="conteudo-sobre tab-pane fade show px-2 py-2 active" id="feed-user" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row " >
                        <b><p class="text-justify p-3 accent-2" id="descricao-projeto "> {{ $projeto->descricao }}</p></b>

                        {{-- <img src="{{url("storage/{$projeto->url_foto}")}}" class="col d-flex justify-content-center"> --}}

                    </div>
                    <div class="row" id="mapa-cal">
                        <div class="col-md-6   justify-content-center ">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3656.340557539858!2d-46.646774699999995!3d-23.5921163!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce5a20cbb8803f%3A0x881797bc7c83b42f!2sCinemateca%20Brasileira!5e0!3m2!1spt-BR!2sbr!4v1585923808392!5m2!1spt-BR!2sbr"
                                width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                        <div class="col-md-6 d-flex justify-content-center ">
                            {{-- {{ strftime($projeto->data_de_realizacao) }} --}}
                            <div class="calendar">
                                <div class="month">
                                    <ul>
                                        <li class="prev ">&#10094;</li>
                                        <li class="next ">&#10095;</li>
                                    <li>{{$month}} <br><span>{{$year}}</span></li>
                                    </ul>
                                </div>
                                <ul class="weekdays">
                                    <li>Seg</li>
                                    <li>Ter</li>
                                    <li>Qua</li>
                                    <li>Qui</li>
                                    <li>Sex</li>
                                    <li>Sab</li>
                                    <li>Dom</li>
                                </ul>
                                <ul class="days">
                                    <li><span class="{{ $day=='01' ? 'active' : '' }}">1</span></li>
                                    <li><span class="{{ $day=='02' ? 'active' : '' }}">2</span></li>
                                    <li><span class="{{ $day=='03' ? 'active' : '' }}">3</span></li>
                                    <li><span class="{{ $day=='04' ? 'active' : '' }}">4</span></li>
                                    <li><span class="{{ $day=='05' ? 'active' : '' }}">5</span></li>
                                    <li><span class="{{ $day=='06' ? 'active' : '' }}">6</span></li>
                                    <li><span class="{{ $day=='07' ? 'active' : '' }}">7</span></li>
                                    <li><span class="{{ $day=='08' ? 'active' : '' }}">8</span></li>
                                    <li><span class="{{ $day=='09' ? 'active' : '' }}">9</span></li>
                                    <li><span class="{{ $day=='10' ? 'active' : '' }}">10</span></li>
                                    <li><span class="{{ $day=='11' ? 'active' : '' }}">11</span></li>
                                    <li><span class="{{ $day=='12' ? 'active' : '' }}">12</span></li>
                                    <li><span class="{{ $day=='13' ? 'active' : '' }}">13</span></li>
                                    <li><span class="{{ $day=='14' ? 'active' : '' }}">14</span></li>
                                    <li><span class="{{ $day=='15' ? 'active' : '' }}">15</span></li>
                                    <li><span class="{{ $day=='16' ? 'active' : '' }}">16</span></li>
                                    <li><span class="{{ $day=='17' ? 'active' : '' }}">17</span></li>
                                    <li><span class="{{ $day=='18' ? 'active' : '' }}">18</span></li>
                                    <li><span class="{{ $day=='19' ? 'active' : '' }}">19</span></li>
                                    <li><span class="{{ $day=='20' ? 'active' : '' }}">20</span></li>
                                    <li><span class="{{ $day=='21' ? 'active' : '' }}">21</span></li>
                                    <li><span class="{{ $day=='22' ? 'active' : '' }}">22</span></li>
                                    <li><span class="{{ $day=='23' ? 'active' : '' }}">23</span></li>
                                    <li><span class="{{ $day=='24' ? 'active' : '' }}">24</span></li>
                                    <li><span class="{{ $day=='25' ? 'active' : '' }}">25</span></li>
                                    <li><span class="{{ $day=='26' ? 'active' : '' }}">26</span></li>
                                    <li><span class="{{ $day=='27' ? 'active' : '' }}">27</span></li>
                                    <li><span class="{{ $day=='28' ? 'active' : '' }}">28</span></li>
                                    <li><span class="{{ $day=='29' ? 'active' : '' }}">29</span></li>
                                    <li><span class="{{ $day=='30' ? 'active' : '' }}">30</span></li>
                                    <li><span class="{{ $day=='31' ? 'active' : '' }}">31</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="titulo-secao row  justify-content-center " id="vagas ">
                        Vagas
                    </div>
                    <div class="job-card row justify-content-center align-items-center m-2">
                        <div class="card card-vagas bg-light m-3" >
                            <div class="card-header">
                                <img src="{{ url('img/rain.svg') }}" width="20" alt=""> Aberto
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Atriz</h5>
                                <p class="card-text justify-content-center">
                                    <img src="img/wallet.svg" width="15" alt=""> R$80 a R$100 por hora
                                    <br>
                                    <img src="img/you-are-here.svg" width="15" alt=""> São Paulo, SP
                                    <br>
                                    <img src="img/round-wall-clock.svg" width="15" alt=""> 01/Mar/2021 a 03/Maio/2021
                                    <br>
                                    <br>Buscamos atriz para papel principal da peça. É fundamental que saiba cantar e que esteja disponível por 2 meses. De preferência que já tenha atuado com peça infantil.
                                    <br>
                                    <div class="habilidades d-flex flex-wrap font-smaller">
                                        <a class="bg-secondary m-1  text-white" href=""> Adobe Premiere </a>
                                        <a class="bg-secondary d-inline m-1 text-white " href=""> After Effects </a>
                                        <a class="bg-secondary d-inline  m-1 text-white " href=""> Photoshop </a>
                                        <a class="bg-secondary d-inline  m-1 text-white " href=""> Storytelling </a>
                                        <a class="m-1" href="">mais</a>
                                    </div>
                                </p>
                                <button class="btn peach-gradient">Aplicar</button>
                            </div>
                        </div>
                        <div class="card card-vagas bg-light m-3" >
                            <div class="card-header">
                                <img src="{{ url('img/rain.svg') }}" width="20" alt=""> Aberto
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Roteirista</h5>
                                <p class="card-text justify-content-center">
                                    <img src="{{ url('img/wallet.svg') }}" width="15" alt=""> R$75 a R$90 por hora
                                    <br>
                                    <img src="{{ url('img/you-are-here.svg') }}" width="15" alt=""> São Paulo, SP
                                    <br>
                                    <img src="{{ url('img/round-wall-clock.svg') }}" width="15" alt=""> 01/Mar/2021 a 03/Maio/2021
                                    <br>
                                    <br> Roteirista, para executar a criação em diversos assuntos, filmes publicitários, corporativos e construção de webséries. Pré e pós-produção, para trabalhar com a equipe de montagem e produtora.
                                    <br>
                                    <div class="habilidades d-flex flex-wrap font-smaller">
                                        <a class="bg-secondary m-1  text-white" href=""> Adobe Premiere </a>
                                        <a class="bg-secondary d-inline m-1 text-white " href=""> After Effects </a>
                                        <a class="bg-secondary d-inline  m-1 text-white " href=""> Photoshop </a>
                                        <a class="bg-secondary d-inline  m-1 text-white " href=""> Storytelling </a>
                                        <a class="m-1" href="">mais</a>
                                    </div>
                                </p>
                                <button class="btn peach-gradient">Aplicar</button>
                            </div>
                        </div>
                        <div class="card card-vagas bg-light m-3" >
                            <div class="card-header"><img src="{{ url('img/umbrella.svg') }}" width="20" alt=""> Fechado
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Editor de Vídeo</h5>
                                <p class="card-text justify-content-center">
                                    <img src="{{ url('img/you-are-here.svg') }}" width="15" alt=""> São Paulo, SP
                                    <br>
                                    <img src="{{ url('img/round-wall-clock.svg') }}" width="15" alt=""> 01/Mar/2021 a 03/Maio/2021
                                    <br>
                                    <br> Procuramos profissional que atue com edição de vídeos de forma prática e criativa, desenvolvendo uma boa narrativa para captar a atenção da audiência.
                                    <br>
                                    <div class=" row circle peach-gradient p-4 justify-content-center">
                                        <div class="perfil-foto-colaborador">
                                            <img class="  rounded-circle  peach-gradient " src="{{ url('img/mulher1.jpg') }} " alt="perfil-user ">
                                        </div>
                                    </div>
                                </p>
                            </div>
                        </div>
                        @foreach ( $vagas as $v )
                            <div class="card card-vagas bg-light m-3 " >
                            <div class="card-header ">
                                <img src="{{ url('img/rain.svg') }} " width="20 " alt=" "> {{ $v->status }}
                            </div>
                            <div class="card-body ">
                                <h5 class="card-title ">{{ $v->titulo }}</h5>
                                <p class="card-text justify-content-center ">
                                    <img src="{{ url('img/wallet.svg') }} " width="15 " alt=" "> R$15 a R$20 por hora
                                    <br>
                                    <img src="{{ url('img/you-are-here.svg') }} " width="15 " alt=" "> {{ $projeto->localizacao }}
                                    <br>
                                    <img src="{{ url('img/round-wall-clock.svg') }} " width="15 " alt=" "> {{ $projeto->data_de_realizacao }}
                                    <br>
                                    <br> <p>{{ $v->descricao }}</p>
                                    <br>
                                    <div class="habilidades d-flex flex-wrap font-smaller ">
                                        @foreach ($v->habilidades as $habilidade )
                                            <a class="bg-secondary m-1 text-white " href=" "> {{ $habilidade->habilidade }} </a>
                                        @endforeach
                                    </div>
                                </p>
                                <button class="btn peach-gradient ">Aplicar</button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="conteudo-feed tab-pane fade px-2 pt-2" id="feed-site" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="container border p-4">
                        <div class="row justify-content-start">
                            <div class="pesquisa-feed-projeto mx-auto">
                            @if(Auth::user()->id == $projeto->user_id || in_array(Auth::user()->id, $colaboradores))
                                <form method="POST" action="/projeto/{{$projeto->id}}/post" enctype="multipart/form-data">
                                @csrf
                                    <textarea name = postagem class="form-control" rows="2" placeholder="O que seu toró está pensando?"></textarea>
                                    <div class="row d-flex align-content-center mar-top clearfix">
                                            <label id = "upload-button"  for="apply"><input type="file" name="imagePost" id="apply" accept="image/*,.pdf">Get file</label>
                                            <button class="btn btn-sm btn-compartilhar pull-right" type="submit"><i class="fa fa-pencil fa-fw"></i> Share</button>


                                            {{-- <a class="btn btn-trans btn-icon fa fa-video-camera add-tooltip" href="#"></a>
                                        <a class="btn btn-trans btn-icon fa fa-camera add-tooltip" href="#"></a>
                                        <a class="btn btn-trans btn-icon fa fa-file add-tooltip" href="#"></a> --}}
                                    </div>
                                </form>
                            @endif

                            </div>
                            <div class="feed-publicacoes mx-auto">

                                @foreach($posts as $post)
                                <div class="card mb-4">
                                    <div class="card-body">
                                            @if($post->url_foto != null)
                                            <a class="media-left" href="#"><img class="img-circle img-publi"  alt="Post Image" src="{{ url($post->url_foto)}}"></a>
                                            @endif
                                            <div class="media-body">

                                                <div class="mar-btm">
                                                    <a href="#" class="btn-link text-semibold media-heading box-inline"> {{$post->user->username}}</a>
                                                    <p class="text-muted text-sm"><i class="fa fa-mobile fa-lg"></i> - From Mobile - {{$post->created_at}} há

                                                   {{ $myTime->diffInDays($post->updated_at) }}

                                                    dias
                                                    </p>
                                                </div>
                                                <p>
                                                    {{$post->legenda}}
                                                </p>
                                                <div class="pad-ver">
                                                    <div class="btn-group">
                                                        <a class="btn btn-sm btn-default btn-hover-success" href="#"><i class="fa fa-thumbs-up"></i></a>
                                                        <a class="btn btn-sm btn-default btn-hover-danger" href="#"><i class="fa fa-thumbs-down"></i></a>
                                                        <a class="btn btn-sm btn-default btn-hover-primary" href="#">Comment</a>
                                                    </div>

                                                    @if($post->user_id == Auth::user()->id || $post->projeto->user_id == Auth::user()->id )
                                                        <form action="/post/delete/{{ $post->projeto->id }}/{{ $post->id }}" method="POST">
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

                            </div>
                                <!--===================================================-->
                                <!-- End Newsfeed Content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 menu-esq pt-5 d-flex justify-content-start" id="menu-lado">
                <h6 class="my-0">Sobre o autor</h6> <br>
                <h5 class="my-0"><a class="user-link" href="/perfil/{{ $user_criador->username }}">{{ $user_criador->username }}</a></h5> <br>

                <div class="perfil-foto-proj">
                    <img  src="{{ url($user_criador->url_foto)}}">
                </div>
                <div class="row  mx-auto">
                    <div id="star-rank ">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked "></span>
                        <span class="fa fa-star checked "></span>
                        <span class="fa fa-star checked "></span>
                        <span class="fa fa-star "></span>
                    </div>
                </div>
                <br>
                <div class="text-center">
                    <p>10 avaliações</p>
                </div>
            <hr class="my-4 ">
            <div id="user-statistics ">
                <h6>Estatísticas</h6>
                <ul>
                    <li class="py-3 text-center"><strong>35</strong> Visualizações</li>
                    <li class="py-3 text-center">Recomendam o trabalho <strong>91%</strong> </li>
                    <li class="py-3 text-center"><strong>86%</strong>Taxa de resposta</li>
                </ul>
                <p class="text-center">Publicado há 1 mês</p>
            </div>
            <hr class="my-4 ">
            <div id="user-network">
                <h3 class="text-center">Equipe</h3>
                @foreach ( $user_colaborador as $user_c )
                    <div class="row px-1 pt-2 ">
                    <div class="row perfil-foto-colaborador">
                        <img class=" rounded-circle peach-gradient " height="85 em " src="{{ url($user_c->url_foto)}}" alt="perfil-user">
                    </div>
                    <div class="row mx-auto " style="width: 100%; ">
                        <p class="text-center mx-auto mb-0 "><a class="user-link" href="/perfil/{{ $user_c->username }}">{{ $user_c->username }}</a></p>
                    </div>
                    <div class="row mx-auto">
                        <p>{{ $user_c->profissao }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
