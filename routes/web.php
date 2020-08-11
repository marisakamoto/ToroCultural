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

Route::get('/home', function(){
    return view('home');
});

Route::get('/login', function(){
    return view('login');
});

Route::get('/register', function(){
    return view('register');
});

Route::get('/cadastroUsuario', function(){
    return view('cadastro-usuario');
});

Route::get('/cadastroProjeto', function(){
    return view('cadastro-projeto');
});

Route::get('/novaSenha', function(){
    return view('nova-senha');
});

Route::get('/feed', function(){
    return view('feed-de-noticias');
});
