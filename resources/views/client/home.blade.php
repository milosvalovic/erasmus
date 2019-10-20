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

    <link rel="manifest" href="<?php echo asset('fav/site.webmanifest')?>">

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate-css/animate.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/bootstrap.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/font-awesome/font-awesome.min.css') }}"/>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/client/app.css') }}"/>

    <script type="text/javascript" src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/bootstrap/bootstrap.min.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('vendor/jquery-jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/typed-js/typed.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/client/app.js') }}"></script>

    <title>Erasmus+</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}"><i class="ukf-logo"></i></a>
        <button class="navbar-toggler navbar-toggler-right" id="toogler" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Stáže</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}t">Pobyty</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Kontakt</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Účet</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item res">
                    <a class="navbar-brand" href="{{ url('/') }}"><i class="erasmus-logo"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<header class="masthead">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6"></div>
            <div class="col-lg-6 col-sm-12">
                <div class="search-modal">
                    <h1>Vyhľadávajte a <br>prihlaste sa na <span id="typed"></span>.</h1>
                    <div class="input-items">
                        <form action="{{ url('/') }}" method="POST" enctype="application/x-www-form-urlencoded">
                            <label for="krajina">KRAJINA</label>
                            <input type="text" name="country" id="krajina" value="" placeholder="Nemecko">
                            <label for="pobyt">TYP POBYTU</label>
                            <select name="stays" id="pobyt">
                                <option value="volvo">Stáž</option>
                            </select>
                            <br/>
                            <label for="univerzita">UNIVERZITA</label>
                            <input type="text" name="university" id="univerzita" value=""
                                   placeholder="Technische Universität">
                            <label for="hodnotenie">HODNOTENIE</label>
                            <select name="rating" id="hodnotenie">
                                <option value="5">5</option>
                            </select>
                            <br/>
                            <label for="od">OD</label>
                            <input type="text" name="from" id="od" value="" placeholder="01.01.2020">
                            <label for="do">DO</label>
                            <input type="text" name="to" id="do" value="" placeholder="02.02.2020">

                            <input type="submit" name="search" value="Hľadať">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<section class="page-section" id="current-opportunities">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="section-heading">Naše aktualné ponuky mobilít</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-sm-6 text-center">
                <img src="{{ asset('uploads/temp/a.jpg') }}" alt="Popis mobility a" title="Popis mobility a"
                     class="rounded">
                <br/>
                <a href="{{ url('/') }}" class="current-opportunitie-name">Europa - studijny pobyt</a>
                <p class="current-opportunitie-date">prihlasky do 13.10.2019</p>
                <p class="current-opportunitie-comments">36 kommentarov</p>
            </div>
            <div class="col-xl-3 col-sm-6 text-center">
                <img src="{{ asset('uploads/temp/b.jpg') }}" alt="Popis mobility b" title="Popis mobility b"
                     class="rounded">
                <br/>
                <a href="{{ url('/') }}" class="current-opportunitie-name">Tchaj-wan, Hongkong, Čína</a>
                <p class="current-opportunitie-date">prihlášky do 20.11.2019</p>
                <p class="current-opportunitie-comments">10 kommentarov</p>
            </div>
            <div class="col-xl-3 col-sm-6 text-center">
                <img src="{{ asset('uploads/temp/c.jpg') }}" alt="Popis mobility c" title="Popis mobility c"
                     class="rounded">
                <br/>
                <a href="{{ url('/') }}" class="current-opportunitie-name">Rusko - St. Petersburg</a>
                <p class="current-opportunitie-date">prihlášky do 13.11.2019</p>
                <p class="current-opportunitie-comments">23 kommentarov</p>
            </div>
            <div class="col-xl-3 col-sm-6 text-center">
                <img src="{{ asset('uploads/temp/d.jpg') }}" alt="Popis mobility d" title="Popis mobility d"
                     class="rounded">
                <br/>
                <a href="{{ url('/') }}" class="current-opportunitie-name">Malajsie</a>
                <p class="current-opportunitie-date">prihlášky do 12.12.2019</p>
                <p class="current-opportunitie-comments">45 kommentarov</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-sm-6 text-center">
                <img src="{{ asset('uploads/temp/e.gif') }}" alt="Popis mobility e" title="Popis mobility e"
                     class="rounded">
                <br/>
                <a href="{{ url('/') }}" class="current-opportunitie-name">Taiwan</a>
                <p class="current-opportunitie-date">prihlášky do 09.10.2019</p>
                <p class="current-opportunitie-comments">33 kommentarov</p>
            </div>
            <div class="col-xl-3 col-sm-6 text-center">
                <img src="{{ asset('uploads/temp/f.jpg') }}" alt="Popis mobility f" title="Popis mobility f"
                     class="rounded">
                <br/>
                <a href="{{ url('/') }}" class="current-opportunitie-name">USA</a>
                <p class="current-opportunitie-date">prihlášky do 05.11.2019</p>
                <p class="current-opportunitie-comments">13 kommentarov</p>
            </div>
            <div class="col-xl-3 col-sm-6 text-center">
                <img src="{{ asset('uploads/temp/g.jpg') }}" alt="Popis mobility g" title="Popis mobility g"
                     class="rounded">
                <br/>
                <a href="{{ url('/') }}" class="current-opportunitie-name">Latinská Amerika</a>
                <p class="current-opportunitie-date">prihlášky do 11.11.2019</p>
                <p class="current-opportunitie-comments">35 kommentarov</p>
            </div>
            <div class="col-xl-3 col-sm-6 text-center">
                <img src="{{ asset('uploads/temp/h.jpg') }}" alt="Popis mobility h" title="Popis mobility h"
                     class="rounded">
                <br/>
                <a href="{{ url('/') }}" class="current-opportunitie-name">Velká Británie</a>
                <p class="current-opportunitie-date">prihlášky do 12.18.2019</p>
                <p class="current-opportunitie-comments">5 kommentarov</p>
            </div>
        </div>
        <div class="row" id="more-opportunitie">
            <div class="container">
                <div class="cold-md-12 text-right">
                    <a href="{{ url('/') }}">Ďalšie pobyty ...</a>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>