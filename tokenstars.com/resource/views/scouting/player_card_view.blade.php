@extends('scouting.app-card')

@section('content')
    <style>
        .list-base > li::before {
            position: unset;
        }
    </style>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb text-uppercase mb-4">
            <li class="breadcrumb-item"><a href="#">Platform</a></li>
            <li class="breadcrumb-item"><a href="{{route('scouting.index')}}">Scouting</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$player->first_name}} {{$player->last_name}}
                (ID: {{$player->id}})
            </li>
        </ol>
    </nav>
    <div class="d-flex flex-nowrap mb-4">
        <h1 class="h3_25 text-blue-darker text-uppercase mb-0">Player Card</h1>
        <div class="align-self-end ml-auto">
            <div class="h4 mb-0 font-weight-normal">
                @if(!empty(Auth::user()->id) && Auth::user()->role == 'admin')
                    <a href="{{route('scouting.admin.players.id', $player->id)}}">
                        Edit player
                    </a>
                @endif
            </div>
        </div>
    </div>

    <article class="card player-card">
        <header class="player-card-header position-relative">
            <div>
                <div class="player-card__image-wrapper d-inline-block position-relative">
                    <img width="402" height="450" class="player-card__image" src="{{$player->photo}}" alt="">
                </div>
            </div>
            <div class="card-img-overlay py-5 pr-5_5 player-card__content">
                <div class="d-flex flex-nowrap">
                    <h2 class="card-title text-uppercase d-flex flex-column mb-0 text-blue-darker player-card__title text-truncate">
                        <span @if (mb_strlen($player->first_name) >= 9) class="short_name_view" @endif >{{mb_strimwidth($player->first_name,0, 15,'...')}}</span>
                        <span @if (mb_strlen($player->last_name) >= 20) class="short_name_view" @endif>{{mb_strimwidth($player->last_name,0, 30,'...')}}</span>
                        <small class="h4 mb-0 font-weight-normal player-card__sub-title pt-1">@if($player->is_pro){{'PRO STAR'}}@elseif($player->sport_type == 2){{'Poker player'}}@else{{'Junior'}}@endif</small>
                    </h2>
                    <div class="mt-5_5 ml-auto">
                        <div class="icon-group-md">
                            @if(!empty($player->fb_link))
                                <a class="icon icon-md icon-facebook my-2 ml-3 text-primary-50 hoverable'"
                                   href="{{$player->fb_link}}" target="_blank">
                                    <svg viewBox="0 0 1 1">
                                        <use xlink:href="/images/icons.svg#facebook"></use>
                                    </svg>
                                </a>
                            @endif

                            @if(!empty($player->ins_link))
                                <a class="icon icon-md icon-instagram my-2 ml-3 text-primary-50 hoverable'"
                                   href="{{$player->ins_link}}" target="_blank">
                                    <svg viewBox="0 0 1 1">
                                        <use xlink:href="/images/icons.svg#instagram"></use>
                                    </svg>
                                </a>
                            @endif

                            @if(!empty($player->tw_link))
                                <a class="icon icon-md icon-twitter my-2 ml-3 text-primary-50 hoverable'"
                                   href="{{$player->tw_link}}" target="_blank">
                                    <svg viewBox="0 0 1 1">
                                        <use xlink:href="/images/icons.svg#twitter"></use>
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row player-card-header-items pt-4 pb-1">
                    <div class="col-4 player-card-header-item mb-2">
                        <div class="title text-uppercase text-secondary">Age</div>
                        <div class="content text-blue-darker h5 mb-0 font-weight-semibold d-flex flex-column">
                            <span>{{$player->age}}</span>
                        </div>
                    </div>
                    @if($player->sport_type == 2)
                        <div class="col-4 player-card-header-item mb-2">
                            <div class="title text-uppercase text-secondary">Average ROI</div>
                            <div class="content text-blue-darker h5 mb-0 font-weight-semibold d-flex flex-column">
                                <span>{{$player->poker_average_roi}}%</span>
                            </div>
                        </div>
                    @endif
                    @if($player->sport_type == 1 || $player->sport_type == 3)
                        <div class="col-4 player-card-header-item mb-2">
                            <div class="title text-uppercase text-secondary">Weight</div>
                            <div class="content text-blue-darker h5 mb-0 font-weight-semibold d-flex flex-column">
                                <span>{{$player->weight}}KG</span>
                            </div>
                        </div>
                        <div class="col-4 player-card-header-item mb-2">
                            <div class="title text-uppercase text-secondary">Height</div>
                            <div class="content text-blue-darker h5 mb-0 font-weight-semibold d-flex flex-column">
                                <span>{{$player->height}}CM</span>
                            </div>
                        </div>
                    @endif
                    <div class="w-100"></div>
                    <div class="col-4 player-card-header-item mb-2">
                        @if($player->sport_type == 1 || $player->sport_type == 2)
                            <div class="title text-uppercase text-secondary">Residence</div>
                            <div class="content text-blue-darker h5 mb-0 font-weight-semibold d-flex flex-column">
                                <span>{{$player->city}},</span>
                                <span>{{$player->country->name}}</span>
                            </div>
                        @endif
                        @if($player->sport_type == 3)
                            <div class="title text-uppercase text-secondary">Nationality</div>
                            <div class="content text-blue-darker h5 mb-0 font-weight-semibold d-flex flex-column">
                                <span>{{$player->nationality_name->name}}</span>
                            </div>
                        @endif
                    </div>
                    @if($player->sport_type == 1)
                        <div class="col-4 player-card-header-item mb-2">
                            <div class="title text-uppercase text-secondary">{{$player->rank}} Ranking</div>
                            <div class="content text-blue-darker h5 mb-0 font-weight-semibold d-flex flex-column">
                                <span>{{$player->itf_current_combined}}</span>
                            </div>
                        </div>
                    @endif
                    @if($player->sport_type == 3)
                        <div class="col-4 player-card-header-item mb-2">
                            <div class="title text-uppercase text-secondary">Club</div>
                            <div class="content text-blue-darker h5 mb-0 font-weight-semibold d-flex flex-column">
                                <span>@if(!empty($player->football_club_name)){{$player->football_club_name}}@endif</span>
                            </div>
                        </div>
                    @endif
                    @if(($player->sport_type == 1 || $player->sport_type == 2) && !$player->is_pro)
                        <div class="col-4 player-card-header-item mb-2">
                            <div class="title text-uppercase text-secondary">Scout</div>
                            <div class="content text-blue-darker h5 mb-0 font-weight-semibold d-flex flex-column">
                                <span>@if(!empty($player->scout->RUser->first_name) && $player->scout->RUser->last_name) {{$player->scout->RUser->first_name}} {{$player->scout->RUser->last_name}} @else
                                        ID: {{$player->scout_id}} @endif</span>
                            </div>
                        </div>
                    @endif
                    @if($player->sport_type == 3)
                        <div class="col-4 player-card-header-item mb-2">
                            <div class="title text-uppercase text-secondary">Position</div>
                            <div class="content text-blue-darker h5 mb-0 font-weight-semibold d-flex flex-column">
                                <span>@if(!empty($player->football_position)){{$player->football_position}}@endif</span>
                            </div>
                        </div>
                    @endif
                </div>
                <hr class="mt-0 mb-3">
                @if($player->status == 8)
                    <div class="row no-gutters align-items-center">
                        <div class="col-6">
                            <div class="player-card-header-voting d-inline-block text-center">
                                @if(!empty($voteModel->end_date))
                                    <div class="h3_5 mb-2 player-card-header-voting-time text-truncate font-weight-semibold text-blue-darker">
                                        @php
                                            $dt_end = new DateTime($voteModel->end_date);
                                            $remain = $dt_end->diff(new DateTime());
                                            echo $remain->d . 'd ' . $remain->h . 'h ' .$remain->m.'m' ;
                                        @endphp

                                        @php
                                            if(!empty($voteModel->ended))
                                            {
                                                switch ($player->sport_type) {
                                                    case 1:
                                                        $count_yes = $voteModel->end_ace_yes;
                                                        $count_no = $voteModel->end_ace_no;
                                                        break;
                                                    case 2:
                                                        $count_yes = $voteModel->end_team_yes;
                                                        $count_no = $voteModel->end_team_no;
                                                        break;
                                                }
                                            }
                                            else
                                            {
                                                switch ($player->sport_type) {
                                                    case 1:
                                                        $count_yes = $voteModel->start_ace_yes;
                                                        $count_no = $voteModel->start_ace_no;
                                                        break;
                                                    case 2:
                                                        $count_yes = $voteModel->start_team_yes;
                                                        $count_no = $voteModel->start_team_no;
                                                        break;
                                                }
                                            }

                                            $total = $count_yes + $count_no;
                                            if($total == 0)
                                            {
                                                $perc_yes = 0;
                                                $perc_no = 0;
                                            }
                                            else
                                            {
                                                $perc_yes = number_format($count_yes / $total * 100, 2, '.','');
                                                $perc_no = number_format($count_no / $total * 100, 2, '.','');
                                            }
                                        @endphp
                                    </div>
                                @endif
                                <div class="badge badge-status badge-lg text-uppercase text-nowrap player-card-header-voting-status">
                                    <div class="icon badge-icon icon-check mr-1 text-success">
                                        <svg viewBox="0 0 1 1">
                                            <use xlink:href="/images/icons.svg#check"></use>
                                        </svg>
                                    </div>
                                    {{$statuses[$player->status]}}
                                </div>
                            </div>
                        </div>
                        @if(!empty(Auth::user()->id))
                            @php
                                $votetype = \App\Models\Scouting\ScoutVotingResults::where('svoting_id', $voteModel->id)->where('user_id', \Illuminate\Support\Facades\Auth::user()->id)->first();
                                $wallet = \App\Models\Wallet::where('user_id', \Illuminate\Support\Facades\Auth::user()->id)->where('verifiable', 1)->first();
                            @endphp
                        @endif
                        <div class="col-6">
                            <div class="row no-gutters" id="vote_buttons">
                                @if(empty(Auth::user()->id))
                                    <div class="col-12">
                                        <button class="btn btn-outline-success text-uppercase btn-block font-weight-bold opacity-1"
                                                disabled>
                                <span class="icon icon-like icon-sm mr-1">
                                <svg viewBox="0 0 1 1"><use xlink:href=\'/images/icons.svg#like\'></use></svg>
                                </span>
                                            Please Sign in to vote
                                        </button>

                                    </div>
                                @endif
                                @if(!empty(Auth::user()->id) && count($wallet) == 0)
                                    <div class="col-12">
                                        <button class="btn btn-outline-danger text-uppercase btn-block font-weight-bold opacity-1"
                                                disabled>
                                <span class="icon icon-like icon-sm mr-1">
                                <svg viewBox="0 0 1 1"><use xlink:href=\'/images/icons.svg#like\'></use></svg>
                                </span>
                                            Please verify your wallet
                                        </button>

                                    </div>
                                @else
                                    @if(!empty(Auth::user()->id) && !isset($votetype->result))
                                        <div class="col-6 pr-1">
                                            <button class="btn btn-outline-primary text-uppercase btn-block font-weight-bold"
                                                    id="like">
              <span class="icon icon-like icon-sm_25 mr-1">
                <svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#like"></use></svg>
              </span>
                                                Support
                                            </button>
                                        </div>
                                        <div class="col-6 pl-1">
                                            <button class="btn btn-outline-primary text-uppercase btn-block font-weight-bold"
                                                    id="dislike">
              <span class="icon icon-dislike icon-sm mr-1">
                <svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#dislike"></use></svg>
              </span>
                                                Decline
                                            </button>
                                        </div>
                                    @elseif(!empty(Auth::user()->id) && isset($votetype->result) && $votetype->result == 1)
                                        <div class="col-12">
                                            <button class="btn btn-outline-success text-uppercase btn-block font-weight-bold opacity-1"
                                                    disabled>
                                    <span class="icon icon-like icon-sm mr-1">
                                      <svg viewBox="0 0 1 1"><use xlink:href='/images/icons.svg#like'></use></svg>
                                    </span>
                                                You supported
                                            </button>
                                        </div>
                                    @elseif(!empty(Auth::user()->id) && isset($votetype->result) && $votetype->result == 0)
                                        <div class="col-12">
                                            <button class="btn btn-outline-danger text-uppercase btn-block font-weight-bold opacity-1"
                                                    disabled>
                                <span class="icon icon-like icon-sm mr-1">
                                  <svg viewBox="0 0 1 1"><use xlink:href='/images/icons.svg#dislike'></use></svg>
                                </span>
                                                You declined
                                            </button>
                                        </div>
                                    @endif
                                @endif
                            </div>
                            <div class="progress mt-2">
                                <div id="yes_label" class="progress-bar bg-success" role="progressbar"
                                     style="width: {{$perc_yes}}%" aria-valuenow="{{$perc_yes}}" aria-valuemin="0"
                                     aria-valuemax="100"></div>
                                <div id="no_label" class="progress-bar bg-danger" role="progressbar"
                                     style="width: {{$perc_no}}%" aria-valuenow="{{$perc_no}}" aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="badge badge-status badge-lg text-uppercase text-nowrap player-card-header-voting-status">
                        <div class="icon badge-icon icon-check mr-1 text-success">
                            <svg viewBox="0 0 1 1">
                                <use xlink:href='/images/icons.svg#{{$status_class}}'></use>
                            </svg>
                        </div>
                        {{$statuses[$player->status]}}
                        @if($player->status == 7 && !empty($voteModel->start_date)){{date('d-m-Y',strtotime($voteModel->start_date))}}@endif
                    </div>
                @endif
            </div>
            @if($player->sport_type == 1)
                <div class="badge badge-token badge-xl badge-token-ace text-uppercase position-absolute text-nowrap player-card__token">
                    Ace
                </div>
            @else
                <div class="badge badge-token badge-xl badge-token-team text-uppercase position-absolute text-nowrap player-card__token">
                    Team
                </div>
            @endif
        </header>
        <script type="text/javascript">
            $(document).ready(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var vote = true;
                $('#like, #dislike').on('click', function (e) {

                    e.preventDefault();
                    var action = $(this).attr('id');
                    if (vote) {
                        vote = false
                        $.ajax({
                            url: '{{@route('scouting.ajax_vote')}}',
                            type: "POST",
                            data: {talent_id: '{{$player->id}}', action: action},
                            success: function (response) {
                                json = JSON.parse(response.trim());
                                console.log(json);
                                if (json.status == 'ok') {

                                    $('#yes_label').attr('aria-valuenow', json.width_yes).css('width', json.width_yes + '%');
                                    $('#no_label').attr('aria-valuenow', json.width_no).css('width', json.width_no + '%');
                                    if (action == 'dislike') {
                                        $('#vote_buttons').html('<div class="col-12">\n' +
                                            '                                        <button class="btn btn-outline-danger text-uppercase btn-block font-weight-bold opacity-1" disabled>\n' +
                                            '                                <span class="icon icon-like icon-sm mr-1">\n' +
                                            '                                  <svg viewBox="0 0 1 1"><use xlink:href=\'/images/icons.svg#dislike\'></use></svg>\n' +
                                            '                                </span>\n' +
                                            '                                            You declined\n' +
                                            '                                        </button>\n' +
                                            '                                    </div>');
                                    } else {
                                        $('#vote_buttons').html('<div class="col-12">\n' +
                                            '                                  <button class="btn btn-outline-success text-uppercase btn-block font-weight-bold opacity-1" disabled>\n' +
                                            '                                    <span class="icon icon-like icon-sm mr-1">\n' +
                                            '                                      <svg viewBox="0 0 1 1"><use xlink:href=\'/images/icons.svg#like\'></use></svg>\n' +
                                            '                                    </span>\n' +
                                            '                                    You supported\n' +
                                            '                                  </button>\n' +
                                            '                                </div>');
                                    }

                                } else {
                                }
                            }
                        });
                    }
                    return false;
                })
            });
        </script>
        <div class="nav nav-pills nav-justified navigation flex-nowrap bg-white">
            <a class="nav-item nav-link text-uppercase text-truncate rounded-0 @if($activeTab == 'overview-tab') active @endif" data-toggle="pill"
               href="#overview-tab">Overview</a>
            <a class="nav-item nav-link text-uppercase text-truncate rounded-0 @if($activeTab == 'bio-tab') active @endif" data-toggle="pill"
               href="#bio-tab">Bio</a>
            <a class="nav-item nav-link text-uppercase text-truncate rounded-0 @if($activeTab == 'skills-tab') active @endif" data-toggle="pill" href="#skills-tab">Skills</a>
            <a class="nav-item nav-link text-uppercase text-truncate rounded-0 @if($activeTab == 'stats-tab') active @endif" data-toggle="pill" href="#stats-tab">Stats</a>
            @if(count($player->bountyTasks) > 0)
                <a class="nav-item nav-link text-uppercase text-truncate rounded-0 @if($activeTab == 'promotion-tab') active @endif" data-toggle="pill"
                   href="#promotion-tab">Bounty&Promo</a>
            @endif

            @php
                $countServicesProducts = 0;
            @endphp
            <!--<a class="nav-item nav-link text-uppercase text-truncate rounded-0 disabled" data-toggle="pill" href="#fan-tab">Fan Club<br/>(Soon)</a>-->
            @if(\App\Models\ServiceProduct\ServicesProducts::where('player_tennis_id', $player->id)->where(function ($query) {$query->where('status', 1)->orWhere('status',2);})->count() > 0)
                @php
                    $countServicesProducts = 1;
                @endphp
                <a class="nav-item nav-link text-uppercase text-truncate rounded-0 @if($activeTab == 'fan-tab') active @endif" data-toggle="pill" href="#fan-tab">Fan Club</a>
            @endif

            @if(!empty(Auth::user()->id) && Auth::user()->role == 'admin')

                <a class="nav-item nav-link text-uppercase text-truncate rounded-0 @if($activeTab == 'admin-tab') active @endif" data-toggle="pill"
                   href="#admin-tab">Admin</a>
            @endif
        </div>

        <div class="tab-content">
            <div class="tab-pane px-5 py-5_5 @if($activeTab == 'overview-tab') show active @endif" id="overview-tab">
                <h4 class="text-uppercase mb-4 font-weight-semibold text-blue-darker">Overall Statistics</h4>
                @if($player->sport_type == 1)
                    <table class="table table-bordered table-stat">
                        <colgroup>
                            <col width="140">
                            <col width="130">
                            <col width="110">
                            <col width="100">
                            <col width="150">
                            <col width="40">
                        </colgroup>
                        <thead class="thead-light">
                        <tr>
                            <th class="font-weight-semibold text-uppercase" scope="col">year</th>
                            <th class="font-weight-semibold text-uppercase" scope="col">win-loss</th>
                            <th class="font-weight-semibold text-uppercase" scope="col">games</th>
                            <th class="font-weight-semibold text-uppercase" scope="col">rank</th>
                            <th class="font-weight-semibold text-uppercase" scope="col">tournaments</th>
                            <th class="font-weight-semibold text-uppercase" scope="col">titles</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>2018</td>
                            <td>{{$player->win_loss_cys}}</td>
                            <td>{{array_sum(explode('-', $player->win_loss_cys))}}</td>
                            <td>{{$player->itf_current_combined}}</td>
                            <td>@if(!empty($player->tournaments_cys)){{$player->tournaments_cys}}@else{{'-'}}@endif</td>
                            <td>@if(!empty($player->titles_cys)){{$player->titles_cys}}@else{{'-'}}@endif</td>
                        </tr>
                        <tr>
                            <td>All time</td>
                            <td>{{$player->win_loss_at}}</td>
                            <td>{{array_sum(explode('-', $player->win_loss_at))}}</td>
                            <td>{{$player->itf_career_hight_combined}}</td>
                            <td>@if(!empty($player->tournaments_at)){{$player->tournaments_at}}@else{{'-'}}@endif</td>
                            <td>@if(!empty($player->titles_at)){{$player->titles_at}}@else{{'-'}}@endif</td>
                        </tr>
                        </tbody>
                    </table>
                @elseif($player->sport_type == 2)
                    <table class="table table-bordered table-stat text-blue-darker">
                        <colgroup>
                            <col width="120">
                            <col width="170">
                            <col width="165">
                            <col width="190">
                            <col width="155">
                            <col width="145">
                        </colgroup>
                        <thead class="thead-light">
                        <tr>
                            <th class="font-weight-semibold text-uppercase" scope="col">Year</th>
                            <th class="font-weight-semibold text-uppercase" scope="col">Tournaments</th>
                            <th class="font-weight-semibold text-uppercase" scope="col">Average profit</th>
                            <th class="font-weight-semibold text-uppercase" scope="col">Average Stake</th>
                            <th class="font-weight-semibold text-uppercase" scope="col">ROI</th>
                            <th class="font-weight-semibold text-uppercase" scope="col">Profit</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{$player->poker_overall_year}}</td>
                            <td>{{$player->poker_tournaments_played_year}}</td>
                            <td>{{$player->poker_average_profit_year}}</td>
                            <td>{{$player->poker_average_stake_year}}</td>
                            <td>{{$player->poker_average_roi_year}}%</td>
                            <td>{{$player->poker_profit_year}}</td>
                        </tr>
                        <tr>
                            <td>All time</td>
                            <td>{{$player->poker_tournaments_played}}</td>
                            <td>{{$player->poker_average_profit}}</td>
                            <td>{{$player->poker_average_stake}}</td>
                            <td>{{$player->poker_average_roi}}%</td>
                            <td>{{$player->poker_profit}}</td>
                        </tr>
                        </tbody>
                    </table>
                @elseif($player->sport_type == 3)
                    <table class="table table-bordered table-stat">
                        <colgroup>
                            <col width="140">
                            <col width="140">
                            <col width="140">
                            <col width="50">
                            <col width="50">
                            <col width="100">
                            <col width="100">
                        </colgroup>
                        <thead class="thead-light">
                        <tr>
                            <th class="font-weight-semibold text-uppercase" scope="col">season</th>
                            <th class="font-weight-semibold text-uppercase" scope="col">appearences</th>
                            <th class="font-weight-semibold text-uppercase" scope="col">goals</th>
                            <th class="font-weight-semibold text-uppercase" scope="col">passes</th>
                            <th class="font-weight-semibold text-uppercase" scope="col">yellow cards</th>
                            <th class="font-weight-semibold text-uppercase" scope="col">red crads</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Current</td>
                            <td>@if(!empty($player->football_appearences_cyc)){{$player->football_appearences_cyc}}@else{{'-'}}@endif</td>
                            <td>@if(!empty($player->football_goals_cys)){{$player->football_goals_cys}}@else{{'-'}}@endif</td>
                            <td>@if(!empty($player->football_passes_cys)){{$player->football_passes_cys}}@else{{'-'}}@endif</td>
                            <td>@if(!empty($player->football_yellow_cards_cys)){{$player->football_yellow_cards_cys}}@else{{'-'}}@endif</td>
                            <td>@if(!empty($player->football_red_cards_cys)){{$player->football_red_cards_cys}}@else{{'-'}}@endif</td>
                        </tr>
                        <tr>
                            <td>All time</td>
                            <td>@if(!empty($player->football_appearences_at)){{$player->football_appearences_at}}@else{{'-'}}@endif</td>
                            <td>@if(!empty($player->football_goals_at)){{$player->football_goals_at}}@else{{'-'}}@endif</td>
                            <td>@if(!empty($player->football_passes_at)){{$player->football_passes_at}}@else{{'-'}}@endif</td>
                            <td>@if(!empty($player->football_yellow_cards_at)){{$player->football_yellow_cards_at}}@else{{'-'}}@endif</td>
                            <td>@if(!empty($player->football_red_cards_at)){{$player->football_red_cards_at}}@else{{'-'}}@endif</td>
                        </tr>
                        </tbody>
                    </table>
                @endif
                <div class="section-divider-2"></div>
                @php
                    $latest_match = \App\Models\Scouting\LatestMatch::where('player_tennis_id', $player->id)->first();
                @endphp
                @if(!empty($latest_match->id))
                    <h4 class="text-uppercase mb-4 font-weight-semibold  text-blue-darker">Latest match</h4>
                    <div class="row align-items-center justify-content-center flex-nowrap match-card-row mb-5_5">
                        <div class="col-3 match-card-col-player order-1 text-uppercase text-right text-blue-darker">
                            <div class="media match-card-player text-right position-relative">
                                <div class="media-body text-truncate align-self-center">
                                    <h5 class="match-card-player-title mb-0 d-flex flex-column">
                                        <span>{{$latest_match->name_left}}</span><span>{{$latest_match->last_name_left}}</span>
                                    </h5>
                                    <div class="player-card-header-subtitle h6 font-weight-normal mt-1 mb-0">{{$latest_match->country_left}}</div>
                                </div>
                                <div class="position-relative ml-3 d-inline-block">
                                    @if($latest_match->winner_left == 1)
                                        <span class="icon icon-stat icon-md position-absolute match-card-player-icon">
                                  <svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#star"></use></svg>
                                </span>
                                    @endif
                                    @if($latest_match->avatar_left != '')
                                        <img class="match-card-player-avatar" src="{{$latest_match->avatar_left}}"
                                             alt="" width="80" height="80">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-3 match-card-col-player text-uppercase order-3">
                            <div class="media match-card-player text-left position-relative text-blue-darker">
                                <div class="position-relative mr-3 d-inline-block">
                                    @if($latest_match->winner_right == 1)
                                        <span class="icon icon-stat icon-md position-absolute match-card-player-icon">
                                  <svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#star"></use></svg>
                                </span>
                                    @endif
                                    @if($latest_match->avatar_right != '')
                                        <img class="match-card-player-avatar" src="{{$latest_match->avatar_right}}"
                                             alt="" width="80" height="80">
                                    @endif
                                </div>
                                <div class="media-body text-truncate align-self-center">
                                    <h5 class="match-card-player-title mb-0 d-flex flex-column">
                                        <span>{{$latest_match->name_right}}</span>{{$latest_match->last_name_right}}
                                    </h5>
                                    <div class="player-card-header-subtitle h6 font-weight-normal mt-1 mb-0">{{$latest_match->country_right}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto d-flex flex-column match-card-col-score order-2 mx-5 text-blue-darker">
                            <h5 class="font-weight-normal text-uppercase border-left py-3 px-5 border-right text-center mb-0">
                                Scores</h5>
                            <div class="h4 d-flex flex-nowrap justify-content-between py-3 px-3 border-left border-right border-top mb-0 text-nowrap">
                                @php
                                    $scores = explode('|',trim($latest_match->scores));
                                @endphp
                                @if(!empty($scores[0]))
                                    <span class="d-inline-block px-3">
                                @php
                                    if(!empty($scores[0]))
                                    {
                                        $scores0 = explode('-',$scores[0]);
                                        if(!empty($scores0[0]))
                                            $scores0_sup1 = explode('/', $scores0[0]);

                                        if(!empty($scores0[1]))
                                         $scores0_sup2 = explode('/', $scores0[1]);
                                    }
                                @endphp
                                <span>@if(!empty($scores0_sup1[0])){{$scores0_sup1[0]}}@else{{0}}@endif</span>
                                @if(!empty($scores0_sup1[1]))
                                            <sup class="match-card-score-sup">{{$scores0_sup1[1]}}</sup>
                                        @endif
                                <span>-</span>
                                <span>@if(!empty($scores0_sup2[0])){{$scores0_sup2[0]}}@else{{0}}@endif</span>
                                @if(!empty($scores0_sup2[1]))
                                            <sup class="match-card-score-sup">{{$scores0_sup2[1]}}</sup>
                                        @endif
                            </span>
                                @endif
                                @if(!empty($scores[1]))
                                    <span class="d-inline-block px-3">
                                 @php
                                     if(!empty($scores[1]))
                                     {
                                         $scores0 = explode('-',$scores[1]);
                                         if(!empty($scores0[0]))
                                             $scores0_sup1 = explode('/', $scores0[0]);

                                         if(!empty($scores0[1]))
                                          $scores0_sup2 = explode('/', $scores0[1]);
                                     }
                                 @endphp
                                <span>@if(!empty($scores0_sup1[0])){{$scores0_sup1[0]}}@else{{0}}@endif</span>
                                @if(!empty($scores0_sup1[1]))
                                            <sup class="match-card-score-sup">{{$scores0_sup1[1]}}</sup>
                                        @endif
                                <span>-</span>
                                <span>@if(!empty($scores0_sup2[0])){{$scores0_sup2[0]}}@else{{0}}@endif</span>
                                @if(!empty($scores0_sup2[1]))
                                            <sup class="match-card-score-sup">{{$scores0_sup2[1]}}</sup>
                                        @endif
                            </span>
                                @endif
                                @if(!empty($scores[2]))
                                    <span class="d-inline-block px-3">
                                 @php
                                     if(!empty($scores[2]))
                                     {
                                         $scores0 = explode('-',$scores[2]);
                                         if(!empty($scores0[0]))
                                             $scores0_sup1 = explode('/', $scores0[0]);

                                         if(!empty($scores0[1]))
                                          $scores0_sup2 = explode('/', $scores0[1]);
                                     }
                                 @endphp
                                <span>@if(!empty($scores0_sup1[0])){{$scores0_sup1[0]}}@else{{0}}@endif</span>
                                @if(!empty($scores0_sup1[1]))
                                            <sup class="match-card-score-sup">{{$scores0_sup1[1]}}</sup>
                                        @endif
                                <span>-</span>
                                <span>@if(!empty($scores0_sup2[0])){{$scores0_sup2[0]}}@else{{0}}@endif</span>
                                @if(!empty($scores0_sup2[1]))
                                            <sup class="match-card-score-sup">{{$scores0_sup2[1]}}</sup>
                                        @endif
                            </span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif

                <div class="section-divider-2"></div>
                @if(!empty(\App\Models\Scouting\LatestNews::where('player_tennis_id', $player->id)->first()))
                    <div class="dotdotdot dotdotdot_news-list" data-module="dotdotdot" data-ellipsis=""
                         data-height="130">
                        @php
                            $newsl = \App\Models\Scouting\LatestNews::where('player_tennis_id', $player->id)->get();
                        @endphp
                        <h4 class="text-uppercase mb-0 font-weight-semibold text-blue-darker">Latest News
                            <small class="typo-lg ml-4"><a class="js-toggle dotdotdot__toggle dotdotdot__toggle_show"
                                                           href="">@if(count($newsl) > 3)<span>Show more &gt;</span>
                                    <span>Hide</span>@endif</a></small>
                        </h4>
                        <ul class="list-unstyled list-base list-base-blue-darker typo-lg py-2 mb-0 dotdotdot__text">
                            @foreach($newsl as $news)
                                <li class="my-2">{{$news->description}} <a href="{{$news->url}}">more...</a>.</li>
                            @endforeach
                        </ul>
                        <div class="text-center mt-4 mb-5_5">
                            <button class="btn btn-outline-primary text-uppercase px-4 js-toggle dotdotdot__toggle dotdotdot__toggle_hide">
                                <span>Show More</span>
                                <span>Hide</span>
                            </button>
                        </div>
                    </div>

                @endif


                <div class="section-divider-2"></div>
                @if(!empty(\App\Models\Scouting\PlayerHistory::where('player_id', $player->id)->orderBy('date', 'DESC')->first()))
                    <div class="dotdotdot dotdotdot_news-list" data-module="dotdotdot" data-ellipsis=""
                         data-height="130">
                        @php
                            $hist = \App\Models\Scouting\PlayerHistory::where('player_id', $player->id)->orderBy('date', 'DESC')->get();
                        @endphp
                        <h4 class="text-uppercase mb-0 font-weight-semibold text-blue-darker">Activity on the platform
                            <small class="typo-lg ml-4"><a class="js-toggle dotdotdot__toggle dotdotdot__toggle_show"
                                                           href="">@if(count($hist) > 3)<span>Show more &gt;</span>
                                    <span>Hide</span>@endif</a></small>
                        </h4>
                        <ul class="list-unstyled list-base list-base-blue-darker typo-lg py-2 mb-0 dotdotdot__text">
                            @foreach($hist as $his)
                                <li class="my-2">{{date('d.m.Y:', strtotime($his->date))}} {{$his->text}}</li>
                            @endforeach
                        </ul>
                        <div class="text-center mt-4 mb-5_5">
                            <button class="btn btn-outline-primary text-uppercase px-4 js-toggle dotdotdot__toggle dotdotdot__toggle_hide">
                                <span>Show More</span>
                                <span>Hide</span>
                            </button>
                        </div>
                    </div>

                @endif


                <div class="section-divider-2"></div>
                <style>
                    #more {
                        display: none;
                    }

                    .img-fluid {
                        max-width: inherit;
                    }
                </style>
                @php
                    $photos = \App\Models\Scouting\PlayerImages::where('player_tennis_id', $player->id)->get();
                @endphp
                @if(count($photos) > 0)
                    <div class="dotdotdot dotdotdot_video-photos" data-module="dotdotdot" data-ellipsis=""
                         data-height="11100">
                        <h4 class="text-uppercase mb-0 font-weight-semibold text-blue-darker">Latest Photos
                            <small class="typo-lg ml-4"><a class="js-toggle dotdotdot__toggle dotdotdot__toggle_show"
                                                           href="">@if(count($photos) >2)<span
                                            id="more_btn">Show more ></span><span>Hide</span>@endif</a></small>
                        </h4>
                        <div class="row pt-3">
                            @foreach($photos as $k=>$photo)
                                @if($k==2)
                                    <span id="more">
                            @endif
                        <div class="col-6 d-flex pr-4">
                            <div class="card position-relative shadow-none mb-4">
                                <a data-toggle="lightbox" href="/{{$photo->image}}"><img width="500" height="250"
                                                                                         class="img-fluid"
                                                                                         src="/{{$photo->prev_image}}"
                                                                                         alt=""></a>
                            </div>

                        </div>
                            @if($k==count($photos)-1)
                                </span>
                                @endif
                            @endforeach
                        </div>
                        @if(count($photos) >2)
                            <div class="text-center mt-4 mb-5_5">
                                <button class="btn btn-outline-primary text-uppercase px-4 js-toggle dotdotdot__toggle dotdotdot__toggle_hide"
                                        id="hide_btn">
                                    <span>Show More</span>
                                    <span>Hide</span>
                                </button>
                            </div>
                        @endif
                    </div>
                @endif


                @php
                    $videos = \App\Models\Scouting\PlayerTennisVideoLinks::where('player_tennis_id', $player->id)->get();
                @endphp
                @if(count($videos) > 0)
                    <div class="dotdotdot dotdotdot_video-photos" data-module="dotdotdot" data-ellipsis=""
                         data-height="11100">
                        <h4 class="text-uppercase mb-0 font-weight-semibold text-blue-darker">Latest videos
                            <small class="typo-lg ml-4"><a class="js-toggle dotdotdot__toggle dotdotdot__toggle_show"
                                                           href="">@if(count($videos) >2)<span
                                            id="more_btn">Show more ></span><span>Hide</span>@endif</a></small>
                        </h4>
                        <div class="row pt-3">
                            @foreach($videos as $k=>$video)
                                @if($k==2)
                                    <span id="more">
                            @endif
                                        <div class="col-6 d-flex pr-4">
                            <div class="card position-relative shadow-none mb-4">
                                <iframe width="500" height="250" src="{{$video->info}}" frameborder="0"
                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                            </div>

                        </div>
                                        @if($k==count($videos)-1)
                                </span>
                                @endif
                            @endforeach
                        </div>
                        @if(count($videos) >2)
                            <div class="text-center mt-4 mb-5_5">
                                <button class="btn btn-outline-primary text-uppercase px-4 js-toggle dotdotdot__toggle dotdotdot__toggle_hide"
                                        id="hide_btn">
                                    <span>Show More</span>
                                    <span>Hide</span>
                                </button>
                            </div>
                        @endif
                    </div>
                @endif

            </div>
            <script>
                $(document).ready(function () {
                    $('#more_btn').on('click', function () {
                        $('#more').css('display', 'contents');
                    })
                    $('#hide_btn').on('click', function () {
                        $('#more').css('display', 'none');
                    })
                })

            </script>
            <div class="tab-pane px-5 py-5_5 @if($activeTab == 'bio-tab') show active @endif" id="bio-tab">

                <div class="section-divider-2"></div>
                <h4 class="text-uppercase mb-4 font-weight-semibold text-blue-darker">Biography</h4>
                <table class="table table-bordered table-add-info text-blue-darker mb-0">
                    <colgroup>
                        <col width="264">
                        <col width="auto">
                    </colgroup>
                    <tbody>
                    @if(!empty($player->date_of_birth))
                        <tr>
                            <td>Date of Birth</td>
                            <td class="font-weight-semibold">{{$player->date_of_birth}}</td>
                        </tr>
                    @endif
                    @if(!empty($player->nationality_name->name))
                        <tr>
                            <td>Nationality</td>
                            <td class="font-weight-semibold">{{$player->nationality_name->name}}</td>
                        </tr>
                    @endif
                    @if($player->sport_type == 1)
                        @if(!empty($player->age_started_tennis))
                            <tr>
                                <td>Age started tennis</td>
                                <td class="font-weight-semibold">{{$player->age_started_tennis}}</td>
                            </tr>
                        @endif
                    @elseif($player->sport_type == 2)
                        @if(!empty($player->age_started_tennis))
                            <tr>
                                <td>Age started poker</td>
                                <td class="font-weight-semibold">{{$player->age_started_tennis}}</td>
                            </tr>
                        @endif
                    @elseif($player->sport_type == 3)
                        @if(!empty($player->age_started_tennis))
                            <tr>
                                <td>Age started football</td>
                                <td class="font-weight-semibold">{{$player->age_started_tennis}}</td>
                            </tr>
                        @endif
                    @endif
                    </tbody>
                </table>
                @if($player->description != '')
                    <ul class="typo-xl list-unstyled list-chevron mb-0">
                        <li class="my-5">{{$player->description}}</li>
                    </ul>
                @endif

                <div class="section-divider-2"></div>
                <h4 class="text-uppercase mb-4 font-weight-semibold text-blue-darker">Additional info</h4>
                <table class="table table-bordered table-add-info text-blue-darker mb-0">
                    <colgroup>
                        <col width="264">
                        <col width="auto">
                    </colgroup>
                    <tbody>
                    @if($player->sport_type == 1)
                        @if($player->racquet_brand != '')
                            <tr>
                                <td>Racquet brand</td>
                                <td class="font-weight-semibold">{{$player->racquet_brand}}</td>
                            </tr>
                        @endif
                        @if($player->string_brand != '')
                            <tr>
                                <td>String brand</td>
                                <td class="font-weight-semibold">{{$player->string_brand}}</td>
                            </tr>
                        @endif
                        @if($player->clothing_brand != '')
                            <tr>
                                <td>Clothing brand</td>
                                <td class="font-weight-semibold">{{$player->clothing_brand}}</td>
                            </tr>
                        @endif
                        @if($player->shoe_brand != '')
                            <tr>
                                <td>Shoe brand</td>
                                <td class="font-weight-semibold">{{$player->shoe_brand}}</td>
                            </tr>
                        @endif
                        @if($player->goals_for_next_season != '')
                            <tr>
                                <td>What are the player’s goals for the next season?</td>
                                <td class="font-weight-semibold">{{$player->goals_for_next_season}}</td>
                            </tr>
                        @endif
                        @if($player->hobby != '')
                            <tr>
                                <td>Hobby</td>
                                <td class="font-weight-semibold">{{$player->hobby}}</td>
                            </tr>
                        @endif
                        @if($player->favorite_player != '')
                            <tr>
                                <td>Favorite player</td>
                                <td class="font-weight-semibold">{{$player->favorite_player}}</td>
                            </tr>
                        @endif
                    @elseif($player->sport_type == 2)
                        @if($player->poker_favorite_wsop != '')
                            <tr>
                                <td>Favorite WSOP tournament</td>
                                <td class="font-weight-semibold">{{$player->poker_favorite_wsop}}</td>
                            </tr>
                        @endif
                        @if($player->poker_favorite_wcoop != '')
                            <tr>
                                <td>Favorite WCOOP tournament</td>
                                <td class="font-weight-semibold">{{$player->poker_favorite_wcoop}}</td>
                            </tr>
                        @endif
                        @if($player->poker_wat_next_year != '')
                            <tr>
                                <td>What are the player’s goals for the next year?</td>
                                <td class="font-weight-semibold">{{$player->poker_wat_next_year}}</td>
                            </tr>
                        @endif
                        @if($player->hobby != '')
                            <tr>
                                <td>Hobby</td>
                                <td class="font-weight-semibold">{{$player->hobby}}</td>
                            </tr>
                        @endif
                        @if($player->favorite_player != '')
                            <tr>
                                <td>Favorite poker player</td>
                                <td class="font-weight-semibold">{{$player->favorite_player}}</td>
                            </tr>
                        @endif
                        @if($player->poker_twitch != '')
                            <tr>
                                <td>Twitch link</td>
                                <td class="font-weight-semibold">{{$player->poker_twitch}}</td>
                            </tr>
                        @endif
                    @elseif($player->sport_type == 3)
                        @if($player->clothing_brand != '')
                            <tr>
                                <td>Clothing brand</td>
                                <td class="font-weight-semibold">{{$player->clothing_brand}}</td>
                            </tr>
                        @endif
                        @if($player->shoe_brand != '')
                            <tr>
                                <td>Shoe brand</td>
                                <td class="font-weight-semibold">{{$player->shoe_brand}}</td>
                            </tr>
                        @endif
                        @if($player->hobby != '')
                            <tr>
                                <td>Hobby</td>
                                <td class="font-weight-semibold">{{$player->hobby}}</td>
                            </tr>
                        @endif
                        @if($player->favorite_player != '')
                            <tr>
                                <td>Favorite player</td>
                                <td class="font-weight-semibold">{{$player->favorite_player}}</td>
                            </tr>
                        @endif
                    @endif
                    </tbody>
                </table>

            </div>


            @php
                $diagram = \App\Models\Scouting\PlayerDiagram::where('player_id', $player->id)->first();
            @endphp
            <div class="tab-pane px-5 py-5_5 @if($activeTab == 'skills-tab') show active @endif" id="skills-tab">
                @if($player->is_pro == false)
                    @if($player->sport_type == 1 || $player->sport_type == 2)
                        <h4 class="text-uppercase mb-4 font-weight-semibold text-blue-darker">Player Skills Diagram</h4>
                        <div class="row">
                            @php
                                $diagram_data = [];
                                    if(!empty($diagram->data) && count($diagram->data) > 0)
                                    {
                                        $diagram_data = json_decode($diagram->data);
                                    }

                            @endphp
                            @if(count($diagram_data) == 0)
                                <div class="col-12 text-center">
                                    <div style="background-image: url('/images/diagram-after.png'); background-repeat: no-repeat;background-position: center;height: 340px;width: 100%; padding-top: 14%">
                                        <span style="text-transform:uppercase;width: 605px;height: 36px;font-family: Exo\ 2,Arial,Helvetica,sans-serif;;font-size: 30px;font-weight: 600;font-style: normal;font-stretch: normal;line-height: normal;letter-spacing: normal;text-align: center;color: #060535;">To be completed after experts review</span>
                                    </div>
                                </div>
                            @else
                                <div class="col-6 text-center" style="margin-top: -22px; padding-left: 0">
                                    <div class="chart-container">
                                        <canvas id="chart-0" width="452" height="300" class="chartjs-render-monitor"
                                                style="display: block; width: 452px; height: 300px;"></canvas>
                                    </div>
                                </div>

                                <script>
                                    var presets = window.chartColors;
                                    var utils = Samples.utils;
                                    var inputs = {
                                        min: 0,
                                        max: 5,
                                        count: '{{count($diagram_data)}}',
                                        decimals: 2,
                                        continuity: 1
                                    };
                                    var s = '@php echo $diagram->data @endphp';
                                    var json = JSON.parse(s);

                                    function formatLabel(str, maxwidth) {
                                        var sections = [];
                                        var words = str.split(" ");
                                        var temp = "";

                                        words.forEach(function (item, index) {
                                            if (temp.length > 0) {
                                                var concat = temp + ' ' + item;

                                                if (concat.length > maxwidth) {
                                                    sections.push(temp);
                                                    temp = "";
                                                } else {
                                                    if (index == (words.length - 1)) {
                                                        sections.push(concat);
                                                        return;
                                                    } else {
                                                        temp = concat;
                                                        return;
                                                    }
                                                }
                                            }

                                            if (index == (words.length - 1)) {
                                                sections.push(item);
                                                return;
                                            }

                                            if (item.length < maxwidth) {
                                                temp = item;
                                            } else {
                                                sections.push(item);
                                            }

                                        });

                                        return sections;
                                    }

                                    function generateData() {
                                        // radar chart doesn't support stacked values, let's do it manually
                                        var ddata = [];
                                        for (var i = 0; i < json.length; i++) {
                                            ddata.push(json[i].value)
                                        }
                                        inputs.from = ddata;
                                        return ddata;
                                    }

                                    function generateLabels() {

                                        var ddata = [];
                                        for (var i = 0; i < json.length; i++) {
                                            ddata.push(formatLabel(json[i].label.toUpperCase(), 12))
                                        }
                                        return ddata
                                    }

                                    utils.srand(42);

                                    function fillRadar(num) {
                                        var d = [];
                                        for (var i = 0; i < inputs.count; i++) {
                                            d.push(num)
                                        }
                                        return d
                                    }

                                    var data = {
                                        labels: generateLabels(),

                                        datasets: [{
                                            backgroundColor: 'rgb(223,233,17,0.6)',
                                            borderColor: 'rgb(0,0,0)',
                                            data: generateData(),
                                            label: '',
                                            fill: true,

                                        }, {
                                            backgroundColor: 'rgb(147,147,147)',
                                            borderColor: 'rgb(0,0,0,0.0)',
                                            data: fillRadar(0),
                                            label: '',
                                            fill: true,
                                            borderWidth: 0,
                                            lineWidth: [
                                                0.0
                                            ],
                                            pointRadius: 0

                                        }, {
                                            backgroundColor: 'rgb(147,147,147)',
                                            borderColor: 'rgb(0,0,0, 0.0)',
                                            data: fillRadar(1),
                                            label: '',
                                            fill: true,
                                            borderWidth: 0,
                                            lineWidth: [
                                                0.0
                                            ],
                                            pointRadius: 0

                                        }, {
                                            backgroundColor: 'rgb(170,170,170)',
                                            borderColor: 'rgb(0,0,0, 0.0)',
                                            data: fillRadar(2),
                                            label: '',
                                            fill: true,
                                            borderWidth: 0,
                                            lineWidth: [
                                                0.0
                                            ],
                                            pointRadius: 0

                                        }, {
                                            backgroundColor: 'rgb(185,185,185)',
                                            borderColor: 'rgb(0,0,0, 0.0)',
                                            data: fillRadar(3),
                                            label: '',
                                            fill: true,
                                            borderWidth: 0,
                                            lineWidth: [
                                                0.0
                                            ],
                                            pointRadius: 0

                                        }, {
                                            backgroundColor: 'rgb(205,205,205)',
                                            borderColor: 'rgb(0,0,0, 0.0)',
                                            data: fillRadar(4),
                                            label: '',
                                            fill: true,
                                            borderWidth: 0,
                                            lineWidth: [
                                                0.0
                                            ],
                                            pointRadius: 0

                                        }, {
                                            backgroundColor: 'rgb(225,225,225)',
                                            borderColor: 'rgb(0,0,0, 0.0)',
                                            data: fillRadar(5),
                                            label: '',
                                            fill: true,
                                            borderWidth: 0,
                                            lineWidth: [
                                                0.0
                                            ],
                                            pointRadius: 0

                                        }]
                                    };

                                    var options = {

                                        scale: {
                                            gridLines: {
                                                lineWidth: [
                                                    0.3
                                                ],
                                                offsetGridLines: false,

                                            },
                                            ticks: {
                                                beginAtZero: true,
                                                display: false,

                                            },
                                            angleLines: {
                                                display: false
                                            },
                                            pointLabels: {
                                                fontColor: '#9898aa',
                                                fontSize: 15,
                                                fontFamily: "'Exo 2', 'Helvetica Neue', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'"
                                            }
                                        },

                                        maintainAspectRatio: true,
                                        spanGaps: false,
                                        plugins: {
                                            filler: {
                                                propagate: true
                                            },
                                        },
                                        legend: {
                                            display: false
                                        },
                                        elements: {
                                            point: {
                                                radius: 6,
                                                backgroundColor: 'rgb(255,255,255)',
                                                borderWidth: 3,
                                                borderColor: 'rgb(205,109,130)'
                                            },
                                            line: {
                                                tension: 0.000001,
                                                backgroundColor: 'rgb(205,109,130)',
                                                borderWidth: 2,
                                                borderColor: 'rgb(255,255,255)',

                                            }
                                        },
                                    };

                                    var chart = new Chart('chart-0', {
                                        type: 'radar',
                                        data: data,
                                        options: options,

                                    });
                                </script>
                                @if(count($diagram_data) >0)
                                    <div class="col mx-auto text-blue-darker text-uppercase">
                                        @php
                                            $good = [];
                                            $bad = [];
                                            foreach($diagram_data as $di_data)
                                            {
                                                if(isset($di_data->good))
                                                    $good[$di_data->label] = 1;
                                                if(isset($di_data->bad))
                                                    $bad[$di_data->label] = 1;
                                            }
                                        @endphp
                                        @if(count($good) > 0)
                                            <h6 class="h4 mb-0 text-secondary font-weight-normal text-blue-darker">
                                                Strongest skills
                                                <span class="icon icon-like icon-md ml-2 text-success">
        <svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#like"></use></svg>
      </span>
                                            </h6>
                                            <ul class="list-unstyled list-base list-base-blue-darker mb-4_5">
                                                @foreach($good as $k => $g)
                                                    <li class="h5 font-weight-normal my-2">{{$k}}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                        @if(
                                        count($bad) > 0
                                        )
                                            <h6 class="h4 mb-0 text-secondary font-weight-normal text-blue-darker">
                                                Skills to Improve
                                                <span class="icon icon-dislike icon-md ml-2 text-danger">
        <svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#dislike"></use></svg>
      </span>
                                            </h6>
                                            <ul class="list-unstyled list-base list-base-blue-darker mb-4_5">
                                                @foreach($bad as $k => $b)
                                                    <li class="h5 font-weight-normal my-2">{{$k}}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                @endif
                            @endif
                        </div>
                    @endif
                    @if(!empty($diagram->overview) && $diagram->overview != '')
                        <div class="section-divider-2" style="margin-top: 2.125rem;"></div>
                        <h4 class="text-uppercase mb-4 font-weight-semibold text-blue-darker">Expert’s resume</h4>
                        <p>{{$diagram->overview}}</p>
                    @endif

                    <div class="section-divider-2" style="margin-top: 2.125rem;"></div>
                @elseif($player->sport_type == 3)
                    @if(!empty($diagram->overview) && $diagram->overview != '')
                        <div class="section-divider-2" style="margin-top: 2.125rem;"></div>
                        <h4 class="text-uppercase mb-4 font-weight-semibold text-blue-darker">Expert’s resume</h4>
                        <p>{{$diagram->overview}}</p>
                        <div class="section-divider-2" style="margin-top: 2.125rem;"></div>
                    @endif
                @endif
                @if($player->sport_type == 1)
                    <h4 class="text-uppercase mb-4 font-weight-semibold text-blue-darker">Additional info</h4>
                    <table class="table table-bordered table-add-skills-info text-blue-darker mb-0">
                        <colgroup>
                            <col width="264">
                            <col width="auto">
                        </colgroup>
                        <tbody>
                        @if($player->itf_profile != '')
                            <tr>
                                <td>{{$player->rank}} Ranking Profile</td>
                                <td class="font-weight-semibold">
                                    <a href="{{$player->itf_profile}}" target="_blank">{{$player->itf_profile}}</a>
                                </td>
                            </tr>
                        @endif
                        @if($player->other_ranking_profiles != '')
                            <tr>
                                <td>Other Ranking Profile</td>
                                <td class="font-weight-semibold">
                                    <a href="{{$player->other_ranking_profiles}}"
                                       target="_blank">{{$player->other_ranking_profiles}}</a>
                                </td>
                            </tr>
                        @endif
                        <tr>
                            <td>Forehand</td>
                            <td class="font-weight-semibold">@if($player->forehand == 1){{'Right handed'}}@else{{'Left handed'}}@endif</td>
                        </tr>
                        <tr>
                            <td>Backhand</td>
                            <td class="font-weight-semibold">@if($player->backhand == 1){{'One-handed'}}@else{{'Double-handed'}}@endif</td>
                        </tr>
                        @if($player->training_academy != '')
                            <tr>
                                <td>Training Academy</td>
                                <td class="font-weight-semibold">
                                    {{$player->training_academy}}
                                </td>
                            </tr>
                        @endif
                        @if($player->coach != '')
                            <tr>
                                <td>Coach</td>
                                <td class="font-weight-semibold">{{$player->coach}}</td>
                            </tr>
                        @endif
                        @if($player->injuries_24m != '')
                            <tr>
                                <td>Injuries within last 24 months</td>
                                <td class="font-weight-semibold">{{$player->injuries_24m}}</td>
                            </tr>
                        @endif
                        @if(!empty($player->fs_hard) || !empty($player->fs_glass) || !empty($player->fs_clay))
                            <tr>
                                <td>Favorite court</td>
                                <td class="font-weight-semibold text-truncate">
                                    @if($player->fs_hard == 1)<img class="rounded-circle mr-2"
                                                                   src="/images/{{'color-blue@2x.jpg'}}" alt=""
                                                                   width="30" height="30">{{'Hard court'}}@endif
                                    @if($player->fs_glass == 1)<img class="rounded-circle mr-2"
                                                                    src="/images/{{'color-rgreen@2x.jpg'}}" alt=""
                                                                    width="30" height="30">{{'Grass court'}}@endif
                                    @if($player->fs_clay == 1)<img class="rounded-circle mr-2"
                                                                   src="/images/{{'color-red@2x.jpg'}}" alt=""
                                                                   width="30" height="30">{{'Clay court'}}@endif
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                @elseif($player->sport_type == 2)
                    @if(!empty($player->poker_preferred_room))
                        <h4 class="text-uppercase mb-4 font-weight-semibold text-blue-darker">Additional skills
                            info</h4>
                        <table class="table table-bordered table-add-skills-info text-blue-darker mb-0">
                            <colgroup>
                                <col width="270">
                                <col width="auto">
                            </colgroup>
                            <tbody>
                            <tr>
                                <td>Preferred online poker room</td>
                                <td class="font-weight-semibold">{{$player->poker_preferred_room}}</td>
                            </tr>
                            </tbody>
                        </table>
                    @endif
                @elseif($player->sport_type == 3)
                    <h4 class="text-uppercase mb-4 font-weight-semibold text-blue-darker">Additional info</h4>
                    <table class="table table-bordered table-add-skills-info text-blue-darker mb-0">
                        <colgroup>
                            <col width="264">
                            <col width="auto">
                        </colgroup>
                        <tbody>
                        @if($player->football_transmarket_profile_link != '')
                            <tr>
                                <td>TransMarket Profile</td>
                                <td class="font-weight-semibold">
                                    <a href="{{$player->football_transmarket_profile_link}}"
                                       target="_blank">{{$player->football_transmarket_profile_link}}</a>
                                </td>
                            </tr>
                        @endif
                        @if($player->football_club_profile_link != '')
                            <tr>
                                <td>Clubs Profile</td>
                                <td class="font-weight-semibold">
                                    <a href="{{$player->football_club_profile_link}}"
                                       target="_blank">{{$player->football_club_profile_link}}</a>
                                </td>
                            </tr>
                        @endif
                        @if($player->football_position_main != '')
                            <tr>
                                <td>Main position</td>
                                <td class="font-weight-semibold">{{$player->football_position_main}}</td>
                            </tr>
                        @endif
                        @if($player->football_position_other != '')
                            <tr>
                                <td>Other position</td>
                                <td class="font-weight-semibold">{{$player->football_position_other}}</td>
                            </tr>
                        @endif
                        @if($player->football_foot != '')
                            <tr>
                                <td>Foot</td>
                                <td class="font-weight-semibold">{{$player->football_foot}}</td>
                            </tr>
                        @endif
                        @if($player->coach != '')
                            <tr>
                                <td>Coach</td>
                                <td class="font-weight-semibold">{{$player->coach}}</td>
                            </tr>
                        @endif
                        @if($player->injuries_24m != '')
                            <tr>
                                <td>Injuries within last 24 months</td>
                                <td class="font-weight-semibold">{{$player->injuries_24m}}</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                @endif
            </div>
            <div class="tab-pane px-5 py-5_5 @if($activeTab == 'stats-tab') show active @endif" id="stats-tab">
                @if($player->sport_type == 1)
                    <h4 class="text-uppercase mb-2 font-weight-semibold text-blue-darker">Ranking {{$player->rank}}</h4>
                    <table class="table table-bordered table-stats text-blue-darker mb-0">
                        <colgroup>
                            <col width="auto">
                            <col width="160">
                            <col width="160">
                        </colgroup>
                        <thead class="thead-light">
                        <tr>
                            <th class="font-weight-semibold text-uppercase" scope="col">Ranking</th>
                            <th class="font-weight-semibold text-uppercase" scope="col">Date</th>
                            <th class="font-weight-semibold text-uppercase" scope="col">Result</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Current combined</td>
                            <td class="text-truncate">-</td>
                            <td>{{$player->itf_current_combined}}</td>
                        </tr>
                        <tr>
                            <td>Сareer high combined</td>
                            <td class="text-truncate">@if(!empty($player->ranking_date)) {{date('d/m/Y',strtotime($player->ranking_date))}} @else {{'-'}}@endif</td>
                            <td>{{$player->itf_career_hight_combined}}</td>
                        </tr>
                        </tbody>
                    </table>

                    <div class="section-divider-2"></div>

                    @php
                        $titles = \App\Models\Scouting\TitlesFinals::where('player_tennis_id', $player->id)->get();
                    @endphp
                    @if(count($titles) > 0)
                        <style>
                            .more-titles {
                                display: none;
                            }

                            .more-games {
                                display: none;
                            }
                        </style>
                        <h4 class="text-uppercase mb-2 font-weight-semibold text-blue-darker">Titles/Finals</h4>
                        <table class="table table-bordered table-stats text-blue-darker mb-0">
                            <colgroup>
                                <col width="240">
                                <col width="auto">
                                <col width="160">
                                <col width="100">
                            </colgroup>
                            <thead class="thead-light">
                            <tr>
                                <th class="font-weight-semibold text-uppercase" scope="col">Date</th>
                                <th class="font-weight-semibold text-uppercase" scope="col">Tournament</th>
                                <th class="font-weight-semibold text-uppercase" scope="col">Location</th>
                                <th class="font-weight-semibold text-uppercase" scope="col">Result</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $count = count($titles);
                            @endphp
                            @foreach($titles as $k => $title)
                                <tr class="@if($k >= 3){{'more-titles'}}@endif">
                                    <td class="text-truncate">{{date('F, Y',strtotime($title->date))}}</td>
                                    <td>{{$title->tournament}}</td>
                                    <td>{{$title->location}}</td>
                                    <td>
                                        <strong @if(strripos($title->result, 'winner') !== false){{'class=text-success'}}@endif>{{$title->result}}</strong>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @if($count >= 3)
                            <div class="mt-2">
                                <a class="btn btn-outline-primary font-weight-bold text-uppercase" id="show-more-titles"
                                   href="">Show More</a>
                            </div>
                            <script type="text/javascript">
                                $('#show-more-titles').on('click', function (e) {
                                    e.preventDefault();
                                    if ($('.more-titles').css('display') == 'none') {
                                        $('.more-titles').css('display', 'table-row');
                                        $(this).text('Hide');
                                    } else {
                                        $('.more-titles').css('display', 'none');
                                        $(this).text('Show more');
                                    }
                                    return false;
                                });
                            </script>
                        @endif
                    @endif
                <!--

