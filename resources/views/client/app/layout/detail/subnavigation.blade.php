<nav class="sub-navigation navbar fixed-bottom navbar-expand-lg navbar-light">
    <h2 class="navbar-brand">{{$title}}</h2>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul>
            <li>@lang('app.detail_from')<span>{{$season->date_start_mobility}}</span></li>
            <li>@lang('app.detail_to')<span>{{$season->date_end_mobility}}</span></li>
        </ul>
    </div>
    <div>
        {{ Form::open(array('url' => '/detail/mobilita/prihlasit', "id"=>"sign-up-mobility", "class"=>"form-inline my-2 my-lg-0", "enctype"=>"application/x-www-form-urlencoded")) }}
            @if (Auth::check())
            <input type="hidden" name="mobility_id" value="{{$mobility_id->ID}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input class="form-control mr-sm-2"
                   type="submit" value="@lang('app.detail_submit_button')">
            @else
                <input class="form-control mr-sm-2" disabled style="background: #0071838c;"
                       type="submit" value="@lang('app.detail_submit_button')">
            @endif
        {{Form::close()}}
    </div>
</nav>