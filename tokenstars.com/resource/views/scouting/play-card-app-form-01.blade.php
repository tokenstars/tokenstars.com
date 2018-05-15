<fieldset class="card step-card">
	<header class="card-header step-card-header py-4 px-5">
		<h4 class="step-title text-uppercase mb-0 font-family-alt">
			<span class="step-title-secondary">Step 1 of 7</span>
			<span class="step-title-primary">Choose the sport</span>
		</h4>
	</header>
	<form action="{{route('scouting.create_step1_post')}}" method="post">
        {{ csrf_field() }}
	<div class="card-body px-5 py-4">
		<div class="row">
			<div class="col-4 d-flex">
				<div class="card card-radio w-100 p-4 text-center text-blue-darker rounded">
					<h4 class="custom-control custom-radio text-uppercase font-family-alt mb-4 font-weight-semibold d-inline-flex mx-auto">
					  <input type="radio" class="custom-control-input card-radio-input" id="radio-01" checked>
					  <span class="custom-control-label card-radio-label">
					    Tennis (ACE)
					  </span>
					</h4>
					<label class="fill-area-link" for="radio-01">
						<span class="icon icon-tennis icon-xxl mx-auto">
							<svg viewBox="0 0 1 1"><use xlink:href='../images/icons.svg#tennis'></use></svg>
						</span>
					</label>
				</div>
			</div>
			<div class="col-4 d-flex">
				<div class="card card-radio w-100 p-4 text-center text-blue-darker disabled rounded">
					<h4 class="custom-control custom-radio text-uppercase font-family-alt mb-4 font-weight-semibold d-inline-flex mx-auto">
					  <input type="radio" class="custom-control-input card-radio-input" id="radio-02" disabled>
					  <span class="custom-control-label card-radio-label">
					    Hockey (TEAM)
					  </span>
					</h4>
					<div class="spacer"></div>
					<label class="fill-area-link" for="radio-02">
						<span class="h2 font-weight-semibold font-family-alt text-uppercase mb-4 d-block">Soon</span>
					</label>
					<div class="spacer"></div>
				</div>
			</div>
			<div class="col-4 d-flex">
				<div class="card card-radio w-100 p-4 text-center text-blue-darker disabled rounded">
					<h4 class="custom-control custom-radio text-uppercase font-family-alt mb-4 font-weight-semibold d-inline-flex mx-auto">
					  <input type="radio" class="custom-control-input card-radio-input" id="radio-03" disabled>
					  <span class="custom-control-label card-radio-label">
					    Poker (TEAM)
					  </span>
					</h4>
					<div class="spacer"></div>
					<label class="fill-area-link" for="radio-03">
						<span class="h2 font-weight-semibold font-family-alt text-uppercase mb-4 d-block">Soon</span>
					</label>
					<div class="spacer"></div>
				</div>
			</div>
		</div>
		<div class="mt-5 d-flex">
			<button class="btn btn-primary btn-lg text-uppercase px-4">Next Step ></button>
		</div>
	</div>
	</form>
</fieldset>
