@extends('system.index')
@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')
        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Môj profil</h1>
            </div>
            <div class="admin-title-user">
                <p>
                    <a href="{{ action('system\ProfileController@my_profile')}}">{{ Auth::user()->first_name . ' '. Auth::user()->last_name }}</a>
                    <span> {{ Auth::user()->roles->name }} </span></p>
                <img src="{{ asset('img/icon_logout.png') }}" alt="" class="logout-admin-button">
            </div>
        </div>

        <div class="admin-content">
            <div class="my-profile-content">
                <h3>ID: <span>{{ Auth::user()->ID }}</span></h3>
                <h3>Meno a priezvisko: <span>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span></h3>
                <h3>Email: <span>{{ Auth::user()->email }}</span></h3>
                <h3>Rola: <span>{{ Auth::user()->roles->name }}</span></h3>
                <h3>Účet vytvorený dňa: <span>{{  Auth::user()->created_at }}</span></h3>
                <h3>Potvrdená registrácia: <span>@if( Auth::user()->verified==1 ) áno @else nie  @endif </span></h3>
                <div class="my-detail-newsletter">
                    <h3>Prihlásený na email notifikácie noviniek</h3>
                    <input type="checkbox" class="sort-filter-checkbox" id="newsletter_active" name="newsletter"
                           @if( Auth::user()->newsletter==0) value="0" @else value="1" checked @endif>
                    <div class="spinner-border loading-primary-2" id="spinnerProfileDetail">
                    </div>
                    <div class="my-profile-response">
                        <img src="{{ asset('img/icon_error.png') }}" alt="" class="my-profile-changes-error" id="myProfileChangesError">
                        <img src="{{ asset('img/icon_success.png') }}" alt="" class="my-profile-changes-success" id="myProfileChangesSuccess">
                    </div>
                </div>
            </div>
        </div>
        @include('system.include.footer')
    </div>
@endsection

