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
                            <label for="country">@lang('app.search_modal_label_country')</label>
                            <input type="text" name="country" id="country" value="" placeholder="@lang('app.search_modal_label_country_example')">
                            <label for="stay">@lang('app.search_modal_label_type')</label>
                            <select name="stays" id="stay">
                                <option value="internship">Stáž</option>
                            </select>
                            <br/>
                            <label for="university">@lang('app.search_modal_label_university')</label>
                            <input type="text" name="university" id="university" value=""
                                   placeholder="@lang('app.search_modal_label_university_example')">
                            <label for="rating">@lang('app.search_modal_label_rating')</label>
                            <select name="rating" id="rating">
                                <option value="5">5</option>
                            </select>
                            <br/>
                            <label for="from">@lang('app.search_modal_label_from')</label>
                            <input type="text" name="from" id="from" value="" data-provide="datepicker" data-date-format="dd.mm.yyyy" placeholder="@lang('app.search_modal_label_from_example')">
                            <label for="to">@lang('app.search_modal_label_to')</label>
                            <input type="text" name="to" id="to" value="" data-provide="datepicker" data-date-format="dd.mm.yyyy" placeholder="@lang('app.search_modal_label_to_example')">
                            <label for="search"></label>
                            <input type="submit" name="search" id="search" value="@lang('app.search_modal_submit')">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>