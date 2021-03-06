@extends('layout.client.app.master')
@section('mobilities', 'active')
@section('title', __('app.nav_mobilities'))
@section('article_in_row', $article_in_row)
@section('css', asset('css/client/app/opportunities.css'))
@section('masthead')
    @include('client.app.layout.mobilities.masthead')
@endsection
@section('content')
    <div class="content">
        @include('client.app.layout.mobilities.mobility', ['mobilities' => $mobilities, 'mobility_in_row'=> $mobility_in_row])
        @include('client.app.layout.home.newsletter')
        @include('client.app.layout.home.contact', ["contact" => $contact, "office_hours" => $office_hours, "address" => $address])
        @include('layout.client.app.footer')
    </div>
@endsection