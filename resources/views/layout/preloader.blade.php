<div class="preloader js-preloader flex-center">
    <div class="dots">
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
    </div>
</div>
<script type="text/javascript" src="{{ asset('vendor/preloadinator/jquery.preloadinator.js') }}"></script>
<script>
    $('.js-preloader').preloadinator({
        minTime: 1000
    });
</script>