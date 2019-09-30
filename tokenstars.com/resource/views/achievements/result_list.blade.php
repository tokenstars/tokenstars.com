
<div class="tab-content div-achievements">
	@php
		$first_module = 1;
	@endphp
@foreach($ahievementModules as $ahievementModule)
	@if(strlen($ahievementModule->name) > 0)
			<div id="ach-{{$ahievementModule->id}}" class="ach-item">
			<h2 class="text-uppercase text-pink mb-0 pb-1 text-center font-weight-bold" >{{$ahievementModule->name}}</h2>
		<!--<div class="row result-row py-4 tab-pane @if($first_module == 1) active @php $first_module = 0;	@endphp @endif" id="ach-{{$ahievementModule->id}}">-->
		<div class="row result-row py-4 @if($first_module == 1) active @php $first_module = 0;	@endphp @endif" >

			@php
				$count_achievements = $ahievementModule->achievements()->where('name','<>','')->count();
				$take = 6;
				if($count_achievements > 6){
					$take = 5;
				}
			@endphp

			@foreach($ahievementModule->achievements()->where('name','<>','')->orderBy('weight')->orderBy('name')->take($take)->get() as $achievement)
				@if(strlen($achievement->name) > 0)
					<div class="col-12 col-md-6 col-lg-4 result-col d-flex">
						<div class="card result-item hoverable w-100 mx-auto my-2">
							<div class="text-right">
								<div class="result-item-img-wrapper d-inline-block position-relative cover-background" style="background-image: url({{$achievement->image}})">
									<img class="result-item-img img-fluid invisible" src="{{$achievement->image}}" alt="" width="960" height="540">
								</div>
							</div>
							<!--<div class="card-img-overlay py-4 pl-4 result-item-content d-flex flex-column">
								<h3 class="card-title result-item-title d-flex flex-column mb-4">
									{{$achievement->name}}
								</h3>
								<div class="spacer"></div>
								<ul class="list-unstyled list-base list-base-blue-darker result-item-list">
									@for ($i = 1; $i < 11; $i++)
										@php $item = 'item_'.$i; @endphp
										@if(strlen($achievement->$item) > 0)
											<li class="my-1 result-item-item">{{$achievement->$item}}</li>
										@endif
									@endfor
								</ul>
								<div class="spacer"></div>
							</div>-->
							<div class="text-uppercase result-item-read position-absolute text-nowrap mr-4 mb-4">Read</div>
							<a class="card-img-overlay p-4 text-white result-item-link d-flex flex-column justify-content-center" href="{{$achievement->link}}" rel="noreferer, ,noopener" target="_blank">

							</a>
						</div>
					</div>
				@endif
			@endforeach

			@if($take == 5)
				<div class="col-12 col-lg-4 result-col d-flex align-items-center ach-btn-more" data-ach-item="{{$ahievementModule->id}}">
					<div class="mx-auto my-4">
						<div class="btn btn-blue btn-big white-text" href="#">+{{$count_achievements-5}} more</div>
					</div>
				</div>

				@foreach($ahievementModule->achievements()->where('name','<>','')->orderBy('weight')->orderBy('name')->skip(5)->take(10)->get() as $achievement)
					@if(strlen($achievement->name) > 0)
						<div class="col-12 col-lg-4 result-col d-flex ach-items-{{$ahievementModule->id}}" style="display: none !important;">
							<div class="card result-item hoverable w-100 mx-auto my-2">
								<div class="text-right">
									<div class="result-item-img-wrapper d-inline-block position-relative cover-background" style="background-image: url({{$achievement->image}})">
										<img class="result-item-img img-fluid invisible" src="{{$achievement->image}}" alt="" width="285" height="250">
									</div>
								</div>
								<!--<div class="card-img-overlay py-4 pl-4 result-item-content d-flex flex-column">
									<h3 class="card-title result-item-title d-flex flex-column mb-4">
										{{$achievement->name}} SKIP
									</h3>
									<div class="spacer"></div>
									<ul class="list-unstyled list-base list-base-blue-darker result-item-list">
										@for ($i = 1; $i < 11; $i++)
											@php $item = 'item_'.$i; @endphp
											@if(strlen($achievement->$item) > 0)
												<li class="my-1 result-item-item">{{$achievement->$item}}</li>
											@endif
										@endfor
									</ul>
									<div class="spacer"></div>
								</div>-->
								<div class="text-uppercase result-item-read position-absolute text-nowrap mr-4 mb-4">Read</div>
								<a class="card-img-overlay p-4 text-white result-item-link d-flex flex-column justify-content-center" href="{{$achievement->link}}" rel="noreferer, ,noopener" target="_blank">
								</a>
							</div>
						</div>
					@endif
				@endforeach
			@endif
		</div>
		</div>
	@endif
@endforeach
</div>
