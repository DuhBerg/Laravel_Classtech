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



Route::get('/c','FullCalendarController@index')->name('index');
Route::get('/',['as'=>'site','uses'=>'site\loginController@index']);
Route::get('/index',['as'=>'site.index','uses'=>'site\siteController@index']);

Route::get('/login',['as'=>'site.login','uses'=>'site\loginController@index']);
Route::post('/login/entrar',['as'=>'site.login.entrar','uses'=>'site\loginController@entrar']);
Route::get('/login/sair',['as'=>'login.sair','uses'=>'site\loginController@sair']);


Route::get('/forgotPassword','Security\ForgotPassword@forgot');
Route::post('/forgotPassword','Security\ForgotPassword@password');
Route::get('/resetPassword/{token?}','Security\ForgotPassword@resetSenha_index');

Route::post('/resetPassword/reset',['as'=>'senha.resetSenha','uses'=>'Security\ForgotPassword@resetSenha']);


Route::get('/cadastro',['as'=>'site.cadastro','uses'=>'site\cadastroController@index']);
Route::post('/cadastro/criar',['as'=>'site.cadastro.criar','uses'=>'site\cadastroController@criar']);




Route::get('/confirmarEmail/{token?}',['as'=>'site.confirmarEmail','uses'=>'aluno\alunoController@confirmarEmail']);



Route::group(['middleware'=>'auth'],function(){

Route::post('/aluno/addEmail',['as'=>'aluno.addEmail','uses'=>'aluno\alunoController@criarEmail']);
Route::get('/aluno',['as'=>'aluno.index','uses'=>'aluno\alunoController@index']);
Route::post('/aluno/sala/criar',['as'=>'aluno.sala.criar','uses'=>'aluno\salaController@criar']);

Route::get('/perfil',['as'=>'perfil.index','uses'=>'site\perfilController@index']);
Route::get('/perfil/editar-foto',['as'=>'perfil.viewFoto','uses'=>'site\perfilController@viewFoto']);
Route::post('/perfil/editar-foto/salvar',['as'=>'perfil.viewFoto.salvar','uses'=>'site\perfilController@salvaFoto']);

Route::get('/professor',['as'=>'professor.index','uses'=>'professor\professorController@index']);
Route::get('/professor/turmas',['as'=>'professor.turmas.index','uses'=>'professor\turmaController@index']);
Route::post('/professor/turmas/criar',['as'=>'professor.turmas.criar','uses'=>'professor\turmaController@criar']);

Route::get('/admin',['as'=>'admin.index','uses'=>'admin\adminController@index']);
Route::post('/admin/criar',['as'=>'admin.criar','uses'=>'admin\adminController@criar']);

//Professor
Route::post('professor/sala',['as'=>'professor.sala.index','uses'=>'sala\salaController@index']);
Route::post('professor/sala/deletar',['as'=>'professor.sala.deletar_aluno','uses'=>'sala\salaController@deletar']);
Route::post('professor/sala/editar',['as'=>'professor.sala.editar_nome','uses'=>'sala\salaController@editar']);

//Aluno
Route::post('aluno/sala',['as'=>'aluno.sala.index','uses'=>'sala\alunoSalaController@index']);

});
