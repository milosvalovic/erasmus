<!DOCTYPE html>
<html lang="sk">
    <head>
        <title>Erasmus | Admin</title>

        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!--CSS-->
        <link href="{{ asset('css/system/front.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('css/system/template/front.css') }}" rel="stylesheet" type="text/css"/>

        <!--Fonts-->
        <link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


    </head>
    <body id="page-top">
        <div id="wrapper">
            @include('system.include.header')

            @section('content')
            @show

            @include('system.include.footer')
        </div>

        <!-- Scroll to Top Button-->
        @include('system.include.scroll_to_top')

    </body>
    <!-- Bootstrap, jQuery core-->
    <script type="text/javascript" src="{{ asset('js/system/jQuery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/system/bootstrap/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script type="text/javascript" src="{{ asset('js/system/jQuery/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script type="text/javascript" src="{{ asset('js/system/jQuery/sb-admin-2.min.js') }}"></script>

    <!--Chart plugins -->
    <script type="text/javascript" src="{{ asset('js/system/charts/chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script type="text/javascript" src="{{ asset('js/system/charts/chart-area-demo.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/system/charts/chart-pie-demo.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/system/front.js') }}"></script>
</html>