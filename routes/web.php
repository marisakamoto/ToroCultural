<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

//PROJETO
Route::get('/projetos/create', 'PerfilProjetoController@create')->name('cadastroProjeto'); // CADASTRO
Route::post('/projetos/create', 'PerfilProjetoController@store'); //MÉTODO PARA SALVAR DADOS

//POSTS
Route::post('/projeto/{projeto_id}/post', 'PerfilProjetoController@storePost'); //criar post
Route::delete('/post/delete/{projeto_id}/{id} ', 'PerfilProjetoController@deletePost');//deletar POSTS
//FIM POSTS

Route::get('/projetos/vaga', 'PerfilProjetoController@createVaga')->name('cadastroVaga'); // CADASTRO
Route::get('/projeto/{id}', 'PerfilProjetoController@show');//VIEW DO PROJETO
Route::get('/projeto/edit/{id}', 'PerfilProjetoController@edit')->name('editar');//VIEW EDIT
Route::put('/projeto/update/{id}', 'PerfilProjetoController@update')->name('update'); //Atulizar dados
Route::delete('/projeto/delete/{id}', 'PerfilProjetoController@delete')->name('delete');
// FIM PROJETO

//USUARIO
Route::get('/experiencia', 'HomeController@experiencia');
Route::get('/perfil/{username}', 'HomeController@show');
Route::get('/user/edit/{id}', 'HomeController@edit');
Route::put('/user/update/{id}', 'HomeController@update');
Route::delete('/user/delete/{id}', 'HomeController@delete');
//FIM USUARIO


Route::get('/feed', 'FeedController@feed')->name('feed');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Auth::routes();

//SEGUIR / DEIXAR DE SEGUIR (ENTRE USUARIOS)
Route::post('/user/seguir/{id}', 'HomeController@seguir');
Route::delete('/user/unfollow/{id}', 'HomeController@unfollow');
//FIM SEGUIR

//SEGUIR / USUARIO / PROJETO
Route::post('/projeto/seguir/{id}', 'PerfilProjetoController@seguirProjeto');
Route::delete('/projeto/unfollow/{id}', 'PerfilProjetoController@unfollowProjeto');
//FIM SEGUIR


