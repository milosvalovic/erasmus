@if(count($getMobilityImages) > 0)
    <div class="row section-gallery">
        <div class="col-md-4">
            <h3>@lang('app.detail_photos_title')</h3>
        </div>
        <ul class="col-md-8 text-center">
            @foreach($getMobilityImages as $getMobilityImage)
                @if($loop->first)
                    <ul id="lightgallery" class="list-unstyled row">
                @endif

                @if(($loop->iteration % 4) == 0)
                    </ul>
                    <ul id="lightgallery" class="list-unstyled row">
                @endif
                        @if($loop->iteration >= $number_of_pictures)
                            @foreach($getMobilityImage->images as $image)
                                <li style="display: none;" class="col-xl-3 col-md-4" data-responsive="{{ asset($image->thumb_url) }} 375" data-src="{{ asset($image->url) }}">
                                    <a href="">
                                        <img class="img-responsive" src="{{ asset($image->thumb_url) }}">
                                    </a>
                                </li>
                            @endforeach
                        @else
                            @foreach($getMobilityImage->images as $image)
                                <li class="col-xl-3 col-md-4" data-responsive="{{ asset($image->thumb_url) }} 375" data-src="{{ asset($image->url) }}">
                                    <a href="">
                                        <img class="img-responsive" src="{{ asset($image->thumb_url) }}">
                                    </a>
                                </li>
                            @endforeach
                        @endif
                @if($loop->last)
                    </ul>
                @endif
            @endforeach
    </div>
@endif