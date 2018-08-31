@extends('scouting.voting.app-vodting')
@section('title', 'TokenStars Voting')
@section('content')
    <div class="container">
        <h2 class="h3_5 text-uppercase text-secondary mb-0 text-center">Voting List</h2>
        <div class="pt-5 pb-2">


            @foreach($vote_list as $vote)
                @php
                $talent = \App\Models\Scouting\PlayerTennis::where('id', $vote->talent_id)->first();
                @endphp
                @if(!empty($vote->soon))
                    <div class="list-item list-item_voting bg-white text-blue-darker mb-4 position-relative" data-hint="See the details">
                        <div class="list-item__primary-content">
                            <div class="list-item__image-wrap rounded">
                                <img class="list-item__image rounded" src="{{$talent->photo}}" alt="" width="86" height="86">
                            </div>
                            <div class="d-flex flex-column">
                                <h3 class="h4 mb-1 list-item__title"><a class="text-blue-darker fill-area-link" href="{{@route('scouting.player_card_view', $vote->talent_id)}}">Support: {{$talent->first_name}} {{$talent->last_name}}</a></h3>
                                <p class="mb-0 list-item__text typo-xl" style="overflow: hidden;">{{mb_strimwidth($vote->description, 0, 100, "...")}}</p>
                            </div>
                        </div>
                        <div class="list-item__secondary-content flex-row flex-nowrap align-items-center pl-4 text-secondary">
                            <div class="list-item__secondary-time d-flex flex-column pl-4">
                                <span class="typo-lg mb-0_5 text-uppercase text-status text-status-soon text-status-shift">Coming soon</span>
                                <span class="h4 mb-0">
                                    @php
                                        if(!empty($vote->soon))
                                        {
                                            $dt_end = new DateTime($vote->start_date);
                                            $remain = $dt_end->diff(new DateTime());
                                            echo $remain->d . 'd ' . $remain->h . 'h ' .$remain->m.'m' ;
                                        }
                                    @endphp
                                </span>
                            </div>
                            <div class="list-item__secondary-progress d-flex flex-column ml-5">
                                <span class="typo-lg mb-0_5 text-uppercase">Not started yet</span>
                                <div class="progress"></div>
                            </div>
                        </div>
                    </div>
                @else
                @php
                    if(!empty($vote->ended))
                    {
                        $count_yes = $vote->end_ace_yes;
                        $count_no = $vote->end_ace_no;
                    }
                    else
                    {
                        $count_yes = $vote->start_ace_yes;
                        $count_no = $vote->start_ace_no;
                    }

                    $total = $count_yes + $count_no;
                    if($total == 0)
                    {
                        $perc_yes = 0;
                        $perc_no = 0;
                    }
                    else
                    {
                        $perc_yes = number_format($count_yes / $total * 100, 1, '.','');
                        $perc_no = number_format($count_no / $total * 100, 1, '.','');
                    }
                @endphp
                <div class="list-item list-item_voting hoverable bg-white text-blue-darker mb-4 position-relative" data-hint="See the details">
                    <div class="list-item__primary-content">
                        <div class="list-item__image-wrap rounded">
                            <img class="list-item__image rounded" src="{{$talent->photo}}" alt="" width="86" height="86">
                        </div>
                        <div class="d-flex flex-column">
                            <h3 class="h4 mb-1 list-item__title"><a class="text-blue-darker fill-area-link" href="{{@route('scouting.player_card_view', $vote->talent_id)}}">Support: {{$talent->first_name}} {{$talent->last_name}}</a></h3>
                            <p class="mb-0 list-item__text typo-xl" style="overflow: hidden;">{{mb_strimwidth($vote->description, 0, 100, "...")}}</p>
                        </div>
                    </div>
                    <div class="list-item__secondary-content flex-row flex-nowrap align-items-center pl-4">
                        <div class="list-item__secondary-time d-flex flex-column pl-4">
                            <span class="typo-lg mb-0_5 text-uppercase text-status @if(!empty($vote->now)){{'text-status-progress'}}@elseif(!empty($vote->soon)){{'text-status-soon'}}@else{{'text-status-success'}}@endif text-status-shift">@if(!empty($vote->now)){{'In progress'}}@elseif(!empty($vote->soon)){{'Coming soon'}}@else{{'Finished'}}@endif </span>
                            <span class="h4 mb-0">
                                @php
                                    if(!empty($vote->now))
                                    {
                                        $dt_end = new DateTime($vote->end_date);
                                        $remain = $dt_end->diff(new DateTime());
                                        echo $remain->d . 'd ' . $remain->h . 'h ' .$remain->m.'m' ;
                                    }
                                @endphp
                                @if(!empty($vote->ended)){{@date('d.m.Y',strtotime($vote->end_date))}}@endif
                            </span>
                        </div>
                        @if(!empty(Auth::user()->id))
                            @php
                                $votetype = \App\Models\Scouting\ScoutVotingResults::where('svoting_id', $vote->id)->where('user_id', \Illuminate\Support\Facades\Auth::user()->id)->first();
                            @endphp
                        @endif
                        <div class="list-item__secondary-progress d-flex flex-column ml-5">
                            <span class="typo-lg mb-0_5 text-uppercase">
                                @if(!empty($vote->ended))
                                    {{'Final Result'}}
                                @else
                                    @if(!empty($votetype->result) && $votetype->result == 1){!! 'You voted: <span class="text-success font-weight-semibold">Yes</span>' !!}@elseif(!empty($votetype->result) && $votetype->result == 0){!! 'You voted: <span class="text-danger font-weight-semibold">No</span>' !!}@else{{'Current result'}}@endif
                                @endif
                            </span>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: {{$perc_yes}}%" aria-valuenow="{{$perc_yes}}" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar bg-danger" role="progressbar" style="width: {{$perc_no}}%" aria-valuenow="{{$perc_no}}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="row typo-sm text-uppercase mt-0_5">
                                <div class="col-6 font-weight-semibold">{{$perc_yes}}% -yes</div>
                                <div class="col-6 text-secondary text-right">{{$perc_no}}% -No</div>
                                @if(!empty($vote->ended))
                                    @if(!empty(Auth::user()->id))
                                        <div class="col-12 text-secondary mt-1">@if(isset($votetype->result) && $votetype->result == 1){{'You voted: Yes'}}@elseif(isset($votetype->result) && $votetype->result == 0){{'You voted: No'}}@else{{'You didn\'t take the vote'}}@endif</div>
                                    @else
                                        <div class="col-12 text-secondary mt-1">You didn't take the vote</div>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach

                <div class="list-item list-item_voting hoverable bg-white text-blue-darker mb-4 position-relative" data-hint="See the details">
                    <div class="list-item__primary-content">
                        <div class="list-item__image-wrap rounded">
                            <img class="list-item__image rounded" src="/images/_temp/1.png" alt="" width="86" height="86">
                        </div>
                        <div class="d-flex flex-column">
                            <h3 class="h4 mb-1 list-item__title"><a class="text-blue-darker fill-area-link" href="/votingarchive">Archive Voting Records</a></h3>
                            <p class="mb-0 list-item__text typo-xl"></p>
                        </div>
                    </div>
                </div>
        </div>
        <div class="section-divider"></div>
    </div>
@endsection
