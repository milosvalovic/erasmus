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
                                <h3>@lang('app.reset_password_title')</h3>
                                <form action="{{ route('password.request') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <input type="hidden" name="email" value="{{ $email }}">
                                    <p>{{ $email }}</p>
                                    <label for="password">@lang('app.reset_password_new')</label>
                                    <input type="password" name="password" id="password" value=""
                                           placeholder="********">
                                    <div class="error text-danger">Some Errors related to something</div>
                                    <br/>
                                    <label for="password">@lang('app.reset_password_confirm')</label>
                                    <input type="password" name="password_confirmation" id="password" value=""
                                           placeholder="********">
                                    <div class="error text-danger">Some Errors related to something</div>
                                    <br/>
                                    <input type="submit" value="@lang('app.reset_password_submit')"/>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>