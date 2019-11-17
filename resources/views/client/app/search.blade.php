@extends('layout.client.app.master')
@section('title', __('app.nav_search'))
@section('css', asset('css/client/app/opportunities.css'))
@section('masthead')
    @include('client.app.layout.search.masthead', ['mobilities' => $mobilities, 'size' => $size, 'type' => $type, 'last_search_criteria' => $last_search_criteria])
@endsection
@section('content')
    <div class="content">
        @include('client.app.layout.search.search_results', ['mobilities' => $mobilities])
        @include('client.app.layout.home.newsletter')
        @include('client.app.layout.home.contact', ["contact" => $contact, "office_hours" => $office_hours, "address" => $address])
        @include('layout.client.app.footer')
    </div>
@endsection