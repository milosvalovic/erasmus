<div class="modal fade presentation-modal" tabindex="-1" role="dialog" aria-labelledby="presentationModal"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang('app.profil_presentation_upload')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="input-items">
                            <form action="{{ url('/') }}" method="POST" enctype="multipart/form-data">
                                <div class="input-presentation-container">
                                    <label for="presentation" class="input-presentation-trigger">@lang('app.profil_choose_presentation')</label>
                                    <input type="file" class="input-presentation" id="presentation" name="presentation">
                                </div>
                                <p class="selected-presentation"></p>
                                <div class="error text-danger">Some Errors related to something</div>
                                <input type="submit" name="upload" id="upload" value="@lang('app.profil_upload')">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>