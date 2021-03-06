@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Editácia univerzity</h1>
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
            <div class="admin-edit-div">
                {{ Form::open(array('route' => 'edit_university','files'=>'true')) }}
                <h3>Upraviť univerzitu</h3>
                @if (session('error'))
                    <div class="alert alert-danger">
                        <h5>{{session('error')}}</h5>
                    </div>
                @endif
                <div class="form-group">
                    <label for="editUniversityName">Meno:</label>
                    <input type="text" class="form-control admin-form-input" id="editUniversityName"
                           placeholder="Univerzita Konštantína Filozofa"
                           name="name" value="{{$university->name}}">
                </div>

                <div class="form-group">
                    <label for="editUniversityAcronym">Acronym:</label>
                    <input type="text" class="form-control admin-form-input" id="editUniversityAcronym"
                           placeholder="Univerzita Konštantína Filozofa"
                           name="acronym" value="{{$university->acronym}}">
                </div>
                <label for="editUniversityCountry">Krajina:</label>
                <select name="country_ID" class="form-control admin-form-input" id="editUniversityCountry" required>
                    @foreach($countries as $country)
                        <option value="{{$country->ID}}"
                                @if($country->ID == $university->country_ID) selected="selected" @endif>{{$country->name}}</option>
                    @endforeach
                </select>
                <div class="form-group">
                    <label for="editUniversityInfo">Mesto:</label>
                    <input type="text" class="form-control admin-form-input" id="editUniversityInfo" placeholder="Nitra"
                           name="city" value="{{$university->city}}">
                </div>
                <div class="form-group">
                    <label for="editUniversityInfo">Ulica:</label>
                    <input type="text" class="form-control admin-form-input" id="editUniversityInfo"
                           placeholder="Tr. A. Hlinku 1"
                           name="address" value="{{$university->address}}">
                </div>
                <div class="form-group">
                    <label for="editUniversityInfo">Info:</label>
                    <textarea type="text" class="form-control admin-form-input" id="editUniversityInfo"
                              placeholder="Najlepšia univerzita, ktorú môže človek navštevovať, jupí. Nenávidím matematiku"
                              name="info">{{$university->info}}</textarea>
                </div>
                <div class="form-group">
                    <label for="editUniversityImage">Obrázok:</label>
                    <img src="{{ asset($university->thumb_url) }}" alt="" class="admin-edit-university-image" id="editUniversityImage">
                    <input type="file" class="form-control admin-form-input" id="editUniversityImageInput" name="image" accept="image/x-png,image/jpeg">
                </div>
                <div class="form-group-button">
                    <button type="submit" class="btn btn-outline-primary btn-add">Uložiť</button>
                </div>
                <input type="hidden" value="{{$university->ID}}" name="ID">
                {{csrf_field()}}
                {{Form::close()}}
            </div>
        </div>

        @include('system.include.footer')

    </div>
@endsection

