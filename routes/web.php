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


Route::get('/', 'PaginaInicialController@paginaInicial')->name('paginaInicial');//pagina TORÓ

Route::get('/cadastroUsuario', 'cadastroUsuarioController@cadastroUsuario')->name('cadastroUsuario');

Route::get('/cadastroProjeto', 'cadastroProjetoController@cadastroProjeto')->name('cadastroProjeto');

Route::get('/perfilProjeto', 'PerfilProjeto@perfilProjeto')->name('perfilProjeto');

Route::get('/feed', 'FeedController@feed')->name('feed');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
