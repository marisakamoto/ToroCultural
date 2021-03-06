{{-- @extends('layouts.templateBase') --}}
@extends('layouts.app')

    @section('title')
        <title>Toró Cultural</title>
    @endsection

    @section('css')
        <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    @endsection

    @section('nav-links')
        @guest
            <li class="nav-item active">
                    <a class="nav-link" href="#">Sobre o Toró</a>
                </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contato</a></li>
            </li>
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
        <section class="container-fluid content-sobre-toro">
            <div class="jumbotron">
                <div class="container-fluid">
                    <h1 class="display-4" id="sobre-nos">Sobre toró cultural</h1>
                    <p class="lead">A sua rede social para encontrar produtores independentes e oportunidades para participar de projetos culturais. </p>
                </div>
                <hr class="my-4">
                <div class="row text-center info py-2">
                    <div class="col-md-6 my-auto">
                        <img src="{{ url('img/cultura.jpg') }}" class="img-fluid bola" alt="banner">
                    </div>
                    <div class="col-md-6 my-auto">
                        <div class="texto-sobre-toro">
                            <h3>o que é?</h3>
                            <p>Toró Cultural é uma rede social que promove o encontro de produtores independentes para publicarem seus talentos e tirarem seus projetos do papel.</p>
                            <h3>para quem? </h3>
                            <p>Produtores independentes disponíveis para se engajar com projetos, vindo de vários segmentos: teatro, moda, entretenimento, música, fotografia, mídia, jornalismo e áreas facilitadoras.</p>
                        </div>
                    </div>
                </div>
                <div class=" row text-center info py-2  caixa-img-content">
                    <div class=" col-md-6 texto-sobre-toro">
                        <h3>quando? </h3>
                        <p>A ser utilizado a qualquer momento tanto para divulgar o seu perfil artistico quanto para recrutar novos talentos para o seu projeto. Além de atualizar seus seguidores sobre o seu projeto!</p>
                        <h3>aonde?</h3>
                        <p> Para ser utilizado de qualquer lugar! A plataforma indicará as pessoas que estão nas localidades dos seus projetos. </p>
                        <h3>quanto custa?</h3>
                        <p>Preço e orçamento a serem definidos pelos próprios usuários.</p>
                    </div>
                    <div class="col-md-6 my-auto">
                        <img src="img/maos.png" class="img-fluid  bola"  alt="banner" >
                    </div>
                </div>
                <div class="row text-center info py-2">
                    <div class=" col-md-6 texto-sobre-toro">
                        <img src="img/Lampada.jpg" class="img-fluid  bola"  alt="banner" >
                    </div>
                    <div class="texto col-md-6 my-auto">
                        <h3>por quê?</h3>
                        <p>Devido a dificuldade de produtores culturais encontrarem talentos que não sejam apenas indicações pessoais e assim encontrarem as melhores pessoas para os seus projetos. Desse jeito, Toró veio fortalecer a comunidade da cultura.</p>
                        <h3>como?</h3>
                        <p>Artistas autônomos e produtores independentes se inscrevem no site para então interagirem e trabalharem em projetos em conjunto a partir do cadastro de suas habilidades.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="container form-contato mx-auto pb-4" id="formEntreEmContato">
            <div class="caixa-contato mx-auto">
                <h1 class="display-4 pl-3">Entre em contato</h1>
                <form method="POST" action= "/contato">
                @csrf
                    <div class="form-group pl-3">
                        <label for="nome">Nome</label></br>
                        <input class="p-2" type="text" id="nome" name="nome" required></br>
                    </div>
                    <div class="form-group pl-3">
                        <label for="email">Email</label></br>
                        <input class="p-2" type="email" id="email" name="email"></br>
                    </div>
                    <div class="form-group pl-3">
                        <label for="mensagem">Mensagem</label></br>
                        <textarea class="p-2" name="mensagem" id="mensagem" cols="30" rows="4"></textarea></br>
                    </div>
                    <button class="btn btn-deep-orange ml-3">Enviar</button>
                </form>
            </div>
            @if(session('mensagem'))
                <div class="alert alert-success">
                    <p>{{session('mensagem')}}</p>
                </div>
            @endif
        </section>
    @endsection


