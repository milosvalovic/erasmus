<header class="masthead">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6"></div>
            <div class="col-lg-6 col-sm-12">
                <div class="search-modal">
                    <h1>@lang('app.search_modal_title_part_one')<br>@lang('app.search_modal_title_part_two')<span id="typed"></span>.</h1>
                    <div class="input-items">
                        <form action="{{ url('/') }}" method="POST" enctype="application/x-www-form-urlencoded">
                            <label for="krajina">@lang('app.search_modal_label_country')</label>
                            <input type="text" name="country" id="krajina" value="" placeholder="@lang('app.search_modal_label_country_example')">
                            <label for="pobyt">@lang('app.search_modal_label_type')</label>
                            <select name="stays" id="pobyt">
                                <option value="volvo">Stáž</option>
                            </select>
                            <br/>
                            <label for="univerzita">@lang('app.search_modal_label_university')</label>
                            <input type="text" name="university" id="univerzita" value=""
                                   placeholder="@lang('app.search_modal_label_university_example')">
                            <label for="hodnotenie">@lang('app.search_modal_label_rating')</label>
                            <select name="rating" id="hodnotenie">
                                <option value="5">5</option>
                            </select>
                            <br/>
                            <label for="od">@lang('app.search_modal_label_from')</label>
                            <input type="text" name="from" id="od" value="" placeholder="@lang('app.search_modal_label_from_example')">
                            <label for="do">@lang('app.search_modal_label_to')</label>
                            <input type="text" name="to" id="do" value="" placeholder="@lang('app.search_modal_label_to_example')">

                            <input type="submit" name="search" value="@lang('app.search_modal_submit')">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>