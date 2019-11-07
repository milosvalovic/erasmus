<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}"><i class="ukf-logo"></i></a>
        <button class="navbar-toggler navbar-toggler-right" id="toogler" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link @yield('stays')" href="{{ url('/') }}">@lang('app.nav_stays')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">@lang('app.nav_contact')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('blog')" href="{{ url('/') }}">@lang('app.nav_blog')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('faq')" href="{{ url('/') }}">@lang('app.nav_faq')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @yield('account')" href="{{ url('/') }}">@lang('app.nav_account')</a>
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