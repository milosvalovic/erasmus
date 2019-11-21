@extends('layout.client.app.master')
@section('account', 'active')
@section('css', asset('css/client/app/account.css'))
@section('masthead')
    @switch($view)
        @case('login')
        @include('client.app.layout.account.login')
        @section('title', __('app.nav_account'). ' | ' .__('app.nav_login'))
        @break

        @case('register')
        @include('client.app.layout.account.register')
        @section('title', __('app.nav_account'). ' | ' .__('app.nav_registration'))
        @break

        @case('forget_password')
        @include('client.app.layout.account.forget_password')
        @section('title', __('app.nav_account'). ' | ' .__('app.nav_forget_password'))
        @break

        @case('reset_password')
        @include('client.app.layout.account.reset_password')
        @break

        @default
        @include('client.app.layout.account.login')
        @section('title', __('app.nav_account'). ' | ' .__('app.nav_login'))

    @endswitch
    <script type="text/javascript" src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/bootstrap/bootstrap.min.js') }}"></script>
@endsection