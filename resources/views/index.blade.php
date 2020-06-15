@extends('layout.site')
@section('titulo','Login')

@section('login','Login')
@section('cadastro','Cadastro')

@section('navbar')

@include('layout._includes.navbar')

@endsection

@section('conteudo')


<h3>Index</h3>

{{bcrypt('123')}}


@endsection
