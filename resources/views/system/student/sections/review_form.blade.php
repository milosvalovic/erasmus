<section class="resume-section p-3 p-lg-5">
    <div class="row my-auto">
        <div class="col-12">
            <h2 class="  text-center">@lang('app.review_upload_title')</h2>
            <div class="mb-5 heading-border"></div>
        </div>
        <div class="row input-items">
            <div class="col-lg-12">
                {{ Form::open(array('url' => 'profil/recenzia/ulozit','files'=>'true')) }}
                    <label for="review">@lang('app.profil_review')</label>
                    <textarea name="review" id="review" cols="30" rows="10"></textarea>
                    @if ($errors->any())
                        @foreach ($errors->get('review') as $error)
                            <div class="error text-danger">{{$error}}</div>
                        @endforeach
                    @endif
                    <label for="rating">@lang('app.profil_rating')</label>
                    {{Form::select('rating', array("0 / 5", "1 / 5", "2 / 5", "3 / 5", "4 / 5", "5 / 5"))}}
                    @if ($errors->any())
                        @foreach ($errors->get('rating') as $error)
                            <div class="error text-danger">{{$error}}</div>
                        @endforeach
                    @endif
                    <div class="input-file-container">
                        <label for="file" class="input-file-trigger">@lang('app.profil_choose_images')</label>
                        <input type="file" class="input-file" id="file" name="files[]" multiple="multiple">
                    </div>
                    <p class="selected-file text-center"></p>
                    @if ($errors->any())
                        @foreach ($errors->get('files.*') as $sub_error)
                            @foreach ($sub_error as $error)
                                <div class="error text-danger">{{$error}}</div>
                                @break
                            @endforeach
                        @break
                    @endforeach
                    @endif
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="submit-button">
                        <input type="submit" name="send" id="send" value="@lang('app.profil_form_send')">
                    </div>
                    @foreach($inputs as $key => $input)
                        <input type="hidden" name="{{$key}}" value="{{$input}}" >
                    @endforeach
                {{Form::close()}}
            </div>
        </div>
    </div>
</section>