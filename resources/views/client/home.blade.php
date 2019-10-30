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
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/jquery-jvectormap/jqvmap.min.css') }}"/>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/client/app.css') }}"/>

    <script type="text/javascript" src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/bootstrap/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/jquery-jvectormap/jquery.vmap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/jquery-jvectormap/jquery.vmap.world.js') }}"></script>
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
                    <a class="nav-link" href="{{ url('/') }}">FAQ</a>
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
                <h2 class="section-heading">Naše aktualné ponuky pobytov</h2>
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
        <div class="row more-opportunitie">
            <div class="container">
                <div class="cold-md-12 text-right">
                    <a href="{{ url('/') }}">Ďalšie pobyty ...</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h2 class="section-heading">Naše aktualné ponuky stážov</h2>
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
        <div class="row more-opportunitie">
            <div class="container">
                <div class="cold-md-12 text-right">
                    <a href="{{ url('/') }}">Ďalšie pobyty ...</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h2 class="section-heading">Naše aktualné ponuky prednáškových pobytov</h2>
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
        <div class="row more-opportunitie">
            <div class="container">
                <div class="cold-md-12 text-right">
                    <a href="{{ url('/') }}">Ďalšie pobyty ...</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h2 class="section-heading">Naše aktualné ponuky školení</h2>
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
        <div class="row more-opportunitie">
            <div class="container">
                <div class="cold-md-12 text-right">
                    <a href="{{ url('/') }}">Ďalšie pobyty ...</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="page-section" id="partner-universities">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="section-heading">Naše partnerské Univerzity</h2>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div id="vmap" style="width: 73vw; height: 400px; margin: 0 auto"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="page-section" id="newsletter">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 newsletter-width text-center">
                <div class="newsletter-background">
                    <h2 class="section-heading">CHCETE BYŤ INFORMOVANÝ AKO PRVÝ O podujatiach k MOBILITáM?</h2>
                    <form action="{{ url('/') }}" method="POST" enctype="application/x-www-form-urlencoded">
                        <input type="email" name="email" value="meno.priezvisko@student.ukf.sk">
                        <input type="submit" value="ÁNO">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="page-section" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="section-heading">Kontakt</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <h3 class="contact-title">Ing. Silvia Hrozenská, PhD.</h3>
                <ul>
                    <li><span class="item-name">Pracovisko:</span> Oddelenie pre medzinárodné vzťahy</li>
                    <li><span class="item-name">Telefón do zamestnania:</span> +421 37 6408 032</li>
                    <li><span class="item-name">Mobilný telefon:</span> +421 948 261622</li>
                    <li><span class="item-name">Označenie</span> kancelárie: THA217</li>
                    <li><span class="item-name">E-mail:</span> shrozenska@ukf.sk</li>
                </ul>
            </div>
            <div class="col-lg-6 col-sm-12">
                <h3 class="contact-title">Ing. Anita Garajová, PhD.</h3>
                <ul>
                    <li><span class="item-name">Pracovisko:</span> ddelenie pre medzinárodné vzťahy</li>
                    <li><span class="item-name">Telefón do zamestnania:</span> tel/fax: +421 37 6408 031</li>
                    <li><span class="item-name">Mobilný telefon:</span> +421 948 261622</li>
                    <li><span class="item-name">Označenie</span></li>
                    <li><span class="item-name">E-mail:</span> agarajova@ukf.sk</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <h3 class="contact-title">Ing. Silvia Hrozenská, PhD.</h3>
                <ul>
                    <li><span class="item-name">Pracovisko:</span> Oddelenie pre medzinárodné vzťahy</li>
                    <li><span class="item-name">Telefón do zamestnania:</span> +421 37 6408 032</li>
                    <li><span class="item-name">Mobilný telefon:</span> +421 948 261622</li>
                    <li><span class="item-name">Označenie</span> kancelárie: THA217</li>
                    <li><span class="item-name">E-mail:</span> shrozenska@ukf.sk</li>
                </ul>
            </div>
            <div class="col-lg-6 col-sm-12">
                <h3 class="contact-title">Ing. Anita Garajová, PhD.</h3>
                <ul>
                    <li><span class="item-name">Pracovisko:</span> ddelenie pre medzinárodné vzťahy</li>
                    <li><span class="item-name">Telefón do zamestnania:</span> tel/fax: +421 37 6408 031</li>
                    <li><span class="item-name">Mobilný telefon:</span> +421 948 261622</li>
                    <li><span class="item-name">Označenie</span></li>
                    <li><span class="item-name">E-mail:</span> agarajova@ukf.sk</li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <h3 class="contact-title hours">Úradné hodiny pre študentov</h3>
                <ul>
                    <li><span class="item-name">Po</span> 08:30 - 11:00</li>
                    <li><span class="item-name">Ut</span> bez úradných hodín</li>
                    <li><span class="item-name">St</span> 08:30 - 11:00</li>
                    <li><span class="item-name">Št</span> bez úradných hodín</li>
                    <li><span class="item-name">Pi</span> bez úradných hodín</li>
                </ul>
            </div>
            <div class="col-lg-6 col-sm-12">
                <h3 class="contact-title address">Oddelenie pre medzinárodné vzťahy</h3>
                <ul>
                    <li><span class="item-name"></span>Tr. A. Hlinku 1</li>
                    <li><span class="item-name"></span>949 74 Nitra</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<footer class="page-section" id="footer">
    <div class="container-fluid footer-background">
        <div class="row">
            <div class="col-xl-6 text-left">
                <ul class="social-navigation">
                    <li><a class="social-nav-link" href="{{ url('/') }}"><i class="fa fa-facebook"></i></a></li>
                    <li><a class="social-nav-link" href="{{ url('/') }}"><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
            <div class="col-xl-6 text-right">
                <ul class="footer-navigation">
                    <li><a class="footer-nav-link" href="{{ url('/') }}">Stáže</a></li>
                    <li><a class="footer-nav-link" href="{{ url('/') }}">Pobyty</a></li>
                    <li><a class="footer-nav-link" href="{{ url('/') }}">Kontakt</a></li>
                    <li><a class="footer-nav-link" href="{{ url('/') }}">Blog</a></li>
                    <li><a class="footer-nav-link" href="{{ url('/') }}">FAQ</a></li>
                    <li><a class="footer-nav-link" href="{{ url('/') }}">Účet</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
</body>
</html>