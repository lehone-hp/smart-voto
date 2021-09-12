@extends('user.layouts.app')
@section('header-style')
    <link href="{{ asset('assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/components/tabs-accordian/custom-tabs.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="page-header">
        <nav class="breadcrumb-one" aria-label="breadcrumb">
            <div class="title">
                <h3>My Polls</h3>
            </div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">My Polls</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>{{ $poll->name }}</span></li>
            </ol>
        </nav>
    </div>

    <div class="row mb-4 mt-3 mt-5">
        <div class="col-sm-3 col-xl-2 col-12">
            <div class="nav flex-column nav-pills mb-sm-0 mb-3 widget p-0" id="v-pills-tab" role="tablist"
                 aria-orientation="vertical">
                <a class="nav-link mb-2 active" data-toggle="pill"
                   href="#v-pills-home" role="tab"
                   aria-controls="v-pills-home" aria-selected="false">Home</a>
                <a class="nav-link mb-2" data-toggle="pill"
                   href="#v-pills-candidates" role="tab"
                   aria-controls="v-pills-profile" aria-selected="false">Candidates</a>
                <a class="nav-link mb-2" data-toggle="pill"
                   href="#v-pills-voters"
                   role="tab" aria-controls="v-pills-messages" aria-selected="false">Voters</a>
                <a class="nav-link" data-toggle="pill"
                   href="#v-pills-ballots"
                   role="tab" aria-controls="v-pills-settings" aria-selected="true">Ballots</a>
            </div>
        </div>

        <div class="col-sm-9 col-xl-10 col-12">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade active show" id="v-pills-home" role="tabpanel"
                     aria-labelledby="v-pills-home-tab">

                    <div class="row">
                        <div class="col-md-8">
                            <div class="widget mb-3">
                                <div class="d-flex justify-content-between">
                                    <h3 class="">{{ $poll->name }}</h3>
                                    <a href="#"
                                       class="mt-2 btn btn-primary rounded-circle">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                             height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-edit-3">
                                            <path d="M12 20h9"></path>
                                            <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                        </svg>
                                    </a>
                                </div>
                                <div class="mb-5">
                                    <p class="mb-3">{!! $poll->description !!}</p>

                                    <table class="table table-sm table-striped table-borderless">
                                        <tr>
                                            <td>Created</td>
                                            <td>{{ $poll->created_at->format('d, F Y H:i a') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Start Date</td>
                                            <td>{{ $poll->start_date->format('d, F Y H:i a') }}</td>
                                        </tr>
                                        <tr>
                                            <td>End Date</td>
                                            <td>{{ $poll->end_date->format('d, F Y H:i a') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Max Votes</td>
                                            <td>{{ $poll->max_vote }}</td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>{!! $poll->statusBadge() !!}</td>
                                        </tr>
                                    </table>
                                </div>


                                <h4 class="mb-3">Candidates</h4>

                                <hr>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="widget widget-card-one">
                                            <div class="widget-content">
                                                <div class="text-center">
                                                    <div class="media justify-content-center mb-3">
                                                        <div class="w-img">
                                                            <img src="/assets/img/profile-19.jpeg" alt="avatar">
                                                        </div>
                                                    </div>
                                                    <h6 class="mb-3">Jimmy Turner</h6>

                                                    <p>"Duis aute irure dolor" in reprehenderit in voluptate velit esse
                                                        cillum "dolore eu fugiat" nulla pariatur. Excepteur sint
                                                        occaecat cupidatat non proident.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="widget widget-card-one">
                                            <div class="widget-content">
                                                <div class="text-center">
                                                    <div class="media justify-content-center mb-3">
                                                        <div class="w-img">
                                                            <img src="/assets/img/profile-19.jpeg" alt="avatar">
                                                        </div>
                                                    </div>
                                                    <h6 class="mb-3">Jimmy Turner</h6>

                                                    <p>"Duis aute irure dolor" in reprehenderit in voluptate velit esse
                                                        cillum "dolore eu fugiat" nulla pariatur. Excepteur sint
                                                        occaecat cupidatat non proident.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="widget widget-card-one">
                                            <div class="widget-content">
                                                <div class="text-center">
                                                    <div class="media justify-content-center mb-3">
                                                        <div class="w-img">
                                                            <img src="/assets/img/profile-19.jpeg" alt="avatar">
                                                        </div>
                                                    </div>
                                                    <h6 class="mb-3">Jimmy Turner</h6>

                                                    <p>"Duis aute irure dolor" in reprehenderit in voluptate velit esse
                                                        cillum "dolore eu fugiat" nulla pariatur. Excepteur sint
                                                        occaecat cupidatat non proident.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-4">
                                <div class="widget widget-three">
                                    <div class="widget-heading mb-4">
                                        <h5 class="">Summary</h5>
                                    </div>
                                    <div class="widget-content">
                                        <div class="order-summary">
                                            <div class="summary-list">
                                                <div class="w-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                         class="feather feather-shopping-bag">
                                                        <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                                        <line x1="3" y1="6" x2="21" y2="6"></line>
                                                        <path d="M16 10a4 4 0 0 1-8 0"></path>
                                                    </svg>
                                                </div>
                                                <div class="w-summary-details">

                                                    <div class="w-summary-info">
                                                        <h6>Income</h6>
                                                        <p class="summary-count">$92,600</p>
                                                    </div>

                                                    <div class="w-summary-stats">
                                                        <div class="progress">
                                                            <div class="progress-bar bg-gradient-secondary"
                                                                 role="progressbar" style="width: 90%"
                                                                 aria-valuenow="90" aria-valuemin="0"
                                                                 aria-valuemax="100"></div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="summary-list">
                                                <div class="w-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                         class="feather feather-tag">
                                                        <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
                                                        <line x1="7" y1="7" x2="7" y2="7"></line>
                                                    </svg>
                                                </div>
                                                <div class="w-summary-details">

                                                    <div class="w-summary-info">
                                                        <h6>Profit</h6>
                                                        <p class="summary-count">$37,515</p>
                                                    </div>

                                                    <div class="w-summary-stats">
                                                        <div class="progress">
                                                            <div class="progress-bar bg-gradient-success"
                                                                 role="progressbar" style="width: 65%"
                                                                 aria-valuenow="65" aria-valuemin="0"
                                                                 aria-valuemax="100"></div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="summary-list">
                                                <div class="w-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                         class="feather feather-credit-card">
                                                        <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                                        <line x1="1" y1="10" x2="23" y2="10"></line>
                                                    </svg>
                                                </div>
                                                <div class="w-summary-details">

                                                    <div class="w-summary-info">
                                                        <h6>Expenses</h6>
                                                        <p class="summary-count">$55,085</p>
                                                    </div>

                                                    <div class="w-summary-stats">
                                                        <div class="progress">
                                                            <div class="progress-bar bg-gradient-warning"
                                                                 role="progressbar" style="width: 80%"
                                                                 aria-valuenow="80" aria-valuemin="0"
                                                                 aria-valuemax="100"></div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="widget widget-activity-four">

                                <div class="widget-heading">
                                    <h5 class="">Voter Activity</h5>
                                </div>

                                <div class="widget-content">

                                    <div class="mt-container mx-auto ps">
                                        <div class="timeline-line">

                                            <div class="item-timeline timeline-success">
                                                <div class="t-dot" data-original-title="" title="">
                                                </div>
                                                <div class="t-text">
                                                    <p><span>Updated</span> Server Logs</p>
                                                    <p class="t-time">Just Now</p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                        </div>
                                        <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                                        </div>
                                    </div>

                                    <div class="tm-action-btn">
                                        <button class="btn"><span>View All</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-arrow-right">
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                                <polyline points="12 5 19 12 12 19"></polyline>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-pane fade" id="v-pills-candidates" role="tabpanel"
                     aria-labelledby="v-pills-profile-tab">

                    <div class="row">
                        <div class="col-md-6 col-xl-4 mb-3">
                            <div class="widget widget-card-one">
                                <div class="widget-content">
                                    <div class="text-center">
                                        <div class="media justify-content-center mb-3">
                                            <div class="w-img">
                                                <img src="/assets/img/profile-19.jpeg" alt="avatar">
                                            </div>
                                        </div>
                                        <h6 class="mb-3">Jimmy Turner</h6>

                                        <p>"Duis aute irure dolor" in reprehenderit in voluptate velit esse cillum
                                            "dolore eu fugiat" nulla pariatur. Excepteur sint occaecat cupidatat non
                                            proident.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4 mb-3">
                            <div class="widget widget-card-one">
                                <div class="widget-content">
                                    <div class="text-center">
                                        <div class="media justify-content-center mb-3">
                                            <div class="w-img">
                                                <img src="/assets/img/profile-19.jpeg" alt="avatar">
                                            </div>
                                        </div>
                                        <h6 class="mb-3">Jimmy Turner</h6>

                                        <p>"Duis aute irure dolor" in reprehenderit in voluptate velit esse cillum
                                            "dolore eu fugiat" nulla pariatur. Excepteur sint occaecat cupidatat non
                                            proident.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4 mb-3">
                            <div class="widget widget-card-one">
                                <div class="widget-content">
                                    <div class="text-center">
                                        <div class="media justify-content-center mb-3">
                                            <div class="w-img">
                                                <img src="/assets/img/profile-19.jpeg" alt="avatar">
                                            </div>
                                        </div>
                                        <h6 class="mb-3">Jimmy Turner</h6>

                                        <p>"Duis aute irure dolor" in reprehenderit in voluptate velit esse cillum
                                            "dolore eu fugiat" nulla pariatur. Excepteur sint occaecat cupidatat non
                                            proident.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-voters" role="tabpanel">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h4>Voters</h4>
                                        </div>
                                        <div class="col-md-8 text-right">
                                            <a href="#" class="btn btn-primary">Add Voter</a>
                                            <a href="#" class="btn btn-secondary">Import</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <table class="table table-bordered mb-4">
                                        <thead>
                                        <tr>
                                            <th>Voter</th>
                                            <th>Voted</th>
                                            <th>Email</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Shaun Park</td>
                                            <td>
                                                <span class="fa fa-check text-success"></span>
                                                <span class="fa fa-times text-danger"></span>
                                            </td>
                                            <td>hope@gmail.com</td>
                                            <td class="text-center">
                                                <a href="#"><span class="fa fa-pencil-alt"></span></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <h4>Add Voter</h4>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control">
                                    </div>
                                    <div class="form-group text-right">
                                        <button class="btn btn-primary">Add Voter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-ballots" role="tabpanel"
                     aria-labelledby="v-pills-settings-tab">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-md-4">
                                    <h4>Voters</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-4">
                                    <thead>
                                    <tr>
                                        <th>Voter</th>
                                        <th>Date</th>
                                        <th>Candidate</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Shaun Park</td>
                                        <td>10/08/2020</td>
                                        <td>Lenya Hope</td>
                                        <td class="text-center">
                                            <a href="#"><span class="fa fa-eye"></span></a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer_script')

@endsection