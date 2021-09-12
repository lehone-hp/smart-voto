@extends('user.layouts.app')
@section('header-style')

@endsection

@section('content')
    <div class="page-header">
        <nav class="breadcrumb-one" aria-label="breadcrumb">
            <div class="title">
                <h3>My Polls</h3>
            </div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>My Polls</span></li>
            </ol>
        </nav>
    </div>

    <div class="widget-content searchable-container list">

        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-5 pb-3  col-sm-8 filtered-list-search layout-spacing align-self-center">
                <div class="form-inline my-2 my-lg-0">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-search">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                        <input type="text" class="form-control product-search" id="input-search"
                               placeholder="Search Contacts...">
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 pb-3 filtered-list-search layout-spacing align-self-center">
                <div class="form-inline my-2 my-lg-0">
                    <select class="form-control w-100">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
            </div>

            <div class="col-xl-6 col-lg-4 col-md-3 d-none d-md-flex pb-3 text-right align-self-center justify-content-end">
                <a href="#" class="btn btn-secondary">Add Poll</a>
            </div>
        </div>

        <div class="statbox widget box box-shadow border-0 rounded-lg">
            <div class="widget-content widget-content-area rounded-lg">
                <div class="table-responsive">
                    <table class="table table-bordered mb-4">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Start</th>
                            <th>End</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td class="text-primary">
                                <h6 class="mb-0">Shaun Park</h6>
                            </td>
                            <td class=""><span class=" shadow-none badge outline-badge-primary">Complete</span></td>
                            <td>johndoe@yahoo.com</td>
                            <td>5 min ago</td>
                            <td>
                                <a href="javascript:void(0);"
                                   class="btn btn-sm btn-secondary"
                                   data-toggle="tooltip" data-placement="top" title=""
                                   data-original-title="View">
                                    View
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
@endsection

@section('footer_script')

@endsection