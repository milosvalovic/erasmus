<div class="page-section" id="newsletter">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 newsletter-width text-center">
                <div class="newsletter-background">
                    <h2 class="section-heading">@lang('app.newsletter_question')</h2>
                    @if (Auth::check())
                        <a id="newsletter-form" href="{{ url('/') }}">@lang('app.newsletter_link_logged')</a>
                    @else
                        <a href="{{ url('/prihlasovanie') }}">@lang('app.newsletter_link')</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="newsletterDialog" tabindex="-1" role="dialog" aria-labelledby="newsletterDialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="newsletterDialog">@lang('app.detail_dialog_title')</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="newsletter-response-text"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">@lang('app.detail_dialog_button')</button>
            </div>
        </div>
    </div>
</div>