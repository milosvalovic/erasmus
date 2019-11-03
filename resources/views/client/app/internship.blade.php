@extends('layout.client.app.master')
@section('title', __('app.nav_internships'))
@section('css', asset('css/client/app/opportunities.css'))
@section('masthead')
    @include('client.app.layout.internships.masthead')
@endsection
@section('content')
    <div class="content">
        @include('client.app.layout.internships.internships')
        @include('client.app.layout.home.newsletter')
        @include('client.app.layout.home.contact')
        @include('layout.client.app.footer')
    </div>
@endsection