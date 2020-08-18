@extends('layouts.templateBase')

    @section('title')
        <title>Registre-se</title>
    @endsection

    @section('css')
        <link rel="stylesheet" href="css/login.css">
    @endsection

    @section('rota-logo')
        {{ route('home-principal') }}
    @endsection
    
    @section('nav-links')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Entrar</a></li>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="home.html#sobre-nos">Sobre Toró</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="home.html#formEntreEmContato">Contato</a></li>
        </li>
    @endsection
    
        
    @section('conteudoPrincipal')
        <div class="caixa-login">
            <form action="/action_page.php">
                <div class="linha">
                    <h2 class= "titulo-register">cadastrar</h2>
                    <div class="vil">
                        <span class="vil-innertext">ou</span>
                    </div>

                    <div class="coluna">
                        <a href="#" class="fb botao">
                            <i class="fa fa-facebook fa-fw"></i> Login com Facebook
                        </a>
                        <a href="#" class="twitter botao">
                            <i class="fa fa-twitter fa-fw"></i> Login com Twitter
                        </a>
                        <a href="#" class="google botao">
                            <i class="fa fa-google fa-fw"></i> Login com Google+
                        </a>
                    </div>

                    <div class="coluna">
                        <div class="hide-md-lg">
                            <p>Ou manualmente:</p>
                        </div>

                        <input type="text" name="username" placeholder="Username" required>
                        <input type="password" name="password" placeholder="Password" required>
                        <input type="password" name="password" placeholder="Repita Password" required>
                        <input type="submit" value="Entrar">
                    </div>
                </div>
            </form>
        </div>
        <div class="botao-container">
            <div class="linha">
                <div class="coluna">
                    <a href="{{ route('login') }}" class="botao">Login</a>
                </div>
                <div class="coluna">

                    <input type="button" class=" botao btn-esqueceu-senha" href="esqueceu-senha.html" data-toggle="modal" data-target=".bd-example-modal-sm" value="Esqueceu a Senha?">
        
                    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="caixa-esqueceu-senha">
                                <form action="/action_page.php">
                                    <div class="linha">
                                        <h2 class ="titulo-register" style="text-align:center">Esqueceu a Senha?</h2>
                                        <div class="coluna-esqueceu-senha">
                                            <input type="email" name="email" placeholder="Email para recuperação" required>
                                            <input type="submit" value="Recuperar senha">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
        