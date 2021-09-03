<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Smart Voto Web Platform</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}"/>
    <link href="{{ asset('assets/css/loader.css') }}" rel="stylesheet" type="text/css"/>
    <script src="{{ asset('assets/js/loader.js') }}"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet" type="text/css"/>

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

<header class="main-header">
    <div class="container">
        <a href="#" class="navbar-logo navbar-link">
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
    <div class="home-hero">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6 mb-4 mb-md-0">
                    <h6 class="text-primary">100% Secure voting </h6>
                    <h1 class="font-weight-bold hero-title">Try Online Voting with Smart Voto</h1>
                    <p class="hero-subtitle">Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries
                        for previewing layouts and visual mockups.</p>
                    <a href="{{ route('login-okta') }}"
                       class="btn btn-primary">Get Started</a>
                </div>
                <div class="col-md-6 col-lg-4 text-center">
                    <img src="{{ asset('assets/img/web/ballot-box.png') }}" class="img-fluid hero-voting-icon">
                </div>
            </div>
        </div>
    </div>
</main>

<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{ asset('assets/js/libs/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

</body>
</html>