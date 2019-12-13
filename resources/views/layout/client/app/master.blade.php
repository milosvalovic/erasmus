@include('layout.client.app.header')

@include('layout.client.navigation')

@section('masthead')
@show

@yield('content')

@include('layout.preloader')