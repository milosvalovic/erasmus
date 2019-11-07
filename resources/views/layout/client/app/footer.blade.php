<footer class="page-section" id="footer">
    <div class="container-fluid footer-background">
        <div class="row">
            <div class="col-xl-6 text-left">
                <ul class="social-navigation">
                    <li class="list-inline-item">
                        <a href="{{ url('/') }}">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-instagram fa-stack-1x fa-inverse social-nav-link"></i>
                </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="{{ url('/') }}">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-facebook fa-stack-1x fa-inverse social-nav-link"></i>
                </span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-xl-6 text-right">
                <ul class="footer-navigation">
                    <li><a class="footer-nav-link" href="{{ url('/') }}">@lang('app.nav_stays')</a></li>
                    <li><a class="footer-nav-link" href="{{ url('/') }}">@lang('app.nav_contact')</a></li>
                    <li><a class="footer-nav-link" href="{{ url('/') }}">@lang('app.nav_blog')</a></li>
                    <li><a class="footer-nav-link" href="{{ url('/') }}">@lang('app.nav_faq')</a></li>
                    <li><a class="footer-nav-link" href="{{ url('/') }}">@lang('app.nav_account')</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<script type="text/javascript" src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/bootstrap/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/jquery-jvectormap/jquery.vmap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/jquery-jvectormap/jquery.vmap.world.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/typed-js/typed.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/client/app.js') }}"></script>
</body>
</html>