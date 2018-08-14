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
            <li class="breadcrumb-item active" aria-current="page">{{$player->first_name}} {{$player->last_name}} (ID: {{$player->id}})</li>
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
                        <span>{{$player->first_name}}</span>
                        <span>{{$player->last_name}}</span>
                        <small class="h4 mb-0 font-weight-normal player-card__sub-title pt-1">@if($player->is_pro){{'PRO STAR'}}@else{{'Junior'}}@endif</small>
                    </h2>
                    <div class="mt-5_5 ml-auto">
                        <div class="icon-group-md">
                            @if(!empty($player->fb_link))
                                <a class="icon icon-md icon-facebook my-2 ml-3 text-primary-50 hoverable'" href="{{$player->fb_link}}" target="_blank">
                                    <svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#facebook"></use></svg>
                                </a>
                            @endif

                            @if(!empty($player->ins_link))
                                <a class="icon icon-md icon-instagram my-2 ml-3 text-primary-50 hoverable'" href="{{$player->ins_link}}" target="_blank">
                                    <svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#instagram"></use></svg>
                                </a>
                            @endif

                            @if(!empty($player->tw_link))
                                <a class="icon icon-md icon-twitter my-2 ml-3 text-primary-50 hoverable'" href="{{$player->tw_link}}" target="_blank">
                                    <svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#twitter"></use></svg>
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
                    <div class="w-100"></div>
                    <div class="col-4 player-card-header-item mb-2">
                        <div class="title text-uppercase text-secondary">Residence</div>
                        <div class="content text-blue-darker h5 mb-0 font-weight-semibold d-flex flex-column">
                            <span>{{$player->city}},</span>
                            <span>{{$player->country->name}}</span>
                        </div>
                    </div>
                    <div class="col-4 player-card-header-item mb-2">
                        <div class="title text-uppercase text-secondary">{{$player->rank}} Ranking</div>
                        <div class="content text-blue-darker h5 mb-0 font-weight-semibold d-flex flex-column">
                            <span>{{$player->itf_current_combined}}</span>
                        </div>
                    </div>
                    <div class="col-4 player-card-header-item mb-2">
                        <div class="title text-uppercase text-secondary">Scout</div>
                        <div class="content text-blue-darker h5 mb-0 font-weight-semibold d-flex flex-column">
                            <span>@if(!empty($player->scout->RUser->first_name) && $player->scout->RUser->last_name) {{$player->scout->RUser->first_name}} {{$player->scout->RUser->last_name}} @else ID: {{$player->scout_id}} @endif</span>
                        </div>
                    </div>
                </div>
                <hr class="mt-0 mb-3">
                @if($player->status == 8)
                    <div class="row no-gutters align-items-center">
                        <div class="col-6">
                            <div class="player-card-header-voting d-inline-block text-center">
                                <div class="h3_5 mb-2 player-card-header-voting-time text-truncate font-weight-semibold text-blue-darker">
                                    @php
                                            $dt_end = new DateTime($voteModel->end_date);
                                            $remain = $dt_end->diff(new DateTime());
                                            echo $remain->d . 'd ' . $remain->h . 'h ' .$remain->m.'m' ;
                                    @endphp

                                    @php
                                        if(!empty($voteModel->ended))
                                        {
                                            $count_yes = $voteModel->end_ace_yes;
                                            $count_no = $voteModel->end_ace_no;
                                        }
                                        else
                                        {
                                            $count_yes = $voteModel->start_ace_yes;
                                            $count_no = $voteModel->start_ace_no;
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
                                <div class="badge badge-status badge-lg text-uppercase text-nowrap player-card-header-voting-status">
                                    <div class="icon badge-icon icon-check mr-1 text-success">
                                        <svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#check"></use></svg>
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
                                <button class="btn btn-outline-success text-uppercase btn-block font-weight-bold opacity-1" disabled>
                                <span class="icon icon-like icon-sm mr-1">
                                <svg viewBox="0 0 1 1"><use xlink:href=\'/images/icons.svg#like\'></use></svg>
                                </span>
                                    Please Sign in to vote
                                </button>

                            </div>
                                @endif
                                @if(!empty(Auth::user()->id) && count($wallet) == 0)
                                        <div class="col-12">
                                            <button class="btn btn-outline-danger text-uppercase btn-block font-weight-bold opacity-1" disabled>
                                <span class="icon icon-like icon-sm mr-1">
                                <svg viewBox="0 0 1 1"><use xlink:href=\'/images/icons.svg#like\'></use></svg>
                                </span>
                                                Please verify your wallet
                                            </button>

                                        </div>
                                @else
                                @if(!empty(Auth::user()->id) && !isset($votetype->result))
                                    <div class="col-6 pr-1">
                                        <button class="btn btn-outline-primary text-uppercase btn-block font-weight-bold" id="like">
              <span class="icon icon-like icon-sm_25 mr-1">
                <svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#like"></use></svg>
              </span>
                                            Support
                                        </button>
                                    </div>
                                    <div class="col-6 pl-1">
                                        <button class="btn btn-outline-primary text-uppercase btn-block font-weight-bold" id="dislike">
              <span class="icon icon-dislike icon-sm mr-1">
                <svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#dislike"></use></svg>
              </span>
                                            Decline
                                        </button>
                                    </div>
                                @elseif(!empty(Auth::user()->id) && isset($votetype->result) && $votetype->result == 1)
                                <div class="col-12">
                                  <button class="btn btn-outline-success text-uppercase btn-block font-weight-bold opacity-1" disabled>
                                    <span class="icon icon-like icon-sm mr-1">
                                      <svg viewBox="0 0 1 1"><use xlink:href='/images/icons.svg#like'></use></svg>
                                    </span>
                                    You supported
                                  </button>
                                </div>
                                @elseif(!empty(Auth::user()->id) && isset($votetype->result) && $votetype->result == 0)
                                    <div class="col-12">
                                        <button class="btn btn-outline-danger text-uppercase btn-block font-weight-bold opacity-1" disabled>
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
                                <div id="yes_label" class="progress-bar bg-success" role="progressbar" style="width: {{$perc_yes}}%" aria-valuenow="{{$perc_yes}}" aria-valuemin="0" aria-valuemax="100"></div>
                                <div id="no_label" class="progress-bar bg-danger" role="progressbar" style="width: {{$perc_no}}%" aria-valuenow="{{$perc_no}}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                @else
                <div class="badge badge-status badge-lg text-uppercase text-nowrap player-card-header-voting-status">
                    <div class="icon badge-icon icon-check mr-1 text-success">
                        <svg viewBox="0 0 1 1"><use xlink:href='/images/icons.svg#{{$status_class}}'></use></svg>
                    </div>
                    {{$statuses[$player->status]}}
                    @if($player->status == 7 && !empty($voteModel->start_date)){{date('d-m-Y',strtotime($voteModel->start_date))}}@endif
                </div>
                @endif
            </div>
            <div class="badge badge-token badge-xl badge-token-ace text-uppercase position-absolute text-nowrap player-card__token">Ace</div>
        </header>
        <script type="text/javascript">
            $(document).ready(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var vote = true;
                $('#like, #dislike').on('click', function(e){

                    e.preventDefault();
                    var action = $(this).attr('id');
                    if(vote)
                    {
                        vote = false
                        $.ajax({
                            url: '{{@route('scouting.ajax_vote')}}',
                            type: "POST",
                            data : {talent_id: '{{$player->id}}', action: action},
                            success: function(response){
                                json = JSON.parse(response.trim());
                                console.log(json);
                                if(json.status == 'ok') {

                                        $('#yes_label').attr('aria-valuenow', json.width_yes).css('width', json.width_yes + '%');
                                        $('#no_label').attr('aria-valuenow', json.width_no).css('width', json.width_no + '%');
                                        if(action == 'dislike')
                                        {
                                            $('#vote_buttons').html('<div class="col-12">\n' +
                                                '                                        <button class="btn btn-outline-danger text-uppercase btn-block font-weight-bold opacity-1" disabled>\n' +
                                                '                                <span class="icon icon-like icon-sm mr-1">\n' +
                                                '                                  <svg viewBox="0 0 1 1"><use xlink:href=\'/images/icons.svg#dislike\'></use></svg>\n' +
                                                '                                </span>\n' +
                                                '                                            You declined\n' +
                                                '                                        </button>\n' +
                                                '                                    </div>');
                                        }
                                        else {
                                            $('#vote_buttons').html('<div class="col-12">\n' +
                                                '                                  <button class="btn btn-outline-success text-uppercase btn-block font-weight-bold opacity-1" disabled>\n' +
                                                '                                    <span class="icon icon-like icon-sm mr-1">\n' +
                                                '                                      <svg viewBox="0 0 1 1"><use xlink:href=\'/images/icons.svg#like\'></use></svg>\n' +
                                                '                                    </span>\n' +
                                                '                                    You supported\n' +
                                                '                                  </button>\n' +
                                                '                                </div>');
                                        }

                                }
                                else {}
                            }
                        });
                    }
                    return false;
                })
            });
        </script>
        <div class="nav nav-pills nav-justified navigation flex-nowrap bg-white">
            <a class="nav-item nav-link text-uppercase text-truncate rounded-0 active" data-toggle="pill" href="#overview-tab">Overview</a>
            <a class="nav-item nav-link text-uppercase text-truncate rounded-0" data-toggle="pill" href="#bio-tab">Bio</a>
            <a class="nav-item nav-link text-uppercase text-truncate rounded-0" data-toggle="pill" href="#skills-tab">Skills</a>
            <a class="nav-item nav-link text-uppercase text-truncate rounded-0" data-toggle="pill" href="#stats-tab">Stats</a>
            <a class="nav-item nav-link text-uppercase text-truncate rounded-0 disabled" data-toggle="pill" href="#promotion-tab">Bounty&Promo <br/>(Soon)</a>
            <a class="nav-item nav-link text-uppercase text-truncate rounded-0 disabled" data-toggle="pill" href="#services-tab">Fan Club  <br/>(Soon)</a>
        </div>

        <div class="tab-content">
            <div class="tab-pane px-5 py-5_5 show active" id="overview-tab">
                <h4 class="text-uppercase mb-4 font-weight-semibold text-blue-darker">Overall Statistics</h4>
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
                                <h5 class="match-card-player-title mb-0 d-flex flex-column"><span>{{$latest_match->name_left}}</span><span>{{$latest_match->last_name_left}}</span></h5>
                                <div class="player-card-header-subtitle h6 font-weight-normal mt-1 mb-0">{{$latest_match->country_left}}</div>
                            </div>
                            <div class="position-relative ml-3 d-inline-block">
                                @if($latest_match->winner_left == 1)
                                <span class="icon icon-stat icon-md position-absolute match-card-player-icon">
                                  <svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#star"></use></svg>
                                </span>
                                @endif
                                @if($latest_match->avatar_left != '')
                                <img class="match-card-player-avatar" src="{{$latest_match->avatar_left}}" alt="" width="80" height="80">
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
                                <img class="match-card-player-avatar" src="{{$latest_match->avatar_right}}" alt="" width="80" height="80">
                                @endif
                            </div>
                            <div class="media-body text-truncate align-self-center">
                                <h5 class="match-card-player-title mb-0 d-flex flex-column"><span>{{$latest_match->name_right}}</span>{{$latest_match->last_name_right}}</h5>
                                <div class="player-card-header-subtitle h6 font-weight-normal mt-1 mb-0">{{$latest_match->country_right}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto d-flex flex-column match-card-col-score order-2 mx-5 text-blue-darker">
                        <h5 class="font-weight-normal text-uppercase border-left py-3 px-5 border-right text-center mb-0">Scores</h5>
                        <div class="h4 d-flex flex-nowrap justify-content-between py-3 px-3 border-left border-right border-top mb-0 text-nowrap">
                            @php
                                $scores = explode('|',trim($latest_match->scores));
                            @endphp
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
                        </div>
                    </div>
                </div>
                @endif

                <div class="section-divider-2"></div>
                @if(!empty(\App\Models\Scouting\LatestNews::where('player_tennis_id', $player->id)->first()))
                    <div class="dotdotdot dotdotdot_news-list" data-module="dotdotdot" data-ellipsis="" data-height="130">
                        @php
                        $newsl = \App\Models\Scouting\LatestNews::where('player_tennis_id', $player->id)->get();
                        @endphp
                        <h4 class="text-uppercase mb-0 font-weight-semibold text-blue-darker">Latest News <small class="typo-lg ml-4"><a class="js-toggle dotdotdot__toggle dotdotdot__toggle_show" href="">@if(count($newsl) > 3)<span>Show more &gt;</span><span>Hide</span>@endif</a></small></h4>
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
                    <div class="dotdotdot dotdotdot_news-list" data-module="dotdotdot" data-ellipsis="" data-height="130">
                        @php
                            $hist = \App\Models\Scouting\PlayerHistory::where('player_id', $player->id)->get();
                        @endphp
                        <h4 class="text-uppercase mb-0 font-weight-semibold text-blue-darker">Activity on the platform<small class="typo-lg ml-4"><a class="js-toggle dotdotdot__toggle dotdotdot__toggle_show" href="">@if(count($hist) > 3)<span>Show more &gt;</span><span>Hide</span>@endif</a></small></h4>
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
                            display:none;
                        }
                        .img-fluid{
                            max-width: inherit;
                        }
                    </style>
                @php
                    $photos = \App\Models\Scouting\PlayerImages::where('player_tennis_id', $player->id)->get();
                @endphp
                @if(count($photos) > 0)
                <div class="dotdotdot dotdotdot_video-photos" data-module="dotdotdot" data-ellipsis="" data-height="11100">
                    <h4 class="text-uppercase mb-0 font-weight-semibold text-blue-darker">Latest Videos and Photos <small class="typo-lg ml-4"><a class="js-toggle dotdotdot__toggle dotdotdot__toggle_show" href="">@if(count($photos) >2)<span id="more_btn">Show more ></span><span>Hide</span>@endif</a></small></h4>
                    <div class="row pt-3">
                        @foreach($photos as $k=>$photo)
                            @if($k==2)
                                <span id="more">
                            @endif
                        <div class="col-6 d-flex pr-4">
                            <div class="card position-relative shadow-none mb-4">
                                <a data-toggle="lightbox" href="/{{$photo->image}}"><img width="500" height="250" class="img-fluid" src="/{{$photo->prev_image}}" alt=""></a>
                            </div>

                        </div>
                            @if($k==count($photos)-1)
                                </span>
                            @endif
                        @endforeach
                    </div>
                    @if(count($photos) >2)
                    <div class="text-center mt-4 mb-5_5">
                        <button class="btn btn-outline-primary text-uppercase px-4 js-toggle dotdotdot__toggle dotdotdot__toggle_hide"  id="hide_btn">
                            <span>Show More</span>
                            <span>Hide</span>
                        </button>
                    </div>
                        @endif
                </div>
                @endif

            </div>
            <script>
                $(document).ready(function(){
                    $('#more_btn').on('click', function(){
                        $('#more').css('display', 'contents');
                    })
                    $('#hide_btn').on('click', function(){
                        $('#more').css('display', 'none');
                    })
                })

            </script>
            <div class="tab-pane px-5 py-5_5" id="bio-tab">

                <div class="section-divider-2"></div>
                <h4 class="text-uppercase mb-4 font-weight-semibold text-blue-darker">Biography</h4>
                <table class="table table-bordered table-add-info text-blue-darker mb-0">
                    <colgroup>
                        <col width="264">
                        <col width="auto">
                    </colgroup>
                    <tbody>
                    <tr>
                        <td>Date of Birth</td>
                        <td class="font-weight-semibold">{{$player->date_of_birth}}</td>
                    </tr>
                    <tr>
                        <td>Nationality</td>
                        <td class="font-weight-semibold">{{$player->country->name}}</td>
                    </tr>
                    <tr>
                        <td>Age started tennis</td>
                        <td class="font-weight-semibold">{{$player->age_started_tennis}}</td>
                    </tr>
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
                    <tr>
                        <td>Racquet brand</td>
                        <td class="font-weight-semibold">{{$player->racquet_brand}}</td>
                    </tr>
                    <tr>
                        <td>String brand</td>
                        <td class="font-weight-semibold">{{$player->string_brand}}</td>
                    </tr>
                    <tr>
                        <td>Clothing brand</td>
                        <td class="font-weight-semibold">{{$player->clothing_brand}}</td>
                    </tr>
                    <tr>
                        <td>Shoe brand</td>
                        <td class="font-weight-semibold">{{$player->shoe_brand}}</td>
                    </tr>
                    <tr>
                        <td>What are the player’s goals for the next season?</td>
                        <td class="font-weight-semibold">{{$player->goals_for_next_season}}</td>
                    </tr>
                    <tr>
                        <td>Hobby</td>
                        <td class="font-weight-semibold">{{$player->hobby}}</td>
                    </tr>
                    <tr>
                        <td>Favorite player</td>
                        <td class="font-weight-semibold">{{$player->favorite_player}}</td>
                    </tr>
                    </tbody>
                </table>

            </div>


            @php
                $diagram = \App\Models\Scouting\PlayerDiagram::where('player_id', $player->id)->first();
            @endphp
            <div class="tab-pane px-5 py-5_5" id="skills-tab">
                <h4 class="text-uppercase mb-4 font-weight-semibold text-blue-darker">Player Skills Diagram</h4>
                <div class="row">
                    @if(empty($diagram->id))
                    <div class="col-12 text-center">
                        <div style="background-image: url('/images/diagram-after.png'); background-repeat: no-repeat;background-position: center;height: 340px;width: 100%; padding-top: 14%">
                            <span style="text-transform:uppercase;width: 605px;height: 36px;font-family: Exo\ 2,Arial,Helvetica,sans-serif;;font-size: 30px;font-weight: 600;font-style: normal;font-stretch: normal;line-height: normal;letter-spacing: normal;text-align: center;color: #060535;">To be completed after experts review</span>
                        </div>
                    </div>
                    @else
                    <script>
                        var data = [
                            {
                                className: 'result',
                                axes: [
                                    {axis:"SERVE",value: '{{json_decode($diagram->serve)->value}}'},
                                    {axis:"RETURN",value:'{{json_decode($diagram->return)->value}}'},
                                    {axis:"FOREHAND",value:'{{json_decode($diagram->forehand)->value}}'},
                                    {axis:"BACKHAND",value:'{{json_decode($diagram->backhand)->value}}'},
                                    {axis:"SLICE",value:'{{json_decode($diagram->slice)->value}}'},
                                    {axis:"DRILLS AND FOOTWORK",value:'{{json_decode($diagram->drills)->value}}'},
                                    {axis:"VOLLEYS",value:'{{json_decode($diagram->volleys)->value}}'},
                                    {axis:"POINTS PLAY",value:'{{json_decode($diagram->points)->value}}'}
                                ]
                            },
                            {
                                className: 'level_5',
                                axes: [
                                    {axis:"SERVE",value:5},
                                    {axis:"RETURN",value:5},
                                    {axis:"FOREHAND",value:5},
                                    {axis:"BACKHAND",value:5},
                                    {axis:"SLICE",value:5},
                                    {axis:"DRILLS AND FOOTWORK",value:5},
                                    {axis:"VOLLEYS",value:5},
                                    {axis:"POINTS PLAY",value:5}
                                ]
                            },

                            {
                                className: 'level_4',
                                axes: [
                                    {axis:"SERVE",value:4},
                                    {axis:"RETURN",value:4},
                                    {axis:"FOREHAND",value:4},
                                    {axis:"BACKHAND",value:4},
                                    {axis:"SLICE",value:4},
                                    {axis:"DRILLS AND FOOTWORK",value:4},
                                    {axis:"VOLLEYS",value:4},
                                    {axis:"POINTS PLAY",value:4}
                                ]
                            },
                            {
                                className: 'level_3',
                                axes: [
                                    {axis:"SERVE",value:3},
                                    {axis:"RETURN",value:3},
                                    {axis:"FOREHAND",value:3},
                                    {axis:"BACKHAND",value:3},
                                    {axis:"SLICE",value:3},
                                    {axis:"DRILLS AND FOOTWORK",value:3},
                                    {axis:"VOLLEYS",value:3},
                                    {axis:"POINTS PLAY",value:3}
                                ]
                            }
                            ,
                            {
                                className: 'level_2',
                                axes: [
                                    {axis:"SERVE",value:2},
                                    {axis:"RETURN",value:2},
                                    {axis:"FOREHAND",value:2},
                                    {axis:"BACKHAND",value:2},
                                    {axis:"SLICE",value:2},
                                    {axis:"DRILLS AND FOOTWORK",value:2},
                                    {axis:"VOLLEYS",value:2},
                                    {axis:"POINTS PLAY",value:2}
                                ]
                            },
                            {
                                className: 'level_1',
                                axes: [
                                    {axis:"SERVE",value:1},
                                    {axis:"RETURN",value:1},
                                    {axis:"FOREHAND",value:1},
                                    {axis:"BACKHAND",value:1},
                                    {axis:"SLICE",value:1},
                                    {axis:"DRILLS AND FOOTWORK",value:1},
                                    {axis:"VOLLEYS",value:1},
                                    {axis:"POINTS PLAY",value:1}
                                ]
                            }
                        ];
                    </script>
                    <div class="col-6 text-center">
                        <div class="chart-container"></div>
                    </div>
                    <div class="col mx-auto text-blue-darker text-uppercase">
                        @if(
                        json_decode($diagram->serve)->good == 1 ||
                        json_decode($diagram->return)->good == 1 ||
                        json_decode($diagram->forehand)->good == 1 ||
                        json_decode($diagram->backhand)->good == 1 ||
                        json_decode($diagram->slice)->good == 1 ||
                        json_decode($diagram->drills)->good == 1 ||
                        json_decode($diagram->volleys)->good == 1 ||
                        json_decode($diagram->points)->good == 1
                        )
                        <h6 class="h4 mb-0 text-secondary font-weight-normal text-blue-darker">
                            Strongest skills
                            <span class="icon icon-like icon-md ml-2 text-success">
        <svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#like"></use></svg>
      </span>
                        </h6>
                        <ul class="list-unstyled list-base list-base-blue-darker mb-4_5">
                            @if(json_decode($diagram->serve)->good == 1)
                                <li class="h5 font-weight-normal my-2">Serve</li>
                            @endif
                            @if(json_decode($diagram->return)->good == 1)
                                <li class="h5 font-weight-normal my-2">Return</li>
                            @endif
                            @if(json_decode($diagram->forehand)->good == 1)
                                <li class="h5 font-weight-normal my-2">Forehand</li>
                            @endif
                            @if(json_decode($diagram->backhand)->good == 1)
                                <li class="h5 font-weight-normal my-2">Backhand</li>
                            @endif
                            @if(json_decode($diagram->slice)->good == 1)
                                <li class="h5 font-weight-normal my-2">Slice</li>
                            @endif
                            @if(json_decode($diagram->drills)->good == 1)
                                <li class="h5 font-weight-normal my-2">Drills and footwork</li>
                            @endif
                            @if(json_decode($diagram->volleys)->good == 1)
                                <li class="h5 font-weight-normal my-2">Volleys</li>
                            @endif
                            @if(json_decode($diagram->points)->good == 1)
                                <li class="h5 font-weight-normal my-2">Points play</li>
                            @endif
                        </ul>
                        @endif
                            @if(
                            json_decode($diagram->serve)->bad == 1 ||
                            json_decode($diagram->return)->bad == 1 ||
                            json_decode($diagram->forehand)->bad == 1 ||
                            json_decode($diagram->backhand)->bad == 1 ||
                            json_decode($diagram->slice)->bad == 1 ||
                            json_decode($diagram->drills)->bad == 1 ||
                            json_decode($diagram->volleys)->bad == 1 ||
                            json_decode($diagram->points)->bad == 1
                            )
                        <h6 class="h4 mb-0 text-secondary font-weight-normal text-blue-darker">
                            Skills to Improve
                            <span class="icon icon-dislike icon-md ml-2 text-danger">
        <svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#dislike"></use></svg>
      </span>
                        </h6>
                        <ul class="list-unstyled list-base list-base-blue-darker mb-4_5">
                            @if(json_decode($diagram->serve)->bad == 1)
                                <li class="h5 font-weight-normal my-2">Serve</li>
                            @endif
                            @if(json_decode($diagram->return)->bad == 1)
                                <li class="h5 font-weight-normal my-2">Return</li>
                            @endif
                            @if(json_decode($diagram->forehand)->bad == 1)
                                <li class="h5 font-weight-normal my-2">Forehand</li>
                            @endif
                            @if(json_decode($diagram->backhand)->bad == 1)
                                <li class="h5 font-weight-normal my-2">Backhand</li>
                            @endif
                            @if(json_decode($diagram->slice)->bad == 1)
                                <li class="h5 font-weight-normal my-2">Slice</li>
                            @endif
                            @if(json_decode($diagram->drills)->bad == 1)
                                <li class="h5 font-weight-normal my-2">Drills and footwork</li>
                            @endif
                            @if(json_decode($diagram->volleys)->bad == 1)
                                <li class="h5 font-weight-normal my-2">Volleys</li>
                            @endif
                            @if(json_decode($diagram->points)->bad == 1)
                                <li class="h5 font-weight-normal my-2">Points play</li>
                            @endif
                        </ul>
                        @endif
                    </div>
                    @endif
                </div>
                @if(!empty($diagram->overview) && $diagram->overview != '')
                <div class="section-divider-2" style="margin-top: 2.125rem;"></div>
                <h4 class="text-uppercase mb-4 font-weight-semibold text-blue-darker">Expert’s resume</h4>
                    <p>{{$diagram->overview}}</p>
                @endif

                <div class="section-divider-2" style="margin-top: 2.125rem;"></div>
                <h4 class="text-uppercase mb-4 font-weight-semibold text-blue-darker">Additional info</h4>
                <table class="table table-bordered table-add-skills-info text-blue-darker mb-0">
                    <colgroup>
                        <col width="264">
                        <col width="auto">
                    </colgroup>
                    <tbody>
                    <tr>
                        <td>{{$player->rank}} Ranking Profile</td>
                        <td class="font-weight-semibold">
                            <a href="{{$player->itf_profile}}" target="_blank">{{$player->itf_profile}}</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Other Ranking Profile</td>
                        <td class="font-weight-semibold">
                            <a href="{{$player->other_ranking_profiles}}" target="_blank">{{$player->other_ranking_profiles}}</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Forehand</td>
                        <td class="font-weight-semibold">@if($player->forehand == 1){{'Right handed'}}@else{{'Left handed'}}@endif</td>
                    </tr>
                    <tr>
                        <td>Backhand</td>
                        <td class="font-weight-semibold">@if($player->forehand == 1){{'One-handed'}}@else{{'Double-handed'}}@endif</td>
                    </tr>
                    <tr>
                        <td>Training Academy</td>
                        <td class="font-weight-semibold">
                            {{$player->training_academy}}
                        </td>
                    </tr>
                    <tr>
                        <td>Coach</td>
                        <td class="font-weight-semibold">{{$player->coach}}</td>
                    </tr>
                    <tr>
                        <td>Injuries within last 24 months</td>
                        <td class="font-weight-semibold">{{$player->injuries_24m}}</td>
                    </tr>
                    <tr>
                        <td>Favorite court</td>
                        <td class="font-weight-semibold text-truncate">
                            @if($player->fs_hard == 1)<img class="rounded-circle mr-2" src="/images/{{'color-blue@2x.jpg'}}" alt="" width="30" height="30">{{'Hard court'}}@endif
                            @if($player->fs_glass == 1)<img class="rounded-circle mr-2" src="/images/{{'color-rgreen@2x.jpg'}}" alt="" width="30" height="30">{{'Grass court'}}@endif
                            @if($player->fs_clay == 1)<img class="rounded-circle mr-2" src="/images/{{'color-red@2x.jpg'}}" alt="" width="30" height="30">{{'Clay court'}}@endif
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>
            <div class="tab-pane px-5 py-5_5" id="stats-tab">
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
                        <td><strong @if(strripos($title->result, 'winner') !== false){{'class=text-success'}}@endif>{{$title->result}}</strong></td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
                @if($count >= 3)
                <div class="mt-2">
                    <a class="btn btn-outline-primary font-weight-bold text-uppercase" id="show-more-titles" href="">Show More</a>
                </div>
                    <script type="text/javascript">
                        $('#show-more-titles').on('click', function(e){
                            e.preventDefault();
                            if($('.more-titles').css('display') == 'none') {
                                $('.more-titles').css('display', 'table-row');
                                $(this).text('Hide');
                            }
                            else
                            {
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
                    <a class="btn btn-outline-primary font-weight-bold text-uppercase" href="" id="show-more-games">Show More</a>
                </div>
                <script type="text/javascript">
                    $('#show-more-games').on('click', function(e){
                        e.preventDefault();
                        if($('.more-games').css('display') == 'none') {
                            $('.more-games').css('display', 'table-row');
                            $(this).text('Hide');
                        }
                        else
                        {
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

            </div>
            <div class="tab-pane px-5 py-5_5" id="promotion-tab">
                <h4 class="text-uppercase mb-4 font-weight-semibold text-blue-darker">Social Networks</h4>
                <table class="table table-bordered table-social text-blue-darker mb-0">
                    <colgroup>
                        <col width="90">
                        <col width="120">
                        <col width="auto">
                        <col width="100">
                        <col width="100">
                        <col width="100">
                        <col width="100">
                        <col width="auto">
                    </colgroup>
                    <thead class="thead-light">
                    <tr>
                        <th class="font-weight-semibold text-uppercase text-truncate text-center" scope="col">Social</th>
                        <th class="font-weight-semibold text-uppercase text-truncate text-center" scope="col">Language</th>
                        <th class="font-weight-semibold text-uppercase text-truncate" scope="col">Name (link)</th>
                        <th class="font-weight-semibold text-uppercase text-truncate text-center" scope="col">Subs</th>
                        <th class="font-weight-semibold text-uppercase text-truncate text-center" scope="col">Posts</th>
                        <th class="font-weight-semibold text-uppercase text-truncate text-center" scope="col">Likes</th>
                        <th class="font-weight-semibold text-uppercase text-truncate text-center" scope="col">Shares</th>
                        <th class="font-weight-semibold text-uppercase text-truncate" scope="col">Promoter</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="text-truncate text-center align-middle">
                            <i class="icon icon-sprite icon-facebook"></i>
                        </td>
                        <td class="text-truncate text-center align-middle">
                            <i class="icon icon-sprite icon-flag-england"></i>
                        </td>
                        <td class="text-truncate align-middle">
                            <a href="">David Smith – Junior Star</a>
                        </td>
                        <td class="text-truncate text-center align-middle">
                            1,034
                            <small class="text-success d-block">+98</small>
                        </td>
                        <td class="text-truncate text-center align-middle">
                            34
                            <small class="text-success d-block">+2</small>
                        </td>
                        <td class="text-truncate text-center align-middle">
                            3,011
                            <small class="text-success d-block">+321</small>
                        </td>
                        <td class="text-truncate text-center align-middle">
                            123
                            <small class="text-success d-block">+24</small>
                        </td>
                        <td class="text-truncate align-middle">
                            <a href="">Daniel Adams</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-truncate text-center align-middle">
                            <i class="icon icon-sprite icon-instagram"></i>
                        </td>
                        <td class="text-truncate text-center align-middle">
                            <i class="icon icon-sprite icon-flag-england"></i>
                        </td>
                        <td class="text-truncate align-middle">
                            <a href="">David Smith – Junior Star</a>
                        </td>
                        <td class="text-truncate text-center align-middle">
                            1,034
                            <small class="text-success d-block">+98</small>
                        </td>
                        <td class="text-truncate text-center align-middle">
                            34
                            <small class="text-success d-block">+2</small>
                        </td>
                        <td class="text-truncate text-center align-middle">
                            3,011
                            <small class="text-success d-block">+321</small>
                        </td>
                        <td class="text-truncate text-center align-middle">
                            123
                            <small class="text-success d-block">+24</small>
                        </td>
                        <td class="text-truncate align-middle">
                            <a href="">Daniel Adams</a>
                        </td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="8">
                            <button class="btn btn-primary btn-sm font-weight-bold text-uppercase">+ Add New</button>
                        </td>
                    </tr>
                    </tfoot>
                </table>

                <div class="row my-5_5">
                    <div class="col-4 mx-auto">
                        <div class="text-center">
                            <h5 class="text-blue-darker font-weight-normal mb-4">This player has no promoters yet. Click a button below to be the first one.</h5>
                            <p class="mb-0"><a class="btn btn-primary font-weight-bold btn-lg text-uppercase" href="">Become a David's promoter</a></p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane px-5 py-5_5" id="services-tab">
                <h4 class="text-uppercase mb-4 font-weight-semibold text-blue-darker">Available services</h4>
                <ul class="list-unstyled communication-list mb-0 shadow">
                    <li class="communication-item media position-relative align-items-stretch">
                        <div class="communication-item-icon-wrapper position-relative mr-3">
                            <div class="icon icon-training communication-item-icon position-absolute m-auto">
                                <svg viewBox="0 0 1 1"><use xlink:href='/images/icons.svg#training'></use></svg>
                            </div>
                        </div>
                        <div class="media-body communication-item-body py-4">
                            <h4 class="communication-item-title  mb-1">
                                Service 1
                            </h4>
                            <p class="communication-item-descr mb-0">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            </p>
                        </div>
                        <div class="mx-5 align-self-center py-4 d-flex flex-nowrap align-items-center">
                            <div class="h5 font-weight-semibold text-pink mr-2 mb-0"> 20 TEAM</div>
                            <a class="btn btn-primary px-4 text-uppercase font-weight-bold fill-area-link btn-width-120px" href="">Buy</a>
                        </div>
                    </li>
                    <li class="communication-item media position-relative align-items-stretch">
                        <div class="communication-item-icon-wrapper position-relative mr-3">
                            <div class="icon icon-qna communication-item-icon position-absolute m-auto">
                                <svg viewBox="0 0 1 1"><use xlink:href='/images/icons.svg#qna'></use></svg>
                            </div>
                        </div>
                        <div class="media-body communication-item-body py-4">
                            <h4 class="communication-item-title mb-1">
                                Service 2
                            </h4>
                            <p class="communication-item-descr mb-0">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </p>
                        </div>
                        <div class="mx-5 align-self-center py-4 d-flex flex-nowrap align-items-center">
                            <div class="h5 font-weight-semibold text-pink mr-2 mb-0"> 120 TEAM</div>
                            <a class="btn btn-primary px-4 text-uppercase fill-area-link font-weight-bold btn-width-120px" href="">Buy</a>
                        </div>
                    </li>
                </ul>

            </div>
        </div>
    </article>
    <div class="section-divider"></div>

@endsection
