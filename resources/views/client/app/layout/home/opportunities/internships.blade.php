<div class="row">
    <div class="col-lg-12">
        <h2 class="section-heading">@lang('app.home_internship_title')</h2>
    </div>
</div>
<div class="row">
    @foreach ($staz as $mobilita)
        <div class="col-xl-3 col-sm-6 text-center">
            <img src="{{ asset('uploads/mobilities/'.$mobilita["university"]["img_url"]) }}" alt="{{$mobilita["university"]["country"]["name"]}}" title="{{$mobilita["university"]["country"]["name"]}}"
                 class="rounded">
            <br/>
            <a href="{{ url('/detail/'.$mobilita["ID"]) }}" class="current-opportunitie-name">{{$mobilita["university"]["country"]["name"]}}</a>
            <span class="badge badge-secondary">{{$mobilita["category"]["name"]}}</span>
            <p class="current-opportunitie-date">@lang('app.date_end') {{ date("d.m.Y", strtotime($mobilita["season"]["0"]["date_end_reg"]))}}</p>
            <p class="current-opportunitie-comments">@lang('app.reviews'){{$mobilita["review_count"]}}</p>
        </div>
    @endforeach
</div>
<div class="row more-opportunitie">
    <div class="container">
        <div class="cold-md-12 text-right">
            <a href="{{ url('/mobility/'.$mobilita["mobility_types_ID"]).'/4' }}">@lang('app.home_more_button')</a>
        </div>
    </div>
</div>