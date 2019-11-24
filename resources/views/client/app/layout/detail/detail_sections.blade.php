<div class="container">
    @include('client.app.layout.detail.sections.description', ['about' => $mobilityDetail->info])
    @include('client.app.layout.detail.sections.more_information',  ['date' => $mobilityDetail->season[0], 'article_in_row' => $article_in_row])
    @include('client.app.layout.detail.sections.presentations', ['mobilityPrezentations' => $mobilityPrezentations])
    @include('client.app.layout.detail.sections.photos', ['getMobilityImages' => $getMobilityImages, 'number_of_pictures' => $number_of_pictures])
    @include('client.app.layout.detail.sections.reviews', ['getMobilityReviews' => $getMobilityReviews])
    @include('client.app.layout.detail.sections.modal')
</div>
<script type="text/javascript" src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/bootstrap/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/lightgallery/js/picturefill.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/lightgallery/js/lightgallery.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/lightgallery/js/lg-pager.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/lightgallery/js/lg-autoplay.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/lightgallery/js/lg-fullscreen.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/lightgallery/js/lg-zoom.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/lightgallery/js/lg-hash.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/lightgallery/js/lg-share.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/client/app/detail.js') }}"></script>