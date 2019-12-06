@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Administrácia sezón</h1>
            </div>
            <div class="admin-title-user">
                <p>Eduard Gábel</p>
                <img src="{{ asset('img/cat.png') }}" alt="">
            </div>
        </div>

        <div class="admin-content">

            <div class="admin-season-table">
                <div class="admin-season-title">
                    <h2>Správca sezón</h2>
                    <form class="form-inline" id="sortForm">
                        <input type="hidden" id="page" name="page" value="0">
                        <label for="universities" class="mb-2 mr-sm-2">Vybrať:</label>
                        <select class="form-control mb-2 mr-sm-2-control" id="universities" name="university">
                            <option selected></option>
                            @foreach($universities as $university)
                                <option value="{{$university->ID}}">{{$university->name . ' ('. $university->country->name .')'}}</option>
                            @endforeach
                        </select>
                        <select class="form-control mb-2 mr-sm-2-control" id="category" name="category">
                            <option selected></option>
                            @foreach($categories as $category)
                                <option value="{{$category->ID}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        <select class="form-control mb-2 mr-sm-2-control" id="type" name="type">
                            <option selected></option>
                            @foreach($types as $type)
                                <option value="{{$type->ID}}">{{$type->name}}</option>
                            @endforeach
                        </select>

                        <input type="text" data-provide="datepicker" data-date-format="dd.mm.yyyy"
                               placeholder="Začiatok mobility" class="form-control mb-2 mr-sm-2" id="fromInput"
                               name="from" autocomplete="off">
                        <input type="text" data-provide="datepicker" data-date-format="dd.mm.yyyy"
                               placeholder="Koniec mobility" class="form-control mb-2 mr-sm-2" id="toInput"
                               name="to" autocomplete="off">
                        <label for="sort">Zoradiť poďla:</label>
                        <select class="form-control mb-2 mr-sm-2-control" name="sortBy" id="sort">
                            <option selected></option>
                            <option value="university">Univerzity</option>
                            <option value="date_start_reg">Začiatku registrácie</option>
                            <option value="date_end_reg">Konca registrácie</option>
                            <option value="date_start_mobility">Začiatku pobytu</option>
                            <option value="date_end_mobility">Konca pobytu</option>
                        </select>
                        <select class="form-control mb-2 mr-sm-2" name="sortType" id="sortType">
                            <option selected></option>
                            <option value="ASC">Vzostupne</option>
                            <option value="DESC">Zostupne</option>
                        </select>
                        <label for="active">Zobraziť len aktívne</label>
                        <input type="checkbox" class="form-check-input" id="active" name="active" value="1">
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-primary">Filtrovať</button>
                        <a href="{{route('seasons')}}">
                            <button type="button" id="reset" class="btn btn-warning">Vynulovať</button>
                        </a>

                    </form>
                    <a href="{{ action('system\SeasonController@newSeasonShow') }}">
                        <button type="button" class="btn btn-outline-primary">Pridať novú sezónu</button>
                    </a>

                </div>
                <form method="post" action="{{route('exntedSeasons')}}">
                    <li class="season-table-list"><input type="checkbox" class="form-check-input" id="select_all">Vybrať
                        všetky
                    </li>
                    <button type="submit" class="btn btn-outline-primary">Zaevidovať vybrané do ďalšej sezóny</button>
                    <table class="table admin-table" id="seasonTable">

                        <thead>

                        <tr>
                            <th scope="col">Vybrať</th>
                            <th scope="col">Začiatok registrácie</th>
                            <th scope="col">Koniec registrácie</th>
                            <th scope="col">Limit študentov</th>
                            <th scope="col">Limit registrácií</th>
                            <th scope="col">Univerzita</th>
                            <th scope="col">Typ mobility</th>
                            <th scope="col">Typ pobytu</th>
                            <th scope="col">Grant</th>
                            <th scope="col">Dátum začiatku pobytu</th>
                            <th scope="col">Dátum konca pobytu</th>
                            <th scope="col" class="user-form-actions">Akcie</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    {{csrf_field()}}
                </form>
            </div>
            <a id="loadMore">Načítať viac</a>
        </div>

        @include('system.include.footer')

    </div>

    <script>
        var page = 0;

        $(document).ready(function () {
            loadData();
        });

        $("#loadMore").click(function () {
            page++;
            $("#page").val(page);
            loadData();
        });


        function loadData() {
            $.ajax({
                url: '/admin/season/sort_season',
                type: "POST",
                dataType: 'json',
                data: $("#sortForm").serialize(),
                success: function (result) {
                    console.log(result);
                    setTable(result);
                },
                error: function (xhr, resp, text) {
                    console.log(xhr, resp, text);
                }


            });
        }

        function setTable(res) {
            console.log(res);
            //var result = JSON.parse(res);
            res.forEach(function (element) {
                $("#seasonTable tbody").append(
                    "<tr>"
                    + "<th>" + "<div class=\"form-check\">\n" +
                    "                                    <input type=\"checkbox\" class=\"form-check-input\" name=\"season_ids[]\" value=\"" + element.ID + "\">\n" +
                    "                                </div>" + "</th>"
                    + "<td>" + element.date_start_reg + "</td>"
                    + "<td>" + element.date_end_reg + "</td>"
                    + "<td>" + element.count_students + "</td>"
                    + "<td>" + element.count_registrations + "</td>"
                    + "<td>" + element.university.name + " (" + element.country.name + ")</td>"
                    + "<td>" + element.mobility.mobility_type.name + "</td>"
                    + "<td>" + element.mobility.category.name + "</td>"
                    + "<td>" + element.grant + "€</td>"
                    + "<td>" + element.date_start_mobility + "</td>"
                    + "<td>" + element.date_end_mobility + "</td>"
                    + "<th scope=\"row\">" +
                    "<a href=\"/admin/season/edit_season/" + element.ID + "\">" +
                    "<button type=\"button\" class=\"btn btn-outline-warning\">Upraviť</button>" +
                    "</a>" +
                    "<a href=\"/admin/season/delete_season/" + element.ID + "\">" +
                    "<button type=\"button\" class=\"btn btn-outline-danger\">Odstrániť</button>" +
                    "</a>" +
                    "</th>"
                    + "</tr>")
            });
            if (res.length < 15) {
                $("#loadMore").hide();
            } else {
                $("#loadMore").show();
            }
        }

        $("#loadMore").click(function () {
            loadData();
        });

        $("#sortForm").submit(function (event) {
            page = 0;
            $("#page").click(function () {
                $("input:text").val(page);
            });

            $("#seasonTable tbody").empty();
            event.preventDefault();
            loadData();

            return false;
        });


        $("#select_all").change(function () {  //"select all" change
            $(".form-check-input").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
        });

        //".checkbox" change
        $('.form-check-input').change(function () {
            //uncheck "select all", if one of the listed checkbox item is unchecked
            if (false == $(this).prop("checked")) { //if this item is unchecked
                $("#select_all").prop('checked', false); //change "select all" checked status to false
            }
            //check "select all" if all checkbox items are checked
            if ($('.checkbox:checked').length == $('.form-check-input').length) {
                $("#select_all").prop('checked', true);
            }
        });

    </script>
@endsection

