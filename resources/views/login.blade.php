@extends('layout.site')
@section('titulo','Login')




@section('conteudo')


    <div style="margin: 0;" class="row">

      <div class="col s0 m5 l5 login-fundo-logo">

        <img style="height: 25vw;" src="img/fotos-logo/logo-escrita-white.png" alt="logo">

      </div>





    <div class="col s12 m6 l6 form-center-login">

      <img class="login-logo-mobile" src="img/fotos-logo/logo-escrita.png" alt="logo">

      <form class="form-login" action="{{ route('site.login.entrar')}}" method="post">



        <h3>Entrar</h3>

        {{ csrf_field() }}


        <div class="input-field">
          <input type="text" name="ra" id="ra">
          <label for="ra">Identificação</label>
        </div>

        <div class="input-field">
          <input type="password" name="password" id="senha">
          <label for="senha">Senha</label>
        </div>

        <div class="left">
          <label class="form-group ">
            <input type="checkbox" name="rememberMe"/>
            <span>Lembrar meus dados</span>
          </label>
        </div>


        <div style="padding-top:40px;" class="">

          <label class="label-agree-term left">
            <a class="font-esqueci-senha" href="{{ url('/forgotPassword') }}"><h6>Esqueceu a senha?</h6></a>
          </label>

          <button class="waves-effect waves-light btn indigo lighten-2 right">Entrar</button>

        </div>

      </form>
    </div>
  </div>

@endsection
