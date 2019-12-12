<div class="page-section" id="current-opportunities">
    <div class="container">
        @foreach ($mobilities as $key => $mobility)
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="section-heading">@lang('app.home_type_title'){{$key}}</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($mobility as $type)
                    <div class="col-xl-3 col-sm-6 text-center">
                        <a href="{{ url('/detail/'.$type["ID"]) }}"
                           class="current-opportunitie-name"><div class="img-effect"><img src="{{ asset($type["university"]["thumb_url"]) }}"
                             alt="{{$type["university"]["country"]["name"]}}"
                             title="{{$type["university"]["country"]["name"]}}"
                             class="rounded"></div>
                        <br/>
                        {{$type["university"]["country"]["name"]}}</a>
                        <span class="badge badge-secondary">{{$type["category"]["name"]}}</span>
                        <p class="current-opportunitie-date">@lang('app.date_end') {{ date("d.m.Y", strtotime($type["season"]["0"]["date_end_reg"]))}}</p>
                        <p class="current-opportunitie-comments">@lang('app.reviews'){{$type["review_count"]}}</p>
                    </div>
                @endforeach
            </div>
            <div class="row more-opportunitie">
                <div class="container">
                    <div class="cold-md-12 text-right">
                        <a href="{{ url('/typmobility?id='.$type["mobility_types_ID"]).'&pocet='.$mobility_in_row.'&skok='.$skip_value}}">@lang('pagination.show_more')</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>