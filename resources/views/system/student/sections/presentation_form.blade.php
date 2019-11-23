<section class="resume-section p-3 p-lg-5">
    <div class="row my-auto">
        <div class="col-12">
            <h2 class="  text-center">@lang('app.presentation_upload_title')</h2>
            <div class="mb-5 heading-border"></div>
        </div>
        <div class="row input-items">
            <div class="col-lg-12">
                {{ Form::open(array('url' => 'profil/prezentacia/ulozit','files'=>'true')) }}
                    <div class="input-file-container">
                        <label for="file" class="input-file-trigger">@lang('app.presentation_choose')</label>
                        <input type="file" class="input-file" id="file" name="file">
                    </div>
                    <p class="selected-file text-center"></p>
                    @if ($errors->any())
                        @foreach ($errors->get('file') as $error)
                            <div class="error text-danger">{{$error}}</div>
                        @endforeach
                    @endif
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="submit-button">
                        <input type="submit" name="upload" id="upload" value="@lang('app.profil_form_upload')">
                    </div>
                    @foreach($inputs as $key => $input)
                        <input type="hidden" name="{{$key}}" value="{{$input}}" >
                    @endforeach
                {{Form::close()}}
            </div>
        </div>
    </div>
</section>