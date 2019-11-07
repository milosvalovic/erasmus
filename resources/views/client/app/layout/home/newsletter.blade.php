<div class="page-section" id="newsletter">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 newsletter-width text-center">
                <div class="newsletter-background">
                    <h2 class="section-heading">@lang('app.newsletter_title')</h2>
                    <form action="{{ url('/') }}" method="POST" enctype="application/x-www-form-urlencoded">
                        <input type="email" name="email" placeholder="@lang('app.right_email_format')">
                        <input type="submit" value="@lang('app.newsletter_submit')">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>