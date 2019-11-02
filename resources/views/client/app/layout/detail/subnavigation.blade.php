<nav class="sub-navigation navbar fixed-bottom navbar-expand-lg navbar-light">
    <h2 class="navbar-brand">Názov</h2>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul>
            <li>@lang('app.detail_from')<span>01.01.2019</span></li>
            <li>@lang('app.detail_to')<span>02.02.2019</span></li>
        </ul>
    </div>
    <div>
        <form class="form-inline my-2 my-lg-0" action="{{ url('/') }}" method="POST"
              enctype="application/x-www-form-urlencoded" id="search">
            <input class="form-control mr-sm-2"
                   type="submit" value="@lang('app.detail_submit_button')">
        </form>
    </div>
</nav>