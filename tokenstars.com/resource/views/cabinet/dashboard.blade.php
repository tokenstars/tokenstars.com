@extends('layouts.cabinet.cabinet_layout')
@section('title', 'Tokenstars — Dashboard')

@section('content')

    <div class="d-flex flex-nowrap mb-4">
        <h1 class="h3_25 font-family-alt text-blue-darker text-uppercase mb-0">Dashboard</h1>
        <div class="h5 mb-0 font-family-alt text-uppercase font-weight-normal ml-auto align-self-end">
            <a href="#edit-profile-modal" data-toggle="modal" id="edit-profile">
			<span class="icon icon-pencil icon-sm_25 mr-1">
				<svg viewBox="0 0 1 1"><use xlink:href='/assets/cabinet/images/icons.svg#pencil'></use></svg>
			</span>
                Edit info
            </a>
        </div>
    </div>
    <fieldset class="card user-card">
        <div class="card-body px-5 py-5">
            <header class="mb-5_5">
                <div class="row">
                    <div class="col-8">
                        <div class="media">
                            <img class="user-card-avatar mr-4" src="/upload/avatars/{{'120_120_'.$user->photo}}" alt="" width="120" height="120">
                            <div class="media-body align-self-center">
                                <span class="h3_25 font-family-alt text-uppercase mb-1 text-truncate @if(empty($user->first_name)) text-empty @endif">
                                    @if(!empty($user->first_name))
                                        {{mb_strimwidth($user->first_name,0,20)}}
                                    @else
                                        name
                                    @endif
                                </span>
                                <span class="h3_25 font-family-alt text-uppercase mb-1 text-truncate @if(empty($user->last_name)) text-empty @endif">
                                    @if(!empty($user->last_name))
                                        {{mb_strimwidth($user->last_name,0,20)}}
                                    @else
                                        surname
                                    @endif
                                </span>
                                <!--<h3 class="h3_25 font-family-alt text-uppercase mb-1 text-truncate text-blue-darker">Alex Alex</h3>-->
                                <h4 class="font-family-alt text-blue-darker font-weight-normal mb-0 text-truncate">{{$user->email}}</h4>
                            </div>
                        </div>
                        <div class="icon-group-md">
                            <a class="icon icon-md icon-facebook mt-2 mr-3 @if(empty($user->facebook_url)) text-empty disabled @endif" href="{{$user->facebook_url}}" target="_blank">
                                <svg viewBox="0 0 1 1"><use xlink:href="/assets/cabinet/images/icons.svg#facebook"></use></svg>
                            </a>
                            <a class="icon icon-md icon-instagram mt-2 mr-3 @if(empty($user->instagram_url)) text-empty disabled @endif" href="{{$user->instagram_url}}" target="_blank">
                                <svg viewBox="0 0 1 1"><use xlink:href="/assets/cabinet/images/icons.svg#instagram"></use></svg>
                            </a>
                            <a class="icon icon-md icon-twitter mt-2 mr-3 @if(empty($user->twitter_url)) text-empty disabled @endif" href="{{$user->twitter_url}}" target="_blank">
                                <svg viewBox="0 0 1 1"><use xlink:href="/assets/cabinet/images/icons.svg#twitter"></use></svg>
                            </a>
                        </div>
                    </div>
                    <div class="col-4 font-family-alt user-card-col-header-secondary pt-2">
                        <h6 class="text-uppercase text-blue-darker mb-0">
                            Tokens In wallets
                            <div class="d-inline-block js-drop" data-theme="drop-theme-arrows drop-inverse drop-help" data-position="top left" data-open-on="hover">
							<span class="icon icon-help icon-xs drop-target clickable">
								<svg viewBox="0 0 1 1"><use xlink:href='/assets/cabinet/images/icons.svg#help'></use></svg>
							</span>
                                <div class="drop-content">
                                    A cumulative number of tokens in the verified wallets, linked to your TokenStars account
                                </div>
                            </div>
                        </h6>
                        <hr class="my-1">
                        <div class="row">
                            <div class="col-6">
                                <span class="text-success font-weight-semibold">{{@number_format($wb['total']['ACE'], 0, ',', '  ')}}</span>
                                <span class="text-secondary">ACE</span>
                            </div>
                            <div class="col-6">
                                <span class="text-success font-weight-semibold">{{@number_format($wb['total']['TEAM'], 0, ',', '  ')}}</span>
                                <span class="text-secondary">TEAM</span>
                            </div>
                        </div>
                        @if($balance_credited['ACE'] !=0 || $balance_credited['TEAM'] != 0)
                            <div class="my-4"></div>
                            <h6 class="text-uppercase text-blue-darker mb-0">
                                Tokens Credited
                                <div class="d-inline-block js-drop" data-theme="drop-theme-arrows drop-inverse drop-help" data-position="top left" data-open-on="hover">
							<span class="icon icon-help icon-xs drop-target clickable">
								<svg viewBox="0 0 1 1"><use xlink:href='/assets/cabinet/images/icons.svg#help'></use></svg>
							</span>
                                    <div class="drop-content">
                                        Tokens earned and remaining on the platform. Will be transferred to your wallets after the completion of KYC procedure and verification of wallets
                                    </div>
                                </div>
                            </h6>
                            <hr class="my-1">
                            <div class="row">
                                <div class="col-6">
                                    <span class="text-success font-weight-semibold">{{$balance_credited['ACE']}}</span>
                                    <span class="text-secondary">ACE</span>
                                </div>
                                <div class="col-6">
                                    <span class="text-success font-weight-semibold">{{$balance_credited['TEAM']}}</span>
                                    <span class="text-secondary">TEAM</span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </header>
            @if(!empty($user->about))
                <h4 class="text-uppercase font-family-alt text-blue-darker mt-4 mb-3">About</h4>
                <div class="text-blue-darker font-family-alt user-card-text">
                    <p class="mb-2">
                        {{$user->about}}
                    </p>
                </div>
            @endif
            <h4 class="text-uppercase font-family-alt text-blue-darker mt-4 mb-3">My Roles</h4>
            <div class="text-blue-darker font-family-alt user-card-text">
                <p class="mb-2">You can have many roles at the same time.</p>
            </div>

            <div class="row py-2">
                <!--
                прошел верификацию, фан подал заявку то скаут
                <div class="col-4 d-flex pr-2">
                    <div class="card card-checkbox w-100 p-4 text-blue-darker bg-readonly shadow-none rounded">
                        <h4 class="text-uppercase font-family-alt mb-1 text-truncate">
						<span class="icon icon-check icon-md mr-2 text-success">
							<svg viewBox="0 0 1 1"><use xlink:href='/assets/cabinet/images/icons.svg#check'></use></svg>
						</span>
                            Fan
                        </h4>
                        <div class="text-blue-darker font-family-alt user-card-text">
                            Fan role is assigned to every ACE / TEAM token holder. Fans can vote on scouted talents, communicate with favorite players and get exclusive items
                        </div>
                    </div>
                </div>
                -->

                @if($vf_w_count > 0)

                    <div class="col-4 d-flex pr-2">
                        <div class="card card-checkbox w-100 p-4 text-blue-darker bg-readonly shadow-none rounded">
                            <h4 class="text-uppercase font-family-alt mb-1 text-truncate">

						<span class="icon icon-check icon-md mr-2 text-success">
							<svg viewBox="0 0 1 1"><use xlink:href='/assets/cabinet/images/icons.svg#check'></use></svg>
						</span>

                                Fan
                            </h4>
                            <div class="text-blue-darker font-family-alt user-card-text">
                                Fan role is assigned to every ACE / TEAM token holder. Fans can vote on scouted talents, communicate with favorite players and get exclusive items.
                            </div>
                        </div>
                    </div>
                @else

                    <div class="col-4 d-flex px-2">
                        <div class="card card-checkbox w-100 p-4 text-blue-darker rounded">
                            <div class="d-flex flex-nowrap">
                                <h4 class="text-uppercase font-family-alt mb-1 text-truncate">
                                    Fan
                                </h4>
                                <div class="custom-control custom-checkbox text-uppercase font-family-alt mb-2 font-weight-semibold d-inline-flex ml-auto">
                                    <input type="checkbox" class="custom-control-input card-checkbox-input" id="checkbox-02"  @if($user->fan_role) checked @endif>
                                    <span class="custom-control-label"></span>
                                </div>
                            </div>
                            <label class="fill-area-link" for="checkbox-02">
						<span class="text-blue-darker font-family-alt user-card-text">
							Fan role is assigned to every ACE / TEAM token holder. Fans can vote on scouted talents, communicate with favorite players and get exclusive items.
						</span>
                            </label>
                        </div>
                    </div>
                @endif

                @if($count_own_players > 0)
                    <div class="col-4 d-flex px-2">
                        <div class="card card-checkbox w-100 p-4 text-blue-darker bg-readonly shadow-none rounded">
                            <h4 class="text-uppercase font-family-alt mb-1 text-truncate">
                                    <span class="icon icon-check icon-md mr-2 text-success">
                                        <svg viewBox="0 0 1 1"><use xlink:href='/assets/cabinet/images/icons.svg#check'></use></svg>
                                    </span>
                                Scout
                            </h4>
                            <div class="text-blue-darker font-family-alt user-card-text">
                                Finds promising sports talents, helps to assess them, and assists in signing the contracts. Scouts get rewards for successful talent submissions.
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-4 d-flex px-2">
                        <div class="card card-checkbox w-100 p-4 text-blue-darker rounded">
                            <div class="d-flex flex-nowrap">
                                <h4 class="text-uppercase font-family-alt mb-1 text-truncate">
                                    Scout
                                </h4>
                                <div class="custom-control custom-checkbox text-uppercase font-family-alt mb-2 font-weight-semibold d-inline-flex ml-auto">
                                    <input type="checkbox" class="custom-control-input card-checkbox-input" id="checkbox-03" @if($user->scout_role) checked @endif>
                                    <span class="custom-control-label"></span>
                                </div>
                            </div>
                            <label class="fill-area-link" for="checkbox-03">
                            <span class="text-blue-darker font-family-alt user-card-text">
                                Finds promising sports talents, helps to assess them, and assists in signing the contracts. Scouts get rewards for successful talent submissions.
                            </span>
                            </label>
                        </div>
                    </div>
                @endif
                <div class="col-4 d-flex pl-2">
                    <div class="card card-checkbox w-100 p-4 text-blue-darker rounded disabled">
                        <div class="d-flex flex-nowrap">
                            <h4 class="text-uppercase font-family-alt mb-1 text-truncate">
                                Promoter
                            </h4>
                            <div class="custom-control custom-checkbox text-uppercase font-family-alt mb-2 font-weight-semibold d-inline-flex ml-auto">
                                <input type="checkbox" class="custom-control-input card-checkbox-input" id="checkbox-03" disabled>
                                <span class="custom-control-label"></span>
                            </div>
                        </div>
                        <label class="fill-area-link" for="checkbox-03">
						<span class="text-blue-darker font-family-alt user-card-text">
							Builds audience in player's social networks, creates media coverage, attracts advertisers. Promoters get rewards in ACE and TEAM tokens.
						</span>
                        </label>
                    </div>
                </div>
            </div>

            <h4 class="text-uppercase font-family-alt text-blue-darker mt-4 mb-3">TOKEN WALLETS</h4>
            <div class="py-2">
                @foreach($wallets as $wallet)
                    <div class="form-group">
                        <div class="d-flex flex-nowrap mb-1">
                            <label class="text-uppercase text-blue-gray-light font-weight-bold mb-0" for="">Wallet "{{$wallet->name}}"</label>
                            <div class="align-self-end ml-auto font-family-alt">
                                @if($wallet->verifiable)
                                    <span class="d-inline-block ml-3">
                                    <span class="text-success font-weight-semibold">{{@number_format($wb[$wallet->address]['ACE'], 0, ',', '  ')}}</span>
                                    <span class="text-secondary">ACE</span>
                                </span>
                                    <span class="d-inline-block ml-3">
                                    <span class="text-success font-weight-semibold">{{@number_format($wb[$wallet->address]['TEAM'], 0, ',', '  ')}}</span>
                                    <span class="text-secondary">TEAM</span>
                                </span>
                                @else
                                    <span class="ml-3">
                                    <span class="text-empty font-weight-semibold">???</span>
                                    <span class="text-secondary">ACE</span>
                                </span>
                                    <span class="ml-3">
                                    <span class="text-empty font-weight-semibold">???</span>
                                    <span class="text-secondary">TEAM</span>
                                </span>
                                @endif
                            </div>
                        </div>
                        @if($wallet->verifiable)
                            <div class="input-group input-group-lg mb-2">
                                <input class="form-control font-weight-bold text-blue-darker" value="{{$wallet->address}}" id="" disabled>
                                <div class="input-group-append">
                                    <button class="btn btn-lg btn-success font-family-alt font-weight-bold text-uppercase rounded-0 opacity-1" disabled>
				        <span class="icon icon-check icon-sm mr-1">
							<svg viewBox="0 0 1 1"><use xlink:href="/assets/cabinet/images/icons.svg#check"></use></svg>
				        </span>
                                        <span class="typo-lg">Verified</span>
                                    </button>
                                </div>
                            </div>
                        @else
                            <div class="btn-group w-100 custom-input-wrapper">
                                <input type="text" class="form-control form-control-lg font-weight-bold text-blue-darker custom-input" placeholder="{{$wallet->address}}" value="{{$wallet->address}}" id="" disabled>
                                <button class="btn btn-md btn-primary font-weight-bold text-uppercase custom-input-action position-absolute rounded btn-verify-wallet" data-toggle="modal" data-target="#verify-wallet-modal" data-wallet="{{$wallet->id}}">
                                    Verify
                                </button>
                            </div>
                        @endif
                    </div>
                @endforeach

                <button class="btn btn-outline-primary btn-sm font-family-alt text-uppercase font-weight-semibold px-3">
                    <a target="_blank" href="/pdfs/Wallet_Verification_Instruction.pdf" class="typo-md">Get verifying instructions</a>
                </button>
            </div>

            <div class="user-card-divider"></div>

            <h4 class="text-uppercase font-family-alt text-blue-darker mt-4 mb-3">Your DOCS/KYC</h4>

            <div class="user-card-kyc py-2">
                <div class="row">
                    <div class="col-3">
                        <figure class="user-card-kyc-item">
                            @if($user->pUser->status == 3)
                                <div class="user-card-kyc-accepted d-flex flex-column align-items-center justify-content-center rounded">
							<span class="icon icon-check">
								<svg viewBox="0 0 1 1"><use xlink:href='/assets/cabinet/images/icons.svg#check'></use></svg>
							</span>
                                    <strong class="font-weight-semibold text-uppercase font-family-alt">Accepted</strong>
                                </div>
                            @else
                                <div id="ph-1">
                                    <label class="upload-drop-zone upload-drop-zone-small d-flex flex-column align-items-center justify-content-center position-relative rounded user-card-kyc-drop-zone" for="@if(empty($user->pUser->documents->where('type_doc', 1)->first())){{"photo-02"}}@endif">
                                        @if(!empty($user->pUser->documents->where('type_doc', 1)->first()))
                                            <img src="/assets/cabinet/images/photo-upload-small.svg" alt="" width="100" height="100" style="opacity: 0.8" id="img_ph_1" />
                                        @else
                                            <img src="/assets/cabinet/images/photo-upload-small.svg" alt="" width="100" height="100" style="" />
                                        @endif

                                    </label>
                                    <input type="file" id="photo-02" hidden name="Documents[passport]">
                                </div>
                            @endif
                            <h6 class="font-family-alt text-uppercase text-blue-darker my-1">
                                Passport/ID<span class="text-danger">*</span>
                            </h6>
                            <p class="font-family-alt user-card-text mb-0">A scanned copy of your official photo ID (passport) in good quality and high resolution</p>


                        </figure>
                    </div>


                    <div class="col-3">
                        <figure class="user-card-kyc-item">
                            @if($user->pUser->status == 3)
                                <div style="margin-left: 11%" class="user-card-kyc-accepted d-flex flex-column align-items-center justify-content-center rounded">
							<span class="icon icon-check">
								<svg viewBox="0 0 1 1"><use xlink:href='/assets/cabinet/images/icons.svg#check'></use></svg>
							</span>
                                    <strong class="font-weight-semibold text-uppercase font-family-alt">Accepted</strong>
                                </div>
                            @else
                                <div id="ph-2">
                                    <label style="padding-left: 25%" class="upload-drop-zone upload-drop-zone-small d-flex flex-column align-items-center justify-content-center position-relative rounded user-card-kyc-drop-zone" for="@if(empty($user->pUser->documents->where('type_doc', 2)->first())){{"photo-03"}}@endif">
                                        @if(!empty($user->pUser->documents->where('type_doc', 2)->first()))
                                            <img src="/assets/cabinet/images/photo-upload-small.svg" alt="" width="100" height="100" style="opacity: 0.8" id="img_ph_2" />
                                        @else
                                            <img src="/assets/cabinet/images/photo-upload-small.svg" alt="" width="100" height="100" style="" />
                                        @endif
                                    </label>
                                    <input type="file" id="photo-03" hidden name="Documents[address]">
                                </div>
                            @endif
                            <h6 class="font-family-alt text-uppercase text-blue-darker my-1">
                                Proof of address<span class="text-danger">*</span>
                            </h6>
                            <p class="font-family-alt user-card-text mb-0">Proof of address (a recent utility bill, with your name indicated, or other official document verifying your address)</p>
                        </figure>
                    </div>
                    <div class="col-3">
                        <figure class="user-card-kyc-item">
                            @if($user->pUser->status == 3)
                                <div style="margin-left: 18%" class="user-card-kyc-accepted d-flex flex-column align-items-center justify-content-center rounded">
							<span class="icon icon-check">
								<svg viewBox="0 0 1 1"><use xlink:href='/assets/cabinet/images/icons.svg#check'></use></svg>
							</span>
                                    <strong class="font-weight-semibold text-uppercase font-family-alt">Accepted</strong>
                                </div>
                            @else
                                <div id="ph-3">
                                    <label style="padding-left: 38%" class="upload-drop-zone upload-drop-zone-small d-flex flex-column align-items-center justify-content-center position-relative rounded user-card-kyc-drop-zone" for="@if(empty($user->pUser->documents->where('type_doc', 3)->first())){{"photo-04"}}@endif">
                                        @if(!empty($user->pUser->documents->where('type_doc', 3)->first()))
                                            <img src="/assets/cabinet/images/photo-upload-small.svg" alt="" width="100" height="100" style="opacity: 0.8" id="img_ph_3" />
                                        @else
                                            <img src="/assets/cabinet/images/photo-upload-small.svg" alt="" width="100" height="100" style="" />
                                        @endif
                                    </label>
                                    <input type="file" id="photo-04" hidden name="Documents[other]">
                                </div>
                            @endif
                            <h6 class="font-family-alt text-uppercase text-blue-darker my-1">
                                Additional document
                            </h6>
                        </figure>
                    </div>
                </div>
            </div>
            @if(count($history) > 0)
            <h4 class="text-uppercase font-family-alt text-blue-darker mt-4 mb-3">History</h4>
            <table class="table table-hover font-family-alt" style="margin-bottom: 0px">
                <colgroup>
                    <col width="190" />
                    <col width="auto" />
                </colgroup>
                <thead class="thead-light text-uppercase">
                <tr>
                    <th>Date</th>
                    <th>Event</th>
                </tr>
                </thead>
            </table>
            <div class="user-card-history pt-1" style="max-height: 250px;overflow: scroll; overflow-x: hidden">
                <table class="table table-hover font-family-alt">
                    <colgroup>
                        <col width="190" />
                        <col width="auto" />
                    </colgroup>
                    <tbody class="typo-sm" id="scroll-history">
                    @foreach($history as $hst)
                    <tr>
                        <td class="text-truncate">{{$hst->created_at}}</td>
                        <?php
                        $event = $hst->event;
                        $data = json_decode($hst->data);
                        $search_event = $replace_event = [];
                        foreach($data as $k => $d)
                        {
                            $search_event[] = '['.$k.']';
                            $replace_event[] = $d;
                        }
                        $event = str_replace($search_event, $replace_event, $hst->event);
                        ?>
                        <td>{{$event}}</td>
                    </tr>
                    @endforeach
                    @if(count($iso_hostory) > 0)
                        @foreach($iso_hostory as $iso_h)
                        <tr>
                            <td class="text-truncate">{{\Carbon\Carbon::parse($iso_h->created_at)->format('Y-m-d H:i:s')}}</td>
                            <td>Tokens issused {{number_format($iso_h->iso_coin_amount, 0 ,',',' ')}} {{$iso_h->iso_coin_currency}}</td>
                        </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>

            </div>
            @endif
            <div class="user-card-divider"></div>

            <div class="user-card-alert user-card-alert-wide text-center bg-light px-5 pt-4 pb-4_5">
                <h4 class="text-secondary font-family-alt text-uppercase font-weight-semibold">Have any questions?
                </h4>
                <div class="mt-4">
                    <button class="btn btn-primary text-uppercase" data-toggle="modal" data-target="#feedback-modal">Contact us</button>
                </div>
            </div>

            <div class="user-card-divider"></div>
            @if($user->pUser->status == 5 && ($balance_credited['ACE'] !=0 || $balance_credited['TEAM'] != 0))
                <h4 class="text-uppercase font-family-alt text-blue-darker mt-4 mb-3">Refund Details</h4>
                <div class="form-group">
                    <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">BTC Wallet</label>
                    <div class="btn-group w-100 custom-input-wrapper">
                        <input type="text" class="form-control form-control-lg font-weight-bold text-blue-darker custom-input" placeholder="0x32749857230947032482304920183098324920" value="" id="">
                        <button class="btn btn-md btn-primary font-weight-bold text-uppercase custom-input-action position-absolute rounded" disabled>
                            Refund
                        </button>
                    </div>
                </div>

                <div class="form-group">
                    <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">ETH Wallet</label>
                    <div class="btn-group w-100 custom-input-wrapper">
                        <input type="text" class="form-control form-control-lg font-weight-bold text-blue-darker custom-input" placeholder="0x32749857230947032482304920183098324920" value="" id="">
                        <button class="btn btn-md btn-primary font-weight-bold text-uppercase custom-input-action position-absolute rounded" disabled>
                            Refund
                        </button>
                    </div>
                </div>
            @endif

            <h4 class="text-uppercase font-family-alt text-blue-darker mt-5 mb-4">Token Sale Details</h4>
            <div class="row">
                <div class="col-6">
                    <button id="collapse-token-button-show" class="btn btn-outline-primary font-family-alt text-uppercase font-weight-semibold collapsed user-card-show-details-btn" data-toggle="collapse" data-target="#collapse-token" aria-expanded="false" aria-controls="collapse-token">
                        <span class="typo-lg">Show Token Sale Details</span>
                    </button>
                </div>
                <div class="col-6">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <button id="collapse-token-button-hide" class="btn btn-outline-primary font-family-alt text-uppercase font-weight-semibold user-card-show-details-btn">
                        <span class="typo-lg">Hide Token Sale Details</span>
                    </button>
                </div>
                <div class="col-6">
                    <a id="collapse-how-token-button-hide" class="btn btn-outline-primary font-family-alt text-uppercase font-weight-semibold user-card-show-details-btn" href="/pdfs/Withdrawal_Instructions_for_ICO.pdf" target="_blank">
                        <span class="typo-lg">How to get your tokens</span>
                    </a>
                </div>
            </div>

            <div class="collapse" id="collapse-token">
                <div class="row">

                    <div class="col-6">
                        <h6 class="h6_5 font-family-alt text-uppercase font-weight-normal text-blue-darker pt-1 mb-0">Documents:</h6>
                        <ul class="list-inline font-family-alt user-card-doc-list">
                            <li class="list-inline-item"><a class="d-inline-block p-1" href="/pdfs/Agreement_on_Sale_of_ACE_Tokens.pdf" target="_blank">ACE Token Sale Agreement</a></li>
                            <li class="list-inline-item"><a class="d-inline-block p-1" href="/pdfs/Agreement_on_Sale_of_TEAM_Tokens.pdf" target="_blank">TEAM Token Sale Agreement</a></li>
                            <li class="list-inline-item"><a class="d-inline-block p-1" href="/pdfs/Terms_of_Use.pdf" target="_blank">Terms of Use</a></li>
                            <li class="list-inline-item"><a class="d-inline-block p-1" href="/pdfs/Privacy_Policy.pdf" target="_blank">Privacy Policy</a></li>
                            <li class="list-inline-item"><a class="d-inline-block p-1" href="/pdfs/AML_Policy.pdf" target="_blank">AML</a></li>
                        </ul>
                    </div>
                    <div class="col-6">
                    @if($iso_amount['ACE'] > 0 || $iso_amount['TEAM'] > 0)

                            <h6 class="h6_5 font-family-alt text-uppercase font-weight-normal text-blue-darker pt-1">Remaining balances after token sale:</h6>
                            <span class="d-inline-block h3 font-family-alt text-uppercase font-weight-normal mr-4">
						<span class="text-success font-weight-semibold">{{$iso_amount['ACE']}}</span>
						<span class="text-secondary">ACE</span>
					</span>
                            <span class="d-inline-block h3 font-family-alt text-uppercase font-weight-normal mr-4">
						<span class="text-success font-weight-semibold">{{$iso_amount['TEAM']}}</span>
						<span class="text-secondary">TEAM</span>
					</span>


                    @endif
                    @if(count($isoCoinsCount) > 0)
                        <h6 class="h6_5 font-family-alt text-uppercase font-weight-normal text-blue-darker pt-1">Coins balance:</h6>
                        @foreach($isoCoinsCount as $isoCoin=>$isoBalance)
                            <span class="d-inline-block h3 font-family-alt text-uppercase font-weight-normal mr-4">
						        <span class="text-success font-weight-semibold">{{$isoBalance}}</span>
						        <span class="text-secondary">{{$isoCoin}}</span>
					        </span>
                        @endforeach
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </fieldset>
@endsection