@extends('layout.client.app.master')
@section('mobilities', 'active')
@section('title', __('app.nav_mobilities'))
@section('css', asset('css/client/app/opportunities.css'))
@section('masthead')
    @include('client.app.layout.mobilities.masthead')
@endsection
@section('content')
    <div class="content">
        @include('client.app.layout.mobilities.stays')
        @include('client.app.layout.home.newsletter')
        @include('client.app.layout.home.contact')
        @include('layout.client.app.footer')
    </div>
@endsection