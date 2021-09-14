@extends('layouts.app')

@section('content')
    <div class="home-hero">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6 mb-4 mb-md-0">
                    <h6 class="text-primary">100% Secure voting </h6>
                    <h1 class="font-weight-bold hero-title">Try Online Voting with Smart Voto</h1>
                    <p class="hero-subtitle">Lorem ipsum is placeholder text commonly used in the graphic, print, and
                        publishing industries
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
@endsection