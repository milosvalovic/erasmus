<div class="page-section" id="opportunities">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ action('client\SearchController@search').'#search' }}" method="POST" enctype="application/x-www-form-urlencoded" id="search">
                    <div class="country">
                        <label for="country">@lang('app.search_modal_label_country')</label>
                        <input type="text" name="country" id="country" value="{{ isset($last_search_criteria['country'])?$last_search_criteria['country']:'' }}" placeholder="">
                    </div>

                    <div class="type">
                        <label for="stay">@lang('app.search_modal_label_type')</label>
                        {{Form::select('stays', $type)}}
                    </div>
                    <div class="university">
                        <label for="univerzita">@lang('app.search_modal_label_university')</label>
                        <input type="text" name="university" id="univerzita" value="{{ isset($last_search_criteria['university'])?$last_search_criteria['university']:'' }}" placeholder="">
                    </div>
                    <div class="rating">
                        <label for="rating">@lang('app.search_modal_label_rating')</label>
                        {{Form::select('rating', array("0 - 5", "1 - 5", "2 - 5", "3 - 5", "4 - 5", "5"))}}
                    </div>
                    <div class="from">
                        <label for="from">@lang('app.search_modal_label_from')</label>
                        <input type="text" name="from" id="from" value="{{ isset($last_search_criteria['from'])?$last_search_criteria['from']:'' }}" data-provide="datepicker"
                               data-date-format="dd.mm.yyyy" readonly placeholder="">
                    </div>
                    <div class="to">
                        <label for="to">@lang('app.search_modal_label_to')</label>
                        <input type="text" name="to" id="to" value="{{ isset($last_search_criteria['to'])?$last_search_criteria['to']:'' }}" data-provide="datepicker"
                               data-date-format="dd.mm.yyyy" readonly placeholder="">
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="search">
                        <label for="search"></label>
                        <input type="submit" name="search" id="search" value="@lang('app.search_modal_submit')">
                    </div>
                </form>
            </div>
        </div>
        @if ($size == 0)
            <div class="row">
                <div class="col-xl-12 text-center">
                    <h2 class="no-match">@lang('app.no_match')</h2>
                </div>
            </div>
        @elseif ($size == 1)
            <div class="row" id="number-of-items">
                @foreach (array_shift($mobilities) as $group)
                    <div class="col-xl-3 col-sm-6 text-center">
                        <img src="{{ asset('uploads/mobilities/'.$group["university"]["img_url"]) }}"
                             alt="{{$group["university"]["country"]["name"]}}"
                             title="{{$group["university"]["country"]["name"]}}"
                             class="rounded">
                        <br/>
                        <a href="{{ url('/detail/'.$group["ID"]) }}"
                           class="opportunitie-name">{{$group["university"]["country"]["name"]}}</a>
                        <span class="badge badge-secondary">{{$group["category"]["name"]}}</span>
                        <p class="opportunitie-date">@lang('app.date_end') {{ date("d.m.Y", strtotime($group["season"]["0"]["date_end_reg"]))}}</p>
                        <p class="opportunitie-comments">@lang('app.reviews'){{$group["review_count"]}}</p>
                    </div>
                @endforeach
            </div>
        @else
            @foreach ($mobilities as $group)
            <div class="row" id="number-of-items">
                @foreach ($group as $mobilita)
                    <div class="col-xl-3 col-sm-6 text-center">
                        <img src="{{ asset('uploads/mobilities/'.$mobilita["university"]["img_url"]) }}"
                             alt="{{$mobilita["university"]["country"]["name"]}}"
                             title="{{$mobilita["university"]["country"]["name"]}}"
                             class="rounded">
                        <br/>
                        <a href="{{ url('/detail/'.$mobilita["ID"]) }}"
                           class="opportunitie-name">{{$mobilita["university"]["country"]["name"]}}</a>
                        <span class="badge badge-secondary">{{$mobilita["category"]["name"]}}</span>
                        <p class="opportunitie-date">@lang('app.date_end') {{ date("d.m.Y", strtotime($mobilita["season"]["0"]["date_end_reg"]))}}</p>
                        <p class="opportunitie-comments">@lang('app.reviews'){{$mobilita["review_count"]}}</p>
                    </div>
                @endforeach
            </div>
            @endforeach
        @endif
        <div class="row more-opportunitie">
            <div class="container">
                <div class="cold-md-12 text-right">
                    <a id="load" href="#">Načítaj ďalšie</a>
                </div>
            </div>
        </div>
    </div>
</div>