@extends('layout.site')
@section('titulo','Professor')
@section('perfil','Professor')
@section('sair','Sair')

@section('conteudo')
<h3>Olá Professor!</h3>


<a href="{{ route('professor.turmas.index') }}"> <b>CRIAR TURMA</b> </a>


@endsection
