<section class="resume-section p-3 p-lg-5">
    <div class="row my-auto">
        <div class="col-12">
            <h2 class="  text-center">@lang('app.reset_title')</h2>
            <div class="mb-5 heading-border"></div>
        </div>
        <div class="row input-items">
            <div class="col-lg-12">
                {{ Form::open(array('url' => '/profil/heslo/zmenit','files'=>'true')) }}
                <label for="actual_password">@lang('app.profil_password_actual')</label>
                <input type="password" name="actual_password" id="actual_password" value="">
                @if ($errors->any())
                    @foreach ($errors->get('actual_password') as $error)
                        <div class="error text-danger">{{$error}}</div>
                    @endforeach
                @endif
                @if (session('error-actual'))
                    <div class="error text-danger">{{session('error-actual')}}</div>
                @endif
                <label for="password">@lang('app.profil_password_new')</label>
                <input type="password" name="password" id="password" value="">
                @if ($errors->any())
                    @foreach ($errors->get('password') as $error)
                        <div class="error text-danger">{{$error}}</div>
                    @endforeach
                @endif
                <label for="password_confirmation">@lang('app.profil_password_confirm')</label>
                <input type="password" name="password_confirmation" id="password_confirmation" value="">
                @if ($errors->any())
                    @foreach ($errors->get('password_confirmation') as $error)
                        <div class="error text-danger">{{$error}}</div>
                    @endforeach
                @endif
                @if (session('error-match'))
                    <div class="error text-danger">{{session('error-match')}}</div>
                @endif
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="submit-button">
                    <input type="submit" name="change" id="change" value="@lang('app.profil_password_change')">
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
</section>