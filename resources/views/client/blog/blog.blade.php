@extends('layout.client.blog.master')
@section('blog', 'active')
@section('title', __('app.nav_blog'))
@section('css', asset('css/client/blog/blog.css'))
@section('masthead')
    @include('client.blog.layout.masthead')
@endsection
@section('content')
    @include('client.blog.layout.articles')
    @include('layout.client.blog.footer')
@endsection