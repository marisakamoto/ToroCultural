<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="img/toro cultural.png">

    @yield("title")

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/specimen_files/stylesheet.css') }}" type="text/css" charset="utf-8" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
    @yield("css")
</head>

<body>
    <div id="app">
        <header>
            <div class="">
                <nav class="navbar  navbar-expand-lg  navbar-light  pt-1 pb-1 menu-geral">
                    <a class="navbar-brand" href="@yield('rota-logo')">
                        <img class = "ml-3" src="{{ url('./img/toro cultural.png') }}" width="85" height="85" alt="Toró Cultural">
                    </a>
                    <button class="navbar-toggler botao-nav" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        @yield('search')

                        {{-- <!-- <form class="form-inline my-2 my-lg-0" action="./feed-de-noticias.html">
                            <input class="form-control mr-sm-1" type="search" placeholder="Pesquisar" aria-label="Pesquisar" style="width: 65%;">
                            <button class="btn btn-orange my-1 my-sm-0 py-1 px-2" type="submit">
                                <img class="search" src="img/search.png" alt="">
                            </button>
                        </form> --> --}}
                        <ul class="nav justify-content-end ">
                        {{-- ADICIONAR LINKS DO MENU ESPECÍFICOS PARA CADA PÁGINA --}}
                            @yield('nav-links')
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <main>
            @yield('content')
        </main>
        <footer>
            <a class="redes-link" href="#"><img class="redes" src="{{ url('./img/logo-do-facebook.png') }}" alt="facebook"></a>
            <a class="redes-link" href="#"><img class="redes" src="{{ url('./img/twitter.png') }}" alt="twitter"></a>
            <a class="redes-link" href="#"><img class="redes" src="{{ url('./img/instagram.png') }}" alt="instagram"></a>
        </footer>
    </div>

    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
    {{-- @yield('scripts')
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> --}}
</body>
</html>
