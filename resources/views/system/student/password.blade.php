@extends('layout.system.student.master')
@section('title', __('app.nav_change_password'))
@section('css', asset('css/system/student/form.css'))
@section('content')
    @include('system.student.sections.change_password')
    @include('layout.system.student.footer')
@endsection