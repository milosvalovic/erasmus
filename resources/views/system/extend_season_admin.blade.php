@extends('system.index')

@section('content')
    <div class="admin-welcome-page">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Výzvy</h1>
            </div>
            <div class="admin-title-user">
                <p>
                    <a href="{{ action('system\ProfileController@my_profile')}}">{{ Auth::user()->first_name . ' '. Auth::user()->last_name }}</a>
                    <span> {{ Auth::user()->roles->name }} </span></p>
                <a href="{{ route('logout')}}" class="logout-admin-button">
                    <img src="{{ asset('img/icon_logout.png') }}" alt="" class="logout-admin-button">
                </a>
            </div>
        </div>

        <div class="admin-welcome-content">

            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <div class="user-table-wrapper">
                        <div class="user-table-title">
                            <h2>Multievidencia nových výzviev</h2>
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    <h5>{{session('error')}}</h5>
                                </div>
                            @endif
                        </div>
                        {{Form::open(['url'=>'/admin/season/extend'])}}
                        <button type="submit" class="btn btn-outline-primary" id="saveNewSeasons">Uložiť</button>
                        <table class="table admin-table" id="seasonTable">
                            <thead>
                            <tr>
                                <th scope="col">Začiatok registrácie</th>
                                <th scope="col">Koniec registrácie</th>
                                <th scope="col">Limit študentov</th>
                                <th scope="col">Limit registrácií</th>
                                <th scope="col">Univerzita</th>
                                <th scope="col" class="typ-season-head">Typ výzvy</th>
                                <th scope="col">Kat. výzvy</th>
                                <th scope="col">Dátum začiatku výzvy</th>
                                <th scope="col">Dátum konca výzvy</th>
                            </tr>
                            </thead>
                            <thead>
{{--                            @foreach($seasons as $season)--}}
                            <tr>
                                <th>
                                    <input type="text" data-provide="datepicker" data-date-format="dd.mm.yyyy" id="fromInput" placeholder="Začiatok výzvy" class="form-control admin-form-input" autocomplete="off">
                                </th>
                                <th>
                                    <input type="text" data-provide="datepicker" data-date-format="dd.mm.yyyy" placeholder="Koniec výzvy" name="to_reg" autocomplete="off" class="form-control admin-form-input" id="toInput">
                                </th>
                                <th>
                                    <input type="number" class="form-control admin-form-input" value="" id="studentLimitInput">
                                </th>
                                <th class="extend-limit-table-data">
                                    <input type="number" class="form-control admin-form-input" id="registrationLimitInput">
                                    {{--                                    <input type="checkbox" class="form-control admin-form-input" value="-1" id="registrationLimitCheckbox">Off--}}
                                </th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>
                                    <input type="text" data-provide="datepicker" data-date-format="dd.mm.yyyy"
                                           placeholder="Začiatok výzvy"
                                           class="  form-control admin-form-input"
                                           id="from_mobility" autocomplete="off">
                                </th>
                                <th>
                                    <input type="text" data-provide="datepicker" data-date-format="dd.mm.yyyy" placeholder="Koniec výzvy"
                                           class="form-control admin-form-input" id="to_mobility" autocomplete="off">
                                </th>
                            </tr>
{{--                                @endforeach--}}
                            </thead>
                            <tbody>
                            @foreach($seasons as $season)
                                <input type="hidden" name="mobility_ID[]" value="{{$season->mobility->ID}}">
                                <tr>
                                    <td>
                                        <label for="fromInputForm"></label>
                                        <input type="text" data-provide="datepicker" data-date-format="dd.mm.yyyy" placeholder="Začiatok výzvy"
                                               class="form-control admin-form-input registration-from" id="fromInputForm" name="date_start_reg[]"
                                               autocomplete="off">
                                    </td>
                                    <td>
                                        <label for="toInputForm"></label>
                                        <input type="text" data-provide="datepicker" data-date-format="dd.mm.yyyy" placeholder="Koniec výzvy"
                                               class="  form-control admin-form-input registration-to" id="toInputForm" name="date_end_reg[]"
                                               autocomplete="off">
                                    </td>
                                    <td>
                                        <label for="toInputForm"></label>
                                        <input type="number" class="form-control admin-form-input student-limit" name="count_students[]" id="student_limit">
                                    </td>
                                    <td class="extend-limit-table-data">
                                        <input type="number" class="form-control admin-form-input registration-limit" name="count_registrations[]">
                                        {{--                                        <input type="checkbox" class="form-control admin-form-input unlimited-checkbox" value="-1">Off--}}
                                    </td>
                                    <td>
                                        <div class="season-university">
                                            {{$season->university->name . ' ('. $season->country->name .')'}}
                                        </div>
                                    </td>
                                    <td>{{$season->mobility->mobility_type->name}}</td>
                                    <td>{{$season->mobility->category->name}}</td>
                                    <td>
                                        <label for="from_mobility"></label>
                                        <input type="text" data-provide="datepicker" data-date-format="dd.mm.yyyy" placeholder="Začiatok výzvy"
                                               class="form-control admin-form-input  from-mobility" id="from_mobility" name="date_start_mobility[]" autocomplete="off">
                                    </td>
                                    <td>
                                        <label for="to_mobility"></label>
                                        <input type="text" data-provide="datepicker" data-date-format="dd.mm.yyyy" placeholder="Koniec výzvy"
                                               class="form-control admin-form-input  to-mobility" id="to_mobility" name="date_end_mobility[]" autocomplete="off">
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div>

                        {{csrf_field()}}
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
        @include('system.include.footer')
    </div>

    <script>
        $("#fromInput").change(function () {
            $('.registration-from').val($("#fromInput").val());
        });
        $("#toInput").change(function () {
            $('.registration-to').val($("#toInput").val());
        });
        $("#studentLimitInput").keyup(function () {
            $('.student-limit').val($("#studentLimitInput").val());
        });
        $("#registrationLimitInput").keyup(function () {
            $('.registration-limit').val($("#registrationLimitInput").val());
        });
        $("#registrationLimitCheckbox").keyup(function () {
            $('').val($("#registrationLimitInput").val());
        });

        // $('#registrationLimitCheckbox').change(function () {
        //     if ($('#registrationLimitCheckbox').is(":checked")) {
        //         $('.unlimited-checkbox').attr("checked", true);
        //         // $('.registration-limit').hide();
        //         $('.registration-limit').val(5);
        //         // $('#registrationLimitInput').hide();
        //     } else {
        //         $('.unlimited-checkbox').attr("checked", false);
        //         $('.registration-limit').show();
        //         $('#registrationLimitInput').show();
        //         $('.registration-limit').val(null);
        //     }
        // });

        $("#from_mobility").change(function () {
            $('.from-mobility').val($("#from_mobility").val());
        });
        $("#to_mobility").change(function () {
            $('.to-mobility').val($("#to_mobility").val());
        });

    </script>
@endsection

