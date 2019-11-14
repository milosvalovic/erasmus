@extends('layout.client.app.master')
@section('faq', 'active')
@section('title', __('app.nav_faq'))
@section('css', asset('css/client/app/faq.css'))
@section('masthead')
    @include('client.app.layout.faq.masthead')
@endsection
@section('content')
    <div class="content">
        @foreach ($faq as $question)
            @if ($loop->iteration == 1)
                @include('client.app.layout.faq.questions.basic_information', ["title" => $question->name, "content" => $question->description])
            @endif
            @if ($loop->iteration == 2)
                @include('client.app.layout.faq.questions.partner_universities', ["title" => $question->name, "content" => $university])
            @endif
            @if ($loop->iteration == 3)
                @include('client.app.layout.faq.questions.conditions', ["title" => $question->name, "content" => $question->description])
            @endif
            @if ($loop->iteration == 4)
                @include('client.app.layout.faq.questions.amount', ["title" => $question->name, "content" => $question->description])
            @endif
            @if ($loop->iteration == 5)
                @include('client.app.layout.faq.questions.before_leaving', ["title" => $question->name, "content" => $question->description])
            @endif
            @if ($loop->iteration == 6)
                @include('client.app.layout.faq.questions.returns', ["title" => $question->name, "content" => $question->description])
            @endif
        @endforeach
    </div>
    @include('layout.client.app.footer')
@endsection