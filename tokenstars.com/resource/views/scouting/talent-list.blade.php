<style>
	.pg ul.pagination {
		display: inline-block;
		padding: 0;
		margin: 0;
	}

	.pg ul.pagination li {display: inline;}

	.pg ul.pagination li a,  .pg span {
		color: black;
		float: left;
		padding: 8px 16px;
		text-decoration: none;
		transition: background-color .3s;
		border: 1px solid #ddd;
		font-size: 18px;
	}

	.pg ul.pagination li.active span {
		background-color: #eee;
		color: black;
		border: 1px solid #ddd;
	}

	.pg ul.pagination li a:hover:not(.active) {background-color: #ddd;}

	.talent-item-img {
		max-height: 250px;
		object-fit: cover;
		object-position: top;
	}
</style>
<div class="row talent-row pb-6">
	<div class="col col-6 talent-col d-flex">
		<div class="card talent-item w-100 mx-auto hoverable">
			<div>
				<div class="talent-item-img-wrapper d-inline-block position-relative">
					<img class=talent-item-img" src="../images/talent-thumb-unkown.jpg" alt="" width="285" height="250">
				</div>
			</div>
			<div class="card-img-overlay py-5 pr-5 talent-item-content">
				<h3 class="card-title talent-item-title text-uppercase d-flex flex-column">
					New player
				</h3>
			</div>
			<div class="card-img-overlay px-5 pt-5 pb-5 d-flex flex-column align-items-center justify-content-end">
				<span>
					<a class="btn btn-primary text-uppercase px-4 fill-area-link" href="/scouting/create"> <!--data-toggle="modal" data-target="#information"-->
						Make Your Submission
					</a>
				</span>
			</div>
		</div>
	</div>
	@foreach($own_players as $player)
		@php
		$vote = \App\Models\Scouting\ScoutVoting::where('talent_id', $player->id)->first();
		@endphp
	<div class="col col-6 talent-col d-flex">
		<div class="card talent-item hoverable w-100 mx-auto ">
			<div>
				<div class="talent-item-img-wrapper d-inline-block position-relative">

					<img class="talent-item-img" src="@if($player->photo == 'https://via.placeholder.com/402x450'){{'../images/talent-thumb-unkown.jpg'}}@else{{$player->photo}}@endif" alt="" width="auto" height="250">

				</div>
			</div>
			<div class="card-img-overlay py-5 pr-5 talent-item-content">
				<h4 class="card-title talent-item-title text-uppercase d-flex flex-column mb-0">
					<span @if (mb_strlen($player->first_name) >= 9) class="short_name" @endif >{{mb_strimwidth($player->first_name,0, 15,'...')}}</span> <span @if (mb_strlen($player->last_name) >= 20) class="short_name" @endif>{{mb_strimwidth($player->last_name,0, 30,'...')}}</span>
				</h4>
				<div class="talent-item-subtitle text-uppercase mb-4"><!--2nd place at Wimbledon--></div>
				<ul class="list-unstyled mb-0 talent-item-list text-uppercase">
					<li class="my-1 row no-gutters flex-nowrap talent-item-item"><span class="col-6 pr-2 text-truncate title">Age:</span> <span class="col-6 pl-2 text-truncate"><span class="font-weight-bold">{{ $player->calc_age($player->date_of_birth)}}</span></span></li>
					<li class="my-1 row no-gutters flex-nowrap talent-item-item"><span class="col-6 pr-2 text-truncate title">Sport:</span> <span class="col-6 pl-2 text-truncate"><span class="font-weight-bold">@if($player->sport_type == 1){{'Tennis'}}@elseif($player->sport_type == 2){{'Poker'}}@elseif($player->sport_type == 3){{'Football'}}@endif</span></span></li>
					<li class="my-1 row no-gutters flex-nowrap talent-item-item"><span class="col-6 pr-2 text-truncate title">Country:</span> <span class="col-6 pl-2 text-truncate"><span class="font-weight-bold">@if(!empty($player->country->iso_3166_3)){{$player->country->iso_3166_3}}@else--@endif</span></span></li>
				</ul>
			</div>
			<div class="badge badge-status badge-status- text-uppercase talent-item-status position-absolute text-nowrap">
				
				@if($player->status == 4 || $player->status == 5 || $player->status == 9 || $player->status == 12)

					<div class="icon badge-icon icon-check mr-1 text-success">
						<svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#check"></use></svg>
					</div>
				@elseif($player->status == 3 || $player->status == 6 || $player->status == 10)
				<div class="icon badge-icon icon-check mr-1 text-success">
					<svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>
				</div>
				@elseif($player->status == 1 || $player->status == 2 || $player->status == 7)
					<div class="icon badge-icon icon-check mr-1 text-success">
						<svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#pending"></use></svg>
					</div>
				@endif


				{{$statuses[$player->status]}}
				@if($player->status == 7 && !empty($vote->start_date)){{date('d-m-Y',strtotime($vote->start_date))}}@endif
			</div>
			<div class="badge badge-token badge-lg badge-token-ace text-uppercase talent-item-token position-absolute text-nowrap">@if($player->sport_type == 1){{'ace'}}@elseif($player->sport_type == 2 || $player->sport_type == 3){{'team'}}@endif</div>
			<a class="card-img-overlay p-5 text-white talent-item-link d-flex flex-column justify-content-center" href="@if($player->status > 2){{route('scouting.player_card_view', $player->id)}}@else{{route('scouting.edit', $player->id)}}@endif/">
				<span class="icon icon-search ml-5 talent-item-icon">
					<svg viewBox="0 0 1 1"><use xlink:href="images/icons.svg#search"></use></svg>
				</span>
				<span class="h5 mt-2 mb-0 d-block ml-2 font-family-alt text-uppercase">Go to profile</span>
			</a>
		</div>
	</div>
	@endforeach

</div>

<div class="pg" style="text-align: center">
	{{$own_players->appends(['f_sport' => $f_sport])->fragment('list-of-tallents')->links()}}
</div>
<br/>
@auth
	@include('scouting.popup-auth')
@else
	@include('scouting.popup-guest')
@endauth
