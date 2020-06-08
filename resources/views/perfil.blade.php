@extends('layout.site')
@section('titulo','Aluno')
@section('perfil',Auth::user()->name)
@section('email',Auth::user()->email)
@section('sair','Sair')


@section('navbar')

@include('layout._includes.sidenav')

@endsection



@section('conteudo')

<p align='center'><h3>TELA DE PERFIL</h3></p>
<h3>Olá {{Auth::user()->name}}!</h3>



<a href=" {{ route('perfil.viewFoto')}}">EDITAR FOTO KKKK</a>



<script>
  //Modal
  $(document).ready(function(){
    $('.modal').modal();
  });
</script>


@endsection
