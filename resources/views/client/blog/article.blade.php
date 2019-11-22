@extends('layout.client.blog.master')
@section('title', $article[0]->title)
@section('article_in_row', $article_in_row)
@section('css', asset('css/client/blog/blog.css'))
@section('masthead')
    @include('client.blog.layout.article_head')
@endsection
@section('content')
    @include('client.blog.layout.article _content', ['article' => $article])
    @include('layout.client.blog.footer')
@endsection