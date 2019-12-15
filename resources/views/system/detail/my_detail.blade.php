@extends('system.index')

@section('content')
    <div class="admin-base-grid">
        @include('system.include.header')
        <div class="admin-title">
            <div class="admin-title-text">
                <h1>Môj profil</h1>
            </div>
            <div class="admin-title-user">
                <p><a href="{{ action('system\ProfileController@my_profile')}}">{{ Auth::user()->first_name . ' '. Auth::user()->last_name }}</a> <span> {{ Auth::user()->roles->name }} </span></p>
            </div>
        </div>

        <div class="admin-content">
            <div class="">

            </div>
        </div>

        @include('system.include.footer')

    </div>
@endsection

