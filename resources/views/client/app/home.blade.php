@extends('layout.client.app.master')
@section('title', 'Domov')
@section('css', asset('css/client/app/home.css'))
@section('masthead')
    @include('client.app.layout.home.masthead')
@endsection
@section('content')
    @include('client.app.layout.home.opportunitie')
    @include('client.app.layout.home.universities')
    @include('client.app.layout.home.newsletter')
    @include('client.app.layout.home.contact')
    @include('layout.client.app.footer')
@endsection