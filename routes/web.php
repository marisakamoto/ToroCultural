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
Route::post('/contato', 'PaginaInicialController@enviaContato')->name('contato');

Route::get('/cadastroUsuario', 'cadastroUsuarioController@cadastroUsuario')->name('cadastroUsuario');

Route::get('/projetos/create', 'PerfilProjetoController@create')->name('cadastroProjeto');
Route::post('/projetos/create', 'PerfilProjetoController@store');
Route::get('/projetos/vaga', 'PerfilProjetoController@createVaga')->name('cadastroVaga');
Route::get('/projeto/{id}', 'PerfilProjetoController@show');

Route::get('/perfil/{username}', 'homeController@show');

Route::get('/feed', 'FeedController@feed')->name('feed');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
