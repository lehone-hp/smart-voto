<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Smart Voto Web Platform </title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}"/>
    <link href="{{ asset('assets/css/loader.css') }}" rel="stylesheet" type="text/css"/>
    <script src="{{ asset('assets/js/loader.js') }}"></script>

    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/theme-checkbox-radio.css') }}">
    <link href="{{ asset('plugins/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/apps/contacts.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css"/>

    @yield('header-style')

    <link rel="stylesheet" href="{{ asset('plugins/font-icons/fontawesome/css/all.css') }}">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css" />

</head>
<body class="alt-menu sidebar-noneoverflow">

<div id="load_screen">
    <div class="loader">
        <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div>
    </div>
</div>

@include('user.layouts.header')

<div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>

    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            @yield('content')

        </div>

        <div class="footer-wrapper">
            <div class="footer-section f-section-1">
                <p class="">Copyright © 2021, All rights reserved.</p>
            </div>
        </div>
    </div>

</div>

<script src="{{ asset('assets/js/libs/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script>
    $(document).ready(function () {
        App.init();
    });
</script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

<script src="{{ asset('assets/js/dashboard/dash_1.js') }}"></script>
@yield('footer_script')

</body>
</html>