<div class="page-section" id="opportunities">
    <div class="container">
        @foreach( $mobilities as $mobilita)
            @if(is_null($mobilita->mobility))
                @if ($loop->first)
                    <div class="row">
                        @endif
                        <div class="col-xl-3 col-sm-6 text-center">
                            <img src="{{ asset('uploads/mobilities/'.$mobilita['university']['img_url']) }}" alt="{{$mobilita["university"]["country"]["name"]}}" title="{{$mobilita["university"]["country"]["name"]}}"
                                 class="rounded">
                            <br/>
                            <a href="{{ url('/detail/'.$mobilita["ID"]) }}" class="opportunitie-name">{{$mobilita["university"]["country"]["name"]}}</a>
                            <span class="badge badge-secondary">{{$mobilita["category"]["name"]}}</span>
                            <p class="opportunitie-date">@lang('app.date_end') {{date("d.m.Y", strtotime($mobilita->date_start_reg))}}</p>
                            <p class="opportunitie-comments">@lang('app.reviews'){{$mobilita["review_count"]}}</p>
                        </div>
                        @if(($loop->iteration % 4) == 0)
                    </div>
                    <div class="row">
                        @endif
            @else
                @if ($loop->first)
                    <div class="row">
                        @endif
                        <div class="col-xl-3 col-sm-6 text-center">
                            <img src="{{ asset('uploads/mobilities/'.$mobilita->mobility->university->img_url) }}" alt="{{$mobilita->mobility->university->country->name}}" title="{{$mobilita->mobility->university->country->name}}"
                                 class="rounded">
                            <br/>
                            <a href="{{ url('/detail/'.'$mobilita->mobility->ID') }}" class="opportunitie-name">{{$mobilita->mobility->university->country->name}}</a>
                            <span class="badge badge-secondary">{{ $mobilita->mobility->category->name }}</span>
                            <p class="opportunitie-date">@lang('app.date_end') {{date("d.m.Y", strtotime($mobilita->date_start_reg))}}</p>
                            <p class="opportunitie-comments">@lang('app.reviews'){{count($mobilita->user_season)}}</p>
                        </div>
                        @if(($loop->iteration % 4) == 0)
                           </div>
                           <div class="row">
                         @endif
           @endif
        @endforeach
        <div class="row more-opportunitie">
            <div class="container">
                @if(is_a($mobilities, 'Illuminate\Pagination\Paginator'))
                    <div class="col-md-12">
                        {{$mobilities->links()}}
                    </div>
                @else
                    <div class="col-md-12 text-right">
                        <a href="{{ url('/mobility/'.$mobilita["mobility_types_ID"]).'/'.(4+count($mobilities)) }}">@lang('app.search_load_items')</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>