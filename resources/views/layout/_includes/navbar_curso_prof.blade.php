<nav class="nav-extended nav-wrapper-color">
    <div class="nav-wrapper nav-wrapper-color">



      <a href="{{ route('site.index') }}" class="brand-logo"> <img src="{{asset('img/fotos-logo/logo-white.png')}}" alt="logo"> </a>

      <a href="#" data-target="slide-out" class="sidenav-trigger right" style="display:block">
        <img class="circle btn-sidenav" src="{{asset($user->foto_perfil)}}">
      </a>
    </div>

    <!-- Inicio tab navbar -->

    <div class="nav-content">
    <div class="row">
      <ul class="tabs tabs-transparent">
          <li class="tab col s3 m3 l3"><a class="active" href="#curso">curso</a></li>
          <li class="tab col s3 m3 l3"><a href="#atividades">Atividades</a></li>
          <li class="tab col s3 m3 l3"><a href="#alunos">Alunos
            @if($count_pendentes != 0)
          <span class="badge-prof">{{$count_pendentes}}</span></a></li>
            @endif

          <li class="tab col s3 m3 l3"><a href="#notas">Notas</a></li>
      </ul>
      </div>
    </div>

    <!-- Fim tab navbar -->

  </nav>

  <!-- Inicio sidenav -->

  <ul id="slide-out" class="sidenav">
    <li><div class="user-view">
      <div class="background"></div>
        <a href="{{ route('perfil.index') }}"><img class="circle" src="{{asset($user->foto_perfil)}}"></a>
        <a href="{{ route('perfil.index') }}"><span class="white-text name">@yield('perfil')</span></a>
        <a href="{{ route('perfil.index') }}"><span class="white-text email">@yield('email')</span></a>
      </div>
    </li>

    <li class="@yield('home-active')"><a href="{{ route('site.index') }}"><i class="material-icons">home</i>Home</a></li>
    <li class="@yield('perfil-active')"><a href="{{ route('perfil.index') }}"><i class="material-icons">person</i>Perfil</a></li>
    <li><div class="divider"></div></li>
    <li class="@yield('config-active')"><a href="#!"><i class="material-icons">settings</i>Configuração</a></li>
    <li><a href="{{ route('login.sair') }}"><i class="material-icons">exit_to_app</i>Sair</a></li>
  </ul>

  <!-- Fim sidenav -->
