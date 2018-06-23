
@extends('scouting.app')

@php
    $lang = app('translator')->getLocale()
@endphp

@section('content')
	<div class="bg-light">
        @include('scouting.intro')
		<div class="section-divider"></div>
		<div class="container">
			<h3 class="h3_5 text-uppercase font-family-alt text-secondary font-weight-semibold mb-5">How the module works</h3>
			<div class="dotdotdot dotdotdot_talent" data-module="dotdotdot" data-ellipsis="" data-height="152">
				<div class="row js-text dotdotdot__text">
					<div class="col-8 pr-5_5">
						<p class="typo-lg font-family-alt text-blue-darker mb-2">Scouts, located all over the world, bring applications from talented juniors and receive rewards in tokens: ACE for tennis, TEAM for other sports (hockey, esports, poker, football).  Scouts are strongly motivated to bring the most ambitious players, because their compensation depends on “how far” the submitted application progresses in the selection. The biggest reward is received for the player who signs the contract with TokenStars.</p>
						<p class="typo-lg font-family-alt text-blue-darker mb-2">TokenStars brakes the barriers and creates scouting opportunities for everybody. Everyone can become a TokenStars scout: junior coach, academy representative, or even relatives of the player. You just need to create the TokenStars account, coordinate the submission with the talent and fill in the application form on our website.</p>
					</div>
					<div class="col-4 pl-5_5">
						<h5 class="text-uppercase mb-2 font-family-alt text-blue-darker">Download materials:</h5>
						<ul class="list-unstyled font-family-alt typo-lg">
<li class="download-item text-uppercase d-flex flex-nowrap align-items-center position-relative"><i class="icon icon-sprite icon-download-white bg-primary mr-2 download-item-icon"></i><a class="download-item-link fill-area-link" href="/upload/files/TokenStars_Agencies_Tennis.pdf" target="_blank" style="text-transform: capitalize;">Scout’s Presentation</a></li>
							<li class="download-item text-uppercase d-flex flex-nowrap align-items-center position-relative"><i class="icon icon-sprite icon-download-white bg-primary mr-2 download-item-icon"></i><a class="download-item-link fill-area-link" href="/upload/files/Talent_Support_Agreement_Template.pdf" target="_blank" style="text-transform: capitalize;">Talent support Agreement</a></li>						</ul>
						<p class="typo-lg mb-0 font-family-alt text-secondary dotdotdot__hide">Please use these materials to tell the player about TokenStars and opportunities we provide to the promising athletes.</p>
					</div>
					<div class="col-12">
						<div class="section-divider"></div>
<h3 class="h3 font-family-alt font-weight-semibold text-uppercase text-secondary mb-0">Talent scouting flow</h3>                            @include('scouting.talent-flow-list')
						<div class="talent-flow-footer">
							<div class="d-flex flex-nowrap align-items-center">
								<div class="h5 mb-0 font-family-alt text-blue-darker pr-2">Total</div>
								<div class="badge badge-simple badge-lg font-family-alt">Scout receives up to $1,000*</div>
								<div class="text-secondary font-family-alt typo-lg pl-3">*paid in ACE and TEAM tokens, for details please see <a target="_blank" href="/pdfs/TS_Scouting_Rewards.pdf">Scouting Rewards</a></div>
							</div>
						</div>
					</div>
				</div>
				<div class="text-center mt-4 mb-5_5">
					<button class="btn btn-outline-primary text-uppercase px-4 js-toggle dotdotdot__toggle">
						<span>Show More</span>
						<span>Hide</span>
					</button>
				</div>
			</div>
			<h3 id="list-of-tallents" class="h3_5 font-family-alt font-weight-semibold text-uppercase text-secondary mb-2">List of Talents</h3>
            @include('scouting.talent-list')
		</div>
	</div>
	@include('scouting.footer')
@endsection