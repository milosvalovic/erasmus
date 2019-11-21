@extends('layout.client.app.master')
@section('faq', 'active')
@section('title', __('app.nav_faq'))
@section('css', asset('css/client/app/faq.css'))
@section('masthead')
    @include('client.app.layout.faq.masthead')
@endsection
@section('content')
    <div class="content">
        <div class="container">
            @foreach ($faqs as $faq)
                @include('client.app.layout.faq.question', ["title" => $faq->name, "content" => $faq->description])
            @endforeach
        </div>
        @include('layout.client.app.footer')
    </div>
@endsection