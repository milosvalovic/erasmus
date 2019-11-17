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
                                <h3>@lang('app.register_title')</h3>
                                <form action="{{ url('/') }}" method="POST" enctype="application/x-www-form-urlencoded">
                                    <label for="firstname">@lang('app.register_input_label_firstname')</label>
                                    <input type="text" name="firstname" id="firstname" value="" placeholder="@lang('app.register_input_firstname_example')">
                                    <div class="error text-danger">Some Errors related to something</div>
                                    <br/>
                                    <label for="lastname">@lang('app.register_input_label_lastname')</label>
                                    <input type="text" name="lastname" id="lastname" value="" placeholder="@lang('app.register_input_lastname_example')">
                                    <div class="error text-danger">Some Errors related to something</div>
                                    <br/>
                                    <label for="email">@lang('app.register_input_label_email')</label>
                                    <input type="email" name="email" id="email" value="" placeholder="@lang('app.right_email_format')">
                                    <div class="error text-danger">Some Errors related to something</div>
                                    <br/>
                                    <label for="password">@lang('app.register_input_label_password')</label>
                                    <input type="password" name="password" id="password" value="" placeholder="********">
                                    <div class="error text-danger">Some Errors related to something</div>
                                    <br/>
                                    <label for="confirm-password">@lang('app.register_input_label_confirm_password')</label>
                                    <input type="password" name="confirm" id="confirm-password" value="" placeholder="********">
                                    <div class="error text-danger">Some Errors related to something</div>
                                    <br/>
                                    <input type="submit" value="@lang('app.register_input_submit')">
                                </form>
                                <ul class="sub-nav">
                                    <li><a class="sub-nav-item" href="{{ url('/prihlasovanie') }}">@lang('app.back_to_login')</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>