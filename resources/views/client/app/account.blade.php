@extends('layout.client.app.master')
@section('account', 'active')
@section('title', __('app.nav_account'))
@section('css', asset('css/client/app/account.css'))
@section('masthead')
    @switch($view)
        @case('login')
        @include('client.app.layout.account.login')
        @break

        @case('register')
        @include('client.app.layout.account.register')
        @break

        @case('forget_password')
        @include('client.app.layout.account.forget_password')
        @break

        @default
        @include('client.app.layout.account.login')
    @endswitch
@endsection