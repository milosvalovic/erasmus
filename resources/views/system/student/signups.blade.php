@extends('layout.system.student.master')
@section('title', __('app.nav_my_signups'))
@section('article_in_row', $article_in_row)
@section('css', asset('css/system/student/student.css'))
@section('content')
    @include('system.student.sections.signup_table', ['registrations' => $registrations])
    @include('layout.system.student.footer')
@endsection