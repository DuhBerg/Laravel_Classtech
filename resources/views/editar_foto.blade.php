@extends('layout.site')
@section('titulo','Aluno')
@section('perfil',Auth::user()->name)
@section('email',Auth::user()->email)
@section('sair','Sair')


@section('navbar')

@include('layout._includes.sidenav')

@endsection



@section('conteudo')

<b align="center"><h3>EDITAR FOTO</h3></b>
<h3>Olá {{$user->name}}!</h3>

<h5>Arquivos png ou jpg apenas senao dar error kkkk</h5>
<form class="" action="{{ route('perfil.viewFoto.salvar') }}" method="post" enctype="multipart/form-data">

{{ csrf_field()}}


<div class="file-field  input-field">

  <div class="btn blue">
    <span>Imagem</span>
    <input type="file" name="imagem">
  </div>
  <div class="file-path-wrapper">
    <input class="file-path validate" type="text">
  </div>
</div>
<Br>
  <button class="waves-effect waves-light btn indigo lighten-2 left">Enviar</button>
  <br>

  @if($errors->any())
  <div class="alert alert-danger">
      @foreach($errors->all() as $error)
          <p>Apenas arquivos de extensão jpg ou png são aceitos!</p>
      @endforeach
  </div>
  @endif
<br>
  @if(session()->has('message'))
    <div class="alert alert-success" style="margin-left:10px;">
        {{ session()->get('message') }}
    </div>
@endif


</form>




<script>
  //Modal
  $(document).ready(function(){
    $('.modal').modal();
  });
</script>


@endsection
