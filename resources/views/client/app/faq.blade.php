@extends('layout.client.app.master')
@section('title', 'FAQ')
@section('css', asset('css/client/app/faq.css'))
@section('masthead')
    @include('client.app.layout.faq.masthead')
@endsection
@section('content')
    <div class="content">
        <div class="container">
            @include('client.app.layout.faq.questions.basic_information')
            @include('client.app.layout.faq.questions.partner_universities')
            @include('client.app.layout.faq.questions.conditions')
            @include('client.app.layout.faq.questions.amount')
            @include('client.app.layout.faq.questions.how_to_choose')
            @include('client.app.layout.faq.questions.before_leaving')
            @include('client.app.layout.faq.questions.returns')
            @include('layout.client.app.footer')
        </div>
@endsection