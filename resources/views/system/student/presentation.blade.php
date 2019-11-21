@extends('layout.system.student.master')
@section('title', __('app.nav_presentation'))
@section('css', asset('css/system/student/form.css'))
@section('content')
    @include('system.student.sections.presentation_form')
    @include('layout.system.student.footer')
@endsection