@extends('layout.client.blog.master')
@section('title', 'Názov článku')
@section('css', asset('css/client/blog/blog.css'))
@section('masthead')
    @include('client.blog.layout.article_head')
@endsection
@section('content')
    @include('client.blog.layout.article _content')
    @include('layout.client.blog.footer')
@endsection