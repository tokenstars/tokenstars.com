@extends('players.player-card')

@section('content')

<div class="section-divider"></div>
<div class="container">
    @if(!empty($pro))
    <h2 class="h3 text-uppercase text-secondary mb-0">Pro Players</h2>


    <div class="row talent-row pb-6">
        @foreach($pro as $p)
        <div class="col col-6 talent-col d-flex">
            <div class="card talent-item hoverable w-100 mx-auto ">
                <div>
                    <div class="talent-item-img-wrapper d-inline-block position-relative">
                        <img class="talent-item-img" src="{{$p->photo}}" alt="" width="auto" height="250">
                    </div>
                </div>
                <div class="card-img-overlay py-5 pr-5 talent-item-content">
                    <h3 class="card-title talent-item-title text-uppercase d-flex flex-column mb-0">
                        <span @if (mb_strlen($p->first_name) >= 9) class="short_name" @endif >{{mb_strimwidth($p->first_name,0, 15,'...')}}</span> <span @if (mb_strlen($p->last_name) >= 20) class="short_name" @endif>{{mb_strimwidth($p->last_name,0, 30,'...')}}</span>
                    </h3>
                    <div class="talent-item-subtitle text-uppercase mb-4">Pro star</div>
                    <ul class="list-unstyled mb-0 talent-item-list text-uppercase">
                        <li class="my-1 row no-gutters flex-nowrap talent-item-item"><span class="col-6 pr-2 text-truncate title">Age:</span> <span class="col-6 pl-2 text-truncate"><span class="font-weight-bold">{{ $p->calc_age($p->date_of_birth)}}</span></span></li>
                        <li class="my-1 row no-gutters flex-nowrap talent-item-item"><span class="col-6 pr-2 text-truncate title">Sport:</span> <span class="col-6 pl-2 text-truncate"><span class="font-weight-bold">@if($p->sport_type == 1){{'Tennis'}}@elseif($p->sport_type == 2){{'Poker'}}@elseif($p->sport_type == 3){{'Football'}}@endif</span></span></li>
                        <li class="my-1 row no-gutters flex-nowrap talent-item-item"><span class="col-6 pr-2 text-truncate title">Country:</span> <span class="col-6 pl-2 text-truncate"><span class="font-weight-bold">@if(!empty($p->nationality_name->iso_3166_3)){{$p->nationality_name->iso_3166_3}}@else{{'--'}}@endif</span></span></li>
                    </ul>
                </div>

                <div class="badge badge-status badge-status-star text-uppercase talent-item-status position-absolute text-nowrap">
                    <div class="icon badge-icon icon-star   mr-1">
                        <svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#star"></use></svg>
                    </div>
                    Pro Star
                </div>
                <div class="badge badge-token badge-lg badge-token-team text-uppercase talent-item-token position-absolute text-nowrap">@if($p->sport_type == 1){{'ace'}}@elseif($p->sport_type == 2 || $p->sport_type == 3){{'team'}}@endif</div>
                <a class="card-img-overlay p-5 text-white talent-item-link d-flex flex-column justify-content-center" href="/scouting/card/{{$p->id}}">
    <span class="icon icon-search ml-5 talent-item-icon">
        <svg viewBox="0 0 1 1"><use xlink:href="images/icons.svg#search"></use></svg>
    </span>
                    <span class="h5 mt-2 mb-0 d-block ml-2 text-uppercase">Go to profile</span>
                    <span class="h5 mt-2 mb-0 d-block ml-2 text-uppercase">Go to profile</span>
                </a>
            </div>
        </div>
    @endforeach
    </div>
    @endif
    @if(count($players) > 0)
    <h2 class="h3 text-uppercase text-secondary mb-0">Supported Talents</h2>

    <div class="row talent-row pb-6">
        @foreach($players as $pl)
        <div class="col col-6 talent-col d-flex">
            <div class="card talent-item hoverable w-100 mx-auto ">
                <div>
                    <div class="talent-item-img-wrapper d-inline-block position-relative">
                        <img class="talent-item-img" src="{{$pl->photo}}" alt="" width="auto" height="280">
                    </div>
                </div>
                <div class="card-img-overlay py-5 pr-5 talent-item-content">
                    <h3 class="card-title talent-item-title text-uppercase d-flex flex-column mb-0">
                        <span @if (mb_strlen($pl->first_name) >= 9) class="short_name" @endif >{{mb_strimwidth($pl->first_name,0, 15,'...')}}</span> <span @if (mb_strlen($pl->last_name) >= 20) class="short_name" @endif>{{mb_strimwidth($pl->last_name,0, 30,'...')}}</span>
                    </h3>
                    <div class="talent-item-subtitle text-uppercase mb-4">@if($pl->sport_type == 1){{'Junior'}}@elseif($pl->sport_type == 2) {{'Poker player'}}@elseif($pl->sport_type == 3){{'Football player'}}@endif</div>
                    <ul class="list-unstyled mb-0 talent-item-list text-uppercase">
                        <li class="my-1 row no-gutters flex-nowrap talent-item-item"><span class="col-6 pr-2 text-truncate title">Age:</span> <span class="col-6 pl-2 text-truncate"><span class="font-weight-bold">{{ $pl->calc_age($pl->date_of_birth)}}</span></span></li>
                        <li class="my-1 row no-gutters flex-nowrap talent-item-item"><span class="col-6 pr-2 text-truncate title">Sport:</span> <span class="col-6 pl-2 text-truncate"><span class="font-weight-bold">@if($pl->sport_type == 1){{'Tennis'}}@elseif($pl->sport_type == 2){{'Poker'}}@elseif($pl->sport_type == 3){{'Football'}}@endif</span></span></li>
                        <li class="my-1 row no-gutters flex-nowrap talent-item-item"><span class="col-6 pr-2 text-truncate title">Country:</span> <span class="col-6 pl-2 text-truncate"><span class="font-weight-bold">@if(!empty($pl->country->iso_3166_3)){{$pl->country->iso_3166_3}}@else{{'--'}}@endif</span></span></li>
                    </ul>
                </div>
                <div class="badge badge-status badge-status-approved text-uppercase talent-item-status position-absolute text-nowrap">
                    <div class="icon badge-icon icon-approved text-success  mr-1">
                        <svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#approved"></use></svg>
                    </div>
                    Contract signed
                </div>
                <div class="badge badge-token badge-lg badge-token-team text-uppercase talent-item-token position-absolute text-nowrap">@if($pl->sport_type == 1){{'ace'}}@elseif($pl->sport_type == 2 || $pl->sport_type == 3){{'team'}}@endif</div>
                <a class="card-img-overlay p-5 text-white talent-item-link d-flex flex-column justify-content-center" href="/scouting/card/{{$pl->id}}">
    <span class="icon icon-search ml-5 talent-item-icon">
        <svg viewBox="0 0 1 1"><use xlink:href="images/icons.svg#search"></use></svg>
    </span>
                </a>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>

@endsection
