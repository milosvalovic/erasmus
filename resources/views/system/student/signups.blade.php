@extends('layout.system.student.master')
@section('title', __('app.nav_my_signups'))
@section('css', asset('css/system/student/profil.css'))
@section('content')
    @include('system.student.sections.signup_table')
    @include('layout.system.student.footer')
@endsection