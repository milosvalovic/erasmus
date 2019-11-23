<div class="container">
    @include('client.app.layout.detail.sections.description', ['about' => $mobilityDetail->info])
    @include('client.app.layout.detail.sections.more_information',  ['date' => $mobilityDetail->season[0], 'article_in_row' => $article_in_row])
    @include('client.app.layout.detail.sections.presentations', ['mobilityPrezentations' => $mobilityPrezentations])
    @include('client.app.layout.detail.sections.photos', ['getMobilityImages' => $getMobilityImages, 'number_of_pictures' => $number_of_pictures])
    @include('client.app.layout.detail.sections.reviews', ['getMobilityReviews' => $getMobilityReviews])
</div>
<script type="text/javascript" src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/bootstrap/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/fancybox/jquery-1.4.3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/fancybox/jquery.fancybox-1.3.4.pack.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/fancybox/jquery.easing-1.3.pack.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/fancybox/jquery.mousewheel-3.0.4.pack.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/client/app/detail.js') }}"></script>