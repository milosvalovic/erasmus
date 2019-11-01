@extends('layout.client.blog.master')
@section('title', 'Blog')
@section('css', asset('css/client/blog/blog.css'))
@section('masthead')
    @include('client.blog.layout.masthead')
@endsection
@section('content')
    @include('client.blog.layout.articles')
    @include('layout.client.blog.footer')
@endsection