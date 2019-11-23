<section class="resume-section p-3 p-lg-5 " id="mobility-title">
    <div class="row my-auto">
        <div class="col-12">
            <h2 class="  text-center">@lang('app.profil_my_signups_title')</h2>
            <div class="mb-5 heading-border"></div>
        </div>
    </div>
    <div class="col-md-12">
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
{{--            @foreach($reistrations as $reistration)--}}
                <tr>
                    <td>Portugal</td>
                    <td>INSTITUTO POLITECNICO DO PORTO</td>
                    <td>Vybavuje sa</td>
                    <td><a href="{{url('/detail')}}">Otvoriť</a></td>
                </tr>
            {{--@endforeach--}}
            </tbody>
        </table>
    </div>
</section>