@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Administrácia sezón</h1>
            </div>
            <div class="admin-title-user">
                <p>{{Auth::user()->roles->name . ' | '.Auth::user()->first_name . ' '. Auth::user()->last_name }}</p>
            </div>
        </div>

        <div class="admin-content">

            <div class="admin-season-table">
                <div class="admin-season-title">
                    <h1>Správovanie sezón</h1>
                    <a href="{{ action('system\SeasonController@newSeasonShow') }}">
                        <button type="button" class="btn btn-outline-primary wider-button">Pridať novú sezónu</button>
                    </a>
                </div>
                <div class="admin-season-title">
                    <form class="form-inline" id="sortForm">
                        <div class="season-filter-main">
                            <input type="hidden" id="page" name="page" value="0">
                            <h3 class="">Filtrovať</h3>
                            <div class="season-filter-section-1">
                                <select class="form-control mr-sm-2-control season-selections" id="category"
                                        name="category">
                                    <option disabled selected>Podľa kategórie</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->ID}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <select class="form-control mr-sm-2-control season-selections" id="type" name="type">
                                    <option disabled selected>Podľa typu</option>
                                    @foreach($types as $type)
                                        <option value="{{$type->ID}}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="season-filter-section-university">
                                <select class="form-control mr-sm-2-control" id="universities" name="university">
                                    <option disabled selected>Podľa univerzity</option>
                                    @foreach($universities as $university)
                                        <option value="{{$university->ID}}">{{$university->name . ' ('. $university->country->name .')'}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="season-filter-section-2">
                                <input type="text" data-provide="datepicker" data-date-format="dd.mm.yyyy"
                                       placeholder="Začiatok mobility" class="form-control season-selections"
                                       id="fromInput"
                                       name="from" autocomplete="off">
                                <input type="text" data-provide="datepicker" data-date-format="dd.mm.yyyy"
                                       placeholder="Koniec mobility" class="form-control season-selections" id="toInput"
                                       name="to" autocomplete="off">
                            </div>
                            <div class="season-filter-section-3">
                                <h3>Zotriediť</h3>
                                <div class="season-filter-section-3-content">
                                    <select class="form-control season-selections" name="sortBy" id="sort">
                                        <option disabled selected value="default">Vyberte možnosť</option>
                                        <option value="university">Univerzity</option>
                                        <option value="date_start_reg">Začiatku registrácie</option>
                                        <option value="date_end_reg">Konca registrácie</option>
                                        <option value="date_start_mobility">Začiatku pobytu</option>
                                        <option value="date_end_mobility">Konca pobytu</option>
                                    </select>

                                    <select class="form-control season-selections" name="sortType" id="sortType">
                                        <option disabled selected>Vybrať triedenie</option>
                                        <option value="ASC">Vzostupne</option>
                                        <option value="DESC">Zostupne</option>
                                    </select>
                                </div>
                            </div>
                            <div class="season-filter-section-4">
                                <div class="season-filter-section-4-content-1">
                                    <div class="column-1">
                                        <div class="row-1">
                                            <label>Zobraziť len aktívne</label>
                                            <input type="checkbox" class="form-check-input sort-filter-checkbox"
                                                   id="active" name="active"
                                                   value="1" checked>
                                        </div>
                                        @if(Auth::user()->roles_ID == 3)
                                            <div class="row-1">
                                                <label>Zobraziť aj vymazané</label>
                                                <input type="checkbox" class="form-check-input sort-filter-checkbox"
                                                       id="sortSeasonDeleted" name="deleted"
                                                       value="1">
                                            </div>

                                            <div class="row-1">
                                                <label>Zobraziť len vymazané</label>
                                                <input type="checkbox" class="form-check-input sort-filter-checkbox"
                                                       id="sortSeasonOnlyDeleted" name="only_deleted"
                                                       value="1">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="column-2">
                                        <button type="button" id="reset"
                                                class="btn btn-outline-secondary wider-button">Vynulovať
                                        </button>
                                        <button type="submit" class="btn btn-outline-primary wider-button">Filtrovať
                                        </button>
                                    </div>


                                </div>
                                {{csrf_field()}}
                            </div>
                        </div>
                    </form>
                </div>
                <div class="admin-season-main-content">
                    <div class="admin-season-title">
                        <div class="season-title-sort">
                            <input type="checkbox" class="" id="select_all">
                            <label for="select_all">Vybrať všetky</label>
                        </div>
                        <button type="submit" class="btn btn-outline-primary">Zaevidovať vybrané do ďalšej sezóny
                        </button>
                    </div>
                    <form method="post" action="{{route('extendSeasons')}}">
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
            </div>
            <a id="loadMore">Načítať viac</a>
        </div>

        @include('system.include.footer')

    </div>

    <script>
        var page = 0;
        var isAdmin = {{Auth::user()->roles_ID == 3}};

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
                url: '{{route('sortSeasons')}}',
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
            // console.log(res);
            //var result = JSON.parse(res);
            res.forEach(function (element) {
                if (element.count_registrations === -1) {

                    element.count_registrations = "-";
                }
                var deleteButtonName = element.deleted_at==null  && isAdmin ? "Odstrániť" : "Vrátiť";
                var deleteButtonColor = element.deleted_at==null && isAdmin ? "btn-outline-danger" : "btn-outline-info";
                var deleteButtonLink = element.deleted_at==null && isAdmin ? "delete_season" : "restore_season";

                $("#seasonTable > tbody:last-child").append(
                    "<tr>"
                    + "<th>" + "<div class=\"form-check\">\n" +
                    "                                    <input type=\"checkbox\" class=\"form-check-input check-multi\" name=\"season_ids[]\" value=\"" + element.ID + "\">\n" +
                    "                                </div>" + "</th>"
                    + "<td>" + element.date_start_reg + "</td>"
                    + "<td>" + element.date_end_reg + "</td>"
                    + "<td>" + element.count_students + "</td>"
                    + "<td>" + element.count_registrations + "</td>"
                    + "<td>" + element.university.name + " (" + element.country.name + ")</td>"
                    + "<td>" + element.mobility.mobility_type.name + "</td>"
                    + "<td>" + element.mobility.category.name + "</td>"
                    + "<td>" + element.mobility.grant + "€</td>"
                    + "<td>" + element.date_start_mobility + "</td>"
                    + "<td>" + element.date_end_mobility + "</td>"
                    + "<th scope=\"row\">" +
                    "<a href=\"/public/admin/season/edit_season/" + element.ID + "\">" +
                    "<button type=\"button\" class=\"btn btn-outline-warning small-button sort-season-edit-button\">Upraviť</button>" +
                    "</a>" +
                    "<a href=\"/admin/season/" + deleteButtonLink + "/" + element.ID + "\">" +
                    "<button type=\"button\" class=\"btn " + deleteButtonColor +" small-button sort-season-delete-button\" value=\"" + element.deleted_at + "\">" + deleteButtonName + "</button>" +
                    "</a>" +
                    "<a href=\"/public/admin/season/detail/" + element.ID + "\">" +
                    "<button type=\"button\" class=\"btn btn-outline-primary small-button sort-season-detail-button\">Detail</button>" +
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

        function slovak_date_format(date) {
            date = date.split('-');
            let final_date = '';
            for (var i = date.length; i <= 0; i--) {
                alert(date);
                final_date += date[i] + '.'
            }
            return final_date
        }

        $("#sortForm").submit(function (event) {
            page = 0;
            $("#page").val(page);
            $("#page").click(function () {
                $("input:text").val(page);
            });

            $("#seasonTable tbody").empty();
            event.preventDefault();
            loadData();

            return false;
        });


        $("#select_all").change(function () {  //"select all" change
            $(".check-multi").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
        });

        var sortSeasonDeletedChecked = false;

        $("#sortSeasonOnlyDeleted").change(function () {
            if($(this).prop("checked") == true) {
                $("#sortSeasonDeleted").prop('disabled', true);
                sortSeasonDeletedChecked = $("#sortSeasonDeleted").prop('checked')
                $("#sortSeasonDeleted").prop('checked', false);
            } else {
                $("#sortSeasonDeleted").prop('disabled', false);
                $("#sortSeasonDeleted").prop('checked', sortSeasonDeletedChecked);
            }
        });

        //".checkbox" change
        /*$('.form-check-input').change(function () {
            //uncheck "select all", if one of the listed checkbox item is unchecked
            if (false == $(this).prop("checked")) { //if this item is unchecked
                $("#select_all").prop('checked', false); //change "select all" checked status to false
            }
            //check "select all" if all checkbox items are checked
            if ($('.checkbox:checked').length == $('.form-check-input').length) {
                $("#select_all").prop('checked', true);
            }
        });*/

    </script>
@endsection

