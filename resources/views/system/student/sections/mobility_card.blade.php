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
        @if(count($mobilities) > 0)
            @foreach($mobilities as $mobility)
                <div class="col-md-6 col-sm-12 ">
                    <div class="card mx-0 p-4 mb-5"
                         style="border-color: #17a2b8; box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.21);">
                        <div class=" mobility-content mr-auto">
                            <a href="{{url('/detail'.'/'.$mobility->season->mobility->ID)}}"><i class="fa fa fa-bandcamp mr-3 text-info"></i>{{$mobility->place_name}}</a>
                            <p>{{$mobility->season->mobility->info}}</p>
                        </div>
                        <div class="mobility text-md-right">
                            <span class="text-primary">{{date("d.m.Y", strtotime($mobility->season->date_start_mobility))}} - {{date("d.m.Y", strtotime($mobility->season->date_end_mobility))}}</span>
                            <ul>
                                <li><a href="{{url('profil/prezentacia/nova'.'/'.$mobility->status_season[0]->users_season_ID)}}">@lang('app.profil_presentation_nav')</a></li>
                                <li><a href="{{url('profil/recenzia/nova'.'/'.$mobility->status_season[0]->users_season_ID)}}">@lang('app.profil_review_nav')</a></li>
                                <li><a href="{{url('profil/clanok/novy'.'/'.$mobility->users_ID.'/'.$mobility->status_season[0]->users_season_ID)}}">@lang('app.profil_blog_nav')</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
            @else
                <div class="col-md-12 col-sm-12 ">
                    <p class="text-center no-results">@lang('app.profil_no_mobilities')</p>
                </div>
            @endif
        </div>
</section>