<!doctype html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('fav/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('fav/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('fav/favicon-16x16.png') }}">

    <link rel="manifest" href="{{ asset('fav/site.webmanifest') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate-css/animate.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/bootstrap.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/jquery-jvectormap/jqvmap.min.css') }}"/>

    <link rel="stylesheet" type="text/css" href="@yield('css')"/>

    <script type="text/javascript" src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/bootstrap/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/jquery-jvectormap/jquery.vmap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/jquery-jvectormap/jquery.vmap.world.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/typed-js/typed.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/client/app.js') }}"></script>

    <title>Erasmus+ | @yield('title')</title>
</head>
<body>