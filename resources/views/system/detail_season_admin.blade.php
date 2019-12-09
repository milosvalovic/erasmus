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
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Pridať uchádzača</button>
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
                            <td><select name="season_status_ID" class="form-control admin-form-input" id="editMobilityType"
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
                                        <button type="button" class="btn btn-outline-danger">Odstrániť</button>
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
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        {!! Form::text('search_email', null, array('placeholder' => 'Search Text','class' => 'form-control','id'=>'search_text')) !!}

                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Zavrieť</button>
                        <button type="button" class="btn btn-primary" >Vyhľadať</button>
                    </div>
                </div>

            </div>
        </div>

        @include('system.include.footer')
    </div>

    <script type="text/javascript">

        var url = "{{ route('autocompleteUsers') }}";

        $('#search_email').typeahead({

            source:  function (query, process) {

                return $.get(url, { query: query }, function (data) {

                    return process(data);

                });

            }

        });

    </script>
@endsection

