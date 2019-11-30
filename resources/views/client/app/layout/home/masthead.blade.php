<header class="masthead">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6"></div>
            <div class="col-lg-6 col-sm-12">
                <div class="search-modal">
                    <h1>@lang('app.search_modal_title_part_one')<br>@lang('app.search_modal_title_part_two')<span id="typed"></span>.</h1>
                    <div class="input-items">
                        {{ Form::open(array('url' => '/hladat', "enctype"=>"application/x-www-form-urlencoded")) }}
                        <div class="item-group">
                            <label for="country">@lang('app.search_modal_label_country')</label>
                            <input type="text" name="country" id="country" class="typeahead tt-query" value="" placeholder="@lang('app.search_modal_label_country_example')">
                        </div>
                        <div class="item-group">
                            <label for="stay">@lang('app.search_modal_label_type')</label>
                            {{Form::select('stays', $type)}}
                        </div>
                        <div class="item-group">
                            <label for="university">@lang('app.search_modal_label_university')</label>
                            <input type="text" name="university" id="university" class="typeahead tt-query" value="" placeholder="@lang('app.search_modal_label_university_example')">
                        </div>
                        <div class="item-group">
                            <label for="rating">@lang('app.search_modal_label_rating')</label>
                            {{Form::select('rating', array("0 - 5", "1 - 5", "2 - 5", "3 - 5", "4 - 5", "5"))}}
                        </div>
                        <div class="item-group">
                            <label for="from">@lang('app.search_modal_label_grand')</label>
                            <input type="text" name="grand" id="grand" value="" placeholder="420€">
                        </div>
                        <div class="item-group">
                            <label for="from">@lang('app.search_modal_label_mobility_category')</label>
                            {{Form::select('category', $category)}}
                        </div>
                        <div class="item-group">
                            <label for="from">@lang('app.search_modal_label_from')</label>
                            <input type="text" name="from" id="from" value="" data-provide="datepicker" data-date-format="dd.mm.yyyy" readonly placeholder="@lang('app.search_modal_label_from_example')">
                        </div>
                        <div class="item-group">
                            <label for="to">@lang('app.search_modal_label_to')</label>
                            <input type="text" name="to" id="to" value="" data-provide="datepicker" data-date-format="dd.mm.yyyy" readonly placeholder="@lang('app.search_modal_label_to_example')">
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <label for="search"></label>
                        <input type="submit" name="search" id="search" value="@lang('app.search_modal_submit')">
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="#"><span></span></a>
</header>