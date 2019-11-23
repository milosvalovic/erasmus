@if(count($getMobilityReviews) > 0)
    <div class="row section-reviews">
        <div class="col-md-4">
            <h3>@lang('app.detail_reviews_title')</h3>
        </div>
        <div class="col-md-8">
            @foreach($getMobilityReviews as $getMobilityReview)
                <div class="row review">
                    <div class="col-lg-2 col-md-3 text-center">
                                <span class="fa-stack fa-3x">
                                    <i class="fa fa-circle fa-stack-2x background"></i>
                                    <i class="fa fa-user fa-stack-1x fa-inverse"></i>
                                </span>
                        <h4 class="user">{{ $getMobilityReview->user_season->user->first_name }}</h4>
                    </div>
                    <div class="col-lg-10 col-md-9">
                        <div class="rating">
                            @php $number_of_stars = 0 @endphp
                            @php $maximum_of_stars = 5 @endphp
                            @while($number_of_stars < $maximum_of_stars)
                                @php $number_of_stars++ @endphp
                                @if($number_of_stars <= $getMobilityReview->rating)
                                    <span class="fa fa-star checked"></span>
                                @else
                                    <span class="fa fa-star"></span>
                                @endif
                            @endwhile
                        </div>
                        <p>{{ $getMobilityReview->review }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
