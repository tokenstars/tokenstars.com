<fieldset class="card step-card">
	<header class="card-header step-card-header py-4 px-5">
		<h4 class="step-title text-uppercase mb-0 font-family-alt">
			<span class="step-title-secondary">Step 7 of 7</span>
			<span class="step-title-primary">Contact info</span>
		</h4>
	</header>
	<form action="{{route('scouting.create_step7_post')}}" method="post">
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
						<label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Contact person</label>
						<input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" name="contact_person" value="{{$contact_person or ""}}">
					</div>
				</div>
				<div class="col-6 pl-5">
					<div class="form-group">
						<label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Relation</label>
						<input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" name="relation" value="{{$relation or ""}}">
					</div>
				</div>
				<div class="col-6 pr-5">
					<div class="form-group">
						<label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Email</label>
						<input class="form-control form-control-lg font-weight-bold text-blue-darker" type="email" name="email" value="{{$email or ""}}">
					</div>
				</div>
				<div class="col-6 pl-5">
					<div class="form-group">
						<label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Phone number</label>
						<input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" name="phone" value="{{$phone or ""}}">
					</div>
				</div>
				<div class="col-6 pr-5">
					<div class="form-group">
						<label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Filled out by </label>
						<input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" name="filled_out_by" value="{{$filled_out_by or ""}}">
					</div>
				</div>
			</div>
			<div class="mt-5 mb-2 d-flex">
				<button class="btn btn-outline-secondary btn-lg text-uppercase px-4 mr-4" name='btn_back'>Back</button>
				<button class="btn btn-primary btn-lg text-uppercase px-4" name='btn_submit'>Submit Application</button>
				<button class="btn btn-outline-primary btn-lg text-uppercase px-4 ml-auto step-save-button"
						name='btn_save'>Save
				</button>
			</div>
		</div>
	</form>
</fieldset>
