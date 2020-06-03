<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="jquery-3.5.1.min.js"></script>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">

    <script>
      $(document).ready(function(){
        $('.sidenav').sidenav();
      });
    </script>



    <meta charset="utf-8">
    <title>@yield('titulo')</title>
  </head>

  <body>
    <header>

      <nav>
        <div class="nav-wrapper nav-wrapper-color">
          <a href="#" class="brand-logo">Logo</a>
          <a href="#" data-target="mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">
            <li><a href="{{ route('site.login') }}">@yield('login')</a></li>
            <li><a href="{{ route('site.cadastro') }}">@yield('registrar')</a></li>
            <li><a href="{{ route('site.login') }}">@yield('perfil')</a></li>
            <li><a href="{{ route('login.sair') }}">@yield('sair')</a></li>
          </ul>
        </div>
      </nav>

      <ul class="sidenav" id="mobile">
        <li><a href="{{ route('site.login') }}">@yield('login')</a></li>
        <li><a href="{{ route('site.cadastro') }}">@yield('registrar')</a></li>
        <li><a href="{{ route('site.login') }}">@yield('perfil')</a></li>
        <li><a href="{{ route('login.sair') }}">@yield('sair')</a></li>
      </ul>

    </header>
