@extends('user.layouts.app')
@section('header-style')

@endsection

@section('content')
    <div class="page-header">
        <nav class="breadcrumb-one" aria-label="breadcrumb">
            <div class="title">
                <h3>Page Title</h3>
            </div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Starter Kit</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>Breadcrumb</span></li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
            <div class="widget widget-content-area br-4">
                <div class="widget-one">

                    <h6>Kick Start you new project with ease!</h6>

                    <p class="mb-0 mt-3" style="color: #888ea8;">With CORK starter kit, you can begin your work without any hassle. The starter page is highly optimized which gives you freedom to start with minimal code and add only the desired components and plugins required for your project.</p>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_script')

@endsection