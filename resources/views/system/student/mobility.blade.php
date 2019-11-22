@extends('layout.system.student.master')
@section('title', __('app.nav_my_mobilities'))
@section('article_in_row', $article_in_row)
@section('css', asset('css/system/student/profil.css'))
@section('content')
    @include('system.student.sections.mobility_card')
    @include('layout.system.student.footer')
@endsection