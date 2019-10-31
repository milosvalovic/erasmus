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
    <link rel="stylesheet" type="text/css" href="{{ asset('css/blog/blog.css') }}"/>
    <title>Erasmus+ | Blog</title>
</head>
<body>
@include('layout.client.navigation')
<header class="masthead" style="background-image: url({{ asset('img/blog_background.jpg') }})">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Erasmus+ Blog</h1>
                    <span class="subheading">Všetky príbehy na jednom mieste.</span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-preview">
                <a href="{{ url('/') }}">
                    <h2 class="post-title">Prvý článok</h2>
                </a>
                <h3 class="post-subtitle">Názov miesta pobytu</h3>
                <p class="post-meta">Zverejnil user001, dňa 20. September 2019</p>
            </div>
            <hr>
            <div class="post-preview">
                <a href="{{ url('/') }}">
                    <h2 class="post-title">Druhý článok</h2>
                </a>
                <h3 class="post-subtitle">Názov miesta pobytu</h3>
                <p class="post-meta">Zverejnil user002, dňa 21. September 2019</p>
            </div>
            <hr>
            <div class="post-preview">
                <a href="{{ url('/') }}">
                    <h2 class="post-title">Tretí článok</h2>
                </a>
                <h3 class="post-subtitle">Názov miesta pobytu</h3>
                <p class="post-meta">Zverejnil user003, dňa 22. September 2019</p>
            </div>
            <hr>
            <div class="post-preview">
                <a href="{{ url('/') }}">
                    <h2 class="post-title">Štvrtý článok</h2>
                </a>
                <h3 class="post-subtitle">Názov miesta pobytu</h3>
                <p class="post-meta">Zverejnil user004, dňa 23. September 2019</p>
            </div>
            <hr>
            <div class="clearfix">
                <a class="btn btn-primary float-right" href="{{ url('/') }}">Staršie záznamy &rarr;</a>
            </div>
        </div>
    </div>
</div>
<hr>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <ul class="list-inline text-center">
                    <li class="list-inline-item">
                        <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
                </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<script type="text/javascript" src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/bootstrap/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/blog/blog.js') }}"></script>
</body>
</html>