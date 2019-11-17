@extends('layout.system.student.master')
@section('title', __('app.profil_mobility'))
@section('css', asset('css/system/student/profil.css'))
@section('content')
    @include('system.student.sections.mobility')
    @include('layout.system.student.footer')
@endsection