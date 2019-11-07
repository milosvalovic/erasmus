<div class="container-fluid">
    <div class="row no-gutter account">
        <div class="d-none d-md-flex col-xl-7 bg-image">
            <div class="bg-shadow"></div>
        </div>
        <div class="col-lg-12 col-xl-5">
            <div class="login">
                <div class="container text-center">
                    <div class="row">
                        <div class="col-md-9 col-lg-8 text-left mx-auto">
                            <div class="content">
                                <h3>@lang('app.login_title')</h3>
                                <form action="{{ url('/') }}" method="POST" enctype="application/x-www-form-urlencoded">
                                    <label for="email">@lang('app.login_input_label_email')</label>
                                    <input type="email" name="email" id="email" value="" placeholder="@lang('app.right_email_format')">
                                    <br/>
                                    <label for="password">@lang('app.login_input_label_password')</label>
                                    <input type="password" name="password" id="password" value="" placeholder="********">
                                    <br/>
                                    <input type="submit" value="@lang('app.login_input_submit')">
                                </form>
                                <ul class="sub-nav">
                                    <li><a class="sub-nav-item" href="{{ url('/registracia') }}">@lang('app.new_account')</a></li>
                                    <li><a class="sub-nav-item" href="{{ url('/pomoc') }}">@lang('app.login_forget_password')</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>