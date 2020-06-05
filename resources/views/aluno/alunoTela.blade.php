@extends('layout.site')
@section('titulo','Aluno')
@section('perfil',Auth::user()->name)
@section('sair','Sair')

@section('conteudo')
<h3>Olá Aluno!</h3>



<a href="{{ route('aluno.sala.index') }}"> <b>ENTRAR EM UMA SALA</b> </a>

@endsection
