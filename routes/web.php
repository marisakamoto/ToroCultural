<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'homeController@home')->name('home-principal');

Route::get('/login', 'loginController@login')->name('login');

Route::get('/register', 'registerController@register')->name('register');

Route::get('/cadastroUsuario', 'cadastroUsuarioController@cadastroUsuario')->name('cadastroUsuario');

Route::get('/cadastroProjeto', 'cadastroProjetoController@cadastroProjeto')->name('cadastroProjeto');

Route::get('/novaSenha', 'novaSenhaController@novaSenha')->name('novaSenha');


Route::get('/user', function(){
    return view('perfil-usuario');
});

Route::get('/perfilProjeto', function(){
    return view('perfil-projeto');
});

Route::get('/feed', function(){
    return view('feed-de-noticias');
});
