<fieldset class="card step-card">
	<header class="card-header step-card-header py-4 px-5">
		<h4 class="step-title text-uppercase mb-0 font-family-alt">
			<span class="step-title-secondary">Step 3 of 7</span>
			<span class="step-title-primary">Tennis Stats</span>
		</h4>
	</header>
	<form action="{{route('scouting.create_step3_post')}}" method="post">
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
					<label class="text-uppercase text-blue-gray-light font-weight-bold" for="">ITF Profile (link)*</label>
					<input class="form-control form-control-lg font-weight-bold text-blue-darker" type="url" value="{{$itf_profile or ""}}" name="itf_profile" placeholder="Add the ITF profile link">
				</div>
			</div>
			<div class="col-6 pl-5">
				<div class="form-group">
					<label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Other Ranking Profiles (link)</label>
					<input class="form-control form-control-lg font-weight-bold text-blue-darker" type="url" value="{{$other_ranking_profiles or ""}}" name="other_ranking_profiles" placeholder="Add the profile link">
				</div>
			</div>
			<div class="col-6 pr-5">
				<div class="form-group">
					<label class="text-uppercase text-blue-gray-light font-weight-bold" for="">ITF Current Combined</label>
					<input class="form-control form-control-lg font-weight-bold text-blue-darker" type="number" value="{{$itf_current_combined or ""}}" name="itf_current_combined" placeholder="0">
				</div>
			</div>
			<div class="col-6 pl-5">
				<div class="form-group">
					<label class="text-uppercase text-blue-gray-light font-weight-bold" for="">ITF Career High Combined</label>
					<input class="form-control form-control-lg font-weight-bold text-blue-darker" type="number" value="{{$itf_career_hight_combined or ""}}" name="itf_career_hight_combined" placeholder="0">
				</div>
			</div>
			<div class="col-6 pr-5">
				<div class="form-group">
					<label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Win-Loss (current year singles)</label>
					<input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" value="{{$win_loss_cys or ""}}" name="win_loss_cys" placeholder="00 - 00">
				</div>
			</div>
			<div class="col-6 pl-5">
				<div class="form-group">
					<label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Win-Loss (all time)</label>
					<input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" value="{{$win_loss_at or ""}}" name="win_loss_at" placeholder="00-00">
				</div>
			</div>
			<div class="col-12">
				<div class="form-group">
					<div class="more_wrapper_titles_singles more-div">
					<label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Titles singles</label>
						@if(isset($titles_singles))
							@foreach($titles_singles as $ts_id => $ts_value)
								<div class="input-group input-group-lg mb-2">
									<input class="form-control font-weight-bold text-blue-darker" type="text" value="{{$ts_value}}" name="titles_singles[{{$ts_id}}]" placeholder="Add the details: Month, Year, Tournament, Location">
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
								<input class="form-control font-weight-bold text-blue-darker" type="text"value="" name="titles_singles[]" placeholder="Add the details: Month, Year, Tournament, Location">
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
					<button class="btn btn-outline-primary text-uppercase font-weight-bold add-more-btn">+ add titles</button>
				</div>
			</div>
			<div class="col-12">
				<div class="form-group">
					<div class="more_wrapper_titles_doubles more-div">
					<label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Titles Doubles</label>
						@if(isset($titles_doubles))
							@foreach($titles_doubles as $td_id => $td_value)
								<div class="input-group input-group-lg mb-2">
									<input class="form-control font-weight-bold text-blue-darker" type="text" value="{{$td_value}}" name="titles_doubles[{{$td_id}}]" placeholder="Add the details: Month, Year, Tournament, Location">
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
								<input class="form-control font-weight-bold text-blue-darker" type="text"value="" name="titles_doubles[]" placeholder="Add the details: Month, Year, Tournament, Location">
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
					<button class="btn btn-outline-primary text-uppercase font-weight-bold add-more-btn">+ add titles</button>
				</div>
			</div>
			<div class="col-12">
				<div class="form-group">
					<div class="more_wrapper_final_singles more-div">
					<label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Finals singles</label>
						@if(isset($final_singles))
							@foreach($final_singles as $fs_id => $fs_value)
								<div class="input-group input-group-lg mb-2">
									<input class="form-control font-weight-bold text-blue-darker" type="text" value="{{$fs_value}}" name="final_singles[{{$fs_id}}]" placeholder="Add the details: Month, Year, Tournament, Location">
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
								<input class="form-control font-weight-bold text-blue-darker" type="text"value="" name="final_singles[]" placeholder="Add the details: Month, Year, Tournament, Location">
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
					<button class="btn btn-outline-primary text-uppercase font-weight-bold add-more-btn">+ add finals</button>
				</div>
			</div>
			<div class="col-12">
				<div class="form-group">
					<div class="more_wrapper_final_doubles more-div">
					<label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Finals Doubles</label>
						@if(isset($final_doubles))
							@foreach($final_doubles as $fd_id => $fd_value)
								<div class="input-group input-group-lg mb-2">
									<input class="form-control font-weight-bold text-blue-darker" type="text" value="{{$fd_value}}" name="final_doubles[{{$fd_id}}]" placeholder="Add the details: Month, Year, Tournament, Location">
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
								<input class="form-control font-weight-bold text-blue-darker" type="text"value="" name="final_doubles[]" placeholder="Add the details: Month, Year, Tournament, Location">
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
					<button class="btn btn-outline-primary text-uppercase font-weight-bold add-more-btn">+ add finals</button>
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
