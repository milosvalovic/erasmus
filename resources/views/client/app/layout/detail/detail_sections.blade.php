<div class="container">
    @include('client.app.layout.detail.sections.description')
    @include('client.app.layout.detail.sections.country')
    @include('client.app.layout.detail.sections.more_information')
    @include('client.app.layout.detail.sections.presentations')
    @include('client.app.layout.detail.sections.photos')
    @include('client.app.layout.detail.sections.reviews')
</div>
<script type="text/javascript" src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/bootstrap/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/client/app.js') }}"></script>