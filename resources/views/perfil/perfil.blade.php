@extends('layout.site')
@section('titulo','Aluno')
@section('perfil',Auth::user()->name)
@section('email',Auth::user()->email)
@section('sair','Sair')
@section('perfil-active','active')


@section('navbar')

@include('layout._includes.sidenav')

@endsection



@section('conteudo')

<div class="row">
  <h3 class="center">Perfil</h3>
  <div class="div-perfil">
    <div class="col s12 m12 l4 center">
      <img class="circle foto-perfil z-depth-3" src="{{$user->foto_perfil}}">
    </div>
    <div class="col s12 m11 l4">
      <table>
        <tbody>
          <tr>
            <th>Nome</th>
            <td>{{Auth::user()->name}}</td>
          </tr>
          <tr>
            <th>Email</th>
            <td>{{Auth::user()->email}}</td>
          </tr>
          <tr>
            <th>Senha</th>
            <td>··············</td>
          </tr>
      </table>
    </div>
    <div class="col s12 m1 l4 btn-editar-perfil">
      <a href="{{ route('perfil.viewFoto')}}" class="waves-effect waves-light btn indigo lighten-2 left">Editar</a>
    </div>
  </div>
</div>






<script>
  //Modal
  $(document).ready(function(){
    $('.modal').modal();
  });
</script>


@endsection
