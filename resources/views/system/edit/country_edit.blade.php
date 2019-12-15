@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')

        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Editácia krajiny</h1>
            </div>
            <div class="admin-title-user">
                <p><a href="{{ action('system\ProfileController@my_profile')}}">{{ Auth::user()->first_name . ' '. Auth::user()->last_name }}</a> <span> {{ Auth::user()->roles->name }} </span></p>
            </div>
        </div>

        <div class="admin-content">
            <div class="admin-edit-div">
                <form class="form-edit-country" id="formEditCountry" method="post" action="{{route('editCountry')}}">
                    <h3 class="form-title">Editovať </h3>
                    @if (session('error'))
                        <div class="alert alert-danger">
                            <h5>{{session('error')}}</h5>
                        </div>
                    @endif

                    <input type="hidden" name="id" value="{{$country->ID}}">
                    <div class="form-group">
                        <label for="editCountryName">Názov krajiny:</label>
                        <input type="text" class="form-control admin-form-input" id="editCountryName" placeholder=""
                               name="name" value="{{$country->name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="editCountryCode">Kód krajiny:</label>
                        <input type="text" class="form-control admin-form-input" id="editCountryCode" placeholder=""
                               name="country_code" value="{{$country->country_code}}" required>
                    </div>
                    <div class="form-group">
                        <label for="editCountryErasmusCode">Erazmus kód:</label>
                        <input type="text" class="form-control admin-form-input" id="editCountryErasmusCode" placeholder=""
                               name="erasmus_code" value="{{$country->erasmus_code}}" required>
                    </div>
                    <div class="form-group-button">
                        <button type="submit" class="btn btn-outline-primary btn-add">Uložiť</button>
                    </div>
                    {{csrf_field()}}
                </form>
            </div>
        </div>

        @include('system.include.footer')

    </div>
@endsection

