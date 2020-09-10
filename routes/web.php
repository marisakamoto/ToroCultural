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

//PROJETO
Route::get('/projetos/create', 'PerfilProjetoController@create')->name('cadastroProjeto'); // CADASTRO
Route::post('/projetos/create', 'PerfilProjetoController@store'); //MÉTODO PARA SALVAR DADOS
Route::get('/projetos/vaga', 'PerfilProjetoController@createVaga')->name('cadastroVaga'); // CADASTRO
Route::get('/projeto/{id}', 'PerfilProjetoController@show');//VIEW DO PROJETO
Route::get('/projeto/edit/{id}', 'PerfilProjetoController@edit')->name('editar');//VIEW EDIT
Route::put('/projeto/update/{id}', 'PerfilProjetoController@update')->name('update'); //Atulizar dados
Route::delete('/projeto/delete/{id}', 'PerfilProjetoController@delete')->name('delete');
// FIM PROJETO

//ROTA PARA ACESSAR IMAGEM NO STORAGE
Route::get('/projetos/imagens/{imagem}', "PerfilProjetoController@image");
//FIM DA ROTA

Route::get('/perfil/{username}', 'homeController@show');

Route::get('/feed', 'FeedController@feed')->name('feed');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/experiencia', 'CadastroUsuarioController@experiencia');
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
