@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Detail sezóny</h1>
            </div>
            <div class="admin-title-user">
                <p>Eduard Gábel</p>
                <img src="{{ asset('img/cat.png') }}" alt="">
            </div>
        </div>

        <div class="admin-content">

            <div class="admin-blogs-table">
                <div class="admin-blogs-title">
                    <h2>Zoznam uchádzačov</h2>

                </div>
                <div class="admin-blogs-title">
                    <form class="form-inline" id="sortForm">
                        <input type="hidden" id="page" name="page" value="0">
                        <label for="search" class="mb-2 mr-sm-2">Hľadať:</label>
                        <input type="text"
                               placeholder="Meno/Priezvisko/Email" class="form-control" id="search"
                               name="term" autocomplete="off" minlength="3">
                        <button type="submit" class="btn btn-primary">Hľadať</button>
                    </form>
                </div>
                    <table class="table admin-table">
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
            </div>
            <div class="admin-content">

                <div class="admin-blogs-table">
                    <div class="admin-blogs-title">
                        <h2>Zoznam uchádzačov</h2>
                    </div>
                    <table class="table admin-table">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Uchádzač</th>
                            <th scope="col">Zmené uživateľom</th>
                            <th scope="col">Status</th>
                            <th scope="col">Naposledy zmenené</th>
                            <th scope="col" class="user-form-actions">Akcie</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <th scope="row">{{ $user->ID }}</th>
                                <td>{{ $user->user->email }}</td>
                                <td>{{ $user->status_season[0]->user->email}}</td>
                                <td><select name="season_status_ID" class="form-control admin-form-input"
                                            id="editMobilityType"
                                            required>
                                        @foreach($statuses as $status)
                                            <option value="{{$status->ID}}"
                                                    @if($status->ID == $user->status_season[0]->season_status->ID) selected="selected" @endif>{{$status->name}}</option>
                                    @endforeach</td>
                                <td>{{$user->status_season[0]->season_status->created_at}}</td>
                                <form method="post" class="form-add-blogs" id="formChangeBlogStatus"
                                      action="">
                                    <td>
                                        <div class="form-check">

                                        </div>
                                    </td>
                                    <th scope="row">
                                        <button type="submit" class="btn btn-outline-primary">Uložiť</button>
                                        <a href="{{route('deleteBlog',['id'=>$user->ID])  }}">
                                            <button type="button" class="btn btn-outline-danger">Odstrániť
                                            </button>
                                        </a>
                                    </th>
                                    {{csrf_field()}}
                                    <input type="hidden" name="id" value="{{$user->ID}}">
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

        var path = "{{ route('autocompleteUsers') }}";
        $('#search_emails').typeahead({
            source: function (query, process) {
                return $.get(path, {query: query}, function (data) {
                    console.log(process(data));
                    return process(data);
                });
            }
        });

    </script>
@endsection

