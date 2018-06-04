<fieldset class="card step-card">
	<header class="card-header step-card-header py-4 px-5">
		<h4 class="step-title text-uppercase mb-0 font-family-alt">
			<span class="step-title-secondary">Step 5 of 7</span>
			<span class="step-title-primary">Next Season Goals</span>
		</h4>
	</header>
	<form action="{{route('scouting.create_step5_post')}}" method="post">
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
				<div class="col-12">
					<div class="form-group">
						<label class="text-uppercase text-blue-gray-light font-weight-bold" for="">What are the player’s goals for the next season (if known)?</label>
						<textarea class="form-control form-control-lg font-weight-bold text-blue-darker js-autosize" name="goals_for_next_season" cols="30" rows="5">{{$goals_for_next_season or ""}}</textarea>
					</div>
				</div>
				<div class="col-12">
					<div class="form-group">
						<label class="text-uppercase text-blue-gray-light font-weight-bold" for="">How the financial support from TokenStars will be used (if known)?</label>
						<textarea class="form-control form-control-lg font-weight-bold text-blue-darker js-autosize" name="financial_support_used" cols="30" rows="5">{{$financial_support_used or ""}}</textarea>
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
