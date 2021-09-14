@extends('layouts.app')

@section('content')
    <div class="poll-page py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <h1>{{ $poll->name }}</h1>
                        @if($poll->getStatus() == 'not_started')
                            <p>This poll will open for voting on <b>{{ $poll->start_date->format('d F Y, H:i a') }}</b>
                            </p>
                        @elseif($poll->getStatus() == 'on_going')
                            <p class="mb-0">You can cast your vote by selecting at most {{ $poll->max_vote }}. Voting
                                closes at <b>{{ $poll->end_date->format('d F Y, H:i a') }}</b></p>
                            <p>To Cast your vote, select your candidate(s) and submit.</p>
                        @elseif($poll->getStatus() == 'closed')
                            <p>This poll closed on {{ $poll->end_date->format('d F Y, H:i a') }}</p>
                        @endif
                    </div>

                    @if($poll->getStatus() == 'not_started')
                        <p class="text-muted pt-5"><strong>Candidates</strong></p>
                        <div class="row">
                            @foreach($poll->candidates as $candidate)
                                <div class="col-12 mb-3">
                                    <div class="widget widget-card-one">
                                        <div class="widget-content">
                                            <div class="d-flex align-items-start">
                                                <div class="media justify-content-center mb-3">
                                                    <div class="w-img"><img
                                                                src="{{ $candidate->profilePic() }}"
                                                                alt="avatar"></div>
                                                </div>
                                                <div class="pl-3">
                                                    <h6 class="mb-3">{{ $candidate->name }}</h6>
                                                    <p>{{ $candidate->description }}</p></div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @elseif($poll->getStatus() == 'on_going')
                        <ballot-component
                                poll_id="{{ $poll->id }}"
                                token="{{ $voter->token }}"
                                max_vote="{{ $poll->max_vote }}"></ballot-component>
                    @endif
                </div>
                <div class="col-md-4">

                    <div class="mb-3">
                        <candidate-summary-component
                                poll_id="{{ $poll->id }}"></candidate-summary-component>
                    </div>

                    <div class="card">
                        @if($poll->image)
                            <img src="{{ $poll->image->getUrl() }}" class="img-fluid">
                        @endif
                        <div class="card-body">
                            <div class="mb-4">
                                <p class="text-muted"><strong>Description</strong></p>
                                {!! $poll->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection