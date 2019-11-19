<section class="resume-section p-3 p-lg-5">
    <div class="row my-auto">
        <div class="col-12">
            <h2 class="  text-center">@lang('app.review_upload_title')</h2>
            <div class="mb-5 heading-border"></div>
        </div>
        <div class="row input-items">
            <div class="col-lg-12">
                {{ Form::open(array('url' => '/uploadfile','files'=>'true')) }}
                    <label for="review">@lang('app.profil_review')</label>
                    <textarea name="review" id="review" cols="30" rows="10"></textarea>
                    <label for="rating">@lang('app.profil_rating')</label>
                    {{Form::select('rating', array("0 / 5", "1 / 5", "2 / 5", "3 / 5", "4 / 5", "5 / 5"))}}
                    <div class="error text-danger">Some Errors related to something</div>
                    <div class="input-file-container">
                        <label for="file" class="input-file-trigger">@lang('app.profil_choose_images')</label>
                        <input type="file" class="input-file" id="file" name="files[]" multiple="multiple">
                    </div>
                    <p class="selected-file text-center"></p>
                    <div class="error text-danger">Some Errors related to something</div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="submit-button">
                        <input type="submit" name="send" id="send" value="@lang('app.profil_send')">
                    </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
</section>