<div class="modal fade reviews-modal" tabindex="-1" role="dialog" aria-labelledby="reviewsModal"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang('app.profil_review_upload')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="input-items">
                            <form action="{{ url('/') }}" method="POST" enctype="multipart/form-data">
                                <textarea name="review" id="review" cols="30" rows="10" placeholder="@lang('app.profil_review_placeholder')"></textarea>
                                <div class="input-images-container">
                                    <label for="images" class="input-images-trigger">@lang('app.profil_choose_images')</label>
                                    <input type="file" class="input-images" id="images" name="images" multiple="multiple">
                                </div>
                                <p class="selected-images"></p>
                                <input type="submit" name="send" id="send" value="@lang('app.profil_send')">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>