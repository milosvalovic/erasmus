<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            @foreach( $articles as $article)
            <div class="post-preview">
                <a href="{{ url('/clanok'.'/'.$article->ID) }}">
                    <h2 class="post-title">{{$article->title}}</h2>
                </a>
                <h3 class="post-subtitle">{{$article->place_name}}</h3>
                @php $date = DateTime::createFromFormat("Y-m-d", $article->publish_date)@endphp
                <p class="post-meta">@lang('app.blog_article_date_part_one') {{$article->user_season->user->first_name}} {{$article->user_season->user->last_name}}@lang('app.blog_article_date_part_two'){{$date->format("d")}}. {{$date->format("F")}} {{$date->format("Y")}}</p>
            </div>
            <hr>
            @endforeach
            <div class="clearfix">
                <a class="btn btn-primary float-right" href="{{ url('/clanky').'/'.($in_row+count($articles)) }}">@lang('pagination.older_posts')</a>
            </div>
        </div>
    </div>
</div>