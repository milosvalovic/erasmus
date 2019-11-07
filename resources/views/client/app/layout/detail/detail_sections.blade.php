<div class="container">
    @include('client.app.layout.detail.sections.description')
    @include('client.app.layout.detail.sections.country')
    @include('client.app.layout.detail.sections.more_information')
    @include('client.app.layout.detail.sections.presentations')
    @include('client.app.layout.detail.sections.photos')
    @include('client.app.layout.detail.sections.reviews')
</div>
<script type="text/javascript" src="{{ asset('vendor/fancybox/jquery-1.4.3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/bootstrap/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/fancybox/jquery.fancybox-1.3.4.pack.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/fancybox/jquery.easing-1.3.pack.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/fancybox/jquery.mousewheel-3.0.4.pack.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/client/app.js') }}"></script>