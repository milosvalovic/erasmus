<div class="page-section" id="kontakt">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="section-heading">@lang('app.contact_title')</h2>
            </div>
        </div>
        @foreach ($contact as $group)
            <div class="row">
                @foreach ($group as $person)
                    <div class="col-lg-6 col-sm-12">
                        <h3 class="contact-title">{{$person['title_before_name'].' '.$person['firstname'].' '.$person['lastname'].' '.$person['title_after_name']}}</h3>
                        <ul>
                            <li><span class="item-name">Pracovisko:</span>&nbsp;{{ $person['workplace'] }}</li>
                            <li><span class="item-name">Telefón do zamestnania:</span>&nbsp;{{ $person['telephone_work'] }}</li>
                            <li><span class="item-name">Mobilný telefon:</span>&nbsp;{{ $person['phone'] }}</li>
                            <li><span class="item-name">Označenie kancelárie:</span>&nbsp;{{ $person['room'] }}</li>
                            <li><span class="item-name">E-mail:</span>&nbsp;{{ $person['email'] }}</li>
                        </ul>
                    </div>
                @endforeach
            </div>
        @endforeach
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <h3 class="contact-title hours">@lang('app.contact_hours_title')</h3>
                <ul>
                    @foreach ($office_hours as $hour)
                    <li><span class="item-name">{{ $hour->day }}&nbsp;</span>@if($hour->off == 0) @lang('app.off_day') @else{{date('g:i', strtotime($hour->from)).' -'.date('g:i', strtotime($hour->to))}}@endif</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-6 col-sm-12">
                <h3 class="contact-title address">@lang('app.contact_address_title')</h3>
                <ul>
                    @foreach ($address as $location)
                    <li><span class="item-name"></span>{{$location->street}}</li>
                    <li><span class="item-name"></span>{{$location->address}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>