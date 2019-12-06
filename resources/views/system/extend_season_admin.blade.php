@extends('system.index')

@section('content')
    <div class="admin-welcome-page">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Používatelia</h1>
            </div>
            <div class="admin-title-user">
                <p>Eduard Gábel</p>
                <img src="{{ asset('img/cat.png') }}" alt="">
            </div>
        </div>

        <div class="admin-welcome-content">

            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <div class="user-table-wrapper">
                        <form method="post">
                        <div class="user-table-title">
                            <h2>Multievidencia nových sezón</h2>
                        </div>
                            <button type="submit" class="btn btn-outline-primary">Uložiť</button>
                        <table class="table admin-table" id="seasonTable">

                            <thead>

                            <tr>
                                <th scope="col">Začiatok registrácie</th>
                                <th scope="col">Koniec registrácie</th>
                                <th scope="col">Limit študentov</th>
                                <th scope="col">Limit registrácií</th>
                                <th scope="col">Univerzita</th>
                                <th scope="col">Typ mobility</th>
                                <th scope="col">Typ pobytu</th>
                                <th scope="col">Dátum začiatku pobytu</th>
                                <th scope="col">Dátum konca pobytu</th>
                            </tr>
                            </thead>
                            <thead>
                            <tr>
                                <th><input type="text" data-provide="datepicker" data-date-format="dd.mm.yyyy"
                                           placeholder="Začiatok mobility"
                                           class=" mb-2 mr-sm-2 form-control admin-form-input"
                                           id="fromInput" autocomplete="off"></th>
                                <th><input type="text" data-provide="datepicker" data-date-format="dd.mm.yyyy"
                                           placeholder="Koniec mobility"
                                           class=" mb-2 mr-sm-2 form-control admin-form-input"
                                           id="toInput"
                                           name="to_reg" autocomplete="off"></th>
                                <th><input type="number" class="form-control admin-form-input" id="studentLimitInput"></th>
                                <th><input type="number" class="form-control admin-form-input" id="registrationLimitInput">
                                    <input type="checkbox" class="form-control admin-form-input" value="-1" id="registrationLimitCheckbox">Neobmedzený </th>
                                <th>-</th>
                                <th>-</th>
                                <th>-</th>
                                <th><input type="text" data-provide="datepicker" data-date-format="dd.mm.yyyy"
                                           placeholder="Začiatok pobytu" class=" mb-2 mr-sm-2"
                                           id="from_mobility" autocomplete="off"
                                           class="form-control admin-form-input"></th>
                                <th><input type="text" data-provide="datepicker" data-date-format="dd.mm.yyyy"
                                           placeholder="Koniec pobytu" class=" mb-2 mr-sm-2"
                                           id="to_mobility" autocomplete="off" class="form-control admin-form-input">
                                </th>
                            </tr>
                            </thead>
                            @foreach($seasons as $season)
                                <input type="hidden" name="mobility_ids[]" value="{{$season->mobility->ID}}">
                                <tr>
                                <td><input type="text" data-provide="datepicker" data-date-format="dd.mm.yyyy"
                                           placeholder="Začiatok mobility "
                                           class=" mb-2 mr-sm-2 form-control admin-form-input registration-from"
                                           id="fromInputForm"
                                           name="date_start_reg[]" autocomplete="off"></td>
                                <td><input type="text" data-provide="datepicker" data-date-format="dd.mm.yyyy"
                                           placeholder="Koniec mobility"
                                           class=" mb-2 mr-sm-2 form-control admin-form-input registration-to"
                                           id="toInputForm"
                                           name="date_end_reg[]" autocomplete="off"></td>
                                <td><input type="number" class="form-control admin-form-input student-limit" name="student_limit[]" id="student_limit"></td>
                                <td><input type="number" class="form-control admin-form-input registration-limit" name="registration_limit[]" ><input type="checkbox"
                                                                                                      class="form-control admin-form-input unlimited-checkbox"
                                                                                                      value="-1">Neobmedzený
                                </td>
                                <td>{{$season->university->name . ' ('. $season->country->name .')'}}</td>
                                <td>{{$season->mobility->mobility_type->name}}</td>
                                <td>{{$season->mobility->category->name}}</td>
                                <td><input type="text" data-provide="datepicker" data-date-format="dd.mm.yyyy"
                                           placeholder="Začiatok pobytu" class="form-control admin-form-input mb-2 mr-sm-2 from-mobility"
                                           id="from_mobility"
                                           name="from_mobility[]" autocomplete="off"></td>
                                <td><input type="text" data-provide="datepicker" data-date-format="dd.mm.yyyy"
                                           placeholder="Koniec pobytu" class="form-control admin-form-input mb-2 mr-sm-2 to-mobility"
                                           id="to_mobility"
                                           name="to_mobility[]" autocomplete="off" >
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </form>
                    </div>
                </div>

                <div class="col-xs-12 col-md-3 admin-add-new-item-div">


                </div>

            </div>

        </div>
        @include('system.include.footer')
    </div>

    <script>
        $("#fromInput").change(function(){
            $('.registration-from').val($("#fromInput").val());
        });
        $("#toInput").change(function(){
            $('.registration-to').val($("#toInput").val());
        });
        $("#studentLimitInput").keyup(function(){
            $('.student-limit').val($("#studentLimitInput").val());
        });
        $("#registrationLimitInput").keyup(function(){
            $('.registration-limit').val($("#registrationLimitInput").val());
        });
        $("#registrationLimitCheckbox").keyup(function(){
            $('').val($("#registrationLimitInput").val());
        });

        $('#registrationLimitCheckbox').change(function() {
            if($('#registrationLimitCheckbox').is(":checked")) {
                $('.unlimited-checkbox').attr("checked", true);
                $('.registration-limit').hide();
                $('.registration-limit').val(-1);
                $('#registrationLimitInput').hide();
            } else {
                $('.unlimited-checkbox').attr("checked", false);
                $('.registration-limit').show();
                $('#registrationLimitInput').show();
                $('.registration-limit').val(null);
            };
        });
        $("#from_mobility").change(function(){
            $('.from-mobility').val($("#from_mobility").val());
        });
        $("#to_mobility").change(function(){
            $('.to-mobility').val($("#to_mobility").val());
        });

    </script>
@endsection

