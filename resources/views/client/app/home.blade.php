@extends('layout.client.app.master')
@section('home', __('active'))
@section('title', __('app.nav_home'))
@section('css', asset('css/client/app/home.css'))
@section('masthead')
    @include('client.app.layout.home.masthead', ['type' => $type])
@endsection
@section('content')
    @include('client.app.layout.home.opportunitie', ['mobilities' => $mobilities])
    @include('client.app.layout.home.universities')
    @include('client.app.layout.home.newsletter')
    @include('client.app.layout.home.contact', ["contact" => array_chunk($contact, 2), "office_hours" => $office_hours, "address" => $address])
    @include('layout.client.app.footer')
@endsection