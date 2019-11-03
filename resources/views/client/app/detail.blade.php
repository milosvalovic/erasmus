@extends('layout.client.app.master')
@section('title', 'Názov')
@section('css', asset('css/client/app/detail.css'))
@section('masthead')
    @include('client.app.layout.detail.masthead')
    @include('client.app.layout.detail.subnavigation')
@endsection
@section('content')
    <div class="content">
        @include('client.app.layout.detail.detail_sections')
    </div>
@endsection