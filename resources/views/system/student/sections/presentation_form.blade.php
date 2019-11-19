<section class="resume-section p-3 p-lg-5">
    <div class="row my-auto">
        <div class="col-12">
            <h2 class="  text-center">@lang('app.presentation_upload_title')</h2>
            <div class="mb-5 heading-border"></div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row input-items">
            <div class="col-lg-12">
                {{ Form::open(array('url' => '/uploadfile','files'=>'true')) }}
                <div class="input-file-container">
                        <label for="file" class="input-file-trigger">@lang('app.presentation_choose')</label>
                        <input type="file" class="input-file" id="file" name="file">
                    </div>
                    <p class="selected-file text-center"></p>
                    <div class="error text-danger">Some Errors related to something</div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="submit-button">
                        <input type="submit" name="upload" id="upload" value="@lang('app.profil_upload')">
                    </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
</section>