<!doctype html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('fav/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('fav/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('fav/favicon-16x16.png') }}">

    <link rel="manifest" href="{{ asset('fav/site.webmanifest') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/layout/fonts.css') }}"/>
    <title>@lang('app.name') | @lang('app.errors_404_title')</title>
</head>
<style type="text/css">
    body {
        background: #007183;
    }

    .outer {
        display: table;
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
    }

    .middle {
        display: table-cell;
        vertical-align: middle;
    }

    .inner {
        margin-left: auto;
        margin-right: auto;
        width: 500px;
        text-align: center;
    }

    h1, h2, p {
        color: #ffffff;
    }

    h1 {
        font-family: Cairo-Black, serif;
        font-size: 15em;
        margin: 0;
        padding: 0;
        line-height: 1em;
    }

    h2 {
        font-family: Cairo-Regular, serif;
        font-style: italic;
        font-size: 1.8em;
        line-height: 0.5em;
    }

    P {
        font-family: Cairo-Light, serif;
        font-size: 1.3em;
        line-height: 0.5em;
        margin-bottom: 40px;
    }

    a {
        font-family: Cairo-Bold, serif;
        font-size: 1.2em;
        text-decoration: none;
        padding: 15px;
        border-radius: 10px;
        background: #ffffff;
        color: #007183;
    }

    @media only screen and (max-width: 575px) {
        .inner {
            width: 350px;
        }

        h1 {
            font-size: 10em;
            margin: 0;
            padding: 0;
            line-height: 1em;
        }

        h2 {
            font-size: 1.4em;
            line-height: 0.5em;
        }

        P {
            font-size: 1em;
            line-height: 0.5em;
            margin-bottom: 40px;
        }

        a {
            font-size: 1em;
            padding: 10px;
            border-radius: 8px;
        }
    }
</style>
<body>
<div class="outer">
    <div class="middle">
        <div class="inner">
            <h1>@lang('app.errors_404_title')</h1>
            <h2>@lang('app.errors_404_subtitle')</h2>
            <p>@lang('app.errors_404_description')</p>
            <a href="{{ url('/') }}">@lang('app.errors_404_button')</a>
        </div>
    </div>
</div>
</body>
</html>