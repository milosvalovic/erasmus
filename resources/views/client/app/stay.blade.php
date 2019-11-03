@extends('layout.client.app.master')
@section('title', __('app.nav_stays'))
@section('css', asset('css/client/app/opportunities.css'))
@section('masthead')
    @include('client.app.layout.stays.masthead')
@endsection
@section('content')
    <div class="content">
        @include('client.app.layout.stays.stays')
        @include('client.app.layout.home.newsletter')
        @include('client.app.layout.home.contact')
        @include('layout.client.app.footer')
    </div>
@endsection