@extends('layout.client.master')
@section('title', 'Domov')
@section('masthead')
    @include('client.layout.home.masthead')
@endsection
@section('content')
    @include('client.layout.home.opportunitie')
    @include('client.layout.home.universities')
    @include('client.layout.home.newsletter')
    @include('client.layout.home.contact')
@endsection