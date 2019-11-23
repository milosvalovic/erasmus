@if(count($mobilityPrezentations) > 0)
    <div class="row section-presentations">
        <div class="col-md-4">
            <h3>@lang('app.detail_presentations_title')</h3>
        </div>
        <div class="col-md-8">
            <table class="table table-responsive text-center">
                <thead class="thead-color">
                <tr>
                    <th class="text-left">@lang('app.detail_presentations_table_title_student')</th>
                    <th>@lang('app.detail_presentations_table_title_file')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($mobilityPrezentations as $mobilityPrezentation)
                    <tr>
                        <td class="text-left">{{$mobilityPrezentation->user_season->user->first_name}} {{$mobilityPrezentation->user_season->user->last_name}}</td>
                        <td><a href="{{ url('/'.$mobilityPrezentation->file_url) }}">@lang('app.detail_presentations_table_file_download')</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif