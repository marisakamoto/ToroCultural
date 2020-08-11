@extends('layouts.templateBase')

@section('css')
<link rel="stylesheet" href="css/login.css">
@endsection

@section('nav-links')
    <li class="nav-item">
        <a class="nav-link" href="/login">Entrar</a></li>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="home.html#sobre-nos">Sobre Toró</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="home.html#formEntreEmContato">Contato</a></li>
    </li>
@endsection

@section('conteudoPrincipal')
    <main>
        <div class="caixa-nova-senha">
            <form action="/action_page.php">
                <div class="linha">
                    <h2 class="titulo-register" style="text-align:center">Registe uma nova Senha</h2>
                    <div class="coluna" style="width: 100%;">
                        <input type="password" name="senha" placeholder="Nova Senha" required>
                        <input type="password" name="senha" placeholder="Confirme Senha" required>
                        <input type="submit" value="Registrar">
                    </div>

                </div>
            </form>
        </div>
    </main>
@endsection
