@if(count($getMobilityImages) > 0)
    <div class="row section-gallery">
        <div class="col-md-4">
            <h3>@lang('app.detail_photos_title')</h3>
        </div>
        <div class="col-md-8">
            @foreach($getMobilityImages as $getMobilityImage)
                @if($loop->first)
                    <div class="column">
                @endif

                @if(($loop->iteration % 4) == 0)
                    </div>
                    <div class="column">
                @endif
                        @if($loop->iteration >= $number_of_pictures)
                            <a style="display: none" rel="example_group" href="{{ url($getMobilityImage->url) }}" target="_blank"><img
                                        src="{{ asset($getMobilityImage->thumb_url) }}" style="width:100%"></a>
                        @else
                            <a rel="example_group" href="{{ url($getMobilityImage->url) }}" target="_blank"><img
                                        src="{{ asset($getMobilityImage->thumb_url) }}" style="width:100%"></a>
                        @endif
                @if($loop->last)
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endif