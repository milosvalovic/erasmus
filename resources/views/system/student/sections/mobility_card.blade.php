<section class="resume-section p-3 p-lg-5 " id="mobility-title">
    <div class="row my-auto">
        <div class="col-12">
            <h2 class="  text-center">@lang('app.profil_my_mobility_title')</h2>
            <div class="mb-5 heading-border"></div>
            @if(Session::has('success'))
                <div class="alert alert-success text-center" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-danger text-center" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif
        </div>
        <div class="col-md-6 col-sm-12 ">
            <div class="card mx-0 p-4 mb-5"
                 style="border-color: #17a2b8; box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.21);">

                <div class=" mobility-content mr-auto">
                    <a href="{{url('/detail')}}"><i class="fa fa fa-bandcamp mr-3 text-info"></i> Taiwan</a>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                        been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                        galley of type and scrambled it to make a type specimen book. It has survived not only five
                        centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                        It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                        passages, and more recently with desktop publishing software like Aldus PageMaker including
                        versions of Lorem Ipsum.</p>
                </div>
                <div class="mobility text-md-right">
                    <span class="text-primary">01.01.2019 - 02.02.2019</span>
                    <ul>
                        <li><a href="{{url('profil/prezentacia/nova')}}">@lang('app.profil_presentation_nav')</a></li>
                        <li><a href="{{url('profil/recenzia/nova')}}">@lang('app.profil_review_nav')</a></li>
                        <li><a href="{{url('profil/clanok/novy')}}">@lang('app.profil_blog_nav')</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 ">
            <div class="card mx-0 p-4 mb-5"
                 style="border-color: #17a2b8; box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.21);">
                <div class=" mobility-content mr-auto">
                    <a href="{{url('/detail')}}"><i class="fa fa fa-bandcamp mr-3 text-info"></i> USA</a>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                        been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                        galley of type and scrambled it to make a type specimen book. It has survived not only five
                        centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                        It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                        passages, and more recently with desktop publishing software like Aldus PageMaker including
                        versions of Lorem Ipsum.</p>
                </div>
                <div class="mobility text-md-right">
                    <span class="text-primary">01.01.2019 - 02.02.2019</span>
                    <ul>
                        <li><a href="{{url('profil/prezentacia/nova')}}">@lang('app.profil_presentation_nav')</a></li>
                        <li><a href="{{url('profil/recenzia/nova')}}">@lang('app.profil_review_nav')</a></li>
                        <li><a href="{{url('profil/clanok/novy')}}">@lang('app.profil_blog_nav')</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 ">
            <div class="card mx-0 p-4 mb-5"
                 style="border-color: #17a2b8; box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.21);">
                <div class=" mobility-content mr-auto">
                    <a href="{{url('/detail')}}"><i class="fa fa fa-bandcamp mr-3 text-info"></i> Latinská Amerika</a>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                        been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                        galley of type and scrambled it to make a type specimen book. It has survived not only five
                        centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                        It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                        passages, and more recently with desktop publishing software like Aldus PageMaker including
                        versions of Lorem Ipsum.</p>
                </div>
                <div class="mobility text-md-right">
                    <span class="text-primary">01.01.2019 - 02.02.2019</span>
                    <ul>
                        <li><a href="{{url('profil/prezentacia/nova')}}">@lang('app.profil_presentation_nav')</a></li>
                        <li><a href="{{url('profil/recenzia/nova')}}">@lang('app.profil_review_nav')</a></li>
                        <li><a href="{{url('profil/clanok/novy')}}">@lang('app.profil_blog_nav')</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 ">
            <div class="card mx-0 p-4 mb-5"
                 style="border-color: #17a2b8; box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.21);">
                <div class=" mobility-content mr-auto">
                    <a href="{{url('/detail')}}"><i class="fa fa fa-bandcamp mr-3 text-info"></i> Velká Británie</a>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                        been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                        galley of type and scrambled it to make a type specimen book. It has survived not only five
                        centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                        It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                        passages, and more recently with desktop publishing software like Aldus PageMaker including
                        versions of Lorem Ipsum.</p>
                </div>
                <div class="mobility text-md-right">
                    <span class="text-primary">01.01.2019 - 02.02.2019</span>
                    <ul>
                        <li><a href="{{url('profil/prezentacia/nova')}}">@lang('app.profil_presentation_nav')</a></li>
                        <li><a href="{{url('profil/recenzia/nova')}}">@lang('app.profil_review_nav')</a></li>
                        <li><a href="{{url('profil/clanok/novy')}}">@lang('app.profil_blog_nav')</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>