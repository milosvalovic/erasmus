@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Administrácia partnerských univerzít</h1>
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
            <div class="row">
                <div class="col-xs-12 col-md-8">
                    <div class="admin-universities-table">
                        <div class="admin-universities-title">
                            <h2>Tabuľka univerzít</h2>
                            @if(Auth::user()->roles_ID == 3)
                                <a href="{{route('exportUniversities')}}">
                                    <button type="button" class="btn btn-outline-primary">
                                        Exportovať partnerské univerzity
                                    </button>
                                </a>
                            @endif
                        </div>
                        <table class="table admin-table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Názov univerzity</th>
                                <th scope="col">Krajina</th>
                                <th scope="col">Mesto</th>
                                <th scope="col">Ulica</th>
                                <th scope="col">Obrázok</th>
                                <th scope="col" class="user-form-actions">Akcie</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($universities as $university)
                                <tr>
                                    <th scope="row">{{$university->ID}}</th>
                                    <td>{{$university->name. ' (' .$university->acronym. ')'}}</td>
                                    <td>{{$university->country->name}}</td>
                                    <td>{{$university->city}}</td>
                                    <td>{{$university->address}}</td>

                                    <td><img src="{{ asset($university->thumb_url) }}" alt=""
                                             class="image-in-table zoom"></td>
                                    <th scope="row">
                                        <a href="{{ action('system\UniversityController@universityEditShow',['id' => $university->ID]) }}">
                                            <button type="button" class="btn btn-outline-warning">Upraviť</button>
                                        </a>
                                        <a href="{{route('delete_university',['id' => $university->ID])}}">
                                            <button type="button" class="btn btn-outline-danger">Odstrániť</button>
                                        </a>
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <nav class="admin-users-pagination">
                            {{ $universities->links()}}
{{--                            {!! $universities !!}--}}
                        </nav>
                    </div>
                </div>

                <div class="col-xs-12 col-md-3 admin-add-new-item-div">
                    {{ Form::open(array('route' => 'add_university','files'=>'true')) }}
                    <h3 class="form-title">Pridať univerzitu</h3>

                    @if (session('error'))
                        <div class="alert alert-danger">
                            <h5>{{session('error')}}</h5>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="addNewUniversityName">Meno:</label>
                        <input type="text" class="form-control admin-form-input" id="addNewUniversityName"
                               placeholder="Univerzita Konštantína Filozofa"
                               name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="acronym">Meno:</label>
                        <input type="text" class="form-control admin-form-input" id="acronym"
                               placeholder="UKF"
                               name="acronym" required>
                    </div>
                    <div class="form-group">
                        <label for="addNewUniversityCountry">Krajina:</label>
                        <select name="country_ID" class="form-control admin-form-input" required>
                            @foreach($countries as $country)
                                <option value="{{$country->ID}}">{{$country->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="addNewUniversityCity">Mesto:</label>
                        <input type="text" class="form-control admin-form-input" id="addNewUniversityCity"
                               placeholder="Nitra"
                               name="city" required>
                    </div>
                    <div class="form-group">
                        <label for="addNewUniversityStreet">Ulica:</label>
                        <input type="text" class="form-control admin-form-input" id="addNewUniversityStreet"
                               placeholder="Tr. A. Hlinku 1"
                               name="address" required>
                    </div>
                    <div class="form-group">
                        <label for="addNewUniversityInfo">Info:</label>
                        <textarea type="text" class="form-control admin-form-input" id="addNewUniversityInfo"
                                  placeholder="Najlepšia univerzita, ktorú môže človek navštevovať, jupí. Nenávidím matematiku"
                                  name="info" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="addNewUniversityImage">Obrázok:</label>
                        <input type="file" class="form-control admin-form-input" id="addNewUniversityImage"
                               name="image" required>
                    </div>
                    <div class="form-group-button">
                        <button type="submit" class="btn btn-outline-primary btn-add">Pridať</button>
                    </div>
                    {{csrf_field()}}
                    {{Form::close()}}
                </div>

            </div>
        </div>

        @include('system.include.footer')
    </div>
@endsection

