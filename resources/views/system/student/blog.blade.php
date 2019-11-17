@extends('layout.system.student.master')
@section('title', __('app.nav_profil_blog'))
@section('css', asset('css/system/student/blog.css'))
@section('content')
    @include('system.student.sections.blog_form')
    @include('layout.system.student.footer')
@endsection