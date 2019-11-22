@foreach( $article as $header_data)
    <header class="masthead" style="background-image: url({{ asset($header_data->user_season->season->mobility->university->img_URL) }})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>{{$header_data->title}}</h1>
                        <h2 class="subheading">{{$header_data->place_name}}</h2>
                        @php $date = DateTime::createFromFormat("Y-m-d", $header_data->publish_date)@endphp
                        <span class="meta">@lang('app.blog_article_date_part_one') {{$header_data->user_season->user->first_name}} {{$header_data->user_season->user->last_name}}@lang('app.blog_article_date_part_two'){{$date->format("d")}}. {{$date->format("F")}} {{$date->format("Y")}}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endforeach