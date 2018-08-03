@extends('scouting.app-alt')

@section('content')
    <style>
        .tabb {
            display:none;
        }
    </style>
    <div class="container">
        <div class="mt-5"></div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase font-family-alt mb-4">
                <li class="breadcrumb-item"><a href="#">Platform</a></li>
                <li class="breadcrumb-item"><a href="{{route('scouting.index')}}">Scouting</a></li>
                <li class="breadcrumb-item active" aria-current="page">New player application</li>
            </ol>
        </nav>
        <h1 class="h3_25 font-family-alt text-blue-darker text-uppercase mb-4">New Player Application</h1>

        <!-- Step 1 -->
        <fieldset class="card step-card" id="form_f">
            <form id="regForm" method="POST" action="{{route('scouting.create')}}">
                {{ csrf_field() }}

                <input type="hidden" name="id" id="player_id" value="{{$player->id or ""}}">

            <header class="card-header step-card-header py-4 px-5">
                <h4 class="step-title text-uppercase mb-0 font-family-alt">
                    <span class="step-title-secondary" id="sec">Step 1 of 7</span>
                    <span class="step-title-primary" id="prm">Choose Sport</span>
                </h4>
            </header>


            <div class="card-body px-5 py-4">
                <div class="row tabb">
                    <div class="col-4 d-flex">
                        <div class="card card-radio w-100 p-4 text-center text-blue-darker rounded">
                            <h4 class="custom-control custom-radio text-uppercase font-family-alt mb-4 font-weight-semibold d-inline-flex mx-auto">
                                <input oninput="this.className = ''" name="sport_type" value="1" type="radio" class="custom-control-input card-radio-input" id="radio-01" checked @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                                <span class="custom-control-label card-radio-label">
					    Tennis (ACE)
					  </span>
                            </h4>
                            <label class="fill-area-link" for="radio-01">
						<span class="icon icon-tennis icon-xxl mx-auto">
							<svg viewBox="0 0 1 1"><use xlink:href='/images/icons.svg#tennis'></use></svg>
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

                    @if (empty($player->id))
                    <div class="col-12 d-flex" style="margin-top:20px;">
                        <div class="form-group">
                            <div class="custom-control custom-checkbox h5 text-blue-darker">
                                <input name="ch_agree_1" type="checkbox" class="custom-control-input" id="agree_1" ngrequired="required">
                                <label class="custom-control-label" for="agree_1">
                                    I agree with TokenStars' <a href="https://tokenstars.com/pdfs/Terms_of_Use.pdf" target="_blank" class="footer-terms" onclick="ga('send', 'event', 'click', 'terms_of_use', 'footer');">@lang('tokenstars-messages.footer.terms')</a>
                                </label>
                            </div>

                            <div class="custom-control custom-checkbox h5 text-blue-darker">
                                <input name="ch_agree_2" type="checkbox" class="custom-control-input" id="agree_2" ngrequired="required">
                                <label class="custom-control-label" for="agree_2">
                                    I agree with TokenStars' <a href="https://tokenstars.com/pdfs/Privacy_Policy.pdf" target="_blank" class="footer-terms" onclick="ga('send', 'event', 'click', 'privacy_policy', 'footer');">@lang('tokenstars-messages.footer.privacy')</a>
                                </label>
                            </div>
                            <div class="custom-control custom-checkbox h5 text-blue-darker">
                                <input name="ch_agree_3" type="checkbox" class="custom-control-input" id="agree_3" ngrequired="required">
                                <label class="custom-control-label" for="agree_3">
                                    I hereby represent and warrant that I’ve received necessary consents to submit and publish the information specified in the application form.
                                </label>
                            </div>
                            <div class="custom-control custom-checkbox h5 text-blue-darker">
                                <input name="ch_agree_4" type="checkbox" class="custom-control-input" id="agree_4" ngrequired="required">
                                <label class="custom-control-label" for="agree_4">
                                    I hereby represent and warrant that I'm not citizen of or resident in the USA
                                </label>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="col-12 d-flex" style="">
                        <small>To submit a player please use latest version of Google Chrome, Mozilla Firefox or Opera browsers.</small>
                    </div>
                </div>





                <div class="row pt-4 mt-1 tabb">
                    <div class="col-6 pr-5">
                        <div class="form-group">
                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">First Name*</label>
                            <input name="first_name" class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" value="@if(!empty($player->first_name)){{$player->first_name}}@endif" placeholder="Player's first name" ngrequired="required" @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                        </div>
                    </div>
                    <div class="col-6 pl-5">
                        <div class="form-group">
                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Last Name*</label>
                            <input name="last_name" class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" value="@if(!empty($player->last_name)){{$player->last_name}}@endif" placeholder="Player's last name"  ngrequired="required" @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                        </div>
                    </div>
                    <div class="col-6 pr-5">
                        <div class="form-group">
                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Country of Residence*</label>
                            <select class="custom-select custom-select-lg font-weight-bold text-blue-darker" id="country-id"   name="country_id" @if (!empty($player->id) && $player->status <> 1) disabled @endif ngrequired="required">
                                <option value="">---</option>
                                @foreach($countries as $k=>$country)
                                    <option value="{{$k}}" @if(!empty($player->country_id) && $player->country_id == $k){{'selected="selected"'}}@endif>{{$country}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="col-6 pl-5">
                        <div class="form-group">
                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">City of Residence*</label>
                            <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" value="@if(!empty($player->city)){{$player->city}}@endif" name="city"  ngrequired="required" placeholder="Add the city of residence" @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                        </div>
                    </div>
                    <div class="col-6 pr-5">
                        <div class="form-group">
                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Date of Birth*</label>
                            <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" id="date_of_birth" name="date_of_birth" placeholder="dd.mm.yyyy" data-date-format="DD.MM.YYYY"  ngrequired="required" value="@if(!empty($player->date_of_birth)){{date('d.m.Y', strtotime($player->date_of_birth))}}@endif" @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                        </div>
                    </div>
                    <div class="col-6 pl-5">
                        <div class="form-group">
                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Sex</label>
                            <div class="row py-2">
                                <div class="col-auto">
                                    <div class="custom-control custom-radio h5 text-blue-darker">
                                        <input value="male" name="sex" type="radio" class="custom-control-input" id="male" @if(empty($player->sex)){{'checked'}}@elseif(!empty($player->sex) && $player->sex == 1){{'checked'}}@endif @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                                        <label class="custom-control-label" for="male">
                                            Male
                                        </label>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="custom-control custom-radio h5 text-blue-darker">
                                        <input value="female" name="sex" type="radio" class="custom-control-input" id="female" @if(!empty($player->sex) && $player->sex == 2){{'checked'}}@endif @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                                        <label class="custom-control-label" for="female">
                                            Female
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 pr-5">
                        <div class="form-group">
                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Nationality*</label>
                            <select class="custom-select custom-select-lg font-weight-bold text-blue-darker" id="nationality-id" name="nationality" ngrequired="required" @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                            <option value="">---</option>
                            @foreach($countries as $k=>$country)
                                <option value="{{$k}}" @if(!empty($player->nationality) && $player->nationality == $k){{'selected="selected"'}}@endif>{{$country}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6 pl-5">
                        <div class="row">
                            <div class="col-6 pr-4">
                                <div class="form-group">
                                    <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Weight (kg)</label>
                                    <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="number" name="weight" placeholder="54" min="10" max="400" maxlength="3" value="@if(!empty($player->weight)){{$player->weight}}@endif" @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-6 pl-4">
                                <div class="form-group">
                                    <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Height (cm)</label>
                                    <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="number" name="height" placeholder="174" min="45" max="300" maxlength="3" value="@if(!empty($player->height)){{$player->height}}@endif" @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Bio (700 symbols max.)*</label>
                            <textarea  ngrequired="required" class="form-control form-control-lg font-weight-bold text-blue-darker" name="description" id="" cols="30" rows="3" maxlength="700" placeholder="Please type in short bio of the player here" @if (!empty($player->id) && $player->status <> 1) disabled @endif>@if(!empty($player->description)){{$player->description}}@endif</textarea>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Facebook</label>
                            <input name="fb_link" class="form-control form-control-lg font-weight-bold text-blue-darker" type="url" value="@if(!empty($player->fb_link)){{$player->fb_link}}@endif" placeholder="Add the Facebook link" @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Twitter</label>
                            <input name="tw_link" class="form-control form-control-lg font-weight-bold text-blue-darker" type="url" value="@if(!empty($player->tw_link)){{$player->tw_link}}@endif" placeholder="Add the Twitter link" @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Instagram</label>
                            <input name="ig_link" class="form-control form-control-lg font-weight-bold text-blue-darker" type="url" value="@if(!empty($player->ig_link)){{$player->ig_link}}@endif" placeholder="Add the Instagram link" @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <div class="text-uppercase text-blue-gray-light font-weight-bold">Photos upload*</div>
                            <div class="text-blue-gray-light mb-2">(please upload 1-2 front face photos and 3-4 photos, made during the game)</div>
                            <div class="text-blue-gray-light mb-2">You can upload photos up to 40 MB in total</div>
                            <div class="img-thumb-container" id="photo-container">
                                <span id="photos">
                                    @if(!empty($player->images) && count($player->images) > 0)
                                        <script>
                                            var current_photos =  @if(count($player->images) > 0) {{count($player->images)}} @else 0 @endif;
                                        </script>
                                        @foreach($player->images as $image)
                                        <div class="img-thumb-wrapper" id="preview-id-{{$image->id}}">
                                            <img class="img-thumb-img" src="/{{$image->image}}" alt="" style="max-width: 130px">
                                            @if (empty($player->id) || $player->status == 1)
                                                <span class="icon icon-close-red img-thumb-action"   onclick="delPhoto({{$image->id}})" >
                                                    <svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>
                                                </span>
                                            @endif
                                        </div>
                                        @endforeach
                                    @else
                                        <script>
                                            var current_photos = 0;
                                        </script>
                                    @endif
                                </span>
                                <div @if (empty($player->id) || $player->status == 1) id="upl_photo" @endif class="upload-drop-zone-wrapper">
                                    @if (empty($player->id) || $player->status == 1)
                                        <label class="upload-drop-zone upload-drop-zone-medium d-flex flex-column align-items-center justify-content-center" for="upload-photo">
                                            <i class="icon icon-sprite icon-photo-upload upload-drop-zone-icon"></i>
                                        </label>
                                    @endif
                                    <input @if (empty($player->id) || $player->status == 1) onchange="readURL(this);" @endif type="file" id="upload-photo" hidden name="photos[]" @if (!empty($player->id) && $player->status <> 1) disabled @endif accept="image/*" capture>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <div class="more_wrapper_media_articles_links more-div">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Links to media
                                    articles</label>
                                @if(!empty($player->mediaArticlesLinks) && count($player->mediaArticlesLinks) > 0)
                                    @foreach($player->mediaArticlesLinks as $mal)
                                        <div class="input-group input-group-lg mb-2">
                                            <input class="form-control font-weight-bold text-blue-darker " type="url" value="{{$mal->info}}" id="" name="media_articles_links[]" placeholder="Add media article" @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                                            @if (empty($player->id)|| $player->status == 1)
                                                <div class="input-group-append">
                                                    <span class="btn btn-white btn-icon btn-lg rounded-0 delete-more-btn">
                                                    <span class="icon icon-close-red icon-md">
                                                        <svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>
                                                    </span>
                                                    </span>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                @endif
                                @if (empty($player->id)|| $player->status == 1)
                                    <div class="input-group input-group-lg mb-2">
                                        <input class="form-control font-weight-bold text-blue-darker " type="url" value="" id="" name="media_articles_links[]" placeholder="Add media article">
                                        <div class="input-group-append">
                                            <span class="btn btn-white btn-icon btn-lg rounded-0 delete-more-btn">
                                            <span class="icon icon-close-red icon-md">
                                                <svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>
                                            </span>
                                            </span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            @if (empty($player->id)|| $player->status == 1)
                                <span class="btn btn-outline-primary text-uppercase font-weight-bold add-more-btn">+ add more
                                    articles
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

<!-- Step 3 -->
                <div class="row pt-4 mt-1 tabb">
                    <div class="col-6 pr-5">
                        <div class="form-group">
                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">ITF Profile (link)*</label>
                            <input name="itf_profile" class="form-control form-control-lg font-weight-bold text-blue-darker" type="url" value="@if(!empty($player->itf_profile)){{$player->itf_profile}}@endif" placeholder="Add the ITF profile link"  ngrequired="required" @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                        </div>
                    </div>
                    <div class="col-6 pl-5">
                        <div class="form-group">
                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Other Ranking Profiles (link)</label>
                            <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="url" value="@if(!empty($player->other_ranking_profiles)){{$player->other_ranking_profiles}}@endif" placeholder="Add the profile link" name="other_ranking_profiles" @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                        </div>
                    </div>
                    <div class="col-6 pr-5">
                        <div class="form-group">
                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">ITF Current Combined</label>
                            <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="number" maxlength="3" value="@if(!empty($player->itf_current_combined)){{$player->itf_current_combined}}@endif" name="itf_current_combined" placeholder="0" @if (!empty($player->id) && $player->status <> 1) disabled @endif min="0" max="999">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-6 pl-5">
                        <div class="form-group">
                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">ITF Career High Combined</label>
                            <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="number" maxlength="3" value="@if(!empty($player->itf_career_hight_combined)){{$player->itf_career_hight_combined}}@endif" name="itf_career_hight_combined" placeholder="0" @if (!empty($player->id) && $player->status <> 1) disabled @endif min="0" max="999">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-6 pr-5">
                        <div class="form-group">
                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Win-Loss (current year singles)</label>
                            <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" value="@if(!empty($player->win_loss_cys)){{$player->win_loss_cys}}@endif" placeholder="00 - 00" name="win_loss_cys" @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                        </div>
                    </div>
                    <div class="col-6 pl-5">
                        <div class="form-group">
                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Win-Loss (all time)</label>
                            <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" value="@if(!empty($player->win_loss_at)){{$player->win_loss_at}}@endif" placeholder="00 - 00" name="win_loss_at" @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <div class="more_wrapper_titles_singles more-div">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Titles singles</label>
                                @if(!empty($player->titlesSingles) && count($player->titlesSingles) > 0)
                                    @foreach($player->titlesSingles as $tl)
                                        <div class="input-group input-group-lg mb-2">
                                            <input class="form-control font-weight-bold text-blue-darker" type="text" value="{{$tl->info}}" name="titles_singles[]" placeholder="Add the details: Month, Year, Tournament, Location" @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                                            @if (empty($player->id)|| $player->status == 1)
                                            <div class="input-group-append">
                                                <button class="btn btn-white btn-icon btn-lg rounded-0 delete-more-btn">
                                                    <span class="icon icon-close-red icon-md">
                                                        <svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>
                                                    </span>
                                                </button>
                                            </div>
                                            @endif
                                        </div>
                                    @endforeach
                                @endif
                                @if (empty($player->id)|| $player->status == 1)
                                <div class="input-group input-group-lg mb-2">
                                    <input class="form-control font-weight-bold text-blue-darker" type="text" value="" name="titles_singles[]" placeholder="Add the details: Month, Year, Tournament, Location">
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
                            @if (empty($player->id)|| $player->status == 1)
                            <button class="btn btn-outline-primary text-uppercase font-weight-bold add-more-btn">+ add titles</button>
                            @endif
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <div class="more_wrapper_titles_doubles more-div">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Titles Doubles</label>
                                @if(!empty($player->titlesDoubles) && count($player->titlesDoubles) > 0)
                                    @foreach($player->titlesDoubles as $td)
                                        <div class="input-group input-group-lg mb-2">
                                            <input class="form-control font-weight-bold text-blue-darker" type="text" value="{{$td->info}}" name="titles_doubles[]" placeholder="Add the details: Month, Year, Tournament, Location" @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                                            @if (empty($player->id)|| $player->status == 1)
                                                <div class="input-group-append">
                                                    <button class="btn btn-white btn-icon btn-lg rounded-0 delete-more-btn">
                                                        <span class="icon icon-close-red icon-md">
                                                            <svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>
                                                        </span>
                                                    </button>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                @endif
                                @if (empty($player->id)|| $player->status == 1)
                                    <div class="input-group input-group-lg mb-2">
                                        <input class="form-control font-weight-bold text-blue-darker" type="text" value="" name="titles_doubles[]" placeholder="Add the details: Month, Year, Tournament, Location">
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
                            @if (empty($player->id)|| $player->status == 1)
                                <button class="btn btn-outline-primary text-uppercase font-weight-bold add-more-btn">+ add titles</button>
                            @endif
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <div class="more_wrapper_final_singles more-div">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Finals singles</label>
                                @if(!empty($player->finalSingles) && count($player->finalSingles) > 0)
                                    @foreach($player->finalSingles as $fs)
                                <div class="input-group input-group-lg mb-2">
                                    <input class="form-control font-weight-bold text-blue-darker" type="text" value="{{$fs->info}}" name="final_singles[]" placeholder="Add the details: Month, Year, Tournament, Location" @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                                    @if (empty($player->id)|| $player->status == 1)
                                        <div class="input-group-append">
                                            <button class="btn btn-white btn-icon btn-lg rounded-0 delete-more-btn">
                                            <span class="icon icon-close-red icon-md">
                                                <svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>
                                            </span>
                                            </button>
                                        </div>
                                    @endif
                                </div>
                                    @endforeach
                                @endif
                                @if (empty($player->id)|| $player->status == 1)
                                    <div class="input-group input-group-lg mb-2">
                                        <input class="form-control font-weight-bold text-blue-darker" type="text" value="" name="final_singles[]" placeholder="Add the details: Month, Year, Tournament, Location">
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
                            @if (empty($player->id)|| $player->status == 1)
                                <button class="btn btn-outline-primary text-uppercase font-weight-bold add-more-btn">+ add finals</button>
                            @endif
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <div class="more_wrapper_final_doubles more-div">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Finals Doubles</label>
                                @if(!empty($player->finalDoubles) && count($player->finalDoubles) > 0)
                                    @foreach($player->finalDoubles as $fd)
                                <div class="input-group input-group-lg mb-2">
                                    <input class="form-control font-weight-bold text-blue-darker" type="text" value="{{$fd->info}}" name="final_doubles[]" placeholder="Add the details: Month, Year, Tournament, Location" @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                                    @if (empty($player->id)|| $player->status == 1)
                                        <div class="input-group-append">
                                            <button class="btn btn-white btn-icon btn-lg rounded-0 delete-more-btn">
                                            <span class="icon icon-close-red icon-md">
                                                <svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>
                                            </span>
                                            </button>
                                        </div>
                                    @endif
                                </div>
                                    @endforeach
                                @endif
                                @if (empty($player->id)|| $player->status == 1)
                                    <div class="input-group input-group-lg mb-2">
                                        <input class="form-control font-weight-bold text-blue-darker" type="text" value="" name="final_doubles[]" placeholder="Add the details: Month, Year, Tournament, Location">
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
                            @if (empty($player->id)|| $player->status == 1)
                                <button class="btn btn-outline-primary text-uppercase font-weight-bold add-more-btn">+ add finals</button>
                            @endif
                        </div>
                    </div>
                </div>

<!-- Step 4 -->
                <div class="row pt-4 mt-1 tabb">
                    <div class="col-6 pr-5">
                        <div class="form-group">
                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Forehand</label>
                            <div class="btn-group btn-group-lg btn-group-toggle d-flex w-100 rounded-0" data-toggle="buttons">
                                <label class="btn btn-form w-100 rounded-0 font-weight-bold @if(!empty($player->forehand) && $player->forehand == 1){{'active'}}@endif">
                                    <input type="radio" name="forehand" id="option1" autocomplete="off" value="1" @if(!empty($player->forehand) && $player->forehand == 1)checked="checked"@endif @if (!empty($player->id) && $player->status <> 1) disabled @endif> Right handed
                                </label>
                                <label class="btn btn-form w-100 rounded-0 font-weight-bold @if(!empty($player->forehand) && $player->forehand == 2){{'active'}}@endif">
                                    <input type="radio" name="forehand" id="option2" autocomplete="off" value="2" @if(!empty($player->forehand) && $player->forehand == 2)checked="checked"@endif @if (!empty($player->id) && $player->status <> 1) disabled @endif> Left handed
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 pl-5">
                        <div class="form-group">
                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Backhand</label>
                            <div class="btn-group btn-group-lg btn-group-toggle d-flex w-100 rounded-0" data-toggle="buttons">
                                <label class="btn btn-form w-100 rounded-0 font-weight-bold @if(!empty($player->backhand) && $player->backhand == 1){{'active'}}@endif">
                                    <input type="radio" name="backhand" id="option1" autocomplete="off" value="1" @if(!empty($player->backhand) && $player->backhand == 1)checked="checked"@endif @if (!empty($player->id) && $player->status <> 1) disabled @endif> One-handed
                                </label>
                                <label class="btn btn-form w-100 rounded-0 font-weight-bold @if(!empty($player->backhand) && $player->backhand == 2){{'active'}}@endif">
                                    <input type="radio" name="backhand" id="option2" autocomplete="off" value="2" @if(!empty($player->backhand) && $player->backhand == 2)checked="checked"@endif @if (!empty($player->id) && $player->status <> 1) disabled @endif> Double-handed
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 pr-5">
                        <div class="form-group">
                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Age started tennis</label>
                            <input class="form-control form-control-lg font-weight-bold text-blue-darker" name="age_started_tennis" id="" type="number" value="@if(!empty($player->age_started_tennis)){{$player->age_started_tennis}}@endif" min="1" max="110" maxlength="3" @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="col-6 pl-5">
                        <div class="form-group">
                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Favorite surface</label>
                            <div class="row py-2">
                                <div class="col-auto">
                                    <div class="custom-control custom-checkbox h5 text-blue-darker">
                                        <input name="fs_hard" type="checkbox" class="custom-control-input" id="hard" @if(!empty($player->fs_hard) && $player->fs_hard == 1)checked="checked"@endif @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                                        <label class="custom-control-label" for="hard">
                                            Hard
                                        </label>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="custom-control custom-checkbox h5 text-blue-darker">
                                        <input name="fs_glass" type="checkbox" class="custom-control-input" id="glass" @if(!empty($player->fs_glass) && $player->fs_glass == 1)checked="checked"@endif @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                                        <label class="custom-control-label" for="glass">
                                            Grass
                                        </label>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="custom-control custom-checkbox h5 text-blue-darker">
                                        <input name="fs_clay" type="checkbox" class="custom-control-input" id="clay" @if(!empty($player->fs_clay) && $player->fs_clay == 1)checked="checked"@endif @if (!empty($player->id) && $player->status <> 1) disabled @endif>
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
                            <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" name="training_academy" value="@if(!empty($player->training_academy)){{$player->training_academy}}@endif" @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                        </div>
                    </div>
                    <div class="col-6 pl-5">
                        <div class="form-group">
                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Coach</label>
                            <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" name="coach" value="@if(!empty($player->coach)){{$player->coach}}@endif" @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                        </div>
                    </div>
                    <div class="col-6 pr-5">
                        <div class="form-group">
                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Former coach(es)</label>
                            <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" name="former_coach" value="@if(!empty($player->former_coach)){{$player->former_coach}}@endif" @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                        </div>
                    </div>
                    <div class="col-6 pl-5">
                        <div class="form-group">
                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Agent (if any)</label>
                            <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" name="agent" value="@if(!empty($player->agent)){{$player->agent}}@endif" @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                        </div>
                    </div>
                    <div class="col-6 pr-5">
                        <div class="form-group">
                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Who covers tennis expenses as of now?</label>
                            <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" name="who_covers_now" value="@if(!empty($player->who_covers_now)){{$player->who_covers_now}}@endif" @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                        </div>
                    </div>
                    <div class="col-6 pl-5">
                        <div class="form-group">
                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Injuries within last 24 months</label>
                            <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" name="injuries_24m" value="@if(!empty($player->injuries_24m)){{$player->injuries_24m}}@endif" @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                        </div>
                    </div>
                    <div class="col-6 pr-5">
                        <div class="form-group">
                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Racquet brand</label>
                            <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" name="racquet_brand" value="@if(!empty($player->racquet_brand)){{$player->racquet_brand}}@endif" @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                        </div>
                    </div>
                    <div class="col-6 pl-5">
                        <div class="form-group">
                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">String brand</label>
                            <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" name="string_brand" value="@if(!empty($player->string_brand)){{$player->string_brand}}@endif" @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                        </div>
                    </div>
                    <div class="col-6 pr-5">
                        <div class="form-group">
                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Clothing brand</label>
                            <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" name="clothing_brand" value="@if(!empty($player->clothing_brand)){{$player->clothing_brand}}@endif" @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                        </div>
                    </div>
                    <div class="col-6 pl-5">
                        <div class="form-group">
                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Shoe brand</label>
                            <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" name="shoe_brand" value="@if(!empty($player->shoe_brand)){{$player->shoe_brand}}@endif" @if (!empty($player->id) && $player->status <> 1) disabled @endif>
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
                                @if(!empty($player->videoLinks) && count($player->videoLinks) > 0)
                                    @foreach($player->videoLinks as $vl)
                                <div class="input-group input-group-lg mb-2">
                                    <input class="form-control font-weight-bold text-blue-darker " type="url" value="{{$vl->info}}" id="" name="video_links[]" placeholder="Add link to video" @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                                    @if (empty($player->id)|| $player->status == 1)
                                        <div class="input-group-append">
                                            <button class="btn btn-white btn-icon btn-lg rounded-0 delete-more-btn">
                                            <span class="icon icon-close-red icon-md">
                                                <svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>
                                            </span>
                                            </button>
                                        </div>
                                    @endif
                                </div>
                                    @endforeach
                                @endif
                            </div>
                            @if (empty($player->id)|| $player->status == 1)
                                <button class="btn btn-outline-primary text-uppercase font-weight-bold add-more-btn">+ add more
                                    videos
                                </button>
                            @endif
                        </div>
                    </div>
                </div>

<!-- Step 5 -->
                <div class="row pt-4 mt-1 tabb">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">What are the player’s goals for the next season (if known)?</label>
                            <textarea class="form-control form-control-lg font-weight-bold text-blue-darker js-autosize" name="goals_for_next_season" cols="30" rows="5" maxlength="500" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 161px;" @if (!empty($player->id) && $player->status <> 1) disabled @endif>@if(!empty($player->goals_for_next_season)){{$player->goals_for_next_season}}@endif</textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">How the financial support from TokenStars will be used (if known)?</label>
                            <textarea class="form-control form-control-lg font-weight-bold text-blue-darker js-autosize" name="financial_support_used" cols="30" rows="5" maxlength="500" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 161px;" @if (!empty($player->id) && $player->status <> 1) disabled @endif>@if(!empty($player->financial_support_used)){{$player->financial_support_used}}@endif</textarea>
                        </div>
                    </div>
                </div>

<!-- Step 6 -->
                <div class="row pt-4 mt-1 tabb">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Hobby</label>
                            <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" name="hobby" value="@if(!empty($player->hobby)){{$player->hobby}}@endif" @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Favorite Player</label>
                            <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" name="favorite_player" value="@if(!empty($player->favorite_player)){{$player->favorite_player}}@endif" @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                        </div>
                    </div>
                </div>

<!-- Step 7 -->
                <div class="row pt-4 mt-1 tabb">
                    <div class="col-6 pr-5">
                        <div class="form-group">
                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Representative of the player</label>
                            <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" name="contact_person" placeholder="Name, Surname" value="@if(!empty($player->contact_person)){{$player->contact_person}}@endif" @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                        </div>
                    </div>
                    <div class="col-6 pl-5">
                        <div class="form-group">
                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Relation</label>
                            <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" name="relation" placeholder="Father, Mother, etc." value="@if(!empty($player->relation)){{$player->relation}}@endif" @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                        </div>
                    </div>
                    <div class="col-6 pr-5">
                        <div class="form-group">
                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Email</label>
                            <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="email" name="email" value="@if(!empty($player->email)){{$player->email}}@endif" @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                        </div>
                    </div>
                    <div class="col-6 pl-5">
                        <div class="form-group">
                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Phone number</label>
                            <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" name="phone" value="@if(!empty($player->phone)){{$player->phone}}@endif" @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                        </div>
                    </div>
                    <div class="col-6 pr-5">
                        <div class="form-group">
                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Filled out by </label>
                            <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" name="filled_out_by" value="@if(!empty($player->filled_out_by)){{$player->filled_out_by}} @else {{$user->first_name }} {{$user->last_name }} @endif" @if (!empty($player->id) && $player->status <> 1) disabled @endif>
                        </div>
                    </div>
                </div>


                <div class="mt-5 mb-2 d-flex">
                    <span id="prevBtn" onclick="nextPrev(-1)" class="btn btn-outline-secondary btn-lg text-uppercase px-4 mr-4">Back</span>
                    <span id="nextBtn" onclick="nextPrev(1)" class="btn btn-primary btn-lg text-uppercase px-4">Next Step ></span>
                    @if (empty($player->id) || $player->status == 1)
                        <span class="btn btn-outline-primary btn-lg text-uppercase px-4 ml-auto step-save-button" onclick="draft()" id="step-save">Save</span>
                    @endif
                </div>
            </div>
            </form>
        </fieldset>
        <div class="card step-card step-card-done font-family-alt text-uppercase text-center" id="thnx" style="display: none;">
            <div class="card-body step-card-body d-flex flex-column justify-content-center mx-auto p-6">
                <h2 class="text-blue-darker">Thank you!</h2>
                <h3 class="text-blue-gray font-weight-normal mb-0">New player Application has been created</h3>
                <p class="h4 font-weight-normal mt-5_5 mb-0"><a href="{{route('scouting.index')}}">Go back to scouting module</a></p>
            </div>
        </div>
        <!-- end step 1 -->


        <script type="text/javascript">
            var currentTab = 0; // Current tab is set to be the first tab (0)
            showTab(currentTab); // Display the current tab
            var id = '@if(!empty($player->id)){{$player->id}}@endif';
            var id_status = '@if(!empty($player->status)){{$player->status}}@endif';
            var filess = [];
            function draft()
            {
                var form = document.getElementById('regForm');
                var newForm = new FormData(form);
                var player_id = '@if(!empty($player->id)){{$player->id}}@endif';
                var player_id_status = '@if(!empty($player->status)){{$player->status}}@endif';

                if (!validateForm()) return false;
                console.log(filess);
                if(filess.length > 0)
                {
                    for(fid=0; fid < filess.length; fid++)
                    {
                        newForm.append('photos[]',filess[fid]);
                    }
                }

                newForm.append('id', id);
                newForm.append('draft', 1);

                //if(player_id == '' || (player_id != '' && player_id_status == '1')){
                    var oReq = new XMLHttpRequest();
                    oReq.open("POST", "/scouting/create", true);
                    oReq.onloadstart = function(e) {
                        var btn = document.getElementById('step-save');
                        btn.innerHTML = 'Saving...';
                        document.getElementById('step-save').onclick = function() {  };
                        //document.getElementById(id+"Button").onclick = function() { HideError(id); }
                    };
                    oReq.onload = function(oEvent) {
                        if (oReq.status == 200) {
                            ids = oReq.response.trim();
                            id = ids;
                            document.getElementById('player_id').value = id;
                            filess = [];
                            console.log(filess);
                            var btn = document.getElementById('step-save');
                            btn.innerHTML = 'Saved';
                            setTimeout(function(){
                                btn.innerHTML = 'Save';
                                document.getElementById('step-save').onclick = draft;
                            },500)
                        }
                    };

                    oReq.send(newForm);
                //}
                return false;
            }

            function checkSocialLinks() {
                var fb = $("input[name='fb_link']");
                var tw = $("input[name='tw_link']");
                var ig = $("input[name='ig_link']");
                var fb_check = false;
                var tw_check = false;
                var ig_check = false;
                //return false;
                if(fb.val() == '' || fb.val().match(/(?:https?:\/\/)?(?:www\.)?facebook\.com\/.(?:(?:\w)*#!\/)?(?:pages\/)?(?:[\w\-]*\/)*([\w\-\.]*)/i)) {
                    fb_check = true;
                    fb.removeClass('is-invalid');
                    fb.siblings('div.invalid-feedback').first().html('');
                    //console.log(fb);
                }
                else {
                    fb_check = false;
                    fb.addClass('is-invalid');
                    fb.siblings('div.invalid-feedback').first().html('This is not a Facebook URL');
                }
                if(tw.val()== '' || tw.val().match(/http(?:s)?:\/\/(?:www\.)?twitter\.com\/([a-zA-Z0-9_]+)/i)) {
                    tw_check = true;
                    tw.removeClass('is-invalid');
                    tw.siblings('div.invalid-feedback').first().html('');
                }
                else {
                    tw_check = false;
                    tw.addClass('is-invalid');
                    tw.siblings('div.invalid-feedback').first().html('This is not a Twitter URL');
                }
                if(ig.val()== '' || ig.val().match(/(?:https?:\/\/)?(?:www\.)?instagram\.com\/.(?:(?:\w)*#!\/)?(?:pages\/)?(?:[\w\-]*\/)*([\w\-\.]*)/i)) {
                    ig_check = true;
                    ig.removeClass('is-invalid');
                    ig.siblings('div.invalid-feedback').first().html('');
                }
                else {
                    ig_check = false;
                    ig.addClass('is-invalid');
                    ig.siblings('div.invalid-feedback').first().html('This is not a Instagram URL');
                }
                if(!ig_check || !tw_check || !ig_check){
                    //e.preventDefault();
                    return false;
                }
                else
                    return true;
            }
            function isValidDate(dateString)
            {
                // First check for the pattern
                if(!/^\d{1,2}\.\d{1,2}\.\d{4}$/.test(dateString))
                    return false;

                // Parse the date parts to integers
                parts = dateString.split(".");
                day = parseInt(parts[0], 10);
                month = parseInt(parts[1], 10);
                year = parseInt(parts[2], 10);

                var currentTime = new Date();
                var currentYear = currentTime.getFullYear();

                // Check the ranges of month and year
                if(year < 1950 || year >= currentYear || month == 0 || month > 12)
                    return false;

                monthLength = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];

                // Adjust for leap years
                if(year % 400 == 0 || (year % 100 != 0 && year % 4 == 0))
                    monthLength[1] = 29;

                // Check the range of the day
                return day > 0 && day <= monthLength[month - 1];
            };
            function showTab(n) {
                // This function will display the specified tab of the form ...
                var x = document.getElementsByClassName("tabb");
                x[n].style.display = "flex";

                var sec_title = ['Step 1 of 7', 'Step 2 of 7', 'Step 3 of 7', 'Step 4 of 7', 'Step 5 of 7', 'Step 6 of 7', 'Step 7 of 7'];
                var prm_title = ['Choose Sport', 'General Information', 'Tennis Stats', 'Playing and training Details', 'Next Season Goals', 'Personal Info', 'Players` contact info'];

                var sec_title_elm = document.getElementById('sec');
                var prm_title_elm = document.getElementById('prm');

                var player_id = '@if(!empty($player->id)){{$player->id}}@endif';
                var player_id_status = '@if(!empty($player->status)){{$player->status}}@endif';

                sec_title_elm.innerHTML = sec_title[n];
                prm_title_elm.innerHTML = prm_title[n];
                // ... and fix the Previous/Next buttons:
                if (n == 0) {
                    document.getElementById("prevBtn").style.display = "none";
                    document.getElementById("step-save").style.display = "none";
                } else {
                    document.getElementById("prevBtn").style.display = "inline";
                    document.getElementById("step-save").style.display = "inline";
                }
                if (n == (x.length - 1)) {
                    document.getElementById("nextBtn").innerHTML = "Submit application";
                    if(player_id != '' && player_id_status != '1'){
                        document.getElementById("nextBtn").style.display = "none";
                    }
                } else {
                    document.getElementById("nextBtn").innerHTML = "Next";
                    if(player_id != '' && player_id_status != '1'){
                        document.getElementById("nextBtn").style.display = "block";
                    }
                }
            }

            function nextPrev(n) {
                draft();
                // This function will figure out which tab to display
                var x = document.getElementsByClassName("tabb");
                // Exit the function if any field in the current tab is invalid:
                if (n == 1 && !validateForm()) return false;
                // Increase or decrease the current tab by 1:
                x[currentTab].style.display = "none";
                currentTab = currentTab + n;

                // if you have reached the end of the form... :
                if (currentTab >= x.length) {
                    var form = document.getElementById('regForm');
                    var newForm = new FormData(form);

                    if(filess.length > 0)
                    {
                        for(fid=0; fid < filess.length; fid++)
                        {
                            newForm.append('photos[]',filess[fid]);
                        }
                    }
                    var formf = document.getElementById('form_f');
                    var thnx = document.getElementById('thnx');
                    formf.style.display = 'none';
                    thnx.style.display = 'block';

                    var oReq = new XMLHttpRequest();
                    oReq.open("POST", "/scouting/create", true);
                    oReq.onload = function(oEvent) {
                        if (oReq.status == 200) {


                        }
                    };

                    oReq.send(newForm);

                    return false;
                }
                // Otherwise, display the correct tab:
                showTab(currentTab);
            }

            function ValidURL(str) {
                var expression = /[-a-zA-Z0-9@:%_\+.~#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&//=]*)?/gi;

                var pattern = new RegExp(expression);
                if(!pattern.test(str)) {
                    return false;
                } else {
                    return true;
                }
            }

            function validateForm() {
                //return true;
                // This function deals with validation of the form fields

                var x, y, i, valid = true;
                var soc_url_valid = false;
                var date_birth = false
                var length_valid = true;
                x = document.getElementsByClassName("tabb");
                y = x[currentTab].getElementsByTagName("input");
                numbers = x[currentTab].querySelectorAll("input[type='number']");
                photo_container =  document.getElementById('photo-container');
                photos = document.getElementById('photos').getElementsByTagName("img-thumb-wrapper");

                var select = x[currentTab].getElementsByTagName("select");
                textarea = x[currentTab].getElementsByTagName("textarea");
                // A loop that checks every input fie
                // ld in the current tab:
                for (i = 0; i < y.length; i++) {

                    is_required = y[i].getAttribute('ngrequired');
                    // If a field is empty...
                    if(is_required=='required') {
                        if(y[i].type == "text" || y[i].type == "url"){
                            if (y[i].value == "") {
                                // add an "invalid" class to the field:
                                y[i].classList.add('is-invalid');
                                // and set the current valid status to false:
                                valid = false;
                            }
                            else {
                                if(y[i].value.length > 191)
                                {
                                    y[i].classList.add('is-invalid');
                                    valid = false;
                                }
                                else
                                    y[i].classList.remove('is-invalid');

                                if(y[i].name == 'date_of_birth' && !isValidDate(y[i].value)){
                                    y[i].classList.add('is-invalid');
                                    // and set the current valid status to false:
                                    valid = false;
                                }
                                else if(y[i].name == 'date_of_birth' && isValidDate(y[i].value)){
                                    console.log(isValidDate(y[i].value));
                                    y[i].classList.remove('is-invalid');
                                }

                                if(y[i].name == 'itf_profile')
                                {
                                    console.log(ValidURL(y[i].value));
                                    if(!ValidURL(y[i].value))
                                    {
                                        y[i].classList.add('is-invalid');
                                        valid = false;
                                    }
                                    else
                                    {
                                        y[i].classList.remove('is-invalid');
                                    }
                                }
                            }
                        }
                        else{
                            if(y[i].type == "checkbox"){
                                if (y[i].checked == false) {
                                    // add an "invalid" class to the field:
                                    y[i].classList.add('is-invalid');
                                    // and set the current valid status to false:
                                    valid = false;
                                }
                                else {
                                    y[i].classList.remove('is-invalid');
                                }
                            }
                            else{
                                y[i].classList.remove('is-invalid');
                            }
                        }

                    }
                    else
                    {
                        if(y[i].value.length > 191)
                        {
                            y[i].classList.add('is-invalid');
                            valid = false;
                        }
                        else
                        {
                            y[i].classList.remove('is-invalid');
                        }


                        if(y[i].type == "number" && y[i].value != '')
                        {
                            if(y[i].value.length > 5 || y[i].value < 0)
                            {
                                y[i].classList.add('is-invalid');
                                valid = false;
                            }
                            else
                            {
                                y[i].classList.remove('is-invalid');
                            }
                        }
                        if(y[i].type == "url" && y[i].value != '')
                        {
                            if(y[i].name == 'other_ranking_profiles')
                            {
                                if(!ValidURL(y[i].value))
                                {
                                    y[i].classList.add('is-invalid');
                                    valid = false;
                                }
                                else
                                {
                                    y[i].classList.remove('is-invalid');
                                }
                            }

                        }
                    }
                }

                for (i = 0; i < select.length; i++) {
                    is_required = select[i].getAttribute('ngrequired');
                    // If a field is empty...
                    if(is_required=='required') {
                        if (select[i].value == "") {
                            select[i].classList.add('is-invalid');
                            // and set the current valid status to false:
                            valid = false;
                            if(i == 1){
                                console.log(select[i-1].className);
                            }
                        }
                        else {
                            select[i].classList.remove('is-invalid');
                        }
                    }
                }

                for (i = 0; i < textarea.length; i++) {
                    is_required = textarea[i].getAttribute('ngrequired');
                    // If a field is empty...
                    if(is_required=='required') {
                        //onsole.log(textarea[i].value);
                        if (textarea[i].value == "") {
                            // add an "invalid" class to the field:
                            textarea[i].classList.add('is-invalid');
                            // and set the current valid status to false:
                            valid = false;
                        }
                        else {
                            if(textarea[i].value.length > 700)
                            {
                                textarea[i].classList.add('is-invalid');
                                // and set the current valid status to false:
                                valid = false;
                            }
                            else
                            {
                                textarea[i].classList.remove('is-invalid');
                            }

                        }
                    }
                    else
                    {
                        if(textarea[i].value != '' && textarea[i].value.length > 500)
                        {
                            textarea[i].classList.add('is-invalid');
                            // and set the current valid status to false:
                            valid = false;
                        }
                        else
                        {
                            textarea[i].classList.remove('is-invalid');
                        }
                    }
                }

                // validate numbers range
                for (i = 0; i < numbers.length; i++) {
                    min = numbers[i].getAttribute("min");
                    max = numbers[i].getAttribute("max");
                    maxlength = numbers[i].getAttribute("maxlength");
                    val = numbers[i].value;
                    console.log("min "+min);
                    console.log("max "+max);
                    console.log("maxlength "+maxlength);
                    console.log("val "+ val);

                    if(numbers[i].value.length > 0 && min && max && maxlength){
                        console.log("here");
                        if(Number(val) < Number(min) || Number(val) > Number(max)){
                            if(val <= min){
                                console.log(val+  " <= " + min);
                            }
                            if(val >= max){
                                console.log(val+  " >= " + max);
                            }
                            console.log("here 2");
                            numbers[i].classList.add('is-invalid');
                            valid = false;
                        }
                        else{
                            numbers[i].classList.remove('is-invalid');
                        }
                    }
                    console.log(numbers[i]);
                }

                // check photos
                /*if(currentTab == 1){
                    console.log(currentTab);
                    console.log("current_photos = " +current_photos.toString());
                    console.log(window);
                    console.log(photos.length);
                    console.log(current_photos);
                    if(photos.length == 0){
                        photo_container.className += " is-invalid";
                        valid = false;
                    }
                    else{
                        photo_container.classList.remove('is-invalid');
                    }

                }*/
                // Validate social links
                soc_url_valid = checkSocialLinks();

                // If the valid status is true, mark the step as finished and valid:
                if (valid) {
                    //document.getElementsByClassName("step")[currentTab].className += " finish";
                }

                if(valid  && soc_url_valid && length_valid){
                  return true;
                }
                //return valid; // return the valid status
                return false; // return the valid status
            }
        </script>


        <div class="mt-5_5"></div>
    </div>
@endsection
