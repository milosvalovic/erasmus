@extends('layout.client.app.master')
@section('home', __('active'))
@section('title', __('app.nav_home'))
@section('article_in_row', $article_in_row)
@section('css', asset('css/client/app/home.css'))
@section('masthead')
    @include('client.app.layout.home.masthead', ['type' => $type, 'category' => $category])
@endsection
@section('content')
    @include('client.app.layout.home.opportunitie', ['mobilities' => $mobilities, 'mobility_in_row' => $mobility_in_row])
    @include('client.app.layout.home.universities')
    @include('client.app.layout.home.newsletter')
    @include('client.app.layout.home.contact', ["contact" => $contact, "office_hours" => $office_hours, "address" => $address])
    @include('layout.client.app.footer', ['article_in_row' => $article_in_row])
@endsection