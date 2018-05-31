<fieldset class="card step-card">
	<header class="card-header step-card-header py-4 px-5">
		<h4 class="step-title text-uppercase mb-0 font-family-alt">
			<span class="step-title-secondary">Step 4 of 7</span>
			<span class="step-title-primary">Playing and training Details</span>
		</h4>
	</header>
	<form action="{{route('scouting.create_step4_post')}}" method="post">
		{{ csrf_field() }}
		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<div class="card-body px-5 py-4">
			<div class="row pt-4 mt-1">
				<div class="col-6 pr-5">
					<div class="form-group">
						<label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Forehand</label>
						<div class="btn-group btn-group-lg btn-group-toggle d-flex w-100 rounded-0" data-toggle="buttons">
							@if ((isset($forehand)  && ($forehand == 1 || $forehand == '')) || !isset($forehand))
								<label class="btn btn-form w-100 rounded-0 font-weight-bold active">
									<input type="radio" name="forehand" id="option1" autocomplete="off" value="1" checked> Right handed
								</label>
							@else
								<label class="btn btn-form w-100 rounded-0 font-weight-bold">
									<input type="radio" name="forehand" id="option1" autocomplete="off" value="1"> Right handed
								</label>
							@endif
							@if (isset($forehand) && $forehand == 2)
								<label class="btn btn-form w-100 rounded-0 font-weight-bold active">
									<input type="radio" name="forehand" id="option2" autocomplete="off" value="2" checked> Left handed
								</label>
							@else
								<label class="btn btn-form w-100 rounded-0 font-weight-bold">
									<input type="radio" name="forehand" id="option2" autocomplete="off" value="2"> Left handed
								</label>
							@endif
							</label>
						</div>
					</div>
				</div>
				<div class="col-6 pl-5">
					<div class="form-group">
						<label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Backhand</label>
						<div class="btn-group btn-group-lg btn-group-toggle d-flex w-100 rounded-0" data-toggle="buttons">
							@if ((isset($backhand)  && ($backhand == 1 || $backhand == '')) || !isset($backhand))
								<label class="btn btn-form w-100 rounded-0 font-weight-bold active">
									<input type="radio" name="backhand" id="option1" autocomplete="off" value="1" checked> One-handed
								</label>
							@else
								<label class="btn btn-form w-100 rounded-0 font-weight-bold">
									<input type="radio" name="backhand" id="option1" autocomplete="off" value="1"> One-handed
								</label>
							@endif
							@if (isset($backhand) && $backhand == 2)
								<label class="btn btn-form w-100 rounded-0 font-weight-bold active">
									<input type="radio" name="backhand" id="option2" autocomplete="off" value="2" checked> Double-handed
								</label>
							@else
								<label class="btn btn-form w-100 rounded-0 font-weight-bold">
									<input type="radio" name="backhand" id="option2" autocomplete="off" value="2"> Double-handed
								</label>
							@endif
						</div>
					</div>
				</div>
				<div class="col-6 pr-5">
					<div class="form-group">
						<label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Age started tennis</label>
						<input class="form-control form-control-lg font-weight-bold text-blue-darker" name="age_started_tennis" id="" type="number" value="{{$age_started_tennis or ""}}" min="1" max="110">
					</div>
				</div>
				<div class="col-6 pl-5">
					<div class="form-group">
						<label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Favorite surface</label>
						<div class="row py-2">
							<div class="col-auto">
								<div class="custom-control custom-checkbox h5 text-blue-darker">
									@if(isset($fs_hard) && $fs_hard)
										<input name="fs_hard" type="checkbox" class="custom-control-input" id="hard" checked="checked">
									@else
										<input name="fs_hard" type="checkbox" class="custom-control-input" id="hard">
									@endif
									<label class="custom-control-label" for="hard">
										Hard
									</label>
								</div>
							</div>
							<div class="col-auto">
								<div class="custom-control custom-checkbox h5 text-blue-darker">
									@if(isset($fs_glass) && $fs_glass)
										<input name="fs_hard" type="checkbox" class="custom-control-input" id="glass" checked="checked">
									@else
										<input name="fs_hard" type="checkbox" class="custom-control-input" id="glass">
									@endif
									<label class="custom-control-label" for="glass">
										Glass
									</label>
								</div>
							</div>
							<div class="col-auto">
								<div class="custom-control custom-checkbox h5 text-blue-darker">
									@if(isset($fs_clay) && $fs_clay)
										<input name="fs_clay" type="checkbox" class="custom-control-input" id="clay" checked="checked">
									@else
										<input name="fs_clay" type="checkbox" class="custom-control-input" id="clay">
									@endif
									<label class="custom-control-label" for="clay">
										Clay
									</label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-6 pr-5">
					<div class="form-group">
						<label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Training Academy</label>
						<input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" name="training_academy" value="{{$training_academy or ""}}">
					</div>
				</div>
				<div class="col-6 pl-5">
					<div class="form-group">
						<label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Coach</label>
						<input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" name="coach" value="{{$coach or ""}}">
					</div>
				</div>
				<div class="col-6 pr-5">
					<div class="form-group">
						<label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Former coach(es)</label>
						<input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" name="former_coach" value="{{$former_coach or ""}}">
					</div>
				</div>
				<div class="col-6 pl-5">
					<div class="form-group">
						<label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Agent (if any)</label>
						<input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" name="agent" value="{{$agent or ""}}">
					</div>
				</div>
				<div class="col-6 pr-5">
					<div class="form-group">
						<label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Who covers tennis expenses as of now?</label>
						<input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" name="who_covers_now" value="{{$who_covers_now or ""}}">
					</div>
				</div>
				<div class="col-6 pl-5">
					<div class="form-group">
						<label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Injuries within last 24 months</label>
						<input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" name="injuries_24m" value="{{$injuries_24m or ""}}">
					</div>
				</div>
				<div class="col-6 pr-5">
					<div class="form-group">
						<label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Racquet brand</label>
						<input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" name="racquet_brand" value="{{$racquet_brand or ""}}">
					</div>
				</div>
				<div class="col-6 pl-5">
					<div class="form-group">
						<label class="text-uppercase text-blue-gray-light font-weight-bold" for="">String brand</label>
						<input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" name="string_brand" value="{{$string_brand or ""}}">
					</div>
				</div>
				<div class="col-6 pr-5">
					<div class="form-group">
						<label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Clothing brand</label>
						<input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" name="clothing_brand" value="{{$clothing_brand or ""}}">
					</div>
				</div>
				<div class="col-6 pl-5">
					<div class="form-group">
						<label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Shoe brand</label>
						<input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" name="shoe_brand" value="{{$shoe_brand or ""}}">
					</div>
				</div>
				<div class="col-12">
					<div class="form-group">
						<div class="more_wrapper_video_links more-div">
							<label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Links to training video
								</label>
							<div class="text-blue-gray-light mb-2">Please upload your training video in accordance with the tutorial
								<div class="download-item text-uppercase d-flex flex-nowrap align-items-center position-relative">
									<i class="icon icon-sprite icon-download-white bg-primary mr-2 download-item-icon"></i>
									<a class="download-item-link fill-area-link" href="/upload/files/Tutorial_for_video_shooting.pdf" target="_blank" style="text-transform: capitalize;">Tutorial for video shooting</a>
								</div>
							</div>

							@if(isset($video_links))
								@foreach($video_links as $v_id => $v_value)
									<div class="input-group input-group-lg mb-2">
										<input class="form-control font-weight-bold text-blue-darker " type="url" value="{{$v_value}}" id=""
											   name="video_links[{{$v_id}}]" placeholder="Add link to video">
										<div class="input-group-append">
											<button class="btn btn-white btn-icon btn-lg rounded-0 delete-more-btn">
                                        <span class="icon icon-close-red icon-md">
                                            <svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>
                                        </span>
											</button>
										</div>
									</div>
								@endforeach
							@else
								<div class="input-group input-group-lg mb-2">
									<input class="form-control font-weight-bold text-blue-darker " type="url" value="" id=""
										   name="video_links[]" placeholder="Add link to video">
									<div class="input-group-append">
										<button class="btn btn-white btn-icon btn-lg rounded-0 delete-more-btn">
                                        <span class="icon icon-close-red icon-md">
                                            <svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>
                                        </span>
										</button>
									</div>
								</div>
							@endif
						</div>
						<button class="btn btn-outline-primary text-uppercase font-weight-bold add-more-btn">+ add more
							videos
						</button>
					</div>
				</div>
			</div>
			<div class="mt-5 mb-2 d-flex">
				<button class="btn btn-outline-secondary btn-lg text-uppercase px-4 mr-4" name='btn_back'>Back</button>
				<button class="btn btn-primary btn-lg text-uppercase px-4" name='btn_next'>Next Step ></button>
				<button class="btn btn-outline-primary btn-lg text-uppercase px-4 ml-auto step-save-button"
						name='btn_save'>Save
				</button>
			</div>
		</div>
	</form>
</fieldset>
