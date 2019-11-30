@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Mobility</h1>
            </div>
            <div class="admin-title-user">
                <p>Eduard Gábel</p>
                <img src="{{ asset('img/cat.png') }}" alt="">
            </div>
        </div>

        <div class="admin-content">

            <div class="row">
                <div class="col-xs-12 col-md-8">
                    <div class="admin-mobilities-table">
                        <div class="admin-mobilities-title">
                            <h2>Výpis mobilít</h2>
                        </div>
                        <table class="table admin-table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Názov partnerskej university</th>
                                <th scope="col">Krajina</th>
                                <th scope="col">Typ</th>
                                <th scope="col">Kategória</th>
                                <th scope="col">Štipendium</th>
                                <th scope="col" class="user-form-actions">Akcie</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mobilities as $mobility)
                                <tr>
                                    <th scope="row">{{ $mobility->ID  }}</th>
                                    <td>{{ $mobility->partner_university_ID }}</td>
                                    <td></td>
                                    <td>{{ $mobility->mobility_types_ID }}</td>
                                    <td>{{ $mobility->category_ID }}</td>
                                    <td>{{ $mobility->grant }}</td>
                                    <th scope="row">
                                        <a href="{{ action('system\MobilityController@mobilityEditShow',['id' => $mobility->ID]) }}">
                                            <button type="button" class="btn btn-outline-warning">Upraviť</button>
                                        </a>
                                        <a href="/delete-user/'number'">
                                            <button type="button" class="btn btn-outline-danger">Odstrániť</button>
                                        </a>
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <nav class="admin-users-pagination">
                            {{--TODO Here pagination--}}
                        </nav>
                    </div>
                </div>

                <div class="col-xs-12 col-md-3 admin-add-new-item-div">
                    <form method="post" class="form-add-faq" id="formNewFaq" action="">
                        <h3 class="form-title">Pridať mobilitu</h3>

                        <div class="form-group">
                            <label for="addMobilityUniversity">Partnerská univerzita: </label>
                            <select name="addMobilityUniversityId" class="form-control admin-form-input" id="addMobilityUniversity" required>
                                {{--                            @foreach($universities as $university)--}}
                                {{--                                <option value="{{$university->ID}}"--}}
                                {{--                                        @if($university->ID == $mobility->partner_university_ID) selected="selected" @endif>{{$university->name}}</option>--}}
                                {{--                            @endforeach--}}
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="addMobilityCategory">Kategória: </label>
                            <select name="addMobilityCategoryId" class="form-control admin-form-input" id="addMobilityCategory" required>
                                {{--                            @foreach($universities as $university)--}}
                                {{--                                <option value="{{$university->ID}}"--}}
                                {{--                                        @if($university->ID == $mobility->partner_university_ID) selected="selected" @endif>{{$university->name}}</option>--}}
                                {{--                            @endforeach--}}
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="addMobilityType">Typ: </label>
                            <select name="addMobilityTypeId" class="form-control admin-form-input" id="addMobilityType" required>
                                {{--                            @foreach($universities as $university)--}}
                                {{--                                <option value="{{$university->ID}}"--}}
                                {{--                                        @if($university->ID == $mobility->partner_university_ID) selected="selected" @endif>{{$university->name}}</option>--}}
                                {{--                            @endforeach--}}
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="addNewUniversityGrand">Výška štipendia:</label>
                            <input type="text" class="form-control admin-form-input" id="addNewUniversityGrand"
                                   placeholder="725€" name="addMobilityGrand" required>
                        </div>

                        <div class="form-group-button">
                            <button type="submit" class="btn btn-outline-primary btn-add">Pridať</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

        @include('system.include.footer')
    </div>
@endsection

