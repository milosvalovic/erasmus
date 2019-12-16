@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Detail výzvy</h1>
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

        <div class="admin-content">
            <div class="admin-blogs-table">
                <div class="admin-blogs-title">
                    <h2>Prihlásenie použivateľa na výzvu</h2>
                </div>
                <div class="admin-blogs-title">
                    <form class="form-inline" id="searchForm">
                        <input type="hidden" id="page" name="page" value="0">
                        <label for="search" class="mb-2 mr-sm-2">Hľadať:</label>
                        <input type="text" placeholder="Meno/Priezvisko/Email" class="form-control" id="search_user"
                               name="term" autocomplete="off">
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-outline-primary" id="search_user_buuton">Hľadať</button>
                        <div class="lds-hourglass" id="loaderSeasonSearchUser"></div>
                    </form>
                </div>
                <table class="table admin-table" id="users_table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Meno</th>
                        <th scope="col">Priezvisko</th>
                        <th scope="col">Email</th>
                        <th scope="col" class="user-form-actions">Akcie</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <div>
                    <a id="loadPrev">< Predošlé</a>
                    <a id="loadNext">Ďalšie ></a>
                </div>
            </div>
            <div class="admin-content">

                <div class="admin-blogs-table">
                    <div class="admin-blogs-title">
                        <h2>Zoznam uchádzačov</h2>
                        {{--@if(Auth::user()->roles_ID == 3)--}}
                            {{--<a href="{{route('exportUserSeason',['id'=>$season_ID])}}">--}}
                                {{--<button type="button" class="btn btn-outline-primary">--}}
                                    {{--Exportovať aktuálne výzvy--}}
                                {{--</button>--}}
                            {{--</a>--}}
                        {{--@endif--}}
                    </div>
                    <table class="table admin-table">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Uchádzač</th>
                            <th scope="col">Zmené uživateľom</th>
                            <th scope="col">Naposledy zmenené</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="user-form-actions">Akcie</th>
                        </tr>
                        </thead>
                        <tbody id="table_content">
                        @foreach($users as $user)
                            <tr>
                                <th scope="row">{{ $user->ID }}</th>
                                <td>{{ $user->user->email }}</td>
                                <td>{{ $user->status_season[0]->user->email}}</td>

                                <td>{{$user->status_season[0]->created_at}}</td>

                                <form method="post" class="form-add-blogs" id="formChangeBlogStatus"
                                      action="{{route('changeStatus')}}">
                                    <td>
                                        <div class="form-check">
                                            <select name="season_status_ID" class="form-control admin-form-input"
                                                    id="season_status_ID"
                                                    required>
                                                @foreach($statuses as $status)
                                                    <option value="{{$status->ID}}"
                                                            @if($status->ID == $user->status_season[0]->season_status_ID) selected="selected" @endif>{{$status->name}}</option>
                                                @endforeach</select>
                                        </div>
                                    </td>
                                    <th scope="row">
                                        <button type="submit" class="btn btn-outline-primary">Uložiť</button>
                                        <a href="{{route('deleteUser_season',['id'=>$user->ID])  }}">
                                            <button type="button" class="btn btn-outline-danger">Odstrániť
                                            </button>
                                        </a>
                                    </th>
                                    {{csrf_field()}}
                                    <input type="hidden" name="user_season_ID" value="{{$user->ID}}">
                                    <input type="hidden" name="season_ID" value="{{$season_ID}}">
                                </form>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <nav class="admin-users-pagination">
                        {{$users->links()}}
                    </nav>
                </div>

            </div>
        </div>
    </div>

    @include('system.include.footer')
    </div>

    <script type="text/javascript">

        var path = "/admin/season/detail/search_users";
        var season_ID = "{{$season_ID}}";

        $(document).ready(function () {
            $("#users_table").hide();
            $("#loadNext").hide();
            $("#loadPrev").hide();
        });

        $("#loadNext").click(function () {
            page++;
            $("#page").val(page);
            loadData();
        });

        $("#loadPrev").click(function () {
            page--;
            $("#page").val(page);
            loadData();
        });


        function loadData() {
            $('#loaderSeasonSearchUser').show();
            setTimeout(function () {
                $.ajax({
                    url: path,
                    type: "POST",
                    dataType: 'json',
                    data: $("#searchForm").serialize(),
                    success: function (result) {
                        $("#users_table tbody").empty();
                        setTable(result);
                        if (result.count <= (1 + page) * 10) {
                            $("#loadNext").hide();
                        } else {
                            $("#loadNext").show();
                        }
                        if (page === 0) {
                            $("#loadPrev").hide();
                        } else {
                            $("#loadPrev").show();
                        }
                        $('#loaderSeasonSearchUser').hide();
                    },
                    error: function (xhr, resp, text) {
                        $('#loaderSeasonSearchUser').hide();
                    }
                });
            }, 1200);
        }

        function setTable(res) {
            res.data.forEach(function (element) {

                $("#users_table > tbody:last-child").append(
                    "<tr>"
                    + "<td>" + element.ID + "</td>"
                    + "<td>" + element.first_name + "</td>"
                    + "<td>" + element.last_name + "</td>"
                    + "<td>" + element.email + "</td>"
                    + "<th scope=\"row\"><form method=\"post\"  class=\"signUser\">"
                    + "<input type=\"hidden\" name=\"season_id\" value=\"" + season_ID + "\">"
                    + "<input type=\"hidden\" name=\"_token\" value=\"" + "{{csrf_token()}}" + "\">"
                    + "<input type=\"hidden\" name=\"user_id\" value=\"" + element.ID + "\">"
                    + "<button type=\"submit\" class=\"btn btn-outline-primary\">Prihlásiť</button>"
                    + "</form></th>"
                    + "</tr>")
            });
            $(".signUser").on("submit", signInUser);
            $("#users_table").fadeIn(1000, function () {

            });

        }


        $("#searchForm").submit(function (event) {

            page = 0;
            $("#page").val(page);
            $("#page").click(function () {
                $("input:hidden").val(page);
            });

            $("#users_table tbody").empty();
            event.preventDefault();
            loadData();
            return false;
        });

        function signInUser(event) {
            event.preventDefault();
            var form = $(this);
            var url = form.attr("action");

            $.ajax({
                type: "POST",
                url: '/admin/season/detail/add_user_to_season',
                dataType: 'json',
                data: $(form).serialize(),
                success: function (data) {
                    // console.log(data);

                    if (data.status == "success") {
                        location.reload();
                        alert("Užívateľ úspečne pridaný na túto mobilitu");
                    } else if (data.status == "error") {
                        alert(data.reason);
                    }
                },
                error: function (xhr, resp, text) {
                    console.log(xhr, resp, text);
                }
            });
        }

    </script>
@endsection

