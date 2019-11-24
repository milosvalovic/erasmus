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
                                <form action="{{ route('register.post') }}" method="POST"
                                      enctype="application/x-www-form-urlencoded">
                                    <label for="firstname">@lang('app.register_input_label_firstname')</label>
                                    <input type="text" name="firstname" id="firstname" value="" required
                                           placeholder="@lang('app.register_input_firstname_example')">
                                    @if ($errors->any())
                                        @foreach ($errors->get('firstname') as $error)
                                            <div class="error text-danger">{{$error}}</div>
                                        @endforeach
                                    @endif
                                    <br/>
                                        <label for="lastname">@lang('app.register_input_label_lastname')</label>
                                        <input type="text" name="lastname" id="lastname" value="" required
                                               placeholder="@lang('app.register_input_lastname_example')">
                                    @if ($errors->any())
                                        @foreach ($errors->get('lastname') as $error)
                                            <div class="error text-danger">{{$error}}</div>
                                        @endforeach
                                    @endif
                                    <br/>
                                        <label for="email">@lang('app.register_input_label_email')</label>
                                        <input type="email" name="email" id="email" value="" required
                                               placeholder="@lang('app.right_email_format')">
                                    @if ($errors->any())
                                        @foreach ($errors->get('email') as $error)
                                            <div class="error text-danger">{{$error}}</div>
                                        @endforeach
                                    @endif
                                    <br/>
                                        <label for="password">@lang('app.register_input_label_password')</label>
                                        <input type="password" name="password" id="password" value="" required
                                               placeholder="********">
                                    @if ($errors->any())
                                        @foreach ($errors->get('password') as $error)
                                            <div class="error text-danger">{{$error}}</div>
                                        @endforeach
                                    @endif
                                    <br/>
                                        <label for="confirm-password">@lang('app.register_input_label_confirm_password')</label>
                                        <input type="password" name="password_confirmation" id="confirm-password" required
                                               value="" placeholder="********">
                                        <br/>
                                        <input type="submit" value="@lang('app.register_input_submit')">
                                        {{ csrf_field() }}
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