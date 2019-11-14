@extends('layout.system.student.master')
@section('title', __('app.profil_mobility'))
@section('css', asset('css/system/student/profil.css'))
@section('content')
    @include('system.student.sections.mobility')
    @include('system.student.sections.presentation_form')
    @include('system.student.sections.review_form')
    @include('layout.system.student.footer')
@endsection