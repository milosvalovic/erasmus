<div class="page-section" id="opportunities">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                {{ Form::open(array('url' => '/hladat', "id"=>"search", "enctype"=>"application/x-www-form-urlencoded")) }}
                    <div class="country">
                        <label for="country">@lang('app.search_modal_label_country')</label>
                        <input type="text" name="country" id="country" class="typeahead tt-query" value="{{ isset($last_search_criteria['country'])?$last_search_criteria['country']:'' }}" placeholder="@lang('app.search_modal_label_country_example')">
                    </div>

                    <div class="type">
                        <label for="stay">@lang('app.search_modal_label_type')</label>
                        <select name="stays">
                            <option value="">@lang('app.search_modal_label_all')</option>
                            @foreach($type as $key => $input)
                                @if($key == $last_search_criteria['stays'])
                                    <option value="{{$key}}" selected="selected">{{$input}}</option>
                                @else
                                    <option value="{{$key}}">{{$input}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="university">
                        <label for="univerzita">@lang('app.search_modal_label_university')</label>
                        <input type="text" name="university" id="university" class="typeahead tt-query" value="{{ isset($last_search_criteria['university'])?$last_search_criteria['university']:'' }}" placeholder="@lang('app.search_modal_label_university_example')">
                    </div>
                    <div class="rating">
                        <label for="rating">@lang('app.search_modal_label_rating')</label>
                        {{Form::select('rating', array("0 - 5", "1 - 5", "2 - 5", "3 - 5", "4 - 5", "5"))}}
                    </div>
                    <div class="grand">
                        <label for="from">@lang('app.search_modal_label_grand')</label>
                        <input type="text" name="grand" id="grand" value="" placeholder="420€">
                    </div>
                    <div class="category">
                        <label for="from">@lang('app.search_modal_label_mobility_category')</label>
                        <select name="category">
                            <option value="">@lang('app.search_modal_label_all')</option>
                            @foreach($category as $key => $input)
                                @if($key == $last_search_criteria['stays'])
                                    <option value="{{$key}}" selected="selected">{{$input}}</option>
                                @else
                                    <option value="{{$key}}">{{$input}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="from">
                        <label for="from">@lang('app.search_modal_label_from')</label>
                        <input type="text" name="from" id="from" value="{{ isset($last_search_criteria['from'])?$last_search_criteria['from']:'' }}" data-provide="datepicker"
                               data-date-format="dd.mm.yyyy" readonly placeholder="@lang('app.search_modal_label_from_example')">
                    </div>
                    <div class="to">
                        <label for="to">@lang('app.search_modal_label_to')</label>
                        <input type="text" name="to" id="to" value="{{ isset($last_search_criteria['to'])?$last_search_criteria['to']:'' }}" data-provide="datepicker"
                               data-date-format="dd.mm.yyyy" readonly placeholder="@lang('app.search_modal_label_to_example')">
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <br>
                    <div class="search">
                        <label for="search"></label>
                        <input type="submit" name="search" id="search" value="@lang('app.search_modal_submit')">
                    </div>
                {{Form::close()}}
            </div>
        </div>
        @if ($size == 0)
            <div class="row">
                <div class="col-xl-12 text-center">
                    <h2 class="no-results">@lang('app.search_no_match')</h2>
                </div>
            </div>
        @elseif ($size == 1)
            <div class="row" id="number-of-items">
                @foreach (array_shift($mobilities) as $group)
                    <div class="col-xl-3 col-sm-6 text-center">
                        <a href="{{ url('/detail/'.$group["ID"]) }}"
                           class="opportunitie-name"><div class="img-effect"><img src="{{ asset($group["university"]["thumb_url"]) }}"
                             alt="{{$group["university"]["country"]["name"]}}"
                             title="{{$group["university"]["country"]["name"]}}"
                              class="rounded"></div>
                        {{$group["university"]["country"]["name"]}}</a>
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
                        <a href="{{ url('/detail/'.$mobilita["ID"]) }}"
                           class="opportunitie-name"><div class="img-effect"><img src="{{ asset($mobilita["university"]["thumb_url"]) }}"
                             alt="{{$mobilita["university"]["country"]["name"]}}"
                             title="{{$mobilita["university"]["country"]["name"]}}"
                             class="rounded"></div>
                        {{$mobilita["university"]["country"]["name"]}}</a>
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
                    @if($size != 0)
                        <a id="load" href="#">@lang('pagination.show_more')</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>