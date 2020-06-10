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
      <a class="modal-trigger btn" href="#modal-foto">Editar</a>
    </div>

  </div>

</div>

//colocar isso dentro do modal OK?
@if(session()->has('message'))
  <div class="alert alert-success" style="margin-left:20px;">
      {{ session()->get('message') }}
  </div>
@endif

@if($errors->any())
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
        <p>Apenas jpg ou png</p>
    @endforeach
</div>
@endif
//ATÉ AQUI OK



<!-- Modal enviar foto -->

<div class="modal" id="modal-foto" aria-hidden="true">
  <div class="modal-content">

    <h4 class="light">Alterar foto</h4>

    <form style="padding-top:20px;" action="{{ route('perfil.viewFoto.salvar') }}" method="post" enctype="multipart/form-data">

    {{ csrf_field()}}


    <div class="file-field  input-field">

      <div class="btn indigo lighten-2">
        <span>Selecionar imagem</span>
        <input type="file" name="imagem">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>

    <br>



  <div class="modal-footer">

      <button class="waves-effect waves-light btn indigo lighten-2">Enviar</button>
      <a class="modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>

  </div>
</div>








<script>
  //Modal
  $(document).ready(function(){
    $('.modal').modal();
  });
</script>





@endsection
