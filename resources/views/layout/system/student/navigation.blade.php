<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="mainNav">
    <span class="navbar-brand js-scroll-trigger"><span class="d-block d-lg-none  mx-0 px-0"><img
                    src="{{asset('img/erasmus_logo_white-s.png')}}" alt="" class="img-fluid"></span>
        <span class="d-none d-lg-block">
          <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="{{asset('img/student.png')}}"
               alt="">
        </span>
    </span>
    <div id="user-name">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a  class="nav-link dropdown-toggle" href="#" id="logged-user" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    @if (Auth::check())
                    {{ Auth::user()->first_name.' '.Auth::user()->last_name }}
                    @endif
                </a>
                <div class="dropdown-menu user" aria-labelledby="logged-user" id="user">
                    <a class="dropdown-item" href="{{ url('/odhlasenie') }}">@lang('app.nav_logout')</a>
                </div>
            </li>
        </ul>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger"
                   href="{{url('/profil/mobility')}}">@lang('app.nav_my_mobilities')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="{{url('/profil/prihlasky')}}">@lang('app.nav_sign_ups')</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    @lang('app.nav_home')
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ url('/') }}">@lang('app.nav_main_screen')</a>
                    <a class="dropdown-item" href="{{ url('/mobility') }}">@lang('app.nav_mobilities')</a>
                    <a class="dropdown-item" href="{{ url('/kontakt') }}">@lang('app.nav_contact')</a>
                    <a class="dropdown-item" href="{{ url('/clanky').'/'}}@yield('article_in_row')">@lang('app.nav_blog')</a>
                    <a class="dropdown-item" href="{{ url('/otazky') }}">@lang('app.nav_faq')</a>
                </div>
            </li>
        </ul>
    </div>
</nav>