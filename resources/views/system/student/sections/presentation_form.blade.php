<section class="resume-section p-3 p-lg-5">
    <div class="row my-auto">
        <div class="col-12">
            <h2 class="  text-center">@lang('app.profil_presentation_upload')</h2>
            <div class="mb-5 heading-border"></div>
        </div>
        <div class="row input-items">
            <div class="col-lg-12">
                <form action="{{ action('blog\BlogController@insertArticle') }}" method="POST" enctype="application/x-www-form-urlencoded" id="new-blog-post">
                    <div class="input-file-container">
                        <label for="file" class="input-file-trigger">@lang('app.profil_choose_presentation')</label>
                        <input type="file" class="input-file" id="file" name="file">
                    </div>
                    <p class="selected-file text-center"></p>
                    <div class="error text-danger">Some Errors related to something</div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="submit-button">
                        <input type="submit" name="upload" id="upload" value="@lang('app.profil_upload')">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>