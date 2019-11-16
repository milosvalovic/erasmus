@extends('system.index')

@section('content')
    <div class="admin-welcome-page">



        @include('system.include.header')
        <div class="admin-welcome-title">
            <div class="admin-welcome-title-title">
                <h2>Administračný systém erazmus</h2>
            </div>

            <div class="admin-welcome-title-user-profile">
                <p>Eduard Gábel</p>
                <img src="{{ asset('img/cat.png') }}" alt="">
            </div>
        </div>

        <div class="admin-welcome-content">
            <div class="basic-info">
                <h1>Celkový počet užívateľov</h1>
            </div>
        </div>

        @include('system.include.footer')




    </div>
@endsection

