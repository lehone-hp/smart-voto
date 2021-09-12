@extends('user.layouts.app')
@section('header-style')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/jquery-step/jquery.steps.css') }}">
    <style>
        #formValidate .wizard > .content {
            min-height: 25em;
        }

        #example-vertical.wizard > .content {
            min-height: 24.5em;
        }
    </style>
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
        @if($errors->any())
            <div class="col-md-4 col-lg-3 layout-spacing">
                <ul class="text-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="{{ $errors->any() ? 'col-md-8 col-lg-9' : 'col-md-12' }} layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">
                    <form id="create-form" enctype="multipart/form-data"
                          action="{{ route('polls.store') }}" method="POST">
                        @csrf

                        <div id="my-wizard" class="">

                            <h3>Basic Information</h3>
                            <section>
                                <div class="card card-body">
                                    <div class="form-group">
                                        <label>Name *</label>
                                        <input type="text"
                                               name="name"
                                               value="{{ old('name') }}"
                                               class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Description *</label>
                                        <textarea class="form-control"
                                                  name="description"
                                                  rows="5">{{ old('description') }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Cover Image </label>
                                        <input type="file" name="image" accept="image/*" class="form-control">
                                    </div>
                                </div>
                            </section>

                            <h3>Candidates</h3>
                            <section>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card card-body">
                                            <div class="form-group">
                                                <label>Candidate Name *</label>
                                                <input type="text" id="candidate_name"
                                                       class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Candidate Bio *</label>
                                                <textarea class="form-control"
                                                          id="candidate_bio"
                                                          rows="3"></textarea>
                                            </div>
                                            <div class="text-right">
                                                <button class="btn btn-primary"
                                                        type="button"
                                                        id="add_candidate_btn">Add Candidate
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card card-body">
                                            <h5 class="mb-3">Registered Candidates</h5>
                                            <table class="table">
                                                <tbody id="en_tbody">

                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <h3>Additional Settings</h3>
                            <section>
                                <div class="card card-body">
                                    <div class="form-group">
                                        <label>Start Date *</label>
                                        <input type="datetime-local"
                                               value="{{ old('start_date') }}"
                                               name="start_date" class="form-control">
                                        <small class="text-muted">When Poll Opens For Voting</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Close Date *</label>
                                        <input type="datetime-local"
                                               value="{{ old('end_date') }}"
                                               name="end_date" class="form-control">
                                        <small class="text-muted">When Poll Close For Voting</small>
                                    </div>

                                    <div class="form-group">
                                        <label>Max Votes *</label>
                                        <input type="number"
                                               name="max_vote"
                                               value="{{ old('max_vote', 1) }}"
                                               min="1"
                                               class="form-control">
                                        <small class="text-muted">Maximum number of candidates a voter can vote for
                                        </small>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_script')
    <script src="{{ asset('plugins/jquery-step/jquery.steps.min.js') }}"></script>
    <script>
        $(function () {
            $("#my-wizard").steps({
                headerTag: "h3",
                bodyTag: "section",
                transitionEffect: "slideLeft",
                autoFocus: true,
                cssClass: 'circle wizard',
                onFinished: function (event, currentIndex) {
                    $('#create-form').submit();
                }
            });

            $('#add_candidate_btn').on('click', function () {
                const new_name = $('#candidate_name').val();
                const bio = $('#candidate_bio').val();

                if (new_name && bio) {
                    $('#en_tbody').append(
                        '<tr>' +
                        '    <td>' + new_name + '' +
                        '    <input type="hidden" name="candidate_name[]" value="' + new_name + '">' +
                        '    <input type="hidden" name="candidate_bio[]" value="' + bio + '">' +
                        '    </td>' +
                        '    <td>' +
                        '        <button type="button" onclick="removeTr(this)" class="btn btn-danger remove_candidate">' +
                        '            <i class="fa fa-trash"></i>' +
                        '        </button>' +
                        '    </td>' +
                        '</tr>'
                    );
                }
                $('#candidate_name').val('');
                $('#candidate_bio').val('');
            });
        });

        function removeTr(button) {
            $(button).closest('tr').remove()
        }

    </script>
@endsection