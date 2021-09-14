<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Smart Voto Web Platform</title>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}"/>
    <link rel="stylesheet" href="{{ asset('plugins/font-icons/fontawesome/css/all.css') }}">

    <link href="{{ asset('assets/css/loader.css') }}" rel="stylesheet" type="text/css"/>
    <script src="{{ asset('assets/js/loader.js') }}"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/components/tabs-accordian/custom-tabs.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/web.css') }}" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->

</head>
<body class="web-page">

<!-- BEGIN LOADER -->
<div id="load_screen">
    <div class="loader">
        <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div>
    </div>
</div>
<!--  END LOADER -->
<div id="voto-app">

    <header class="main-header">
        <div class="container">
            <a href="/" class="navbar-logo navbar-link">
                <img src="{{ asset('assets/img/logo2.svg') }}" alt="logo">
                <span class="navbar-brand-name">Smart Voto</span>
            </a>

            @auth
                <a href="{{ url('/dashboard') }}" class="navbar-link">Dashboard</a>
            @else
                <a href="{{ route('login-okta') }}" class="navbar-link">Login</a>
            @endauth
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</div>

<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{ asset('assets/js/libs/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

</body>
</html>