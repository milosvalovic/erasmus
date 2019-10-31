@extends('layout.client.master')
@section('title', 'FAQ')
@section('css', asset('css/client/faq.css'))
@section('masthead')
    @include('client.layout.faq.masthead')
@endsection
@section('content')
    <div class="content">
        <div class="container">
            @include('client.layout.faq.questions.basic_information')
            @include('client.layout.faq.questions.partner_universities')
            @include('client.layout.faq.questions.conditions')
            @include('client.layout.faq.questions.amount')
            @include('client.layout.faq.questions.how_to_choose')
            @include('client.layout.faq.questions.before_leaving')
            @include('client.layout.faq.questions.returns')
            @include('layout.client.footer')
        </div>
@endsection
