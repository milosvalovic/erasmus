<div class="page-section" id="opportunities">
    <div class="container">
        @foreach( $mobilities as $mobilita)
                @if ($loop->first)
                    <div class="row">
                @endif
                    <div class="col-xl-3 col-sm-6 text-center">
                        <a href="{{ url('/detail/'.$mobilita->mobility->ID) }}" class="opportunitie-name"><div class="img-effect">
                                <img src="{{ asset($mobilita->mobility->university->thumb_url) }}"
                                     alt="{{$mobilita->mobility->university->country->name}}" title="{{$mobilita->mobility->university->country->name}}" class="rounded">
                            </div>
                        {{$mobilita->mobility->university->country->name}}</a>
                        <span class="badge badge-secondary">{{ $mobilita->mobility->category->name }}</span>
                        <p class="opportunitie-date">@lang('app.date_end') {{date("d.m.Y", strtotime($mobilita->date_start_reg))}}</p>
                        <p class="opportunitie-comments">@lang('app.reviews'){{count($mobilita->user_season)}}</p>
                    </div>
                @if(($loop->iteration % 4) == 0)
                       </div>
                       <div class="row">
                 @endif
                   @if ($loop->last)
                       </div>
                   @endif
        @endforeach
        <div class="row more-opportunitie">
            <div class="container">
                @if(is_a($mobilities, 'Illuminate\Pagination\Paginator'))
                    <div class="col-md-12">
                        {{$mobilities->links()}}
                    </div>
                @else
                    <div class="col-md-12">
                        <ul class="pagination">
                            @if((app('request')->query('skok') == 0) || ((app('request')->query('skok')-$mobility_in_row) < 0))
                                @if(((app('request')->query('skok') == 0) || ((app('request')->query('skok')-$mobility_in_row) < 0)) && (((ceil($number_of_mobilities/$mobility_in_row))*$mobility_in_row)== app('request')->query('pocet')))
                                    <li></li>
                                @else
                                    <li class="disabled"><span>@lang('pagination.previous')</span></li>
                                @endif
                            @else
                                <li><a href="{{ url('/typmobility?id='.app('request')->query('id').'&pocet='.(app('request')->query('pocet')-$mobility_in_row).'&skok='.(app('request')->query('skok')-$mobility_in_row))}}">@lang('pagination.previous')</a></li>
                            @endif
                            @if(((ceil($number_of_mobilities/$mobility_in_row))*$mobility_in_row)== app('request')->query('pocet'))
                                @if(((app('request')->query('skok') == 0) || ((app('request')->query('skok')-$mobility_in_row) < 0)) && (((ceil($number_of_mobilities/$mobility_in_row))*$mobility_in_row)== app('request')->query('pocet')))
                                    <li></li>
                                @else
                                    <li class="disabled"><span>@lang('pagination.next')</span></li>
                                @endif
                            @else
                                <li><a href="{{ url('/typmobility?id='.app('request')->query('id').'&pocet='.(app('request')->query('pocet')+$mobility_in_row).'&skok='.(app('request')->query('skok')+$mobility_in_row))}}">@lang('pagination.next')</a></li>
                            @endif
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>