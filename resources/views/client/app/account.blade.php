@extends('layout.client.app.master')
@section('title', __('app.nav_account'))
@section('css', asset('css/client/app/account.css'))
@section('masthead')
   @include('client.app.layout.account.register')
@endsection