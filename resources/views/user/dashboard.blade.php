@extends('user.layouts.app')
@section('header-style')
    <link href="{{ asset('plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/dashboard/dash_2.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="page-header">
        <div class="page-title">
            <h3>Dashboard</h3>
        </div>

    </div>

    <div class="row layout-top-spacing">
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-card-four">
                <div class="widget-content">
                    <div class="w-header">
                        <div class="w-info">
                            <h6 class="value">Total Polls</h6>
                        </div>
                    </div>

                    <div class="w-content mb-4">
                        <div class="w-info">
                            <p class="value text-primary">{{ \App\Poll::where('user_id', Auth::id())->count() }} </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-card-four">
                <div class="widget-content">
                    <div class="w-header">
                        <div class="w-info">
                            <h6 class="value ">Ongoing Polls</h6>
                        </div>
                    </div>

                    <div class="w-content mb-4">
                        <div class="w-info">
                            <p class="value text-success">
                                {{ \App\Poll::where('user_id', Auth::id())->where('start_date', '<=', \Carbon\Carbon::now())->where('end_date', '>', \Carbon\Carbon::now())->count() }} </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-card-four">
                <div class="widget-content">
                    <div class="w-header">
                        <div class="w-info">
                            <h6 class="value">Upcoming Polls</h6>
                        </div>
                    </div>

                    <div class="w-content mb-4">
                        <div class="w-info">
                            <p class="value text-warning">
                                {{ \App\Poll::where('user_id', Auth::id())->where('start_date', '>', \Carbon\Carbon::now())->count() }} </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('footer_script')
    <script src="{{ asset('plugins/apex/apexcharts.min.js') }}"></script>
@endsection