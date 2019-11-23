<div class="row section-more">
    <div class="col-md-4">
        <h3>@lang('app.detail_more_title')</h3>
    </div>
    <div class="col-md-8">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4">
                    <a href="{{ url('/clanky'.'/'.$article_in_row) }}" target="_blank"><span class="fa-stack fa-4x">
                                    <i class="fa fa-circle fa-stack-2x background"></i>
                                    <i class="fa fa-book fa-stack-1x fa-inverse"></i>
                                  </span>@lang('app.detail_more_blog')</a>
                </div>
                <div class="col-md-4">
                    <a href="{{ url('/otazky') }}" target="_blank"><span class="fa-stack fa-4x">
                                    <i class="fa fa-circle fa-stack-2x background"></i>
                                    <i class="fa fa-question fa-stack-1x fa-inverse"></i>
                                  </span>@lang('app.detail_more_faq')</a>
                </div>
                <div class="col-md-4">
                    <a href="#"><span class="fa-stack fa-4x">
                                    <i class="fa fa-circle fa-stack-2x background"></i>
                                    <i class="fa fa-calendar fa-stack-1x fa-inverse"></i>
                                  </span>{{date("d.m.Y", strtotime($date->date_start_mobility))}} - {{date("d.m.Y", strtotime($date->date_end_mobility))}}</a>
                </div>
            </div>
        </div>
    </div>
</div>