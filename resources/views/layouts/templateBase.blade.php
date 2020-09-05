<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @yield('title')
        <link rel="icon" href="img/toro cultural.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Material Design Bootstrap -->
        <link rel="stylesheet" href="css/mdb.min.css">
        <!-- Your custom styles (optional) -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="css/estilo.css">
        <link rel="stylesheet" href="css/specimen_files/stylesheet.css" type="text/css" charset="utf-8" />
        
        
        <!-- {{-- ADICIONAR CSS ESPECÍFICO PARA CADA PÁGINA --}} -->
        @yield('css')
        
        

        

    </head>
    <body>
        <header>
            {{-- TIRA AQUELA BORDIDINHA DO NAVBAR --}}
            {{-- <div class="container-fluid"> --}}
                <div >
                <nav class="navbar  navbar-expand-lg  navbar-light pt-0 pb-0 menu-geral">
                    <a class="navbar-brand" href="@yield('rota-logo')">
                        <img src="{{ url('./img/toro cultural.png') }}" width="85" height="85" alt="Toró Cultural">
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
        {{-- ADICIONAR CONTEUDO PRINCIPAL DE CADA PÁGINA --}}
            @yield('conteudoPrincipal')
        </main>
        <footer>
            <a class="redes-link" href="#"><img class="redes" src="{{ url('./img/logo-do-facebook.png') }}" alt="facebook"></a>
            <a class="redes-link" href="#"><img class="redes" src="{{ url('./img/twitter.png') }}" alt="twitter"></a>
            <a class="redes-link" href="#"><img class="redes" src="{{ url('./img/instagram.png') }}" alt="instagram"></a>
        </footer>

        @yield('scripts')
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        {{-- ADICIONAR SCRIPTS Diferentes --}}
    </body>

</html>

{{-- ARRUMAR BARRA DE BUSCA / MOVA SENHA - DIMINUIR--}}

