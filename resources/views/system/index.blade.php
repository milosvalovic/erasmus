<!DOCTYPE html>
<html lang="sk">
    <head>
        <title>Erasmus | Admin</title>

        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">

        <!--CSS-->
        <link href="{{ asset('css/system/front.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('css/system/template/front.css') }}" rel="stylesheet" type="text/css"/>

        <!--Fonts-->
        <link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!--Animate.css-->
        <link href="{{ asset('css/system/vendor/animate.css') }}" rel="stylesheet" type="text/css"/>

        <!--WYSIWYG-->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap-datepicker/css/bootstrap-datepicker.standalone.min.css') }}"/>
        <script type="text/javascript" src="{{ asset('vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

    </head>
    <body id="page-top">
    @section('content')
    @show
    @include('system.include.scroll_to_top')

    </body>

    <script type="text/javascript" src="{{ asset('js/system/jQuery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/system/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/system/jQuery/jquery.easing.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/system/jQuery/sb-admin-2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/system/charts/chart.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/system/charts/chart-area-demo.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/system/charts/chart-pie-demo.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/system/front.js') }}"></script>
</html>