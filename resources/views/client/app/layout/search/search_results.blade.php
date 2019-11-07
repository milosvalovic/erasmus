<div class="page-section" id="opportunities">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ url('/') }}" method="POST" enctype="application/x-www-form-urlencoded" id="search">
                    <div class="country">
                        <label for="country">@lang('app.search_modal_label_country')</label>
                        <input type="text" name="country" id="country" value="" placeholder="">
                    </div>

                    <div class="type">
                        <label for="stay">@lang('app.search_modal_label_type')</label>
                        <select name="stays" id="stay">
                            <option value="internship">Stáž</option>
                        </select>
                    </div>
                    <div class="university">
                        <label for="univerzita">@lang('app.search_modal_label_university')</label>
                        <input type="text" name="university" id="univerzita" value="" placeholder="">
                    </div>
                    <div class="rating">
                        <label for="rating">@lang('app.search_modal_label_rating')</label>
                        <select name="rating" id="rating">
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="from">
                        <label for="from">@lang('app.search_modal_label_from')</label>
                        <input type="text" name="from" id="from" value="" placeholder="">
                    </div>
                    <div class="to">
                        <label for="to">@lang('app.search_modal_label_to')</label>
                        <input type="text" name="to" id="to" value="" placeholder="">
                    </div>
                    <div class="search">
                        <label for="search"></label>
                        <input type="submit" name="search" id="search" value="@lang('app.search_modal_submit')">
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-sm-6 text-center">
                <img src="{{ asset('uploads/temp/e.gif') }}" alt="Popis mobility e" title="Popis mobility e"
                     class="rounded">
                <br/>
                <a href="{{ url('/detail') }}" class="opportunitie-name">Taiwan</a>
                <p class="opportunitie-date">prihlášky do 09.10.2019</p>
                <p class="opportunitie-comments">33 @lang('app.reviews')</p>
            </div>
            <div class="col-xl-3 col-sm-6 text-center">
                <img src="{{ asset('uploads/temp/f.jpg') }}" alt="Popis mobility f" title="Popis mobility f"
                     class="rounded">
                <br/>
                <a href="{{ url('/detail') }}" class="opportunitie-name">USA</a>
                <p class="opportunitie-date">prihlášky do 05.11.2019</p>
                <p class="opportunitie-comments">13 @lang('app.reviews')</p>
            </div>
            <div class="col-xl-3 col-sm-6 text-center">
                <img src="{{ asset('uploads/temp/g.jpg') }}" alt="Popis mobility g" title="Popis mobility g"
                     class="rounded">
                <br/>
                <a href="{{ url('/detail') }}" class="opportunitie-name">Latinská Amerika</a>
                <p class="opportunitie-date">prihlášky do 11.11.2019</p>
                <p class="opportunitie-comments">35 @lang('app.reviews')</p>
            </div>
            <div class="col-xl-3 col-sm-6 text-center">
                <img src="{{ asset('uploads/temp/h.jpg') }}" alt="Popis mobility h" title="Popis mobility h"
                     class="rounded">
                <br/>
                <a href="{{ url('/detail') }}" class="opportunitie-name">Velká Británie</a>
                <p class="opportunitie-date">prihlášky do 12.18.2019</p>
                <p class="opportunitie-comments">5 @lang('app.reviews')</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-sm-6 text-center">
                <img src="{{ asset('uploads/temp/e.gif') }}" alt="Popis mobility e" title="Popis mobility e"
                     class="rounded">
                <br/>
                <a href="{{ url('/detail') }}" class="opportunitie-name">Taiwan</a>
                <p class="opportunitie-date">prihlášky do 09.10.2019</p>
                <p class="opportunitie-comments">33 @lang('app.reviews')</p>
            </div>
            <div class="col-xl-3 col-sm-6 text-center">
                <img src="{{ asset('uploads/temp/f.jpg') }}" alt="Popis mobility f" title="Popis mobility f"
                     class="rounded">
                <br/>
                <a href="{{ url('/detail') }}" class="opportunitie-name">USA</a>
                <p class="opportunitie-date">prihlášky do 05.11.2019</p>
                <p class="opportunitie-comments">13 @lang('app.reviews')</p>
            </div>
            <div class="col-xl-3 col-sm-6 text-center">
                <img src="{{ asset('uploads/temp/g.jpg') }}" alt="Popis mobility g" title="Popis mobility g"
                     class="rounded">
                <br/>
                <a href="{{ url('/detail') }}" class="opportunitie-name">Latinská Amerika</a>
                <p class="opportunitie-date">prihlášky do 11.11.2019</p>
                <p class="opportunitie-comments">35 @lang('app.reviews')</p>
            </div>
            <div class="col-xl-3 col-sm-6 text-center">
                <img src="{{ asset('uploads/temp/h.jpg') }}" alt="Popis mobility h" title="Popis mobility h"
                     class="rounded">
                <br/>
                <a href="{{ url('/detail') }}" class="opportunitie-name">Velká Británie</a>
                <p class="opportunitie-date">prihlášky do 12.18.2019</p>
                <p class="opportunitie-comments">5 @lang('app.reviews')</p>
            </div>
        </div>
        <div class="row more-opportunitie">
            <div class="container">
                <div class="cold-md-12 text-center">
                    {{--Sem este pojde laravel pagination--}}
                </div>
            </div>
        </div>
    </div>
</div>