@extends('user.layouts.app')
@section('header-style')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/dropify/dropify.min.css') }}">
    <link href="{{ asset('assets/css/users/account-setting.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')

    <div class="page-header">
        <nav class="breadcrumb-one" aria-label="breadcrumb">
            <div class="title">
                <h3>Account Settings</h3>
            </div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">More</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="javascript:void(0);">Account Settings</a></li>
            </ol>
        </nav>


    </div>

    <div class="account-settings-container layout-top-spacing">

        <div class="account-content">
            <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                        <form id="general-info" class="section general-info">
                            <div class="info">
                                <h6 class="">General Information</h6>
                                <div class="row">
                                    <div class="col-lg-11 mx-auto">
                                        <div class="row">
                                            <div class="col-xl-2 col-lg-12 col-md-4">
                                                <div class="upload mt-4 pr-md-4">
                                                    <input type="file" id="input-file-max-fs" class="dropify"
                                                           data-default-file="{{ asset('assets/img/avatar.png') }}"
                                                           data-max-file-size="2M"/>
                                                    <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload
                                                        Picture</p>
                                                </div>
                                            </div>
                                            <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                <div class="form">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="fullName">Full Name</label>
                                                                <input type="text" class="form-control mb-4"
                                                                       id="fullName"
                                                                       placeholder="Full Name"
                                                                       value="">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label class="dob-input">Date of Birth</label>
                                                            <div class="d-sm-flex d-block">
                                                                <div class="form-group mr-1">
                                                                    <select class="form-control"
                                                                            id="exampleFormControlSelect1">
                                                                        <option>Day</option>
                                                                        <option>1</option>
                                                                        <option>2</option>
                                                                        <option>3</option>
                                                                        <option>4</option>
                                                                        <option>5</option>
                                                                        <option>6</option>
                                                                        <option>7</option>
                                                                        <option>8</option>
                                                                        <option>9</option>
                                                                        <option>10</option>
                                                                        <option>11</option>
                                                                        <option>12</option>
                                                                        <option>13</option>
                                                                        <option>14</option>
                                                                        <option>15</option>
                                                                        <option>16</option>
                                                                        <option>17</option>
                                                                        <option>18</option>
                                                                        <option>19</option>
                                                                        <option selected>20</option>
                                                                        <option>21</option>
                                                                        <option>22</option>
                                                                        <option>23</option>
                                                                        <option>24</option>
                                                                        <option>25</option>
                                                                        <option>26</option>
                                                                        <option>27</option>
                                                                        <option>28</option>
                                                                        <option>29</option>
                                                                        <option>30</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group mr-1">
                                                                    <select class="form-control" id="month">
                                                                        <option>Month</option>
                                                                        <option selected>Jan</option>
                                                                        <option>Feb</option>
                                                                        <option>Mar</option>
                                                                        <option>Apr</option>
                                                                        <option>May</option>
                                                                        <option>Jun</option>
                                                                        <option>Jul</option>
                                                                        <option>Aug</option>
                                                                        <option>Sep</option>
                                                                        <option>Oct</option>
                                                                        <option>Nov</option>
                                                                        <option>Dec</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group mr-1">
                                                                    <select class="form-control" id="year">
                                                                        <option>Year</option>
                                                                        <option>2018</option>
                                                                        <option>2017</option>
                                                                        <option>2016</option>
                                                                        <option>2015</option>
                                                                        <option>2014</option>
                                                                        <option>2013</option>
                                                                        <option>2012</option>
                                                                        <option>2011</option>
                                                                        <option>2010</option>
                                                                        <option>2009</option>
                                                                        <option>2008</option>
                                                                        <option>2007</option>
                                                                        <option>2006</option>
                                                                        <option>2005</option>
                                                                        <option>2004</option>
                                                                        <option>2003</option>
                                                                        <option>2002</option>
                                                                        <option>2001</option>
                                                                        <option>2000</option>
                                                                        <option>1999</option>
                                                                        <option>1998</option>
                                                                        <option>1997</option>
                                                                        <option>1996</option>
                                                                        <option>1995</option>
                                                                        <option>1994</option>
                                                                        <option>1993</option>
                                                                        <option>1992</option>
                                                                        <option>1991</option>
                                                                        <option>1990</option>
                                                                        <option selected>1989</option>
                                                                        <option>1988</option>
                                                                        <option>1987</option>
                                                                        <option>1986</option>
                                                                        <option>1985</option>
                                                                        <option>1984</option>
                                                                        <option>1983</option>
                                                                        <option>1982</option>
                                                                        <option>1981</option>
                                                                        <option>1980</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="profession">Email</label>
                                                        <input type="text" class="form-control mb-4" id="profession"
                                                               placeholder="" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                        <form id="about" class="section about">
                            <div class="info">
                                <h5 class="">About</h5>
                                <div class="row">
                                    <div class="col-md-11 mx-auto">
                                        <div class="form-group">
                                            <label for="aboutBio">Bio</label>
                                            <textarea class="form-control"
                                                      rows="10"
                                                      id="aboutBio"
                                                      placeholder=""></textarea></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="text-right mb-4">
            <button id="multiple-messages" class="btn btn-success">Save Changes</button>
        </div>
    </div>

@endsection

@section('footer_script')
    <script src="{{ asset('plugins/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('plugins/blockui/jquery.blockUI.min.js') }}"></script>
    <script src="{{ asset('assets/js/users/account-settings.js') }}"></script>
@endsection