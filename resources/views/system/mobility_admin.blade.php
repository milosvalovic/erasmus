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
                                    <td>{{ $mobility->university->name}}</td>
                                    <td>{{ $mobility->country->name}}</td>
                                    <td>{{ $mobility->mobility_type->name}}</td>
                                    <td>{{ $mobility->category->name}}</td>
                                    <td>{{ $mobility->grant}}€</td>
                                    <th scope="row">
                                        <a href="{{ action('system\MobilityController@mobilityEditShow',['id' => $mobility->ID]) }}">
                                            <button type="button" class="btn btn-outline-warning">Upraviť</button>
                                        </a>
                                        <a href="{{route('deleteMobility',['id' => $mobility->ID])}}">
                                            <button type="button" class="btn btn-outline-danger">Odstrániť</button>
                                        </a>
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <nav class="admin-users-pagination">
                            {{$mobilities->links()}}
                        </nav>
                    </div>
                </div>

                <div class="col-xs-12 col-md-3 admin-add-new-item-div">
                    <form method="post" class="form-add-faq" id="formNewMobility" action="{{route('addMobility')}}">
                        <h3 class="form-title">Pridať mobilitu</h3>
                        @if (session('error'))
                            <div class="alert alert-danger">
                                <h5>{{session('error')}}</h5>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="addMobilityUniversity">Partnerská univerzita: </label>
                            <select name="university_ID" class="form-control admin-form-input"
                                    id="addMobilityUniversity" required>
                                @foreach($universities as $university)
                                    <option value="{{$university->ID}}">{{$university->name . ' (' . $university->country->name . ')'}}</option>
                                    @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="addMobilityCategory">Kategória: </label>
                            <select name="category_ID" class="form-control admin-form-input" id="addMobilityCategory"
                                    required>
                                @foreach($categories as $category)
                                    <option value="{{$category->ID}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="addMobilityType">Typ: </label>
                            <select name="type_ID" class="form-control admin-form-input" id="addMobilityType" required>
                                @foreach($types as $type)
                                    <option value="{{$type->ID}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="addNewUniversityInfo">Popis:</label>
                            <textarea class="form-control admin-form-input" id="addNewUniversityInfo"
                                      placeholder="" name="info" form="formNewMobility" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="addNewUniversityGrant">Výška štipendia:</label>
                            <input type="number" step="1" class="form-control admin-form-input"
                                   id="addNewUniversityGrant"
                                   placeholder="725€" name="grant" required>
                        </div>

                        <div class="form-group-button">
                            <button type="submit" class="btn btn-outline-primary btn-add">Pridať</button>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>

        </div>

        @include('system.include.footer')
    </div>
@endsection

