<div class="row" id="univerzity">
    <div class="col-xl-12 text-left">
        <a data-toggle="collapse" href="#partner_universities" role="button" aria-expanded="false" aria-controls="partner_universities">
            <h1 class="faq-heading">
                <i class="fa fa-university heading-icon"></i>&nbsp;{{ $title }}
            </h1>
        </a>
        <div class="collapse show" id="partner_universities">
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
    </div>
    </div>
</div>