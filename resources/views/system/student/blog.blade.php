@extends('layout.system.student.master')
@section('title', __('app.nav_blog'))
@section('css', asset('css/system/student/form.css'))
@section('content')
    @include('system.student.sections.blog_form', ['inputs' => $inputs])
    @include('layout.system.student.footer')
@endsection