<div class="row">
    <div class="col-xl-12 text-left">
        <h1 class="faq-heading">{{ $title }}
        </h1>
        @if($title == "Partnerské Univerzity")
            <table class="table table-responsive">
                <thead class="thead-color">
                <tr>
                    <th>@lang('app.faq_partner_university_table_title_country')</th>
                    <th>@lang('app.faq_partner_university_table_title_university')</th>
                    <th>@lang('app.faq_partner_university_table_title_city')</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($content as $table_content)
                    <tr>
                        <td>{{$table_content->country->name}}</td>
                        <td>{{$table_content->name}}</td>
                        <td>{{$table_content->city}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            {!! $content !!}
        @endif
    </div>
</div>
