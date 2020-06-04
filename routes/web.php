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
    return view('home');
});

Route::get('/index',['as'=>'site.index','uses'=>'site\siteController@index']);

Route::get('/login',['as'=>'site.login','uses'=>'site\loginController@index']);
Route::post('/login/entrar',['as'=>'site.login.entrar','uses'=>'site\loginController@entrar']);
Route::get('/login/sair',['as'=>'login.sair','uses'=>'site\loginController@sair']);


Route::get('/cadastro',['as'=>'site.cadastro','uses'=>'site\cadastroController@index']);
Route::post('/cadastro/criar',['as'=>'site.cadastro.criar','uses'=>'site\cadastroController@criar']);



Route::group(['middleware'=>'auth'],function(){

Route::get('/aluno',['as'=>'aluno.index','uses'=>'aluno\alunoController@index']);

Route::get('/professor',['as'=>'professor.index','uses'=>'professor\professorController@index']);
Route::get('/professor/turmas',['as'=>'professor.turmas.index','uses'=>'professor\turmaController@index']);
Route::post('/professor/turmas/criar',['as'=>'professor.turmas.criar','uses'=>'professor\turmaController@criar']);

Route::get('/admin',['as'=>'admin.index','uses'=>'admin\adminController@index']);


});