-->
                    <div class="section-divider-2"></div>

                    @php
                        $last_10_games = \App\Models\Scouting\LastGames::where('player_tennis_id', $player->id)->get();
                    @endphp
                    @if(count($last_10_games) > 0)
                        <h4 class="text-uppercase mb-2 font-weight-semibold text-blue-darker">Last 10 games</h4>
                        <table class="table table-bordered table-stats text-blue-darker mb-0">
                            <colgroup>
                                <col width="150">
                                <col width="auto">
                                <col width="155">
                                <col width="auto">
                                <col width="160">
                            </colgroup>
                            <thead class="thead-light">
                            <tr>
                                <th class="font-weight-semibold text-uppercase" scope="col">Date</th>
                                <th class="font-weight-semibold text-uppercase" scope="col">Opponent</th>
                                <th class="font-weight-semibold text-uppercase" scope="col">Result</th>
                                <th class="font-weight-semibold text-uppercase" scope="col">Tournament</th>
                                <th class="font-weight-semibold text-uppercase" scope="col">Surface</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $count = count($last_10_games);
                            @endphp
                            @foreach($last_10_games as $k => $games)
                                <tr class="@if($k >= 3){{'more-games'}}@endif">
                                    <td class="text-truncate">{{date('d-m-Y', strtotime($games->date))}}</td>
                                    <td>{{$games->opponent}}</td>
                                    <td class="td-result">
                                    {{$games->result}}
                                    <!--<div class="font-weight-bold text-success">W</div>
                            <small class="d-block typo-sm">6:3, 3:6, 6:4</small>-->
                                    </td>
                                    <td>{{$games->tournament}}</td>
                                    <td>{{$games->surface}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @if($count >= 3)
                            <div class="mt-2">
                                <a class="btn btn-outline-primary font-weight-bold text-uppercase" href=""
                                   id="show-more-games">Show More</a>
                            </div>
                            <script type="text/javascript">
                                $('#show-more-games').on('click', function (e) {
                                    e.preventDefault();
                                    if ($('.more-games').css('display') == 'none') {
                                        $('.more-games').css('display', 'table-row');
                                        $(this).text('Hide');
                                    } else {
                                        $('.more-games').css('display', 'none');
                                        $(this).text('Show more');
                                    }
                                    return false;
                                });
                            </script>
                        @endif
                    @endif
                <!--

                -->
                @elseif($player->sport_type == 2)


                    @if(count($player->screenNames) > 0)
                        @php
                            $cc = 1;
                        @endphp
                        <style>
                            .sharkscope td {
                                padding: 5px;
                                vertical-align: top;
                            }
                        </style>

                        @foreach($player->screenNames as $screenName)
                            <table border="0" class="sharkscope" style="width: 100%;border:solid 1px #ddd;">
                                <tr style="border-bottom: solid 1px #ddd;">
                                    <td style="width: 200px"><h5>Screen name {{$cc}}</h5></td>
                                    <td>{{$screenName->text}}</td>
                                </tr>
                                <tr style="border-bottom: solid 1px #ddd;">
                                    <td><h5>Sharkscope profile</h5></td>
                                    <td><a href="{{$screenName->link}}">{{$screenName->link}}</a></td>
                                </tr>
                                <tr>
                                    <td><h5>Profit graph</h5></td>
                                    <td><img src="/{{$screenName->graph}}" width="580px"></td>
                                </tr>
                                @php
                                    $cc++;
                                @endphp
                            </table>
                            <br/>
                        @endforeach

                    @endif
                    <br>
                    @if(count($player->pokerEvents) > 0)
                        <h4 class="text-uppercase mb-2 font-weight-semibold text-blue-darker">Major Wins</h4>
                        <table class="table table-bordered table-stats text-blue-darker mb-0">
                            <colgroup>
                                <col width="150">
                                <col width="120">
                                <col width="170">
                                <col width="190">
                                <col width="160">
                                <col width="155">
                            </colgroup>
                            <thead class="thead-light">
                            <tr>
                                <th class="font-weight-semibold text-uppercase" scope="col">Network</th>
                                <th class="font-weight-semibold text-uppercase" scope="col">Date</th>
                                <th class="font-weight-semibold text-uppercase" scope="col">Type</th>
                                <th class="font-weight-semibold text-uppercase" scope="col">Stake (incl. Rake)</th>
                                <th class="font-weight-semibold text-uppercase" scope="col">Position</th>
                                <th class="font-weight-semibold text-uppercase" scope="col">Profit</th>
                            </tr>
                            </thead>
                            <tbody>
                            <style>
                                .hide_events {
                                    display: none;
                                }
                            </style>
                            @php
                                $pe = 0;
                            @endphp
                            @foreach($player->pokerEvents as $pokerEvent)
                                <tr class="@if($pe >= 2){{'hide_events'}}@endif" id="he">
                                    <td class="text-truncate">{{$pokerEvent->network}}</td>
                                    <td class="text-truncate">{{$pokerEvent->date}}</td>
                                    <td class="text-truncate">{{$pokerEvent->type}}</td>
                                    <td class="text-truncate">{{$pokerEvent->stake}}$</td>
                                    <td class="text-truncate">{{$pokerEvent->position}}</td>
                                    <td>
                                        <div class="font-weight-bold">{{$pokerEvent->profit}}$</div>
                                    </td>
                                </tr>
                                @php
                                    $pe++;
                                @endphp
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                    @if(count($player->pokerEvents) > 2)
                        <div class="mt-4">
                            <a id="poker_ev_more" class="btn btn-outline-primary font-weight-bold text-uppercase"
                               href="#">+ Show more</a>
                        </div>
                        <script>
                            $('#poker_ev_more').on('click', function (e) {
                                $('.hide_events').css('display', 'table-row')
                                e.preventDefault();
                                return false;
                            });
                        </script>
                    @endif
                @elseif($player->sport_type == 3)
                    @if(count($player->footballResultsLastSeasons) > 0)
                        <h4 class="text-uppercase mb-2 font-weight-semibold text-blue-darker">Results of the last season</h4>
                        <table class="table table-bordered table-stats text-blue-darker mb-0">
                            <colgroup>
                                <col width="50">
                                <col width="130">
                                <col width="130">
                                <col width="50">
                                <col width="40">
                                <col width="40">
                                <col width="100">
                                <col width="160">
                            </colgroup>
                            <thead class="thead-light">
                            <tr>
                                <th class="font-weight-semibold text-uppercase text-center" scope="col">Season</th>
                                <th class="font-weight-semibold text-uppercase text-center" scope="col">Competition</th>
                                <th class="font-weight-semibold text-uppercase text-center" scope="col">Club</th>
                                <th class="font-weight-semibold text-uppercase text-center" scope="col">Appearences</th>
                                <th class="font-weight-semibold text-uppercase text-center" scope="col">Goals</th>
                                <th class="font-weight-semibold text-uppercase text-center" scope="col">Passes</th>
                                <th class="font-weight-semibold text-uppercase text-center" scope="col">Yellow/Red cards</th>
                                <th class="font-weight-semibold text-uppercase text-center" scope="col">Club result</th>
                            </tr>
                            </thead>
                            <tbody>
                            <style>
                                .hide_reults_last_season {
                                    display: none;
                                }
                            </style>
                            @php
                                $counter = 0;
                            @endphp
                            @foreach($player->footballResultsLastSeasons()->orderBy('weight')->get() as $footballResultsLastSeason)
                                <tr class="@if($counter >= 2){{'hide_reults_last_season'}}@endif" id="rls">
                                    <td class="text-truncate">{{$footballResultsLastSeason->season}}</td>
                                    <td class="text-truncate">{{$footballResultsLastSeason->competition}}</td>
                                    <td class="text-truncate">{{$footballResultsLastSeason->club}}</td>
                                    <td class="text-truncate">{{$footballResultsLastSeason->appearences}}</td>
                                    <td class="text-truncate">{{$footballResultsLastSeason->goals}}</td>
                                    <td class="text-truncate">{{$footballResultsLastSeason->passes}}</td>
                                    <td class="text-truncate">{{$footballResultsLastSeason->cards}}</td>
                                    <td class="text-truncate">{{$footballResultsLastSeason->club_result}}</td>
                                </tr>
                                @php
                                    $counter++;
                                @endphp
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                    @if(count($player->footballResultsLastSeasons) >= 2)
                        <div class="mt-4">
                            <a id="football_results_last_seasons_more" class="btn btn-outline-primary font-weight-bold text-uppercase" href="#">+ Show more</a>
                        </div>
                        <script>
                            $('#football_results_last_seasons_more').on('click', function(e){
                                $('.hide_reults_last_season').css('display', 'table-row')
                                e.preventDefault();
                                return false;
                            });
                        </script>
                    @endif
                    @if(count($player->footballResultsLastSeasons) > 0)
                        <div class="section-divider-2"></div>
                    @endif

                    @if(count($player->footballPersonalAwards) > 0)
                        <h4 class="text-uppercase mb-2 font-weight-semibold text-blue-darker">Results of the last season</h4>
                        <table class="table table-bordered table-stats text-blue-darker mb-0">
                            <colgroup>
                                <col width="140">
                                <col width="140">
                                <col width="auto">
                                <col width="140">
                            </colgroup>
                            <thead class="thead-light">
                            <tr>
                                <th class="font-weight-semibold text-uppercase" scope="col">Season</th>
                                <th class="font-weight-semibold text-uppercase" scope="col">Date</th>
                                <th class="font-weight-semibold text-uppercase" scope="col">Award</th>
                                <th class="font-weight-semibold text-uppercase" scope="col">Club</th>
                            </tr>
                            </thead>
                            <tbody>
                            <style>
                                .hide_personal_award {
                                    display: none;
                                }
                            </style>
                            @php
                                $counter = 0;
                            @endphp
                            @foreach($player->footballPersonalAwards()->orderBy('weight')->get() as $footballPersonalAward)
                                <tr class="@if($counter >= 2){{'hide_personal_award'}}@endif" id="pa">
                                    <td class="text-truncate">{{$footballPersonalAward->season}}</td>
                                    <td class="text-truncate">{{$footballPersonalAward->date}}</td>
                                    <td class="text-truncate">{{$footballPersonalAward->award}}</td>
                                    <td class="text-truncate">{{$footballPersonalAward->club}}</td>
                                </tr>
                                @php
                                    $counter++;
                                @endphp
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                    @if(count($player->footballPersonalAwards) >= 2)
                        <div class="mt-4">
                            <a id="football_personal_awards_more" class="btn btn-outline-primary font-weight-bold text-uppercase" href="#">+ Show more</a>
                        </div>
                        <script>
                            $('#football_personal_awards_more').on('click', function(e){
                                $('.hide_personal_award').css('display', 'table-row')
                                e.preventDefault();
                                return false;
                            });
                        </script>
                    @endif
                @endif
            </div>

            <div class="tab-pane px-5 py-5_5 @if($activeTab == 'promotion-tab') show active @endif" id="promotion-tab">
                <h4 class="h4 text-uppercase mb-3 text-blue-darker">Available Bounty tasks</h4>
                <div class="list-unstyled service-list mb-0 border">
                    @foreach($player->bountyTasks as $bounty_task)
                        @if($bounty_task->status == 1 or $bounty_task->status == 2)
                            <div class="service-item media align-items-stretch position-relative">
                                <div class="service-item-icon-wrapper position-relative" style="width:7.8rem">
                                    <div class="icon icon-{{$bounty_type_icons[$bounty_task->type]}} service-item-icon position-absolute m-auto text-blue-darker" style="width:5.9rem">
                                        <!--<svg viewBox="0 0 1 1">
                                            <use xlink:href='/images/icons.svg#{{$bounty_type_icons[$bounty_task->type]}}'></use>
                                        </svg>-->
                                        <img src="{{$bounty_task->icon_w350_h205}}" alt="" height="56px">
                                    </div>
                                </div>
                                <div class="media-body service-item-body py-4">
                                    <h4 class="service-item-title mb-1 text-blue-darker font-weight-bold">
                                        {{$bounty_task->name}}
                                    </h4>
                                    <p class="service-item-descr mb-0 text-blue-darker">
                                        {!!$bounty_task->description!!}
                                    </p>
                                </div>
                                <div class="mx-5 align-self-center py-4 d-flex flex-nowrap align-items-center service-item-secondary">
                                    @if(isset($specifiedDatetimeBountyTasks[$bounty_task->id]))

                                        <div class="list-item__secondary-time d-flex flex-column pl-4" style="float:right; position:relative; top:-10px;">
                                            <span class="typo-lg mb-0_5 text-uppercase text-status text-status-{{$specifiedDatetimeBountyTasks[$bounty_task->id][0]}} text-status-shift">{{$specifiedDatetimeBountyTasks[$bounty_task->id][1]}}</span>
                                            <span class="h4 mb-0">{{$specifiedDatetimeBountyTasks[$bounty_task->id][2]}}</span>
                                        </div>
                                    @endif
                                    <div class="mx-4 service-item-secondary-token text-right">
                                        <div class="h5 text-pink mb-0">
                                        @if($bounty_task->cost_main_token == 1)
                                            {{number_format($bounty_task->cost_ACE,0,'',' ').' ACE'}}
                                        @else
                                            {{number_format($bounty_task->cost_TEAM,0,'',' ').' TEAM'}}
                                        @endif
                                        </div>
                                        <ul class="list-inline mb-0 text-blue-darker font-weight-semibold list-inline-sep justify-content-end">
                                            @if($bounty_task->cost_usd)
                                                <li class="list-inline-item text-nowrap">approx. ${{$bounty_task->cost_usd }}
                                                </li>
                                            @endif
                                            <!--

                                            @if($bounty_task->token_ACE)
                                                <li class="list-inline-item text-nowrap">{{ number_format(($bounty_task->cost_usd * $rate->usd_ACE), 0, ',', '  ') }}
                                                    <span class="text-ace">ACE</span></li>
                                            @endif
                                            @if($bounty_task->token_TEAM)
                                                <li class="list-inline-item text-nowrap">{{ number_format(($bounty_task->cost_usd * $rate->usd_TEAM), 0, ',', '  ') }}
                                                    <span class="text-team">TEAM</span></li>
                                            @endif-->
                                        </ul>
                                    </div>
                                    <button class="btn @if($bounty_task->status == 1) btn-primary @else btn-secondary @endif px-4 text-uppercase font-weight-bold btn-width-120px fill-area-link"
                                            data-toggle="collapse"
                                            data-target="#collapse-item-bounty-task-{{$bounty_task->id}}"
                                            @if($activeBountyTask == $bounty_task->id) aria-expanded="true" @else aria-expanded="false" @endif>@if($bounty_task->status == 1)More @else Finished @endif
                                    </button>


                                </div>
                            </div>
                            <div class="collapse service-item-collapse py-4_5 px-5 @if($activeBountyTask == $bounty_task->id) show @endif"
                                 id="collapse-item-bounty-task-{{$bounty_task->id}}">
                                <div class="row">
                                    <div class="col-8">
                                        <h5 class="text-blue-darker font-weight-bold">Description</h5>
                                        <p class="mb-0 text-blue-darker">{!!$bounty_task->description_full!!}</p>
                                        <div class="mt-4">
                                            <!--<button class="btn btn-primary px-4 text-uppercase font-weight-bold btn-width-120px" data-toggle="modal" data-target="#">Join</button>-->
                                            @if($bounty_task->status == 1)
                                                @auth
                                                    @if(in_array($bounty_task->id, $bountyPerformeByUser))
                                                        <button type="button" class="btn btn-secondary px-4 text-uppercase font-weight-bold btn-width-120px performe-btn" disabled>You joined</button>
                                                    @else
                                                        <a class="btn btn-primary px-4 text-uppercase font-weight-bold btn-width-120px performe-btn"
                                                           href="#join-modal" data-toggle="modal"
                                                           data-bountytaskid="{{$bounty_task->id}}">Join</a>
                                                    @endif
                                                @else
                                                    <a class="btn btn-primary px-4 text-uppercase font-weight-bold btn-width-120px"
                                                       href="#information-join" data-toggle="modal">Apply</a>
                                                @endauth
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        @if($bounty_task->video_link)
                                            <h5 class="text-blue-darker font-weight-bold">Video</h5>
                                            <div class="embed-responsive service-item-embed embed-responsive-16by9">
                                                <iframe class="embed-responsive-item"
                                                        src="https://www.youtube.com/embed/{{$bounty_task->video_link}}?rel=0"
                                                        allowfullscreen></iframe>
                                            </div>
                                        @endif
                                        @if($bounty_task->images)
                                            <h5 class="text-blue-darker font-weight-bold">Images</h5>
                                            <div class="commerce-item__image-wrap" data-module="commerce-slider">
                                                <div class="swiper-container commerce-slider-container js-swiper-container bg-white shadow">
                                                    <div class="swiper-wrapper commerce-slider-wrapper align-items-center">
                                                        @foreach($bounty_task->images as $image)
                                                            <div class="swiper-slide commerce-slider-slide d-flex align-items-center justify-content-center p-2">
                                                                <img class="commerce-slider-slide-image img-fluid"
                                                                     src="/{{$image->image}}" alt="" width="230"
                                                                     height="230">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="swiper-pagination commerce-slider-pagination js-swiper-pagination text-center position-relative"></div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>


            </div>

            @if($countServicesProducts > 0)
                <div class="tab-pane px-5 py-5_5 @if($activeTab == 'fan-tab') show active @endif" id="fan-tab">
                    @php
                        $firstServices = 0;
                    @endphp
                    @foreach($player->servicesProducts as $service)
                        @if($service->status == 1 or $service->status == 2)
                            @if($service->type == 1)
                                @if(!$firstServices)
                                    <h4 class="h4 text-uppercase mb-3 text-blue-darker">Available services</h4>
                                    <div class="list-unstyled service-list mb-0 border">
                                        @endif

                                        <div class="service-item media align-items-stretch position-relative">
                                            <div class="service-item-icon-wrapper position-relative">
                                                <div class="icon icon-{{$kinds_service[$service->kind]}} service-item-icon position-absolute m-auto text-blue-darker">
                                                <!--<svg viewBox="0 0 1 1">
                                                    <use xlink:href='/images/icons.svg#{{$kinds_service[$service->kind]}}'></use>
                                                </svg>-->
                                                    <img src="{{$service->prev_image2}}" alt="" height="56px">
                                                </div>
                                            </div>
                                            <div class="media-body service-item-body py-4">
                                                <h4 class="service-item-title mb-1 text-blue-darker font-weight-bold">
                                                    {{$service->name}}
                                                </h4>
                                                <p class="service-item-descr mb-0 text-blue-darker">
                                                    {!! $service->description !!}
                                                </p>
                                            </div>
                                            <div class="mx-5 align-self-center py-4 d-flex flex-nowrap align-items-center service-item-secondary">
                                                <div class="mx-4 service-item-secondary-token text-right">
                                                    <div class="h5 text-pink mb-0">
                                                        @if($service->cost_main_token == 1)
                                                            {{number_format($service->cost_ACE,0,'',' ').' ACE'}}
                                                        @else
                                                            {{number_format($service->cost_TEAM,0,'',' ').' TEAM'}}
                                                        @endif
                                                    </div>
                                                    <ul class="list-inline mb-0 text-blue-darker font-weight-semibold list-inline-sep justify-content-end">
                                                        @if($service->cost_usd)
                                                            <li class="list-inline-item text-nowrap">approx. ${{$service->cost_usd }}</li>
                                                        @endif
                                                    </ul>
                                                </div>
                                                <button class="btn @if($service->status == 1) btn-primary @else btn-secondary @endif px-4 text-uppercase font-weight-bold btn-width-120px collapsed fill-area-link"
                                                        data-toggle="collapse"
                                                        data-target="#collapse-item-{{$service->id}}">@if($service->status == 1)Join @else Finished @endif
                                                </button>
                                            </div>
                                        </div>
                                        <div class="collapse service-item-collapse py-4_5 px-5"
                                             id="collapse-item-{{$service->id}}">
                                            <div class="row">
                                                <div class="col-@if($service->video_link || $service->images){{8}}@else{{12}}@endif">
                                                    <h5 class="text-blue-darker font-weight-bold">Description</h5>
                                                    <p class="mb-0 text-blue-darker">{!!$service->description_full !!}</p>
                                                    <div class="mt-4">
                                                        <!--<button class="btn btn-primary px-4 text-uppercase font-weight-bold btn-width-120px" data-toggle="modal" data-target="#">Join</button>-->
                                                        @if($service->status == 1)
                                                            @auth
                                                                <a class="btn btn-primary px-4 text-uppercase font-weight-bold btn-width-120px buy-btn"
                                                                   href="#buy-modal" data-toggle="modal"
                                                                   data-productid="{{$service->id}}">Join</a>
                                                            @else
                                                                <a class="btn btn-primary px-4 text-uppercase font-weight-bold btn-width-120px"
                                                                   href="#information" data-toggle="modal">Join</a>
                                                            @endauth
                                                        @endif
                                                    </div>
                                                </div>
                                                @if($service->video_link || ($service->images && count($service->images) > 0))
                                                    <div class="col-4">
                                                        @if($service->video_link)
                                                            <h5 class="text-blue-darker font-weight-bold">Video</h5>
                                                            <div class="embed-responsive service-item-embed embed-responsive-16by9">
                                                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$service->video_link}}?rel=0" allowfullscreen></iframe>
                                                            </div>
                                                        @endif
                                                        @if($service->images && count($service->images) > 0)
                                                            <h5 class="text-blue-darker font-weight-bold">Images</h5>
                                                            <div class="commerce-item__image-wrap" data-module="commerce-slider">
                                                                <div class="swiper-container commerce-slider-container js-swiper-container bg-white shadow">
                                                                    <div class="swiper-wrapper commerce-slider-wrapper align-items-center">
                                                                        @foreach($service->images as $image)
                                                                            <div class="swiper-slide commerce-slider-slide d-flex align-items-center justify-content-center p-2">
                                                                                <img class="commerce-slider-slide-image img-fluid"
                                                                                     src="/{{$image->image}}" alt="" width="230"
                                                                                     height="230">
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                                <div class="swiper-pagination commerce-slider-pagination js-swiper-pagination text-center position-relative"></div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endif

                                            </div>
                                        </div>

                                        @if(!$firstServices)
                                    </div>
                                    @php
                                        $firstServices = 1;
                                    @endphp
                                @endif
                            @endif
                        @endif
                    @endforeach

                    @php
                        $firstSProducts = 0;
                    @endphp
                    @foreach($player->servicesProducts as $service)
                        @if($service->status == 1 or $service->status == 2)
                            @if($service->type == 2)
                                @if(!$firstSProducts)
                                    <h4 class="h4 text-uppercase mb-3 text-blue-darker"></h4>
                                    <h4 class="h4 text-uppercase mb-3 text-blue-darker">Available goods</h4>
                                    <div class="list-unstyled service-list mb-0 border">
                                        @endif
                                        <div class="service-item media align-items-stretch position-relative">
                                            <div class="service-item-icon-wrapper position-relative">
                                                <div class="icon service-item-icon position-absolute m-auto text-blue-darker">
                                                    <img class="commerce-slider-slide-image img-fluid"
                                                         src="{{$service->main_image}}" width="74">
                                                </div>
                                            </div>
                                            <div class="media-body service-item-body py-4">
                                                <h4 class="service-item-title mb-1 text-blue-darker font-weight-bold">
                                                    {{$service->name}}
                                                </h4>
                                                <p class="service-item-descr mb-0 text-blue-darker">
                                                    {{str_limit($service->description, $limit= 150, $end = '...')}}
                                                </p>
                                            </div>
                                            <div class="mx-5 align-self-center py-4 d-flex flex-nowrap align-items-center service-item-secondary">
                                                <div class="mx-4 service-item-secondary-token text-right">
                                                    <div class="h5 text-pink mb-0">${{$service->cost_usd}}</div>
                                                    <ul class="list-inline mb-0 text-blue-darker font-weight-semibold list-inline-sep justify-content-end">
                                                        @if($service->token_ACE)
                                                            <li class="list-inline-item text-nowrap">{{ number_format(($service->cost_usd * $rate->usd_ACE), 0, ',', '  ') }}
                                                                <span class="text-ace">ACE</span></li>
                                                        @endif
                                                        @if($service->token_TEAM)
                                                            <li class="list-inline-item text-nowrap">{{ number_format(($service->cost_usd * $rate->usd_TEAM), 0, ',', '  ') }}
                                                                <span class="text-team">TEAM</span></li>
                                                        @endif
                                                    </ul>
                                                </div>
                                                <button class="btn @if($service->status == 1) btn-primary @else btn-secondary @endif px-4 text-uppercase font-weight-bold btn-width-120px collapsed fill-area-link"
                                                        data-toggle="collapse"
                                                        data-target="#collapse-item-{{$service->id}}">@if($service->status == 1)Buy @else Finished @endif
                                                </button>
                                            </div>
                                        </div>
                                        <div class="collapse service-item-collapse py-4_5 px-5"
                                             id="collapse-item-{{$service->id}}">
                                            <div class="row">
                                                <div class="col-8">
                                                    <h5 class="text-blue-darker font-weight-bold">Description</h5>
                                                    <p class="mb-0 text-blue-darker">{{$service->description}}</p>
                                                    <div class="mt-4">
                                                        <!--<button class="btn btn-primary px-4 text-uppercase font-weight-bold btn-width-120px" data-toggle="modal" data-target="#">Join</button>-->
                                                        @if($service->status == 1)
                                                            @auth
                                                                <a class="btn btn-primary px-4 text-uppercase font-weight-bold btn-width-120px buy-btn"
                                                                   href="#buy-modal" data-toggle="modal"
                                                                   data-productid="{{$service->id}}">Buy</a>
                                                            @else
                                                                <a class="btn btn-primary px-4 text-uppercase font-weight-bold btn-width-120px"
                                                                   href="#information" data-toggle="modal">Join</a>
                                                            @endauth
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-4 commerce-item-col-slider">
                                                    <h5 class="text-blue-darker font-weight-bold">Images</h5>
                                                    <div class="commerce-item__image-wrap" data-module="commerce-slider">
                                                        <div class="swiper-container commerce-slider-container js-swiper-container bg-white shadow">
                                                            <div class="swiper-wrapper commerce-slider-wrapper align-items-center">
                                                                <div class="swiper-slide commerce-slider-slide d-flex align-items-center justify-content-center p-2">
                                                                    <img class="commerce-slider-slide-image img-fluid"
                                                                         src="{{$service->main_image}}" width="230"
                                                                         height="230">
                                                                </div>

                                                                @foreach($service->images as $image)
                                                                    <div class="swiper-slide commerce-slider-slide d-flex align-items-center justify-content-center p-2">
                                                                        <img class="commerce-slider-slide-image img-fluid"
                                                                             src="/{{$image->image}}" alt="" width="230"
                                                                             height="230">
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="swiper-pagination commerce-slider-pagination js-swiper-pagination text-center position-relative"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if(!$firstSProducts)
                                    </div>
                                    @php
                                        $firstSProducts = 1;
                                    @endphp
                                @endif
                            @endif
                        @endif
                    @endforeach
                </div>
            @endif

            @if(!empty(Auth::user()->id) && Auth::user()->role == 'admin')
                <div class="tab-pane px-5 py-5_5 @if($activeTab == 'admin-tab') show active @endif" id="admin-tab">
                    <h4 class="text-uppercase mb-4 font-weight-semibold text-blue-darker">Vote Stats</h4>
                    @php
                        $vote_result = [];
                        if(!empty($voteModel->id))
                        {
                            $sql = "select `wallet_hash`, `start_team_balance`, `start_ace_balance`, `end_team_balance`, `end_ace_balance`, (IF(result = 0, 'NO', 'YES')) as golos, scout_voting_wallets.created_at as date_of_voting from scout_voting_result left join scout_voting_wallets on scout_voting_wallets.sv_result_id = scout_voting_result.id  where scout_voting_result.svoting_id = ".$voteModel->id;
                            $vote_result = DB::select($sql);
                        }
                    @endphp
                    <table class="table table-bordered table-stat" style="font-size: 14px;">
                        <colgroup>
                            <col width="140">
                            <col width="120">
                            <col width="120">
                            <col width="110">
                            <col width="120">
                            <col width="120">
                            <col width="40">
                        </colgroup>
                        <thead class="thead-light">
                        <tr>
                            <th class="font-weight-semibold text-uppercase" scope="col">Wallet</th>
                            <th class="font-weight-semibold text-uppercase" scope="col">Date of voting</th>
                            <th class="font-weight-semibold text-uppercase" scope="col">Team before</th>
                            <th class="font-weight-semibold text-uppercase" scope="col">Ace before</th>
                            <th class="font-weight-semibold text-uppercase" scope="col">Team after</th>
                            <th class="font-weight-semibold text-uppercase" scope="col">Ace after</th>
                            <th class="font-weight-semibold text-uppercase" scope="col">Vote</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($vote_result) > 0)


                            @foreach($vote_result as $vot)
                                <tr>
                                    <td>{{$vot->wallet_hash}}</td>
                                    <td>{{$vot->date_of_voting}}</td>
                                    <td>{{round($vot->start_team_balance)}}</td>
                                    <td>{{round($vot->start_ace_balance)}}</td>
                                    <td>{{round($vot->end_team_balance)}}</td>
                                    <td>{{round($vot->end_ace_balance)}}</td>
                                    <td>
                                        <span style="color:@if($vot->golos == 'NO'){{'red'}}@else{{'green'}}@endif">{{$vot->golos}}</span>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>

                </div>
            @endif

        </div>
    </article>
    <div class="section-divider"></div>

@endsection
