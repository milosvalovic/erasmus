<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="mainNav">
    <span class="navbar-brand js-scroll-trigger"><span class="d-block d-lg-none  mx-0 px-0"><img
                    src="{{asset('img/erasmus_logo_white-s.png')}}" alt="" class="img-fluid"></span>
        <span class="d-none d-lg-block">
          <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="{{asset('img/student.png')}}"
               alt="">
        </span>
    </span>
    <div>
        <h5 id="logged-user">Meno Priezvisko</h5>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="{{url('/mobility')}}">@lang('app.nav_current_mobilities')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="{{url('/odhlasenie')}}">@lang('app.nav_logout')</a>
            </li>
        </ul>
    </div>
</nav>