<section class="resume-section p-3 p-lg-5 " id="mobility-title">
    <div class="row my-auto">
        <div class="col-12">
            <h2 class="  text-center">@lang('app.profil_my_signups_title')</h2>
            <div class="mb-5 heading-border"></div>
        </div>
    </div>
    <div class="col-md-12">
        @if(count($registrations) > 0)
        <table class="table table-responsive">
            <thead class="thead-color">
            <tr>
                <th>@lang('app.profil_signup_table_country')</th>
                <th>@lang('app.profil_signup_table_mobility')</th>
                <th>@lang('app.profil_signup_table_status')</th>
                <th>@lang('app.profil_signup_table_detail')</th>
            </tr>
            </thead>
            <tbody>
                @foreach($registrations as $registration)
                    <tr>
                        <td>{{ $registration->season->mobility->university->country->name }}</td>
                        <td>{{ $registration->season->mobility->university->name }}</td>
                        <td>{{ $registration->status_season[0]->season_status->name }}</td>
                        <td><a href="{{url('/detail'.'/'.$registration->season->mobility->ID)}}">Otvoriť</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <p class="text-center no-results">@lang('app.profil_no_signups')</p>
        @endif
    </div>
</section>