<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="UTF-8">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- SweetAlert -->
    <script type="text/javascript" src="{{URL::asset('vendor/sweetalert/sweetalert.all.js')}}"></script>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">

    <!-- favicon -->

    <link rel="android-chrome-192x192" type="image/png" sizes="192x192" href="{{asset('img/favicon/android-chrome-192x192.png')}}">
    <link rel="android-chrome-512x512" type="image/png" sizes="512x512" href="{{asset('img/favicon/android-chrome-512x512.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('img/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('img/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/favicon/favicon-16x16.png')}}">


    <meta charset="utf-8">
    <title>@yield('titulo')</title>
  </head>

  <body>
    <header>

      @yield('navbar')

    </header>
