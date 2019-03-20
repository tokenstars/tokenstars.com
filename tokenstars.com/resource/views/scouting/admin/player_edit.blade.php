@extends('scouting.app-card')

@section('content')
    <script>
        graph_count_items = 1;
        count_items = 1;
        count_results_last_seasons = 1;
        count_personal_awards = 1;
        var data = [];
    </script>
    <script type="text/javascript" src="/js/main.js"></script>
    <link rel="stylesheet" href="/css/cropper.css">
    <style>
        img {
            max-width: 100%;
        }

        .btn-icon .icon {
            top: unset;
            left: unset;
        }
    </style>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb text-uppercase mb-4">
            <li class="breadcrumb-item"><a href="#">Platform</a></li>
            <li class="breadcrumb-item"><a href="{{route('scouting.admin.players')}}">Scouting</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$player->first_name}} {{$player->last_name}}
                (ID: {{$player->id}})
            </li>
        </ol>
    </nav>
    <div class="d-flex flex-nowrap mb-4">
        <h1 class="h3_25 text-blue-darker text-uppercase mb-0">Player Card Edit</h1>
        <div class="align-self-end ml-auto">
            <div class="h4 mb-0 font-weight-normal">

            </div>
        </div>
    </div>
    <article class="card player-card">
        <fieldset class="card step-card" id="form_f">
            <div class="card-body px-5 py-4">
                <form id="regForm" method="POST" action="{{route('scouting.admin.players.id',$player->id)}}"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="container">

                        <h3>Avatar</h3>
                        <div id="av">
                            <img src="{{$player->photo}}" width="15%">
                            <br><br>
                        </div>
                        <div class="row" id="crop">
                            <div class="col-9">
                                <!-- <h3>Demo:</h3> -->
                                <div class="img-container">
                                    <img id="image" src="" alt="Picture">
                                </div>
                            </div>
                            <div class="col-3">
                                <!-- <h3>Preview:</h3> -->
                                <div class="docs-preview clearfix">
                                    <div class="img-preview preview-lg"></div>
                                </div>
                            </div>
                        </div>
                        <label class="btn btn-primary btn-upload" for="inputImage" title="Upload image file">
                            <input type="file" class="sr-only" id="inputImage" name="avatar">
                            <input type="hidden" value="" name="avatarbs64" id="avatarbs64"/>
                            <input type="hidden" value="" name="avatardata" id="avatardata"/>
                            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false">
                        <span class="fa fa-upload">Select avatar</span>
                    </span>
                        </label>

                        <div id="clone"></div>
                    </div>
                    <br>
                    <div class="col-12">
                        <div class="form-group">
                            <div class="text-uppercase text-blue-gray-light font-weight-bold">Photos upload*</div>
                            <div class="img-thumb-container" id="photo-container">
                                <span id="photos">
                                    @if(!empty($player->images) && count($player->images) > 0)
                                        <script>
                                            var current_photos = @if(count($player->images) > 0) {{count($player->images)}} @else 0 @endif;
                                        </script>

                                        @foreach($player->images as $image)
                                            <div class="img-thumb-wrapper" id="preview-id-{{$image->id}}">
                                            <img class="img-thumb-img"
                                                 src="/@if(!empty($image->prev_image)){{$image->prev_image}}@else{{$image->image}}@endif"
                                                 alt="" style="max-width: 130px">

                                                    <span class="icon icon-close-red img-thumb-action"
                                                          onclick="delPhoto({{$image->id}})">
                                                    <svg viewBox="0 0 1 1"><use
                                                                xlink:href="/images/icons.svg#close-red"></use></svg>
                                                </span>

                                        </div>
                                        @endforeach
                                    @else
                                        <script>
                                            var current_photos = 0;
                                        </script>
                                    @endif
                                </span>
                                <div id="upl_photo" class="upload-drop-zone-wrapper">

                                    <label class="upload-drop-zone upload-drop-zone-medium d-flex flex-column align-items-center justify-content-center"
                                           for="upload-photo">
                                        <i class="icon icon-sprite icon-photo-upload upload-drop-zone-icon"></i>
                                    </label>

                                    <input onchange="readURL(this);" type="file" id="upload-photo" hidden
                                           name="photos[]" accept="image/*" capture>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row pt-4 mt-1 tabb">
                        <div class="col-6 pr-5">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">First
                                    Name*</label>
                                <input name="first_name"
                                       class="form-control form-control-lg font-weight-bold text-blue-darker"
                                       type="text" value="@if(!empty($player->first_name)){{$player->first_name}}@endif"
                                       placeholder="Player's first name" ngrequired="required">
                            </div>
                        </div>
                        <div class="col-6 pl-5">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Last
                                    Name*</label>
                                <input name="last_name"
                                       class="form-control form-control-lg font-weight-bold text-blue-darker"
                                       type="text" value="@if(!empty($player->last_name)){{$player->last_name}}@endif"
                                       placeholder="Player's last name" ngrequired="required">
                            </div>
                        </div>
                        <div class="col-6 pr-5">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Country of
                                    Residence*</label>
                                <select class="custom-select custom-select-lg font-weight-bold text-blue-darker"
                                        id="country-id" name="country_id" ngrequired="required">
                                    <option value="">---</option>
                                    @foreach($countries as $k=>$country)
                                        <option value="{{$k}}" @if(!empty($player->country_id) && $player->country_id == $k){{'selected="selected"'}}@endif>{{$country}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-6 pl-5">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">City of
                                    Residence*</label>
                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                       type="text" value="@if(!empty($player->city)){{$player->city}}@endif" name="city"
                                       ngrequired="required" placeholder="Add the city of residence">
                            </div>
                        </div>
                        <div class="col-6 pr-5">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Date of
                                    Birth*</label>
                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                       type="text" id="date_of_birth" name="date_of_birth" placeholder="mm/dd/yyyy"
                                       data-date-format="MM/DD/YYYY" ngrequired="required"
                                       value="@if(!empty($player->date_of_birth)){{date('m/d/Y', strtotime($player->date_of_birth))}}@endif">
                            </div>
                        </div>
                        <div class="col-6 pl-5">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Sex</label>
                                <div class="row py-2">
                                    <div class="col-auto">
                                        <div class="custom-control custom-radio h5 text-blue-darker">
                                            <input value="male" name="sex" type="radio" class="custom-control-input"
                                                   id="male" @if(empty($player->sex)){{'checked'}}@elseif(!empty($player->sex) && $player->sex == 1){{'checked'}}@endif>
                                            <label class="custom-control-label" for="male">
                                                Male
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="custom-control custom-radio h5 text-blue-darker">
                                            <input value="female" name="sex" type="radio" class="custom-control-input"
                                                   id="female" @if(!empty($player->sex) && $player->sex == 2){{'checked'}}@endif >
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
                                <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                       for="">Nationality*</label>
                                <select class="custom-select custom-select-lg font-weight-bold text-blue-darker"
                                        id="nationality-id" name="nationality" ngrequired="required">
                                    <option value="">---</option>
                                    @foreach($countries as $k=>$country)
                                        <option value="{{$k}}" @if(!empty($player->nationality) && $player->nationality == $k){{'selected="selected"'}}@endif>{{$country}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6 pl-5">
                            @if($player->sport_type == 1 || $player->sport_type == 3)
                                <div class="row">
                                    <div class="col-6 pr-4">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Weight
                                                (kg)</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="number" name="weight" placeholder="54" min="10" max="400"
                                                   maxlength="3"
                                                   value="@if(!empty($player->weight)){{$player->weight}}@endif">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="col-6 pl-4">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Height
                                                (cm)</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="number" name="height" placeholder="174" min="45" max="300"
                                                   maxlength="3"
                                                   value="@if(!empty($player->height)){{$player->height}}@endif">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Bio (700
                                    symbols max.)*</label>
                                <textarea ngrequired="required"
                                          class="form-control form-control-lg font-weight-bold text-blue-darker"
                                          name="description" id="" cols="30" rows="3" maxlength="700"
                                          placeholder="Please type in short bio of the player here">@if(!empty($player->description)){{$player->description}}@endif</textarea>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                       for="">Facebook</label>
                                <input name="fb_link"
                                       class="form-control form-control-lg font-weight-bold text-blue-darker" type="url"
                                       value="@if(!empty($player->fb_link)){{$player->fb_link}}@endif"
                                       placeholder="Add the Facebook link">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                       for="">Twitter</label>
                                <input name="tw_link"
                                       class="form-control form-control-lg font-weight-bold text-blue-darker" type="url"
                                       value="@if(!empty($player->tw_link)){{$player->tw_link}}@endif"
                                       placeholder="Add the Twitter link">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                       for="">Instagram</label>
                                <input name="ig_link"
                                       class="form-control form-control-lg font-weight-bold text-blue-darker" type="url"
                                       value="@if(!empty($player->ig_link)){{$player->ig_link}}@endif"
                                       placeholder="Add the Instagram link">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>

                        @if($player->sport_type == 3)

                            <div class="col-6">
                                <div class="form-group">
                                    <label class="text-uppercase text-blue-gray-light font-weight-bold" for="football_club_name">Club name</label>
                                    <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                           type="text" name="football_club_name"
                                           placeholder="Manchester United"
                                           value="@if(!empty($player->football_club_name)){{$player->football_club_name}}@endif">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label class="text-uppercase text-blue-gray-light font-weight-bold" for="football_position">Position</label>
                                    <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                           type="text" name="football_position"
                                           placeholder="Centre Forward"
                                           value="@if(!empty($player->football_position)){{$player->football_position}}@endif">
                                </div>
                            </div>
                            @endif
                    </div>
                    @if($player->sport_type == 1)
                    <!-- Step 3 -->
                        <div class="row pt-4 mt-1 tabb">
                            <div class="col-6 pr-5">
                                <div class="form-group">
                                    <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                           for="">Rank</label>
                                    <input id="rank_change" name="rank"
                                           class="form-control form-control-lg font-weight-bold text-blue-darker"
                                           type="text" value="@if(!empty($player->rank)){{$player->rank}}@endif"
                                           placeholder="Add the @if(!empty($player->rank)){{$player->rank}}@endif profile link"
                                           ngrequired="required">
                                </div>
                            </div>
                            <div class="col-6 pl-5">
                                <div class="form-group">
                                    <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Career
                                        hight combined date</label>
                                    <input id="ranking_date"
                                           class="form-control form-control-lg font-weight-bold text-blue-darker"
                                           type="text"
                                           value="@if(!empty($player->ranking_date)){{$player->ranking_date}}@endif"
                                           name="ranking_date">
                                </div>
                            </div>
                            <div class="col-6 pr-5">
                                <div class="form-group">
                                    <label class="text-uppercase text-blue-gray-light font-weight-bold" for=""><span
                                                id="rank1">@if(!empty($player->rank)){{$player->rank}}@endif</span>
                                        Profile (link)*</label>
                                    <input name="itf_profile"
                                           class="form-control form-control-lg font-weight-bold text-blue-darker"
                                           type="url"
                                           value="@if(!empty($player->itf_profile)){{$player->itf_profile}}@endif"
                                           placeholder="Add the @if(!empty($player->rank)){{$player->rank}}@endif profile link"
                                           ngrequired="required">
                                </div>
                            </div>
                            <div class="col-6 pl-5">
                                <div class="form-group">
                                    <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Other
                                        Ranking Profiles (link)</label>
                                    <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                           type="url"
                                           value="@if(!empty($player->other_ranking_profiles)){{$player->other_ranking_profiles}}@endif"
                                           placeholder="Add the profile link" name="other_ranking_profiles">
                                </div>
                            </div>
                            <div class="col-6 pr-5">
                                <div class="form-group">
                                    <label class="text-uppercase text-blue-gray-light font-weight-bold" for=""><span
                                                id="rank2">@if(!empty($player->rank)){{$player->rank}}@endif</span>
                                        Current Combined</label>
                                    <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                           type="number" maxlength="4"
                                           value="@if(!empty($player->itf_current_combined)){{$player->itf_current_combined}}@endif"
                                           name="itf_current_combined" placeholder="0" min="0" max="9999">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-6 pl-5">
                                <div class="form-group">
                                    <label class="text-uppercase text-blue-gray-light font-weight-bold" for=""><span
                                                id="rank3">@if(!empty($player->rank)){{$player->rank}}@endif</span>
                                        Career High Combined</label>
                                    <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                           type="number" maxlength="4"
                                           value="@if(!empty($player->itf_career_hight_combined)){{$player->itf_career_hight_combined}}@endif"
                                           name="itf_career_hight_combined" placeholder="0" min="0" max="9999">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-6 pr-5">
                                <div class="form-group">
                                    <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Win-Loss
                                        (current year singles)</label>
                                    <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                           type="text"
                                           value="@if(!empty($player->win_loss_cys)){{$player->win_loss_cys}}@endif"
                                           placeholder="00 - 00" name="win_loss_cys">
                                </div>
                            </div>
                            <div class="col-6 pr-5">
                                <div class="form-group">
                                    <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Win-Loss
                                        (current year singles)</label>
                                    <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                           type="text"
                                           value="@if(!empty($player->win_loss_cys)){{$player->win_loss_cys}}@endif"
                                           placeholder="00 - 00" name="win_loss_cys">
                                </div>
                            </div>
                            <div class="col-6 pl-5">
                                <div class="form-group">
                                    <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Win-Loss
                                        (all time)</label>
                                    <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                           type="text"
                                           value="@if(!empty($player->win_loss_at)){{$player->win_loss_at}}@endif"
                                           placeholder="00 - 00" name="win_loss_at">
                                </div>
                            </div>
                            <div class="col-6 pr-5">
                                <div class="form-group">
                                    <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Tournaments
                                        (current year)</label>
                                    <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                           type="text"
                                           value="@if(!empty($player->tournaments_cys)){{$player->tournaments_cys}}@endif"
                                           placeholder="2018" name="tournaments_cys">
                                </div>
                            </div>
                            <div class="col-6 pl-5">
                                <div class="form-group">
                                    <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Tournaments
                                        (all time)</label>
                                    <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                           type="text"
                                           value="@if(!empty($player->tournaments_at)){{$player->tournaments_at}}@endif"
                                           placeholder="all time" name="tournaments_at">
                                </div>
                            </div>

                            <div class="col-6 pr-5">
                                <div class="form-group">
                                    <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Titles
                                        (current year)</label>
                                    <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                           type="text"
                                           value="@if(!empty($player->titles_cys)){{$player->titles_cys}}@endif"
                                           placeholder="2018" name="titles_cys">
                                </div>
                            </div>
                            <div class="col-6 pl-5">
                                <div class="form-group">
                                    <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Titles
                                        (all time)</label>
                                    <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                           type="text"
                                           value="@if(!empty($player->titles_at)){{$player->titles_at}}@endif"
                                           placeholder="all time" name="titles_at">
                                </div>
                            </div>

                            @endif
                            @if($player->sport_type == 3)
                                <div class="row pt-4 mt-1 tabb">
                                    <div class="col-12 pl-5">
                                        <h4 class="text-blue-darker text-uppercase mb-3">Overview</h4>
                                    </div>
                                    <div class="col-12 pl-5">
                                        <h5 class="text-uppercase text-blue-gray-light font-weight-bold">Overall
                                            Statistics</h5>
                                    </div>

                                    <div class="col-6 pr-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                   for="football_appearences_cyc">Appereances (current)</label>
                                            <input id="football-appearences-cyc" name="football_appearences_cyc"
                                                   class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text"
                                                   value="@if(!empty($player->football_appearences_cyc)){{$player->football_appearences_cyc}}@endif"
                                                   placeholder="11">
                                        </div>
                                    </div>
                                    <div class="col-6 pr-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                   for="football_appearences_at">Appereances (All time)</label>
                                            <input id="football-appearences-at" name="football_appearences_at"
                                                   class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text"
                                                   value="@if(!empty($player->football_appearences_at)){{$player->football_appearences_at}}@endif"
                                                   placeholder="50">
                                        </div>
                                    </div>
                                    <div class="col-6 pr-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                   for="football_goals_cys">Goals (current)</label>
                                            <input id="football-goals-cyc" name="football_goals_cys"
                                                   class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text"
                                                   value="@if(!empty($player->football_goals_cys)){{$player->football_goals_cys}}@endif"
                                                   placeholder="11">
                                        </div>
                                    </div>
                                    <div class="col-6 pr-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                   for="football_goals_at">Goals (All time)</label>
                                            <input id="football-goals-at" name="football_goals_at"
                                                   class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text"
                                                   value="@if(!empty($player->football_goals_at)){{$player->football_goals_at}}@endif"
                                                   placeholder="50">
                                        </div>
                                    </div>

                                    <div class="col-6 pr-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                   for="football_passes_cys">Passes (current)</label>
                                            <input id="football-passes-cyc" name="football_passes_cys"
                                                   class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text"
                                                   value="@if(!empty($player->football_passes_cys)){{$player->football_passes_cys}}@endif"
                                                   placeholder="11">
                                        </div>
                                    </div>
                                    <div class="col-6 pr-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                   for="football_passes_at">Passes (All time)</label>
                                            <input id="football-passes-at" name="football_passes_at"
                                                   class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text"
                                                   value="@if(!empty($player->football_passes_at)){{$player->football_passes_at}}@endif"
                                                   placeholder="50">
                                        </div>
                                    </div>

                                    <div class="col-6 pr-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                   for="football_yellow_cards_cys">Yellow cards (current)</label>
                                            <input id="football-yellow-cards-cyc" name="football_yellow_cards_cys"
                                                   class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text"
                                                   value="@if(!empty($player->football_yellow_cards_cys)){{$player->football_yellow_cards_cys}}@endif"
                                                   placeholder="11">
                                        </div>
                                    </div>
                                    <div class="col-6 pr-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                   for="football_yellow_cards_at">Yellow cards (All time)</label>
                                            <input id="football-yellow-cards-at" name="football_yellow_cards_at"
                                                   class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text"
                                                   value="@if(!empty($player->football_yellow_cards_at)){{$player->football_yellow_cards_at}}@endif"
                                                   placeholder="50">
                                        </div>
                                    </div>

                                    <div class="col-6 pr-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                   for="football_red_cards_cys">Red cards (current)</label>
                                            <input id="football-red-cards-cyc" name="football_red_cards_cys"
                                                   class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text"
                                                   value="@if(!empty($player->football_red_cards_cys)){{$player->football_red_cards_cys}}@endif"
                                                   placeholder="11">
                                        </div>
                                    </div>
                                    <div class="col-6 pr-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                   for="football_red_cards_at">Red cards (All time)</label>
                                            <input id="football-red-cards-at" name="football_red_cards_at"
                                                   class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text"
                                                   value="@if(!empty($player->football_red_cards_at)){{$player->football_red_cards_at}}@endif"
                                                   placeholder="50">
                                        </div>
                                    </div>

                                </div>

                            @endif
                            @if($player->sport_type == 1 || $player->sport_type == 3)
                                <div class="col-12">
                                    <div class="form-group">

                                        <div class="more_wrapper_news more-div">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Latest
                                                news</label>
                                            @foreach(\App\Models\Scouting\LatestNews::where('player_tennis_id', $player->id)->get() as $news)
                                                <div class="input-group input-group-lg mb-2">
                                                    <input class="form-control font-weight-bold text-blue-darker"
                                                           type="text" value="{{$news->description}}"
                                                           name="latest_news_desc[]" placeholder="Description ">
                                                    <input class="form-control font-weight-bold text-blue-darker"
                                                           width="30%" type="url" value="{{$news->url}}"
                                                           name="latest_news_url[]" placeholder="URL">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-white btn-icon btn-lg rounded-0 delete-more-btn">
										<span class="icon icon-close-red icon-md">
											<svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>
										</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="input-group input-group-lg mb-2">
                                                <input class="form-control font-weight-bold text-blue-darker"
                                                       type="text" value="" name="latest_news_desc[]"
                                                       placeholder="Description ">
                                                <input class="form-control font-weight-bold text-blue-darker"
                                                       width="30%" type="text" value="" name="latest_news_url[]"
                                                       placeholder="URL">
                                                <div class="input-group-append">
                                                    <button class="btn btn-white btn-icon btn-lg rounded-0 delete-more-btn">
										<span class="icon icon-close-red icon-md">
											<svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>
										</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <button class="btn btn-outline-primary text-uppercase font-weight-bold add-more-btn">
                                            + add news
                                        </button>

                                    </div>
                                </div>
                            @endif


                            <div class="col-12">
                                <div class="form-group">
                                    <div class="more_wrapper_history more-div">
                                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Activity
                                            on the platform</label>
                                        @foreach(\App\Models\Scouting\PlayerHistory::where('player_id', $player->id)->get() as $hist)
                                            <div class="input-group input-group-lg mb-2">
                                                <input id="player_history_date"
                                                       class="form-control font-weight-bold text-blue-darker"
                                                       type="text" value="{{$hist->date}}" name="player_history_date[]"
                                                       placeholder="12/15/2018">
                                                <input class="form-control font-weight-bold text-blue-darker"
                                                       width="30%" type="text" value="{{$hist->text}}"
                                                       name="player_history_text[]" placeholder="Text">
                                                <div class="input-group-append">
                                                    <button class="btn btn-white btn-icon btn-lg rounded-0 delete-more-btn">
										<span class="icon icon-close-red icon-md">
											<svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>
										</span>
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="input-group input-group-lg mb-2">
                                            <input id="player_history_date"
                                                   class="form-control font-weight-bold text-blue-darker" type="text"
                                                   value="" name="player_history_date[]" placeholder="12/15/2018">
                                            <input class="form-control font-weight-bold text-blue-darker" width="30%"
                                                   type="text" value="" name="player_history_text[]" placeholder="Text">
                                            <div class="input-group-append">
                                                <button class="btn btn-white btn-icon btn-lg rounded-0 delete-more-btn">
										<span class="icon icon-close-red icon-md">
											<svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>
										</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-outline-primary text-uppercase font-weight-bold add-more-btn">
                                        + add history
                                    </button>

                                </div>
                            </div>

                            @if($player->sport_type == 1)
                                <div class="col-12 pl-5">
                                    <h4 class="text-uppercase text-blue-gray-light font-weight-bold">Latest Match</h4>
                                </div>
                                @php
                                    $latest_match = \App\Models\Scouting\LatestMatch::where('player_tennis_id', $player->id)->first();
                                @endphp

                                <div class="col-6 pl-5">
                                    <div class="form-group">
                                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Name
                                            (left)</label>
                                        <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                               type="text"
                                               value="@if(!empty($latest_match->name_left)){{$latest_match->name_left}}@endif"
                                               placeholder="First name" name="name_left">
                                    </div>
                                </div>

                                <div class="col-6 pl-5">
                                    <div class="form-group">
                                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Name
                                            (right)</label>
                                        <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                               type="text"
                                               value="@if(!empty($latest_match->name_right)){{$latest_match->name_right}}@endif"
                                               placeholder="First name" name="name_right">
                                    </div>
                                </div>
                                <div class="col-6 pl-5">
                                    <div class="form-group">
                                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Last
                                            Name (left)</label>
                                        <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                               type="text"
                                               value="@if(!empty($latest_match->last_name_left)){{$latest_match->last_name_left}}@endif"
                                               placeholder="Last name" name="last_name_left">
                                    </div>
                                </div>

                                <div class="col-6 pl-5">
                                    <div class="form-group">
                                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Last
                                            Name (right)</label>
                                        <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                               type="text"
                                               value="@if(!empty($latest_match->last_name_right)){{$latest_match->last_name_right}}@endif"
                                               placeholder="Last name" name="last_name_right">
                                    </div>
                                </div>
                                <div class="col-6 pl-5">
                                    <div class="form-group">
                                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Country
                                            (left)</label>
                                        <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                               type="text"
                                               value="@if(!empty($latest_match->country_left)){{$latest_match->country_left}}@endif"
                                               placeholder="Country" name="country_left">
                                    </div>
                                </div>

                                <div class="col-6 pl-5">
                                    <div class="form-group">
                                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Country
                                            (right)</label>
                                        <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                               type="text"
                                               value="@if(!empty($latest_match->country_right)){{$latest_match->country_right}}@endif"
                                               placeholder="Country" name="country_right">
                                    </div>
                                </div>


                                <div class="col-6 pl-5">
                                    <div class="form-group">
                                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Is
                                            winner? (left)</label>
                                        <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                               type="checkbox" value="1" placeholder="winner"
                                               name="winner_left" @if(!empty($latest_match->winner_left) && $latest_match->winner_left == 1){{'checked=checked'}}@endif>
                                    </div>
                                </div>

                                <div class="col-6 pl-5">
                                    <div class="form-group">
                                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Is
                                            winner? (right)</label>
                                        <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                               type="checkbox" value="1" placeholder="winner"
                                               name="winner_right" @if(!empty($latest_match->winner_right) && $latest_match->winner_right == 1){{'checked=checked'}}@endif>
                                    </div>
                                </div>

                                <div class="col-6 pl-5">
                                    <div class="form-group">
                                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Photo
                                            (left 80x80)</label>
                                        <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                               type="file" value="" placeholder="" name="avatar_left">
                                    </div>
                                </div>

                                <div class="col-6 pl-5">
                                    <div class="form-group">
                                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Photo
                                            (right 80x80)</label>
                                        <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                               type="file" value="" placeholder="" name="avatar_right">
                                    </div>
                                </div>
                                <div class="col-12 pl-5">
                                    <div class="form-group">
                                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Scores</label>
                                        <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                               type="text"
                                               value="@if(!empty($latest_match->scores)){{$latest_match->scores}}@endif"
                                               placeholder="6-2|6-7|7/7-6/4" name="scores">
                                        <small>Example: (6-2|6-7|7/7-6/4): символы "|", "-", "/" делители, "/" вставлять
                                            если требуется степень (7/7-6/4) = (7<sup>7</sup>-6<sup>4</sup>)
                                        </small>
                                    </div>
                                </div>
                            @endif
                            @if($player->sport_type == 1)
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="more_wrapper_titles_finals more-div">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Titles/finals</label>
                                            @foreach(\App\Models\Scouting\TitlesFinals::where('player_tennis_id', $player->id)->get() as $titles)
                                                <div class="input-group input-group-lg mb-2">
                                                    <input class="form-control font-weight-bold text-blue-darker"
                                                           type="text" value="{{$titles->date}}"
                                                           name="titles_finals_date[]" id="titles_finals_date"
                                                           placeholder="Date">
                                                    <input class="form-control font-weight-bold text-blue-darker"
                                                           type="text" value="{{$titles->tournament}}"
                                                           name="titles_finals_tournament[]" placeholder="Tournament">
                                                    <input class="form-control font-weight-bold text-blue-darker"
                                                           type="text" value="{{$titles->location}}"
                                                           name="titles_finals_location[]" placeholder="Location">
                                                    <input class="form-control font-weight-bold text-blue-darker"
                                                           type="text" value="{{$titles->result}}"
                                                           name="titles_finals_result[]" placeholder="Result">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-white btn-icon btn-lg rounded-0 delete-more-btn">
										<span class="icon icon-close-red icon-md">
											<svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>
										</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="input-group input-group-lg mb-2">
                                                <input class="form-control font-weight-bold text-blue-darker"
                                                       type="text" value="" name="titles_finals_date[]"
                                                       id="titles_finals_date" placeholder="Date">
                                                <input class="form-control font-weight-bold text-blue-darker"
                                                       type="text" value="" name="titles_finals_tournament[]"
                                                       placeholder="Tournament">
                                                <input class="form-control font-weight-bold text-blue-darker"
                                                       type="text" value="" name="titles_finals_location[]"
                                                       placeholder="Location">
                                                <input class="form-control font-weight-bold text-blue-darker"
                                                       type="text" value="" name="titles_finals_result[]"
                                                       placeholder="Result">
                                                <div class="input-group-append">
                                                    <button class="btn btn-white btn-icon btn-lg rounded-0 delete-more-btn">
										<span class="icon icon-close-red icon-md">
											<svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>
										</span>
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                        <button class="btn btn-outline-primary text-uppercase font-weight-bold add-more-btn">
                                            + add titles/finals
                                        </button>

                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="more_wrapper_last_games more-div">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">LAST
                                                10 GAMES</label>
                                            @foreach(\App\Models\Scouting\LastGames::where('player_tennis_id', $player->id)->get() as $games)
                                                <div class="input-group input-group-lg mb-2">
                                                    <input class="form-control font-weight-bold text-blue-darker"
                                                           type="text" value="{{$games->date}}" name="last_games_date[]"
                                                           id="last_games_date" placeholder="Date">
                                                    <input class="form-control font-weight-bold text-blue-darker"
                                                           type="text" value="{{$games->opponent}}"
                                                           name="last_games_opponent[]" placeholder="Opponent">
                                                    <input class="form-control font-weight-bold text-blue-darker"
                                                           type="text" value="{{$games->result}}"
                                                           name="last_games_result[]" placeholder="Result">
                                                    <input class="form-control font-weight-bold text-blue-darker"
                                                           type="text" value="{{$games->tournament}}"
                                                           name="last_games_tournament[]" placeholder="Tournament">
                                                    <input class="form-control font-weight-bold text-blue-darker"
                                                           type="text" value="{{$games->surface}}"
                                                           name="last_games_surface[]" placeholder="Surface">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-white btn-icon btn-lg rounded-0 delete-more-btn">
										<span class="icon icon-close-red icon-md">
											<svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>
										</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="input-group input-group-lg mb-2">
                                                <input class="form-control font-weight-bold text-blue-darker"
                                                       type="text" value="" name="last_games_date[]"
                                                       id="last_games_date" placeholder="Date">
                                                <input class="form-control font-weight-bold text-blue-darker"
                                                       type="text" value="" name="last_games_opponent[]"
                                                       placeholder="Opponent">
                                                <input class="form-control font-weight-bold text-blue-darker"
                                                       type="text" value="" name="last_games_result[]"
                                                       placeholder="Result">
                                                <input class="form-control font-weight-bold text-blue-darker"
                                                       type="text" value="" name="last_games_tournament[]"
                                                       placeholder="Tournament">
                                                <input class="form-control font-weight-bold text-blue-darker"
                                                       type="text" value="" name="last_games_surface[]"
                                                       placeholder="Surface">
                                                <div class="input-group-append">
                                                    <button class="btn btn-white btn-icon btn-lg rounded-0 delete-more-btn">
										<span class="icon icon-close-red icon-md">
											<svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>
										</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <button class="btn btn-outline-primary text-uppercase font-weight-bold add-more-btn">
                                            + add game
                                        </button>

                                    </div>
                                </div>
                        </div>
                    @endif
                    <div class="row pt-4 mt-1 tabb">
                        @if($player->sport_type == 1 || $player->sport_type == 2)
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="more_wrapper_media_articles_links more-div">
                                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Links
                                            to media
                                            articles</label>
                                        @if(!empty($player->mediaArticlesLinks) && count($player->mediaArticlesLinks) > 0)
                                            @foreach($player->mediaArticlesLinks as $mal)
                                                <div class="input-group input-group-lg mb-2">
                                                    <input class="form-control font-weight-bold text-blue-darker "
                                                           type="url" value="{{$mal->info}}" id=""
                                                           name="media_articles_links[]" placeholder="Add media article"
                                                           @if (!empty($player->id) && $player->status <> 1) disabled @endif>

                                                    <div class="input-group-append">
                                                    <span class="btn btn-white btn-icon btn-lg rounded-0 delete-more-btn">
                                                    <span class="icon icon-close-red icon-md">
                                                        <svg viewBox="0 0 1 1"><use
                                                                    xlink:href="/images/icons.svg#close-red"></use></svg>
                                                    </span>
                                                    </span>
                                                    </div>

                                                </div>
                                            @endforeach
                                        @endif

                                        <div class="input-group input-group-lg mb-2">
                                            <input class="form-control font-weight-bold text-blue-darker " type="url"
                                                   value="" id="" name="media_articles_links[]"
                                                   placeholder="Add media article">
                                            <div class="input-group-append">
                                            <span class="btn btn-white btn-icon btn-lg rounded-0 delete-more-btn">
                                            <span class="icon icon-close-red icon-md">
                                                <svg viewBox="0 0 1 1"><use
                                                            xlink:href="/images/icons.svg#close-red"></use></svg>
                                            </span>
                                            </span>
                                            </div>
                                        </div>

                                    </div>

                                    <span class="btn btn-outline-primary text-uppercase font-weight-bold add-more-btn">+ add more
                                    articles
                                </span>

                                </div>
                            </div>
                        @endif
                        @if($player->sport_type == 1 || $player->sport_type == 3)
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="more_wrapper_video_links more-div">
                                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Links
                                            to training video
                                        </label>
                                        <div class="text-blue-gray-light mb-2">Please upload your training video in
                                            accordance with the tutorial
                                            <div class="download-item text-uppercase d-flex flex-nowrap align-items-center position-relative">
                                                <i class="icon icon-sprite icon-download-white bg-primary mr-2 download-item-icon"></i>
                                                <a class="download-item-link fill-area-link"
                                                   href="/upload/files/Tutorial_for_video_shooting.pdf" rel="noreferer, ,noopener" target="_blank"
                                                   style="text-transform: capitalize;">Tutorial for video shooting</a>
                                            </div>
                                        </div>
                                        @if(!empty($player->videoLinks) && count($player->videoLinks) > 0)
                                            @foreach($player->videoLinks as $vl)
                                                <div class="input-group input-group-lg mb-2">
                                                    <input class="form-control font-weight-bold text-blue-darker "
                                                           type="url" value="{{$vl->info}}" id="" name="video_links[]"
                                                           placeholder="Add link to video: https://www.youtube.com/watch?v=1u6jLsif42g23">

                                                    <div class="input-group-append">
                                                        <button class="btn btn-white btn-icon btn-lg rounded-0 delete-more-btn">
                                            <span class="icon icon-close-red icon-md">
                                                <svg viewBox="0 0 1 1"><use
                                                            xlink:href="/images/icons.svg#close-red"></use></svg>
                                            </span>
                                                        </button>
                                                    </div>

                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <button class="btn btn-outline-primary text-uppercase font-weight-bold add-more-btn">
                                        + add more
                                        videos
                                    </button>
                                </div>
                            </div>
                        @endif
                        @if($player->sport_type == 3)

                                <div class="col-12 pl-5">
                                    <h4 class="text-blue-darker text-uppercase mb-3">BIO</h4>
                                </div>
                                <div class="col-12 pl-5">
                                    <h5 class="text-uppercase text-blue-gray-light font-weight-bold">Biography</h5>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Age
                                            started football</label>
                                        <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                               maxlength="191" type="number"
                                               value="@if(!empty($player->age_started_tennis)){{$player->age_started_tennis}}@endif"
                                               name="age_started_tennis">
                                    </div>
                                </div>
                                <div class="col-12 pl-5">
                                    <h5 class="text-uppercase text-blue-gray-light font-weight-bold">Additional info</h5>
                                </div>
                                <div class="col-6 pr-5">
                                    <div class="form-group">
                                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Clothing
                                            brand</label>
                                        <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                               type="text" name="clothing_brand"
                                               value="@if(!empty($player->clothing_brand)){{$player->clothing_brand}}@endif">
                                    </div>
                                </div>
                                <div class="col-6 pl-5">
                                    <div class="form-group">
                                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Shoe
                                            brand</label>
                                        <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                               type="text" name="shoe_brand"
                                               value="@if(!empty($player->shoe_brand)){{$player->shoe_brand}}@endif">
                                    </div>
                                </div>
                                @endif
                                @if($player->sport_type == 2)

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Age
                                                started poker</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   maxlength="191" type="number"
                                                   value="@if(!empty($player->age_started_tennis)){{$player->age_started_tennis}}@endif"
                                                   name="age_started_tennis">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <h4 class="text-blue-darker text-uppercase mb-3">Sharkscope</h4>
                                        <div class="form-group">
                                            <div class="more_wrapper_screen_names more-div">
                                                @php
                                                    $c = 1;
                                                @endphp
                                                @if(!empty($player->screenNames) && count($player->screenNames) > 0)
                                                    <script>
                                                        graph_count_items = '{{count($player->screenNames)+1}}';
                                                    </script>


                                                    @foreach($player->screenNames as $screenName)
                                                        <div class="event-item border-secondary mb-2">
                                                            <div class="mb-1 d-flex align-items-center justify-content-between">
                                                                <h5 class="text-blue-darker text-uppercase mb-0">
                                                                    Sharkscope Item {{$c}}</h5>

                                                                <button class="btn btn-white btn-icon delete-more-btn"
                                                                        onclick="delSharscope({{$screenName->id}})">
						        <span class="icon icon-close-red icon-md">
									<svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>
						        </span>
                                                                </button>

                                                            </div>
                                                            <div class="row gutters-small">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                               for="">SCREEN NAMES ON ALL ONLINE POKER
                                                                            SITES (NEEDED TO BE UNBLOCKED ON
                                                                            SHARKSCOPE)</label>
                                                                        <input class="form-control font-weight-bold text-blue-darker"
                                                                               type="text" value="{{$screenName->text}}"
                                                                               id=""
                                                                               placeholder="Poker site/Screen name"
                                                                               name="screen_names[{{$c}}][screen_name]">
                                                                    </div>
                                                                </div>

                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                               for="">Sharkscope profile (link)</label>
                                                                        <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                                               value="{{$screenName->link}}"
                                                                               name="screen_names[{{$c}}][poker_sharkscope_link]"
                                                                               type="url" placeholder="http(s)://">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                               for="">SORT</label>
                                                                        <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                                               value="@if(!empty($screenName->id)){{$screenName->id}}@endif"
                                                                               name="screen_names[{{$c}}][id]"
                                                                               type="hidden" placeholder="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="text-uppercase text-blue-gray-light font-weight-bold mb-2">
                                                                        Upload Sharkscope profit graph
                                                                    </div>
                                                                    <div class="img-thumb-container"
                                                                         id="graph-container">
                                <span id="graphs_{{$c}}">
                                    @if(!empty($screenName->graph) && $screenName->graph != '')


                                        <div class="img-thumb-wrapper" id="graph-preview-id-0">
                                        <img class="img-thumb-img" src="/{{$screenName->graph}}" alt=""
                                             style="max-width: 130px">

                                    </div>
                                    @endif
                                </span>
                                                                        <div id="upl_graph"
                                                                             class="upload-drop-zone-wrapper">

                                                                            <label class="upload-drop-zone upload-drop-zone-medium d-flex flex-column align-items-center justify-content-center"
                                                                                   for="upload-graph-{{$c}}">
                                                                                <i class="icon icon-sprite icon-photo-upload upload-drop-zone-icon"></i>
                                                                            </label>

                                                                            <input onchange="readGraphURL(this, '{{$c}}');"
                                                                                   type="file" id="upload-graph-{{$c}}"
                                                                                   hidden
                                                                                   name="screen_names[{{$c}}][graphs]"
                                                                                   accept="image/*" capture>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @php
                                                            $c++;
                                                        @endphp
                                                    @endforeach

                                                @endif


                                                <div class="event-item border-secondary mb-2">
                                                    <div class="mb-1 d-flex align-items-center justify-content-between">
                                                        <h5 class="text-blue-darker text-uppercase mb-0">Sharkscope
                                                            Item {{$c}}</h5>
                                                        <button class="btn btn-white btn-icon delete-more-btn">
						        <span class="icon icon-close-red icon-md">
									<svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>
						        </span>
                                                        </button>

                                                    </div>
                                                    <div class="row gutters-small">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                       for="">SCREEN NAMES ON ALL ONLINE POKER SITES
                                                                    (NEEDED TO BE UNBLOCKED ON SHARKSCOPE)</label>
                                                                <input class="form-control font-weight-bold text-blue-darker"
                                                                       type="text" value="" id=""
                                                                       placeholder="Poker site/Screen name"
                                                                       name="screen_names[{{$c}}][screen_name]">
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                       for="">Sharkscope profile (link)</label>
                                                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                                       name="screen_names[{{$c}}][poker_sharkscope_link]"
                                                                       type="url" placeholder="http(s)://">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="text-uppercase text-blue-gray-light font-weight-bold mb-2">
                                                                Upload Sharkscope profit graph
                                                            </div>
                                                            <div class="img-thumb-container" id="graph-container">
                                <span id="graphs_{{$c}}">
                                    @if(!empty($player->poker_graph) && $player->poker_graph != '')
                                        <script>
                                        var current_graphs = 0;
                                    </script>

                                        <div class="img-thumb-wrapper" id="graph-preview-id-0">
                                        <img class="img-thumb-img" src="" alt="" style="max-width: 130px">


                                    </div>

                                    @else
                                        <script>
                                        var current_graphs = 0;
                                    </script>
                                    @endif
                                </span>
                                                                <div id="upl_graph" class="upload-drop-zone-wrapper">

                                                                    <label class="upload-drop-zone upload-drop-zone-medium d-flex flex-column align-items-center justify-content-center"
                                                                           for="upload-graph-{{$c}}">
                                                                        <i class="icon icon-sprite icon-photo-upload upload-drop-zone-icon"></i>
                                                                    </label>

                                                                    <input onchange="readGraphURL(this, '{{$c}}');"
                                                                           type="file" id="upload-graph-{{$c}}" hidden
                                                                           name="screen_names[{{$c}}][graphs]"
                                                                           accept="image/*" capture>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>

                                            <div style="clear: both;"></div>

                                            <button class="btn btn-outline-primary text-uppercase font-weight-bold add-more-btn">
                                                + add more
                                            </button>

                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="more_wrapper_languages_speak more-div">
                                                <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                       for="">WHAT LANGUAGES CAN YOU SPEAK?</label>
                                                @if(!empty($player->pokerLanguages) && count($player->pokerLanguages) > 0)
                                                    @foreach($player->pokerLanguages as $mal)
                                                        <div class="input-group input-group-lg mb-2">
                                                            <input class="form-control font-weight-bold text-blue-darker"
                                                                   type="text" value="{{$mal->text}}" id=""
                                                                   placeholder="English" name="languages_speak[]">

                                                            <div class="input-group-append">
                                                                <button class="btn btn-white btn-icon btn-lg rounded-0 delete-more-btn">
                                <span class="icon icon-close-red icon-md">
                                    <svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>
                                </span>
                                                                </button>
                                                            </div>

                                                        </div>
                                                    @endforeach
                                                @endif
                                                <div class="input-group input-group-lg mb-2">
                                                    <input class="form-control font-weight-bold text-blue-darker"
                                                           type="text" value="" id="" placeholder="English"
                                                           name="languages_speak[]">

                                                    <div class="input-group-append">
                                                        <button class="btn btn-white btn-icon btn-lg rounded-0 delete-more-btn">
                                <span class="icon icon-close-red icon-md">
                                    <svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>
                                </span>
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>
                                            <button class="btn btn-outline-primary text-uppercase font-weight-bold add-more-btn">
                                                + add more
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            @if($player->sport_type == 2)
                                <div class="row pt-4 mt-1 tabb">
                                    <div class="col-6 pr-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">All
                                                Time</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="number" name="" value="All Time" disabled>
                                        </div>
                                    </div>
                                    <div class="col-6 pr-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Year</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="number" name="poker_overall_year"
                                                   value="@if(!empty($player->poker_overall_year)){{$player->poker_tournaments_played}}@else{{'2019'}}@endif">
                                        </div>
                                    </div>


                                    <div class="col-6 pr-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Number
                                                of tournaments played</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   value="@if(!empty($player->poker_tournaments_played)){{$player->poker_tournaments_played}}@endif"
                                                   type="number" name="poker_tournaments_played">
                                        </div>
                                    </div>
                                    <div class="col-6 pr-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Number
                                                of tournaments played (year)</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   value="@if(!empty($player->poker_tournaments_played_year)){{$player->poker_tournaments_played_year}}@endif"
                                                   type="number" name="poker_tournaments_played_year">
                                        </div>
                                    </div>

                                    <div class="col-6 pl-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Average
                                                ROI (%)</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   value="@if(!empty($player->poker_average_roi)){{$player->poker_average_roi}}@endif"
                                                   type="number" name="poker_average_roi">
                                        </div>
                                    </div>

                                    <div class="col-6 pl-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Average
                                                ROI (%) (year)</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   value="@if(!empty($player->poker_average_roi_year)){{$player->poker_average_roi_year}}@endif"
                                                   type="number" name="poker_average_roi_year">
                                        </div>
                                    </div>

                                    <div class="col-6 pr-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Average
                                                profit ($)</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   value="@if(!empty($player->poker_average_profit)){{$player->poker_average_profit}}@endif"
                                                   type="number" name="poker_average_profit">
                                        </div>
                                    </div>

                                    <div class="col-6 pr-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Average
                                                profit ($) (year)</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   value="@if(!empty($player->poker_average_profit_year)){{$player->poker_average_profit_year}}@endif"
                                                   type="number" name="poker_average_profit_year">
                                        </div>
                                    </div>

                                    <div class="col-6 pl-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Average
                                                stake ($)</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   value="@if(!empty($player->poker_average_stake)){{$player->poker_average_stake}}@endif"
                                                   type="number" name="poker_average_stake">
                                        </div>
                                    </div>
                                    <div class="col-6 pl-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Average
                                                stake ($) (year)</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   value="@if(!empty($player->poker_average_stake_year)){{$player->poker_average_stake_year}}@endif"
                                                   type="number" name="poker_average_stake_year">
                                        </div>
                                    </div>


                                    <div class="col-6 pr-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Profit
                                                ($)</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   value="@if(!empty($player->poker_profit)){{$player->poker_profit}}@endif"
                                                   type="number" name="poker_profit">
                                        </div>
                                    </div>

                                    <div class="col-6 pr-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Profit
                                                ($) (year)</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   value="@if(!empty($player->poker_profit_year)){{$player->poker_profit_year}}@endif"
                                                   type="number" name="poker_profit_year">
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <h4 class="text-blue-darker text-uppercase mt-5 mb-3">Major wins</h4>
                                        <div class="event-items pb-2">
                                            <div class="more_wrapper_events more-div">
                                                @foreach($player->pokerEvents as $ev)
                                                    <div class="event-item border-bottom border-secondary mb-2">
                                                        <div class="mb-1 d-flex align-items-center justify-content-between">
                                                            <h5 class="text-blue-darker text-uppercase mb-0">Event
                                                                Item</h5>

                                                            <button class="btn btn-white btn-icon delete-more-btn">
						        <span class="icon icon-close-red icon-md">
									<svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>
						        </span>
                                                            </button>

                                                        </div>
                                                        <div class="row gutters-small">
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                           for="">Network</label>
                                                                    <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                                           type="text"
                                                                           value="@if(!empty($ev->network)){{$ev->network}}@endif"
                                                                           name="events[network][]">
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                           for="">Date</label>
                                                                    <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                                           type="text"
                                                                           value="@if(!empty($ev->date)){{date('d.m.Y',strtotime($ev->date))}}@endif"
                                                                           name="events[date][]">
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                           for="">Type</label>
                                                                    <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                                           id=""
                                                                           value="@if(!empty($ev->type)){{$ev->type}}@endif"
                                                                           name="events[type][]" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                           for="">Stake</label>
                                                                    <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                                           type="text"
                                                                           value="@if(!empty($ev->stake)){{$ev->stake}}@endif"
                                                                           name="events[stake][]">
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                           for="">Position</label>
                                                                    <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                                           type="text"
                                                                           value="@if(!empty($ev->position)){{$ev->position}}@endif"
                                                                           name="events[position][]">
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                           for="">Profit ($)</label>
                                                                    <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                                           type="number"
                                                                           value="@if(!empty($ev->profit)){{$ev->profit}}@endif"
                                                                           name="events[profit][]">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                                <div class="event-item border-bottom border-secondary mb-2">
                                                    <div class="mb-1 d-flex align-items-center justify-content-between">
                                                        <h5 class="text-blue-darker text-uppercase mb-0">Event Item</h5>

                                                        <button class="btn btn-white btn-icon delete-more-btn">
						        <span class="icon icon-close-red icon-md">
									<svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>
						        </span>
                                                        </button>

                                                    </div>
                                                    <div class="row gutters-small">
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                       for="">Network</label>
                                                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                                       type="text" value="" name="events[network][]">
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                       for="">Date</label>
                                                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                                       type="text" value="" name="events[date][]">
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                       for="">Type</label>
                                                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                                       id="" value="" name="events[type][]" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                       for="">Stake</label>
                                                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                                       type="text" value="" name="events[stake][]">
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                       for="">Position</label>
                                                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                                       type="text" value="" name="events[position][]">
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                       for="">Profit ($)</label>
                                                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                                       type="number" value="" name="events[profit][]">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <button class="btn btn-outline-primary text-uppercase font-weight-bold add-more-btn">
                                                + add more
                                            </button>
                                        </div>
                                        <div class="mb-3">

                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($player->sport_type == 2)
                                <div class="row pt-4 mt-1 tabb">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Playing,
                                                coaching, and staking history</label>
                                            <textarea
                                                    class="form-control form-control-lg font-weight-bold text-blue-darker js-autosize"
                                                    name="poker_playing_history" id="" cols="30" rows="5"
                                                    placeholder="Add info">@if(!empty($player->poker_playing_history)){{$player->poker_playing_history}}@endif</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Is
                                                poker your sole income (yes/no)? Describe your financial standing,
                                                profession, job.</label>
                                            <textarea
                                                    class="form-control form-control-lg font-weight-bold text-blue-darker js-autosize"
                                                    name="poker_player_financical" id="" cols="30" rows="5"
                                                    placeholder="Add info">@if(!empty($player->poker_player_financical)){{$player->poker_player_financical}}@endif</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Why
                                                are you seeking a stake?</label>
                                            <textarea
                                                    class="form-control form-control-lg font-weight-bold text-blue-darker js-autosize"
                                                    name="poker_stake" id="" cols="30" rows="5"
                                                    placeholder="Add info">@if(!empty($player->poker_stake)){{$player->poker_stake}}@endif</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Are
                                                you currently under a staking contract? If yes, who is backer and what
                                                is the contract term?</label>
                                            <textarea
                                                    class="form-control form-control-lg font-weight-bold text-blue-darker js-autosize"
                                                    name="poker_contract" id="" cols="30" rows="5"
                                                    placeholder="Add info">@if(!empty($player->poker_contract)){{$player->poker_contract}}@endif</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="text-uppercase text-blue-gray-light font-weight-bold mb-2">
                                                Upload positive references from the poker community
                                            </div>
                                            <div class="img-thumb-container" id="references-container">
                                <span id="references">
                                    @if(!empty($player->pokerReferences) && count($player->pokerReferences) > 0)
                                        <script>
                                            var current_references = @if(count($player->pokerReferences) > 0) {{count($player->pokerReferences)}} @else 0 @endif;
                                        </script>
                                        @foreach($player->pokerReferences as $image)
                                            <div class="img-thumb-wrapper" id="references-preview-id-{{$image->id}}">
                                            <img class="img-thumb-img" src="/{{$image->image}}" alt=""
                                                 style="max-width: 130px">

                                                    <span class="icon icon-close-red img-thumb-action"
                                                          onclick="delReferencesPhoto({{$image->id}})">
                                                    <svg viewBox="0 0 1 1"><use
                                                                xlink:href="/images/icons.svg#close-red"></use></svg>
                                                </span>

                                        </div>
                                        @endforeach
                                    @else
                                        <script>
                                            var current_references = 0;
                                        </script>
                                    @endif
                                </span>
                                                <div id="upl_references" class="upload-drop-zone-wrapper">
                                                    <label class="upload-drop-zone upload-drop-zone-medium d-flex flex-column align-items-center justify-content-center"
                                                           for="upload-references">
                                                        <i class="icon icon-sprite icon-photo-upload upload-drop-zone-icon"></i>
                                                    </label>
                                                    <input onchange="readReferencesURL(this);" type="file"
                                                           id="upload-references" hidden name="references[]"
                                                           accept="image/*" capture>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">With
                                                what staking limit would you like to start?</label>
                                            <textarea
                                                    class="form-control form-control-lg font-weight-bold text-blue-darker js-autosize"
                                                    name="poker_limit_staking" id="" cols="30" rows="5"
                                                    placeholder="Add info">@if(!empty($player->poker_limit_staking)){{$player->poker_limit_staking}}@endif</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Do
                                                you have an offline poker experience? In what tournaments did you
                                                participate?</label>
                                            <textarea
                                                    class="form-control form-control-lg font-weight-bold text-blue-darker js-autosize"
                                                    name="poker_offline_exp" id="" cols="30" rows="5"
                                                    placeholder="Add info">@if(!empty($player->poker_offline_exp)){{$player->poker_offline_exp}}@endif</textarea>
                                        </div>
                                    </div>
                                </div>
                        @endif
                        @if($player->sport_type == 1)
                            <!-- Step 4 -->
                                <div class="row pt-4 mt-1 tabb">
                                    <div class="col-6 pr-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Forehand</label>
                                            <div class="btn-group btn-group-lg btn-group-toggle d-flex w-100 rounded-0"
                                                 data-toggle="buttons">
                                                <label class="btn btn-form w-100 rounded-0 font-weight-bold @if(!empty($player->forehand) && $player->forehand == 1){{'active'}}@endif">
                                                    <input type="radio" name="forehand" id="option1" autocomplete="off"
                                                           value="1"
                                                           @if(!empty($player->forehand) && $player->forehand == 1)checked="checked"@endif >
                                                    Right handed
                                                </label>
                                                <label class="btn btn-form w-100 rounded-0 font-weight-bold @if(!empty($player->forehand) && $player->forehand == 2){{'active'}}@endif">
                                                    <input type="radio" name="forehand" id="option2" autocomplete="off"
                                                           value="2"
                                                           @if(!empty($player->forehand) && $player->forehand == 2)checked="checked"@endif >
                                                    Left handed
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 pl-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Backhand</label>
                                            <div class="btn-group btn-group-lg btn-group-toggle d-flex w-100 rounded-0"
                                                 data-toggle="buttons">
                                                <label class="btn btn-form w-100 rounded-0 font-weight-bold @if(!empty($player->backhand) && $player->backhand == 1){{'active'}}@endif">
                                                    <input type="radio" name="backhand" id="option1" autocomplete="off"
                                                           value="1"
                                                           @if(!empty($player->backhand) && $player->backhand == 1)checked="checked"@endif >
                                                    One-handed
                                                </label>
                                                <label class="btn btn-form w-100 rounded-0 font-weight-bold @if(!empty($player->backhand) && $player->backhand == 2){{'active'}}@endif">
                                                    <input type="radio" name="backhand" id="option2" autocomplete="off"
                                                           value="2"
                                                           @if(!empty($player->backhand) && $player->backhand == 2)checked="checked"@endif >
                                                    Double-handed
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 pr-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Age
                                                started tennis</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   name="age_started_tennis" id="" type="number"
                                                   value="@if(!empty($player->age_started_tennis)){{$player->age_started_tennis}}@endif"
                                                   min="1" max="110" maxlength="3">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="col-6 pl-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Favorite
                                                surface</label>
                                            <div class="row py-2">
                                                <div class="col-auto">
                                                    <div class="custom-control custom-checkbox h5 text-blue-darker">
                                                        <input name="fs_hard" type="checkbox"
                                                               class="custom-control-input" id="hard"
                                                               @if(!empty($player->fs_hard) && $player->fs_hard == 1)checked="checked"@endif >
                                                        <label class="custom-control-label" for="hard">
                                                            Hard
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="custom-control custom-checkbox h5 text-blue-darker">
                                                        <input name="fs_glass" type="checkbox"
                                                               class="custom-control-input" id="glass"
                                                               @if(!empty($player->fs_glass) && $player->fs_glass == 1)checked="checked"@endif >
                                                        <label class="custom-control-label" for="glass">
                                                            Grass
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="custom-control custom-checkbox h5 text-blue-darker">
                                                        <input name="fs_clay" type="checkbox"
                                                               class="custom-control-input" id="clay"
                                                               @if(!empty($player->fs_clay) && $player->fs_clay == 1)checked="checked"@endif >
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
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Training
                                                Academy</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text" name="training_academy"
                                                   value="@if(!empty($player->training_academy)){{$player->training_academy}}@endif">
                                        </div>
                                    </div>
                                    <div class="col-6 pl-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Coach</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text" name="coach"
                                                   value="@if(!empty($player->coach)){{$player->coach}}@endif">
                                        </div>
                                    </div>
                                    <div class="col-6 pr-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Former
                                                coach(es)</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text" name="former_coach"
                                                   value="@if(!empty($player->former_coach)){{$player->former_coach}}@endif">
                                        </div>
                                    </div>
                                    <div class="col-6 pl-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Agent
                                                (if any)</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text" name="agent"
                                                   value="@if(!empty($player->agent)){{$player->agent}}@endif">
                                        </div>
                                    </div>
                                    <div class="col-6 pr-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Who
                                                covers tennis expenses as of now?</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text" name="who_covers_now"
                                                   value="@if(!empty($player->who_covers_now)){{$player->who_covers_now}}@endif">
                                        </div>
                                    </div>
                                    <div class="col-6 pl-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Injuries
                                                within last 24 months</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text" name="injuries_24m"
                                                   value="@if(!empty($player->injuries_24m)){{$player->injuries_24m}}@endif">
                                        </div>
                                    </div>
                                    <div class="col-6 pr-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Racquet
                                                brand</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text" name="racquet_brand"
                                                   value="@if(!empty($player->racquet_brand)){{$player->racquet_brand}}@endif">
                                        </div>
                                    </div>
                                    <div class="col-6 pl-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">String
                                                brand</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text" name="string_brand"
                                                   value="@if(!empty($player->string_brand)){{$player->string_brand}}@endif">
                                        </div>
                                    </div>
                                    <div class="col-6 pr-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Clothing
                                                brand</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text" name="clothing_brand"
                                                   value="@if(!empty($player->clothing_brand)){{$player->clothing_brand}}@endif">
                                        </div>
                                    </div>
                                    <div class="col-6 pl-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Shoe
                                                brand</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text" name="shoe_brand"
                                                   value="@if(!empty($player->shoe_brand)){{$player->shoe_brand}}@endif">
                                        </div>
                                    </div>
                                </div>
                        @endif
                        @if($player->sport_type == 1)
                            <!-- Step 5 -->
                                <div class="row pt-4 mt-1 tabb">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">What
                                                are the player’s goals for the next season (if known)?</label>
                                            <textarea
                                                    class="form-control form-control-lg font-weight-bold text-blue-darker js-autosize"
                                                    name="goals_for_next_season" cols="30" rows="5" maxlength="500"
                                                    style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 161px;">@if(!empty($player->goals_for_next_season)){{$player->goals_for_next_season}}@endif</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">How
                                                the financial support from TokenStars will be used (if known)?</label>
                                            <textarea
                                                    class="form-control form-control-lg font-weight-bold text-blue-darker js-autosize"
                                                    name="financial_support_used" cols="30" rows="5" maxlength="500"
                                                    style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 161px;">@if(!empty($player->financial_support_used)){{$player->financial_support_used}}@endif</textarea>
                                        </div>
                                    </div>
                                </div>
                        @endif
                        <!-- Step 6 -->
                            <div class="row pt-4 mt-1 tabb">
                                <div class="col-6 pl-5">
                                    <div class="form-group">
                                        <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                               for="">Hobby</label>
                                        <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                               type="text" name="hobby"
                                               value="@if(!empty($player->hobby)){{$player->hobby}}@endif">
                                    </div>
                                </div>
                                <div class="col-6 pl-5">
                                    <div class="form-group">
                                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Favorite
                                            Player</label>
                                        <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                               type="text" name="favorite_player"
                                               value="@if(!empty($player->favorite_player)){{$player->favorite_player}}@endif">
                                    </div>
                                </div>
                                @if($player->sport_type == 2)
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Preferred
                                                online poker room</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   name="poker_preferred_room" type="text"
                                                   value="@if(!empty($player->poker_preferred_room)){{$player->poker_preferred_room}}@endif">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Favorite
                                                WSOP event</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   name="poker_favorite_wsop" type="text"
                                                   value="@if(!empty($player->poker_favorite_wsop)){{$player->poker_favorite_wsop}}@endif">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Favorite
                                                WCOOP event</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   name="poker_favorite_wcoop" type="text"
                                                   value="@if(!empty($player->poker_favorite_wcoop)){{$player->poker_favorite_wcoop}}@endif">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">What
                                                are the player’s goals for the next year?</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   name="poker_wat_next_year" type="text"
                                                   value="@if(!empty($player->poker_wat_next_year)){{$player->poker_wat_next_year}}@endif">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Twitch</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="url"
                                                   value="@if(!empty($player->poker_twitch)){{$player->poker_twitch}}@endif"
                                                   name="poker_twitch">
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <!-- Step 7 -->
                            <div class="row pt-4 mt-1 tabb">
                                @if($player->sport_type == 1)
                                    <div class="col-6 pr-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Representative
                                                of the player</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text" name="contact_person" placeholder="Name, Surname"
                                                   value="@if(!empty($player->contact_person)){{$player->contact_person}}@endif">
                                        </div>
                                    </div>

                                    <div class="col-6 pl-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Relation</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text" name="relation" placeholder="Father, Mother, etc."
                                                   value="@if(!empty($player->relation)){{$player->relation}}@endif">
                                        </div>
                                    </div>
                                @endif
                                @if($player->sport_type == 2)
                                    <div class="col-6 pr-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Contact
                                                person</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text"
                                                   value="@if(!empty($player->poker_contact)){{$player->poker_contact}}@endif"
                                                   name="poker_contact">
                                        </div>
                                    </div>
                                @endif
                                <div class="col-6 pr-5">
                                    <div class="form-group">
                                        <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                               for="">Email</label>
                                        <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                               type="email" name="email"
                                               value="@if(!empty($player->email)){{$player->email}}@endif">
                                    </div>
                                </div>
                                <div class="col-6 pl-5">
                                    <div class="form-group">
                                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Phone
                                            number</label>
                                        <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                               type="text" name="phone"
                                               value="@if(!empty($player->phone)){{$player->phone}}@endif">
                                    </div>
                                </div>
                                <div class="col-6 pr-5">
                                    <div class="form-group">
                                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Filled
                                            out by </label>
                                        <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                               type="text" name="filled_out_by"
                                               value="@if(!empty($player->filled_out_by)){{$player->filled_out_by}}@endif">
                                    </div>
                                </div>
                            </div>
                            <div class="row tabb">
                                <div class="col-6 pr-5">
                                    <div class="form-group">
                                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Status</label>
                                        <select class="custom-select custom-select-lg font-weight-bold text-blue-darker"
                                                id="status-id" name="status">
                                            <option value="">---</option>
                                            @foreach($statuses as $k=>$status)
                                                <option value="{{$k}}" @if(!empty($player->status) && $player->status == $k){{'selected="selected"'}}@endif>{{$status}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row tabb" id="voting-block"
                                 @if($player->status != 7)style="display: none"@endif>
                                <div class="col-6 pr-4">
                                    <div class="form-group">
                                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Date
                                            start</label>
                                        <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                               autocomplete="off" type="text" name="date_start" id="start_date"
                                               value="@if(!empty($voting->id)){{$voting->start_date}}@endif">
                                    </div>
                                </div>
                                <div class="col-6 pl-4">
                                    <div class="form-group">
                                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Date
                                            end</label>
                                        <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                               autocomplete="off" type="text" name="date_end" id="end_date"
                                               value="@if(!empty($voting->id)){{$voting->end_date}}@endif">
                                    </div>
                                </div>
                                <div class="col-12 pr-4">
                                    <div class="form-group">
                                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Description</label>

                                        <textarea maxlength="180" class="form-control" name="voting_description"
                                                  rows="4">@if(!empty($voting->id)){{$voting->description}}@endif</textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="row pt-4 mt-1 tabb">
                                @if($player->sport_type == 1 || $player->sport_type == 2)
                                    <div class="col-12 pl-5">
                                        <h4 class="text-uppercase text-blue-gray-light font-weight-bold">PLAYER SKILLS
                                            DIAGRAM</h4>
                                        <small>Min 0 Max 5 Example (Serve:3, Return: 4.5) (если поле value не заполнено,
                                            данный параметр не отобразиться)
                                        </small>
                                    </div>
                                    @php

                                        $js_diagram = null;
                                        if(!empty($diagram->data))
                                        {
                                            $js_diagram = json_decode($diagram->data);
                                        }

                                    @endphp
                                    <div class="col-4 pl-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold">Label
                                                name</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text"
                                                   value="@if(isset($js_diagram[0])){{$js_diagram[0]->label}}@else{{'Serve'}}@endif"
                                                   placeholder="Serve" name="diagram[0][label]">
                                        </div>
                                    </div>
                                    <div class="col-2 pl-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold">Value</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text"
                                                   value="@if(isset($js_diagram[0])){{$js_diagram[0]->value}}@endif"
                                                   placeholder="3" name="diagram[0][value]">
                                        </div>
                                    </div>
                                    <div class="col-6 pl-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold">Is good
                                                or bad ?</label>
                                            <div class="row py-2">
                                                <div class="col-auto">
                                                    <div class="custom-control custom-checkbox h5 text-blue-darker">
                                                        <input name="diagram[0][good]" type="checkbox"
                                                               class="custom-control-input"
                                                               id="serve_good" @if(isset($js_diagram[0]->good)){{'checked'}}@endif>
                                                        <label class="custom-control-label" for="serve_good">
                                                            Good
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="custom-control custom-checkbox h5 text-blue-darker">
                                                        <input name="diagram[0][bad]" type="checkbox"
                                                               class="custom-control-input"
                                                               id="server_bad" @if(isset($js_diagram[0]->bad)){{'checked'}}@endif>
                                                        <label class="custom-control-label" for="server_bad">
                                                            Bad
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4 pl-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold">Label
                                                name</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text"
                                                   value="@if(isset($js_diagram[1])){{$js_diagram[1]->label}}@else{{'Points play'}}@endif"
                                                   placeholder="Points play" name="diagram[1][label]">
                                        </div>
                                    </div>
                                    <div class="col-2 pl-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold">Value</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text"
                                                   value="@if(isset($js_diagram[1])){{$js_diagram[1]->value}}@endif"
                                                   placeholder="3" name="diagram[1][value]">
                                        </div>
                                    </div>

                                    <div class="col-6 pl-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold">Is good
                                                or bad ?</label>
                                            <div class="row py-2">
                                                <div class="col-auto">
                                                    <div class="custom-control custom-checkbox h5 text-blue-darker">
                                                        <input name="diagram[1][good]" type="checkbox"
                                                               class="custom-control-input"
                                                               id="serve_good1" @if(isset($js_diagram[1]->good)){{'checked'}}@endif>
                                                        <label class="custom-control-label" for="serve_good1">
                                                            Good
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="custom-control custom-checkbox h5 text-blue-darker">
                                                        <input name="diagram[1][bad]" type="checkbox"
                                                               class="custom-control-input"
                                                               id="server_bad1" @if(isset($js_diagram[1]->bad)) {{'checked'}}@endif>
                                                        <label class="custom-control-label" for="server_bad1">
                                                            Bad
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4 pl-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold">Label
                                                name</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text"
                                                   value="@if(isset($js_diagram[2])){{$js_diagram[2]->label}}@else{{'Volleys'}}@endif"
                                                   placeholder="Volleys" name="diagram[2][label]">
                                        </div>
                                    </div>
                                    <div class="col-2 pl-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold">Value</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text"
                                                   value="@if(isset($js_diagram[2])){{$js_diagram[2]->value}}@endif"
                                                   placeholder="3" name="diagram[2][value]">
                                        </div>
                                    </div>

                                    <div class="col-6 pl-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold">Is good
                                                or bad ?</label>
                                            <div class="row py-2">
                                                <div class="col-auto">
                                                    <div class="custom-control custom-checkbox h5 text-blue-darker">
                                                        <input name="diagram[2][good]" type="checkbox"
                                                               class="custom-control-input"
                                                               id="serve_good2" @if(isset($js_diagram[2]->good)){{'checked'}}@endif>
                                                        <label class="custom-control-label" for="serve_good2">
                                                            Good
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="custom-control custom-checkbox h5 text-blue-darker">
                                                        <input name="diagram[2][bad]" type="checkbox"
                                                               class="custom-control-input"
                                                               id="server_bad2" @if(isset($js_diagram[2]->bad)){{'checked'}}@endif>
                                                        <label class="custom-control-label" for="server_bad2">
                                                            Bad
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-4 pl-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold">Label
                                                name</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text"
                                                   value="@if(isset($js_diagram[3])){{$js_diagram[3]->label}}@else{{'Drills and footwork'}}@endif"
                                                   placeholder="Drills and footwork" name="diagram[3][label]">
                                        </div>
                                    </div>
                                    <div class="col-2 pl-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold">Value</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text"
                                                   value="@if(isset($js_diagram[3])){{$js_diagram[3]->value}}@endif"
                                                   placeholder="3" name="diagram[3][value]">
                                        </div>
                                    </div>
                                    <div class="col-2 pl-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold">Value</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text"
                                                   value="@if(isset($js_diagram[3])){{$js_diagram[3]->value}}@endif"
                                                   placeholder="3" name="diagram[3][value]">
                                        </div>
                                    </div>

                                    <div class="col-6 pl-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold">Is good
                                                or bad ?</label>
                                            <div class="row py-2">
                                                <div class="col-auto">
                                                    <div class="custom-control custom-checkbox h5 text-blue-darker">
                                                        <input name="diagram[3][good]" type="checkbox"
                                                               class="custom-control-input"
                                                               id="serve_good3" @if(isset($js_diagram[3]->good)){{'checked'}}@endif>
                                                        <label class="custom-control-label" for="serve_good3">
                                                            Good
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="custom-control custom-checkbox h5 text-blue-darker">
                                                        <input name="diagram[3][bad]" type="checkbox"
                                                               class="custom-control-input"
                                                               id="server_bad3" @if(isset($js_diagram[3]->bad)){{'checked'}}@endif>
                                                        <label class="custom-control-label" for="server_bad3">
                                                            Bad
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-4 pl-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold">Label
                                                name</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text"
                                                   value="@if(isset($js_diagram[4])){{$js_diagram[4]->label}}@else{{'Slice'}}@endif"
                                                   placeholder="Slice" name="diagram[4][label]">
                                        </div>
                                    </div>
                                    <div class="col-2 pl-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold">Value</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text"
                                                   value="@if(isset($js_diagram[4])){{$js_diagram[4]->value}}@endif"
                                                   placeholder="3" name="diagram[4][value]">
                                        </div>
                                    </div>

                                    <div class="col-6 pl-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold">Is good
                                                or bad ?</label>
                                            <div class="row py-2">
                                                <div class="col-auto">
                                                    <div class="custom-control custom-checkbox h5 text-blue-darker">
                                                        <input name="diagram[4][good]" type="checkbox"
                                                               class="custom-control-input"
                                                               id="serve_good4" @if(isset($js_diagram[4]->good)){{'checked'}}@endif>
                                                        <label class="custom-control-label" for="serve_good4">
                                                            Good
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="custom-control custom-checkbox h5 text-blue-darker">
                                                        <input name="diagram[4][bad]" type="checkbox"
                                                               class="custom-control-input"
                                                               id="server_bad4" @if(isset($js_diagram[4]->bad)){{'checked'}}@endif>
                                                        <label class="custom-control-label" for="server_bad4">
                                                            Bad
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-4 pl-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold">Label
                                                name</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text"
                                                   value="@if(isset($js_diagram[5])){{$js_diagram[5]->label}}@else{{'Backhand'}}@endif"
                                                   placeholder="Backhand" name="diagram[5][label]">
                                        </div>
                                    </div>
                                    <div class="col-2 pl-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold">Value</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text"
                                                   value="@if(isset($js_diagram[5])){{$js_diagram[5]->value}}@endif"
                                                   placeholder="3" name="diagram[5][value]">
                                        </div>
                                    </div>

                                    <div class="col-6 pl-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold">Is good
                                                or bad ?</label>
                                            <div class="row py-2">
                                                <div class="col-auto">
                                                    <div class="custom-control custom-checkbox h5 text-blue-darker">
                                                        <input name="diagram[5][good]" type="checkbox"
                                                               class="custom-control-input"
                                                               id="serve_good5" @if(isset($js_diagram[5]->good)){{'checked'}}@endif>
                                                        <label class="custom-control-label" for="serve_good5">
                                                            Good
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="custom-control custom-checkbox h5 text-blue-darker">
                                                        <input name="diagram[5][bad]" type="checkbox"
                                                               class="custom-control-input"
                                                               id="server_bad5" @if(isset($js_diagram[5]->bad)){{'checked'}}@endif>
                                                        <label class="custom-control-label" for="server_bad5">
                                                            Bad
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-4 pl-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold">Label
                                                name</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text"
                                                   value="@if(isset($js_diagram[6])){{$js_diagram[6]->label}}@else{{'Forehand'}}@endif"
                                                   placeholder="Drills and footwork" name="diagram[6][label]">
                                        </div>
                                    </div>
                                    <div class="col-2 pl-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold">Value</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text"
                                                   value="@if(isset($js_diagram[6])){{$js_diagram[6]->value}}@endif"
                                                   placeholder="3" name="diagram[6][value]">
                                        </div>
                                    </div>

                                    <div class="col-6 pl-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold">Is good
                                                or bad ?</label>
                                            <div class="row py-2">
                                                <div class="col-auto">
                                                    <div class="custom-control custom-checkbox h5 text-blue-darker">
                                                        <input name="diagram[6][good]" type="checkbox"
                                                               class="custom-control-input"
                                                               id="serve_good6" @if(isset($js_diagram[6]->good)){{'checked'}}@endif>
                                                        <label class="custom-control-label" for="serve_good6">
                                                            Good
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="custom-control custom-checkbox h5 text-blue-darker">
                                                        <input name="diagram[6][bad]" type="checkbox"
                                                               class="custom-control-input"
                                                               id="server_bad6" @if(isset($js_diagram[6]->bad)){{'checked'}}@endif>
                                                        <label class="custom-control-label" for="server_bad6">
                                                            Bad
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-4 pl-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold">Label
                                                name</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text"
                                                   value="@if(isset($js_diagram[7])){{$js_diagram[7]->label}}@else{{'Return'}}@endif"
                                                   placeholder="Return" name="diagram[7][label]">
                                        </div>
                                    </div>
                                    <div class="col-2 pl-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold">Value</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text"
                                                   value="@if(isset($js_diagram[7])){{$js_diagram[7]->value}}@endif"
                                                   placeholder="3" name="diagram[7][value]">
                                        </div>
                                    </div>

                                    <div class="col-6 pl-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold">Is good
                                                or bad ?</label>
                                            <div class="row py-2">
                                                <div class="col-auto">
                                                    <div class="custom-control custom-checkbox h5 text-blue-darker">
                                                        <input name="diagram[7][good]" type="checkbox"
                                                               class="custom-control-input"
                                                               id="serve_good7" @if(isset($js_diagram[7]->good)){{'checked'}}@endif>
                                                        <label class="custom-control-label" for="serve_good7">
                                                            Good
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="custom-control custom-checkbox h5 text-blue-darker">
                                                        <input name="diagram[7][bad]" type="checkbox"
                                                               class="custom-control-input"
                                                               id="server_bad7" @if(isset($js_diagram[7]->bad)){{'checked'}}@endif>
                                                        <label class="custom-control-label" for="server_bad7">
                                                            Bad
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-4 pl-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold">Label
                                                name</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text"
                                                   value="@if(isset($js_diagram[8])){{$js_diagram[8]->label}}@endif"
                                                   placeholder="Value" name="diagram[8][label]">
                                        </div>
                                    </div>
                                    <div class="col-2 pl-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold">Value</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text"
                                                   value="@if(isset($js_diagram[8])){{$js_diagram[8]->value}}@endif"
                                                   placeholder="3" name="diagram[8][value]">
                                        </div>
                                    </div>

                                    <div class="col-6 pl-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold">Is good
                                                or bad ?</label>
                                            <div class="row py-2">
                                                <div class="col-auto">
                                                    <div class="custom-control custom-checkbox h5 text-blue-darker">
                                                        <input name="diagram[8][good]" type="checkbox"
                                                               class="custom-control-input"
                                                               id="serve_good8" @if(isset($js_diagram[8]->good)){{'checked'}}@endif>
                                                        <label class="custom-control-label" for="serve_good8">
                                                            Good
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="custom-control custom-checkbox h5 text-blue-darker">
                                                        <input name="diagram[8][bad]" type="checkbox"
                                                               class="custom-control-input"
                                                               id="server_bad8" @if(isset($js_diagram[8]->bad)){{'checked'}}@endif>
                                                        <label class="custom-control-label" for="server_bad8">
                                                            Bad
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4 pl-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold">Label
                                                name</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text"
                                                   value="@if(isset($js_diagram[9])){{$js_diagram[9]->label}}@endif"
                                                   placeholder="Value" name="diagram[9][label]">
                                        </div>
                                    </div>
                                    <div class="col-2 pl-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold">Value</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text"
                                                   value="@if(isset($js_diagram[9])){{$js_diagram[9]->value}}@endif"
                                                   placeholder="3" name="diagram[9][value]">
                                        </div>
                                    </div>

                                    <div class="col-6 pl-5">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold">Is good
                                                or bad ?</label>
                                            <div class="row py-2">
                                                <div class="col-auto">
                                                    <div class="custom-control custom-checkbox h5 text-blue-darker">
                                                        <input name="diagram[9][good]" type="checkbox"
                                                               class="custom-control-input"
                                                               id="serve_good9" @if(isset($js_diagram[9]->good)){{'checked'}}@endif>
                                                        <label class="custom-control-label" for="serve_good9">
                                                            Good
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="custom-control custom-checkbox h5 text-blue-darker">
                                                        <input name="diagram[9][bad]" type="checkbox"
                                                               class="custom-control-input"
                                                               id="server_bad9" @if(isset($js_diagram[9]->bad)){{'checked'}}@endif>
                                                        <label class="custom-control-label" for="server_bad9">
                                                            Bad
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>





                                @endif
                                @if($player->sport_type == 3)
                                        <div class="col-12 pl-5">
                                            <h4 class="text-blue-darker text-uppercase mb-3">SKILLS</h4>
                                        </div>
                                @endif
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Expert’s
                                            resume</label>
                                        <textarea class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                  type="text" placeholder="Text here..."
                                                  name="overview">@if(isset($diagram->overview)){{$diagram->overview}}@endif</textarea>
                                    </div>
                                </div>
                                    @if($player->sport_type == 3)
                                        <div class="col-12 pl-5">
                                            <h5 class="text-uppercase text-blue-gray-light font-weight-bold">Additional info</h5>
                                        </div>

                                        <div class="col-6 pl-5">
                                            <div class="form-group">
                                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="football_transmarket_profile_link">TransMarket Profile (link)</label>
                                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                       type="text" name="football_transmarket_profile_link"
                                                       value="@if(!empty($player->football_transmarket_profile_link)){{$player->football_transmarket_profile_link}}@endif">
                                            </div>
                                        </div>

                                        <div class="col-6 pl-5">
                                            <div class="form-group">
                                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="football_club_profile_link">Clubs Profile (link)</label>
                                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                       type="text" name="football_club_profile_link"
                                                       value="@if(!empty($player->football_club_profile_link)){{$player->football_club_profile_link}}@endif">
                                            </div>
                                        </div>

                                        <div class="col-6 pl-5">
                                            <div class="form-group">
                                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="football_position_main">Main position</label>
                                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                       type="text" name="football_position_main"
                                                       value="@if(!empty($player->football_position_main)){{$player->football_position_main}}@endif">
                                            </div>
                                        </div>
                                        <div class="col-6 pl-5">
                                            <div class="form-group">
                                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="football_position_other">Other position</label>
                                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                       type="text" name="football_position_other"
                                                       value="@if(!empty($player->football_position_other)){{$player->football_position_other}}@endif">
                                            </div>
                                        </div>
                                        <div class="col-6 pl-5">
                                            <div class="form-group">
                                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="football_foot">Foot</label>
                                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                       type="text" name="football_foot"
                                                       value="@if(!empty($player->football_foot)){{$player->football_foot}}@endif">
                                            </div>
                                        </div>


                                        <div class="col-6 pl-5">
                                            <div class="form-group">
                                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Coach</label>
                                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                       type="text" name="coach"
                                                       value="@if(!empty($player->coach)){{$player->coach}}@endif">
                                            </div>
                                        </div>

                                        <div class="col-6 pl-5">
                                            <div class="form-group">
                                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Injuries
                                                    within last 24 months</label>
                                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                       type="text" name="injuries_24m"
                                                       value="@if(!empty($player->injuries_24m)){{$player->injuries_24m}}@endif">
                                            </div>
                                        </div>
                                    @endif
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Pro
                                            player?</label>
                                        <input type="checkbox"
                                               name="is_pro" @if($player->is_pro == 1){{'checked'}}@endif/>
                                    </div>
                                </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                   for="">Weight(for sorting on the players page)</label>
                                            <input name="weight_players_page"
                                                   class="form-control form-control-lg font-weight-bold text-blue-darker" type="number"
                                                   value="@if(!empty($player->weight_players_page)){{$player->weight_players_page}}@endif"
                                                   maxlength="5"
                                                   placeholder="Only digits!">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                   for="">Image on main page</label>
                                            <input type="file" name="round_image" id="round-img" class="form-control form-control-lg font-weight-bold text-blue-darker">
                                            <img src="@if(!empty($player->round_image)){{$player->round_image}}@endif" id="round-img-main-page" width="120px" />

                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="name_on_main_page">Name player on main page</label>
                                            <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                   type="text" name="name_on_main_page"
                                                   value="@if(!empty($player->name_on_main_page)){{$player->name_on_main_page}}@endif">

                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold" for="show_on_main_page">Show on main page?</label>
                                            <input type="checkbox"
                                                   name="show_on_main_page" @if($player->show_on_main_page == 1){{'checked'}}@endif/>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                   for="weight_main_page">Weight (for sorting on the main page)</label>
                                            <input name="weight_main_page"
                                                   class="form-control form-control-lg font-weight-bold text-blue-darker" type="number"
                                                   value="@if(!empty($player->weight_main_page)){{$player->weight_main_page}}@endif"
                                                   maxlength="5"
                                                   placeholder="Only digits!">
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                   for="">Flag country</label>
                                            <!--<select class="custom-select custom-select-lg font-weight-bold text-blue-darker"
                                                    id="nationality-id" name="nationality" ngrequired="required">
                                                <option value="">---</option>
                                                @foreach($countries as $k=>$country)
                                                    <option value="{{$k}}" @if(!empty($player->nationality) && $player->nationality == $k){{'selected="selected"'}}@endif>{{$country}}</option>
                                                @endforeach
                                            </select>-->
                                            <select name="country_flag" class="my-select custom-select custom-select-lg font-weight-bold text-blue-darker">
                                                @foreach($countryFlags as $flag => $country)
                                                    <option data-img-src="/images/flags/circle/{{$flag}}" value="{{$flag}}" @if(!empty($player->country_flag) && $player->country_flag == $flag){{'selected="selected"'}}@endif>{{$country}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                            </div>
                            <div class="row pt-4 mt-1 tabb">
                                @if($player->sport_type == 3)
                                    <!--<div class="col-12 pl-5">
                                        <h4 class="text-blue-darker text-uppercase mb-3">Stats</h4>
                                    </div>-->
                                    <div class="col-12">
                                        <h4 class="text-blue-darker text-uppercase mt-5 mb-3">Stats</h4>
                                        <div class="results-last-seasons pb-2">
                                            <div class="more_wrapper_results_last_seasons more-div">
                                                @foreach($player->footballResultsLastSeasons as $results_last_season)
                                                    <div class="results-last-season border-bottom border-secondary mb-2">
                                                        <div class="mb-1 d-flex align-items-center justify-content-between">
                                                            <h5 class="text-blue-darker text-uppercase mb-0">Results of the last season</h5>

                                                            <button class="btn btn-white btn-icon delete-more-btn">
						        <span class="icon icon-close-red icon-md">
									<svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>
						        </span>
                                                            </button>

                                                        </div>
                                                        <div class="row gutters-small">
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                           for="">Season</label>
                                                                    <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                                           type="text"
                                                                           value="@if(!empty($results_last_season->season)){{$results_last_season->season}}@endif"
                                                                           name="football_results_last_seasons[season][]">
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                           for="">Competition</label>
                                                                    <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                                           type="text"
                                                                           value="@if(!empty($results_last_season->competition)){{$results_last_season->competition}}@endif"
                                                                           name="football_results_last_seasons[competition][]">
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                           for="">Club</label>
                                                                    <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                                           type="text"
                                                                           value="@if(!empty($results_last_season->club)){{$results_last_season->club}}@endif"
                                                                           name="football_results_last_seasons[club][]">
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                           for="">Appearences</label>
                                                                    <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                                           type="text"
                                                                           value="@if(!empty($results_last_season->appearences)){{$results_last_season->appearences}}@endif"
                                                                           name="football_results_last_seasons[appearences][]">
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                           for="">Goals</label>
                                                                    <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                                           type="text"
                                                                           value="@if(!empty($results_last_season->goals)){{$results_last_season->goals}}@endif"
                                                                           name="football_results_last_seasons[goals][]">
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                           for="">Passes</label>
                                                                    <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                                           type="text"
                                                                           value="@if(!empty($results_last_season->passes)){{$results_last_season->passes}}@endif"
                                                                           name="football_results_last_seasons[passes][]">
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                           for="">Yellow/Red cards</label>
                                                                    <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                                           type="text"
                                                                           value="@if(!empty($results_last_season->cards)){{$results_last_season->cards}}@endif"
                                                                           name="football_results_last_seasons[cards][]">
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                           for="">Club result</label>
                                                                    <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                                           type="text"
                                                                           value="@if(!empty($results_last_season->club_result)){{$results_last_season->club_result}}@endif"
                                                                           name="football_results_last_seasons[club_result][]">
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                           for="">Weight (sort)</label>
                                                                    <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                                           type="number"
                                                                           value="@if(!empty($results_last_season->weight)){{$results_last_season->weight}}@endif"
                                                                           name="football_results_last_seasons[weight][]">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                                <div class="results-last-season border-bottom border-secondary mb-2">
                                                    <div class="mb-1 d-flex align-items-center justify-content-between">
                                                        <h5 class="text-blue-darker text-uppercase mb-0">Results of the last season</h5>

                                                        <button class="btn btn-white btn-icon delete-more-btn">
						        <span class="icon icon-close-red icon-md">
									<svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>
						        </span>
                                                        </button>

                                                    </div>
                                                    <div class="row gutters-small">
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                       for="">Season</label>
                                                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                                       type="text"
                                                                       value=""
                                                                       name="football_results_last_seasons[season][]">
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                       for="">Competition</label>
                                                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                                       type="text"
                                                                       value=""
                                                                       name="football_results_last_seasons[competition][]">
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                       for="">Club</label>
                                                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                                       type="text"
                                                                       value=""
                                                                       name="football_results_last_seasons[club][]">
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                       for="">Appearences</label>
                                                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                                       type="text"
                                                                       value=""
                                                                       name="football_results_last_seasons[appearences][]">
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                       for="">Passes</label>
                                                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                                       type="text"
                                                                       value=""
                                                                       name="football_results_last_seasons[passes][]">
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                       for="">Yellow/Red cards</label>
                                                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                                       type="text"
                                                                       value=""
                                                                       name="football_results_last_seasons[cards][]">
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                       for="">Club result</label>
                                                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                                       type="text"
                                                                       value=""
                                                                       name="football_results_last_seasons[club_result][]">
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                       for="">Weight (sort)</label>
                                                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                                       type="number"
                                                                       value=""
                                                                       name="football_results_last_seasons[weight][]">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <button class="btn btn-outline-primary text-uppercase font-weight-bold add-more-btn">
                                                + add more
                                            </button>
                                        </div>
                                        <div class="personal-awards pb-2">
                                            <div class="more_wrapper_personal_awards more-div">
                                                @foreach($player->footballPersonalAwards as $personal_award)
                                                    <div class="personal-award border-bottom border-secondary mb-2">
                                                        <div class="mb-1 d-flex align-items-center justify-content-between">
                                                            <h5 class="text-blue-darker text-uppercase mb-0">Personal award</h5>

                                                            <button class="btn btn-white btn-icon delete-more-btn">
						        <span class="icon icon-close-red icon-md">
									<svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>
						        </span>
                                                            </button>

                                                        </div>
                                                        <div class="row gutters-small">
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                           for="">Season</label>
                                                                    <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                                           type="text"
                                                                           value="@if(!empty($personal_award->season)){{$personal_award->season}}@endif"
                                                                           name="football_personal_awards[season][]">
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                           for="">Date</label>
                                                                    <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                                           type="text"
                                                                           placeholder="mm/dd/YYYY"
                                                                           value="@if(!empty($personal_award->date)){{$personal_award->date}}@endif"
                                                                           name="football_personal_awards[date][]">
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                           for="">Award</label>
                                                                    <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                                           type="text"
                                                                           value="@if(!empty($personal_award->award)){{$personal_award->award}}@endif"
                                                                           name="football_personal_awards[award][]">
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                           for="">Club</label>
                                                                    <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                                           type="text"
                                                                           value="@if(!empty($personal_award->club)){{$personal_award->club}}@endif"
                                                                           name="football_personal_awards[club][]">
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="form-group">
                                                                    <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                           for="">Weight (sort)</label>
                                                                    <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                                           type="number"
                                                                           value="@if(!empty($personal_award->weight) || $personal_award->weight == 0){{$personal_award->weight}}@endif"
                                                                           name="football_personal_awards[weight][]">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                                <div class="personal-award border-bottom border-secondary mb-2">
                                                    <div class="mb-1 d-flex align-items-center justify-content-between">
                                                        <h5 class="text-blue-darker text-uppercase mb-0">Personal award</h5>

                                                        <button class="btn btn-white btn-icon delete-more-btn">
						        <span class="icon icon-close-red icon-md">
									<svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>
						        </span>
                                                        </button>

                                                    </div>
                                                    <div class="row gutters-small">
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                       for="">Season</label>
                                                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                                       type="text"
                                                                       value=""
                                                                       name="football_personal_awards[season][]">
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                       for="">Date</label>
                                                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                                       type="text"
                                                                       value=""
                                                                       placeholder="mm/dd/YYYY"
                                                                       name="football_personal_awards[date][]">
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                       for="">Award</label>
                                                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                                       type="text"
                                                                       value=""
                                                                       name="football_personal_awards[award][]">
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                       for="">Club</label>
                                                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                                       type="text"
                                                                       value=""
                                                                       name="football_personal_awards[club][]">
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label class="text-uppercase text-blue-gray-light font-weight-bold"
                                                                       for="">Weight (sort)</label>
                                                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"
                                                                       type="number"
                                                                       value=""
                                                                       name="football_personal_awards[weight][]">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <button class="btn btn-outline-primary text-uppercase font-weight-bold add-more-btn">
                                                + add more
                                            </button>
                                        </div>
                                        <div class="mb-3">

                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div class="row">
                                <div class="mt-5 mb-2 d-flex">
                                    <input type="submit" class="btn btn-primary btn-lg text-uppercase px-4"
                                           value="Save"/>
                                    &nbsp; &nbsp; &nbsp; &nbsp;
                                    <input type="submit" id="preview" class="btn btn-primary btn-lg text-uppercase px-4"
                                           value="Preview">
                                </div>
                            </div>

                </form>
            </div>
        </fieldset>
    </article>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#rank_change').on('keyup', function () {
                $('#rank1').html($(this).val());
                $('#rank2').html($(this).val());
                $('#rank3').html($(this).val());
            })
            $('#preview').on('click', function (e) {

                $('#regForm').attr('action', "{{route('scouting.player_card_draft_view',$player->id)}}")
                $('#regForm').attr('target', '_blank')
                $('#regForm').submit();
                console.log($(this))
                e.preventDefault();

                $('#regForm').attr('action', "{{route('scouting.admin.players.id',$player->id)}}")
                $('#regForm').attr('target', '_self')
                return false;
            })
            $('#start_date').datepicker();
            $('#end_date').datepicker();

            $('#titles_finals_date').datepicker();
            $('#last_games_date').datepicker();
            $('#date_of_birth').datepicker();
            $('#ranking_date').datepicker();
            // $('#player_history_date').datepicker();


            $('#status-id').on('change', function () {
                if ($(this).val() == 7) {
                    $('#voting-block').css('display', 'flex');
                } else {
                    $('#voting-block').css('display', 'none');
                }
            })

            var maxField = 100;

            var screen_names = '<div class="event-item border-secondary mb-2">\n' +
                '                        <div class="mb-1 d-flex align-items-center justify-content-between">\n' +
                '                            <h5 class="text-blue-darker text-uppercase mb-0">Sharkscope Item --id--</h5>\n' +
                '                           \n' +
                '                                <button class="btn btn-white btn-icon delete-more-btn">\n' +
                '\t\t\t\t\t\t        <span class="icon icon-close-red icon-md">\n' +
                '\t\t\t\t\t\t\t\t\t<svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>\n' +
                '\t\t\t\t\t\t        </span>\n' +
                '                                </button>\n' +
                '                        </div>\n' +
                '                        <div class="row gutters-small">\n' +
                '                            <div class="col-12">\n' +
                '                                <div class="form-group">\n' +
                '                                    <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">SCREEN NAMES ON ALL ONLINE POKER SITES (NEEDED TO BE UNBLOCKED ON SHARKSCOPE)</label>\n' +
                '                                    <input class="form-control font-weight-bold text-blue-darker" type="text" value="" id="" placeholder="Poker site/Screen name" name="screen_names[--id--][screen_name]">\n' +
                '                                </div>\n' +
                '                            </div>\n' +
                '\n' +
                '                            <div class="col-12">\n' +
                '                                <div class="form-group">\n' +
                '                                    <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Sharkscope profile (link)</label>\n' +
                '                                    <input class="form-control form-control-lg font-weight-bold text-blue-darker" value="" name="screen_names[--id--][poker_sharkscope_link]" type="url" placeholder="http(s)://">\n' +
                '                                </div>\n' +
                '                            </div>\n' +
                '                            <div class="col-12">\n' +
                '                                <div class="text-uppercase text-blue-gray-light font-weight-bold mb-2">Upload Sharkscope profit graph</div>\n' +
                '                                <div class="img-thumb-container" id="graph-container">\n' +
                '                                <span id="graphs_--id--">\n' +
                '                                   \n' +
                '                                </span>\n' +
                '                                    <div id="upl_graph" class="upload-drop-zone-wrapper">\n' +
                '                                            <label class="upload-drop-zone upload-drop-zone-medium d-flex flex-column align-items-center justify-content-center" for="upload-graph---id--">\n' +
                '                                                <i class="icon icon-sprite icon-photo-upload upload-drop-zone-icon"></i>\n' +
                '                                            </label>\n' +
                '                                        <input onchange="readGraphURL(this, \'--id--\');" type="file" id="upload-graph---id--" hidden name="screen_names[--id--][graphs]" accept="image/*" capture>\n' +
                '                                    </div>\n' +
                '                                </div>\n' +
                '                            </div>\n' +
                '                        </div>\n' +
                '                    </div>';

            var languages_speak = '<div class="input-group input-group-lg mb-2">\n' +
                '                    <input class="form-control font-weight-bold text-blue-darker" type="text" value="" id="" placeholder="English" name="languages_speak[]">\n' +
                '                    <div class="input-group-append">\n' +
                '                        <button class="btn btn-white btn-icon btn-lg rounded-0 delete-more-btn"">\n' +
                '                                <span class="icon icon-close-red icon-md">\n' +
                '                                    <svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>\n' +
                '                                </span>\n' +
                '                        </button>\n' +
                '                    </div>\n' +
                '                </div>';
            var video_links_HTML = '<div class="input-group input-group-lg mb-2">\n' +
                '\t\t\t\t\t  <input class="form-control font-weight-bold text-blue-darker " type="url" value="" id="" name="video_links[]" placeholder="Links to video: https://www.youtube.com/watch?v=1u6jLsif42g23">\n' +
                '\t\t\t\t\t  <div class="input-group-append">\n' +
                '\t\t\t\t\t\t<button class="btn btn-white btn-icon btn-lg rounded-0 delete-more-btn">\n' +
                '\t\t\t\t\t        <span class="icon icon-close-red icon-md">\n' +
                '\t\t\t\t\t\t\t\t<svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>\n' +
                '\t\t\t\t\t        </span>\n' +
                '\t\t\t\t\t    </button>\n' +
                '\t\t\t\t\t  </div>\n' +
                '\t\t\t\t\t</div>';
            var items = '<div class="event-item border-bottom border-secondary mb-2">\n' +
                '                    <div class="mb-1 d-flex align-items-center justify-content-between">\n' +
                '                        <h5 class="text-blue-darker text-uppercase mb-0">Event Item</h5>\n' +
                '                        <button class="btn btn-white btn-icon delete-more-btn">\n' +
                '\t\t\t\t\t\t        <span class="icon icon-close-red icon-md">\n' +
                '\t\t\t\t\t\t\t\t\t<svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>\n' +
                '\t\t\t\t\t\t        </span>\n' +
                '                        </button>\n' +
                '                    </div>\n' +
                '                    <div class="row gutters-small">\n' +
                '                        <div class="col-4">\n' +
                '                            <div class="form-group">\n' +
                '                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Network</label>\n' +
                '                                <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" value="" name="events[network][]">\n' +
                '                            </div>\n' +
                '                        </div>\n' +
                '                        <div class="col-4">\n' +
                '                            <div class="form-group">\n' +
                '                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Date</label>\n' +
                '                                <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" value="" name="events[date][]">\n' +
                '                            </div>\n' +
                '                        </div>\n' +
                '                        <div class="col-4">\n' +
                '                            <div class="form-group">\n' +
                '                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Type</label>\n' +
                '                                <input class="form-control form-control-lg font-weight-bold text-blue-darker" id="" required name="events[type][]" type="text">\n' +
                '                            </div>\n' +
                '                        </div>\n' +
                '                        <div class="col-4">\n' +
                '                            <div class="form-group">\n' +
                '                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Stake</label>\n' +
                '                                <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" name="events[stake][]">\n' +
                '                            </div>\n' +
                '                        </div>\n' +
                '                        <div class="col-4">\n' +
                '                            <div class="form-group">\n' +
                '                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Position</label>\n' +
                '                                <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="text" name="events[position][]">\n' +
                '                            </div>\n' +
                '                        </div>\n' +
                '                        <div class="col-4">\n' +
                '                            <div class="form-group">\n' +
                '                                <label class="text-uppercase text-blue-gray-light font-weight-bold" for="">Profit ($)</label>\n' +
                '                                <input class="form-control form-control-lg font-weight-bold text-blue-darker" type="number"  name="events[profit][]">\n' +
                '                            </div>\n' +
                '                        </div>\n' +
                '                    </div>\n' +
                '                </div>';
            var results_last_seasons = '<div class="results-last-season border-bottom border-secondary mb-2">\n' +
                '                                                    <div class="mb-1 d-flex align-items-center justify-content-between">\n' +
                '                                                        <h5 class="text-blue-darker text-uppercase mb-0">Results of the last season</h5>\n' +
                '\n' +
                '                                                        <button class="btn btn-white btn-icon delete-more-btn">\n' +
                '\t\t\t\t\t\t        <span class="icon icon-close-red icon-md">\n' +
                '\t\t\t\t\t\t\t\t\t<svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>\n' +
                '\t\t\t\t\t\t        </span>\n' +
                '                                                        </button>\n' +
                '\n' +
                '                                                    </div>\n' +
                '                                                    <div class="row gutters-small">\n' +
                '                                                        <div class="col-4">\n' +
                '                                                            <div class="form-group">\n' +
                '                                                                <label class="text-uppercase text-blue-gray-light font-weight-bold"\n' +
                '                                                                       for="">Season</label>\n' +
                '                                                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"\n' +
                '                                                                       type="text"\n' +
                '                                                                       value=""\n' +
                '                                                                       name="football_results_last_seasons[season][]">\n' +
                '                                                            </div>\n' +
                '                                                        </div>\n' +
                '                                                        <div class="col-4">\n' +
                '                                                            <div class="form-group">\n' +
                '                                                                <label class="text-uppercase text-blue-gray-light font-weight-bold"\n' +
                '                                                                       for="">Competition</label>\n' +
                '                                                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"\n' +
                '                                                                       type="text"\n' +
                '                                                                       value=""\n' +
                '                                                                       name="football_results_last_seasons[competition][]">\n' +
                '                                                            </div>\n' +
                '                                                        </div>\n' +
                '                                                        <div class="col-4">\n' +
                '                                                            <div class="form-group">\n' +
                '                                                                <label class="text-uppercase text-blue-gray-light font-weight-bold"\n' +
                '                                                                       for="">Club</label>\n' +
                '                                                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"\n' +
                '                                                                       type="text"\n' +
                '                                                                       value=""\n' +
                '                                                                       name="football_results_last_seasons[club][]">\n' +
                '                                                            </div>\n' +
                '                                                        </div>\n' +
                '                                                        <div class="col-4">\n' +
                '                                                            <div class="form-group">\n' +
                '                                                                <label class="text-uppercase text-blue-gray-light font-weight-bold"\n' +
                '                                                                       for="">Appearences</label>\n' +
                '                                                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"\n' +
                '                                                                       type="text"\n' +
                '                                                                       value=""\n' +
                '                                                                       name="football_results_last_seasons[appearences][]">\n' +
                '                                                            </div>\n' +
                '                                                        </div>\n' +
                '                                                        <div class="col-4">\n' +
                '                                                            <div class="form-group">\n' +
                '                                                                <label class="text-uppercase text-blue-gray-light font-weight-bold"\n' +
                '                                                                       for="">Goals</label>\n' +
                '                                                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"\n' +
                '                                                                       type="text"\n' +
                '                                                                       value=""\n' +
                '                                                                       name="football_results_last_seasons[goals][]">\n' +
                '                                                            </div>\n' +
                '                                                        </div>\n' +
                '                                                        <div class="col-4">\n' +
                '                                                            <div class="form-group">\n' +
                '                                                                <label class="text-uppercase text-blue-gray-light font-weight-bold"\n' +
                '                                                                       for="">Passes</label>\n' +
                '                                                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"\n' +
                '                                                                       type="text"\n' +
                '                                                                       value=""\n' +
                '                                                                       name="football_results_last_seasons[passes][]">\n' +
                '                                                            </div>\n' +
                '                                                        </div>\n' +
                '                                                        <div class="col-4">\n' +
                '                                                            <div class="form-group">\n' +
                '                                                                <label class="text-uppercase text-blue-gray-light font-weight-bold"\n' +
                '                                                                       for="">Yellow/Red cards</label>\n' +
                '                                                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"\n' +
                '                                                                       type="text"\n' +
                '                                                                       value=""\n' +
                '                                                                       name="football_results_last_seasons[cards][]">\n' +
                '                                                            </div>\n' +
                '                                                        </div>\n' +
                '                                                        <div class="col-4">\n' +
                '                                                            <div class="form-group">\n' +
                '                                                                <label class="text-uppercase text-blue-gray-light font-weight-bold"\n' +
                '                                                                       for="">Club result</label>\n' +
                '                                                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"\n' +
                '                                                                       type="text"\n' +
                '                                                                       value=""\n' +
                '                                                                       name="football_results_last_seasons[club_result][]">\n' +
                '                                                            </div>\n' +
                '                                                        </div>\n' +
                '                                                        <div class="col-4">\n' +
                '                                                            <div class="form-group">\n' +
                '                                                                <label class="text-uppercase text-blue-gray-light font-weight-bold"\n' +
                '                                                                       for="">Weight (sort)</label>\n' +
                '                                                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"\n' +
                '                                                                       type="number"\n' +
                '                                                                       value=""\n' +
                '                                                                       name="football_results_last_seasons[weight][]">\n' +
                '                                                            </div>\n' +
                '                                                        </div>\n' +
                '                                                    </div>\n' +
                '                                                </div>';
            var personal_awards = '<div class="personal-award border-bottom border-secondary mb-2">\n' +
                '                                                    <div class="mb-1 d-flex align-items-center justify-content-between">\n' +
                '                                                        <h5 class="text-blue-darker text-uppercase mb-0">Personal award</h5>\n' +
                '\n' +
                '                                                        <button class="btn btn-white btn-icon delete-more-btn">\n' +
                '\t\t\t\t\t\t        <span class="icon icon-close-red icon-md">\n' +
                '\t\t\t\t\t\t\t\t\t<svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>\n' +
                '\t\t\t\t\t\t        </span>\n' +
                '                                                        </button>\n' +
                '\n' +
                '                                                    </div>\n' +
                '                                                    <div class="row gutters-small">\n' +
                '                                                        <div class="col-4">\n' +
                '                                                            <div class="form-group">\n' +
                '                                                                <label class="text-uppercase text-blue-gray-light font-weight-bold"\n' +
                '                                                                       for="">Season</label>\n' +
                '                                                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"\n' +
                '                                                                       type="text"\n' +
                '                                                                       value=""\n' +
                '                                                                       name="football_personal_awards[season][]">\n' +
                '                                                            </div>\n' +
                '                                                        </div>\n' +
                '                                                        <div class="col-4">\n' +
                '                                                            <div class="form-group">\n' +
                '                                                                <label class="text-uppercase text-blue-gray-light font-weight-bold"\n' +
                '                                                                       for="">Date</label>\n' +
                '                                                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"\n' +
                '                                                                       type="text"\n' +
                '                                                                       value="" \n' +
                '                                                                       placeholder="mm/dd/YYYY" \n' +
                '                                                                       name="football_personal_awards[date][]">\n' +
                '                                                            </div>\n' +
                '                                                        </div>\n' +
                '                                                        <div class="col-4">\n' +
                '                                                            <div class="form-group">\n' +
                '                                                                <label class="text-uppercase text-blue-gray-light font-weight-bold"\n' +
                '                                                                       for="">Award</label>\n' +
                '                                                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"\n' +
                '                                                                       type="text"\n' +
                '                                                                       value=""\n' +
                '                                                                       name="football_personal_awards[award][]">\n' +
                '                                                            </div>\n' +
                '                                                        </div>\n' +
                '                                                        <div class="col-4">\n' +
                '                                                            <div class="form-group">\n' +
                '                                                                <label class="text-uppercase text-blue-gray-light font-weight-bold"\n' +
                '                                                                       for="">Club</label>\n' +
                '                                                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"\n' +
                '                                                                       type="text"\n' +
                '                                                                       value=""\n' +
                '                                                                       name="football_personal_awards[club][]">\n' +
                '                                                            </div>\n' +
                '                                                        </div>\n' +
                '                                                        <div class="col-4">\n' +
                '                                                            <div class="form-group">\n' +
                '                                                                <label class="text-uppercase text-blue-gray-light font-weight-bold"\n' +
                '                                                                       for="">Weight (sort)</label>\n' +
                '                                                                <input class="form-control form-control-lg font-weight-bold text-blue-darker"\n' +
                '                                                                       type="number"\n' +
                '                                                                       value=""\n' +
                '                                                                       name="football_personal_awards[weight][]">\n' +
                '                                                            </div>\n' +
                '                                                        </div>\n' +
                '                                                    </div>\n' +
                '                                                </div>';
            var element_classes = {
                'more_wrapper_news': {
                    'element_name': 'latest_news_desc',
                    'element_HTML': '<div class="input-group input-group-lg mb-2">\n' +
                        '                                <input class="form-control font-weight-bold text-blue-darker" type="text" value="" name="latest_news_desc[]" placeholder="Description ">\n' +
                        '                                <input class="form-control font-weight-bold text-blue-darker" width="30%" type="text" value="" name="latest_news_url[]" placeholder="URL">\n' +
                        '                                <div class="input-group-append">\n' +
                        '                                    <button class="btn btn-white btn-icon btn-lg rounded-0 delete-more-btn">\n' +
                        '\t\t\t\t\t\t\t\t\t\t<span class="icon icon-close-red icon-md">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t<svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>\n' +
                        '\t\t\t\t\t\t\t\t\t\t</span>\n' +
                        '                                    </button>\n' +
                        '                                </div>\n' +
                        '                            </div>',
                    'count': 1,
                },
                'more_wrapper_titles_finals': {
                    'element_name': 'titles_finals_date',
                    'element_HTML': '<div class="input-group input-group-lg mb-2">\n' +
                        '                                    <input class="form-control font-weight-bold text-blue-darker" type="text" value="" name="titles_finals_date[]" id="titles_finals_date" placeholder="Date">\n' +
                        '                                    <input class="form-control font-weight-bold text-blue-darker" type="text" value="" name="titles_finals_tournament[]" placeholder="Tournament">\n' +
                        '                                    <input class="form-control font-weight-bold text-blue-darker" type="text" value="" name="titles_finals_location[]" placeholder="Location">\n' +
                        '                                    <input class="form-control font-weight-bold text-blue-darker" type="text" value="" name="titles_finals_result[]" placeholder="Result">\n' +
                        '                                    <div class="input-group-append">\n' +
                        '                                        <button class="btn btn-white btn-icon btn-lg rounded-0 delete-more-btn">\n' +
                        '\t\t\t\t\t\t\t\t\t\t<span class="icon icon-close-red icon-md">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t<svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>\n' +
                        '\t\t\t\t\t\t\t\t\t\t</span>\n' +
                        '                                        </button>\n' +
                        '                                    </div>\n' +
                        '                                </div>',
                    'count': 1,
                },
                'more_wrapper_screen_names': {
                    'element_name': 'screen_names',
                    'element_HTML': screen_names,
                    'count': 1,
                },
                'more_wrapper_languages_speak': {
                    'element_name': 'languages_speak',
                    'element_HTML': languages_speak,
                    'count': 1,
                },
                'more_wrapper_events': {
                    'element_name': 'events',
                    'element_HTML': items,
                    'count': 1,
                },
                'more_wrapper_results_last_seasons': {
                    'element_name': 'football_results_last_seasons',
                    'element_HTML': results_last_seasons,
                    'count': 1,
                },
                'more_wrapper_personal_awards': {
                    'element_name': 'football_personal_awards',
                    'element_HTML': personal_awards,
                    'count': 1,
                },
                'more_wrapper_video_links': {
                    'element_name': 'video_links',
                    'element_HTML': video_links_HTML,
                    'count': 1,
                },
                'more_wrapper_last_games': {
                    'element_name': 'last_games_date',
                    'element_HTML': '<div class="input-group input-group-lg mb-2">\n' +
                        '                                <input class="form-control font-weight-bold text-blue-darker" type="text" value="" name="last_games_date[]" id="last_games_date" placeholder="Date">\n' +
                        '                                <input class="form-control font-weight-bold text-blue-darker" type="text" value="" name="last_games_opponent[]" placeholder="Opponent">\n' +
                        '                                <input class="form-control font-weight-bold text-blue-darker" type="text" value="" name="last_games_result[]" placeholder="Result">\n' +
                        '                                <input class="form-control font-weight-bold text-blue-darker" type="text" value="" name="last_games_tournament[]" placeholder="Tournament">\n' +
                        '                                <input class="form-control font-weight-bold text-blue-darker" type="text" value="" name="last_games_surface[]" placeholder="Surface">\n' +
                        '                                <div class="input-group-append">\n' +
                        '                                    <button class="btn btn-white btn-icon btn-lg rounded-0 delete-more-btn">\n' +
                        '\t\t\t\t\t\t\t\t\t\t<span class="icon icon-close-red icon-md">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t<svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>\n' +
                        '\t\t\t\t\t\t\t\t\t\t</span>\n' +
                        '                                    </button>\n' +
                        '                                </div>\n' +
                        '                            </div>',
                    'count': 1,
                },
                'more_wrapper_history': {
                    'element_name': 'player_history_date',
                    'element_HTML': '<div class="input-group input-group-lg mb-2">\n' +
                        '                                <input class="form-control font-weight-bold text-blue-darker" type="text" value="" name="player_history_date[]" id="player_history_date" placeholder="12/15/2018">\n' +
                        '                                <input class="form-control font-weight-bold text-blue-darker" width="30%" type="text" value="" name="player_history_text[]" placeholder="Text">\n' +
                        '                                <div class="input-group-append">\n' +
                        '                                    <button class="btn btn-white btn-icon btn-lg rounded-0 delete-more-btn">\n' +
                        '\t\t\t\t\t\t\t\t\t\t<span class="icon icon-close-red icon-md">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t<svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>\n' +
                        '\t\t\t\t\t\t\t\t\t\t</span>\n' +
                        '                                    </button>\n' +
                        '                                </div>\n' +
                        '                            </div>',
                    'count': 1,
                },
            };

            for (i in element_classes) {
                if ($("input[name='" + element_classes[i]['element_name'] + "[]']").length) {
                    element_classes[i]['count'] = $("input[name='" + element_classes[i]['element_name'] + "[]']").length;
                }
            }
            $('.add-more-btn').click(function (e) {
                e.preventDefault();
                wrapper = $(this).siblings('div').first();
                wrapper_class = $(wrapper).attr('class').split(" ")[0];
                if (element_classes[wrapper_class]['count'] < maxField) {
                    if (element_classes[wrapper_class]['element_name'] == 'events') {
                        count_items++;
                        var el = element_classes[wrapper_class]['element_HTML'].replace('\\w', count_items);
                        element_classes[wrapper_class]['count']++; //Increment field counter
                        $("." + wrapper_class).append(el); //Add field html
                    }
                    else if (element_classes[wrapper_class]['element_name'] == 'football_results_last_seasons') {
                        count_results_last_seasons++;
                        var el = element_classes[wrapper_class]['element_HTML'].replace('\\w', count_results_last_seasons);
                        element_classes[wrapper_class]['count']++; //Increment field counter
                        $("." + wrapper_class).append(el); //Add field html
                    }
                    else if (element_classes[wrapper_class]['element_name'] == 'football_personal_awards') {
                        count_personal_awards++;
                        var el = element_classes[wrapper_class]['element_HTML'].replace('\\w', count_personal_awards);
                        element_classes[wrapper_class]['count']++; //Increment field counter
                        $("." + wrapper_class).append(el); //Add field html
                    } else if (element_classes[wrapper_class]['element_name'] == 'screen_names') {
                        graph_count_items++;
                        var el = element_classes[wrapper_class]['element_HTML'].replace(/--id--/gi, graph_count_items);
                        element_classes[wrapper_class]['count']++; //Increment field counter
                        $("." + wrapper_class).append(el); //Add field html
                    } else {
                        element_classes[wrapper_class]['count']++; //Increment field counter
                        $("." + wrapper_class).append(element_classes[wrapper_class]['element_HTML']); //Add field html
                    }
                }
            });
            $(".more-div").on('click', '.delete-more-btn', function (e) {
                e.preventDefault();
                wrapper_class = $(this).parent('div').parent('div').parent('div').attr('class').split(" ")[0];
                $(this).parent('div').parent('div').remove(); //Remove field html
                element_classes[wrapper_class]['count']--;
            });

            function readURL(input) {
                console.log('test');
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    console.log(reader);
                    console.log(input.files[0]);

                    reader.onload = function (e) {
                        $('#round-img-main-page').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#round-img").change(function(){
                //console.log(this);
                readURL(this);
            });

            $(".my-select").chosen({width:"100%"});
        })
        var preview_ph = '<div class="img-thumb-wrapper" id="preview-id-{id}">\n' +
            '<img class="img-thumb-img" src="{e_result}" alt="" style="max-width: 130px">\n' +
            '<span class="icon icon-close-red img-thumb-action" onclick="delPrew({idl})">\n' +
            '<svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>\n' +
            '</span>\n' +
            '</div>';
        var preview_ph_graph = '<div class="img-thumb-wrapper" id="graph-preview-id-{id}">\n' +
            '<img class="img-thumb-img" src="{e_result}" alt="" style="max-width: 130px">\n' +
            '<span class="icon icon-close-red img-thumb-action" onclick="delGraphPrew({idl})">\n' +
            '<svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>\n' +
            '</span>\n' +
            '</div>';

        var preview_ph_references = '<div class="img-thumb-wrapper" id="references-preview-id-{id}">\n' +
            '<img class="img-thumb-img" src="{e_result}" alt="" style="max-width: 130px">\n' +
            '<span class="icon icon-close-red img-thumb-action" onclick="delReferencesPrew({idl})">\n' +
            '<svg viewBox="0 0 1 1"><use xlink:href="/images/icons.svg#close-red"></use></svg>\n' +
            '</span>\n' +
            '</div>';
        var filess = [];
        var graphs = [];
        var references = [];
        var current_photos;
        var current_graphs;
        var current_references;

        ;(function ($) {
            var settings = {
                url: 'URL TO UPLOAD FILE',
                toDo: 'OPTIONAL TODO VARIABLE TO SEND TO UPLOAD FILE',
                hoverClass: 'dragAndUploadActive',
                uploadingClass: 'dragAndUploadUploading',
                errorClass: 'dragAndUploadFailure',
                successClass: 'dragAndUploadSuccess',
                statusField: '#dragAndUploadStatus',
                classChangeDelay: 750,
                maxSize: 5242880
            };

            function uploadFile(file, item) {
                if (filess.length < 10) {
                    var uploaded = uploadF(file);

                    var reader = new FileReader();
                    filess.push(file);
                    var preview_ph_o = preview_ph;
                    preview_ph_o = preview_ph_o.replace('{id}', filess.length);
                    preview_ph_o = preview_ph_o.replace('{idl}', filess.length);
                    reader.onload = function (e) {
                        preview_ph_o = preview_ph_o.replace('{e_result}', e.target.result);
                        $('#photos').append(preview_ph_o);
                    };

                    reader.readAsDataURL(file);


                }
            }

            function findFiles(e, item) {
                var files = e.originalEvent.dataTransfer.files;

                $.each(files,
                    function (key, value) {
                        uploadFile(value, item);
                    }
                );
            }

            function setEvents(item) {
                $(item).on('drop dragover dragenter dragleave',
                    function (e) {
                        $(this).removeClass(settings.errorClass + ' ' + settings.successClass);
                        e.stopPropagation();
                        e.preventDefault();
                        if (e.type !== 'dragover') {
                            $(this).toggleClass(settings.hoverClass);
                        }
                        if (e.type === 'drop') {
                            findFiles(e, item);
                        }
                    }
                );
            }

            function setOptions(options) {
                $.each(options, function (key, val) {
                    settings[key] = val;
                });
            }

            $.fn.dragAndUpload = function (options) {
                if (options !== undefined) setOptions(options);
                this.each(function () {
                    setEvents(this);
                });
                return this;
            }
        }(jQuery));

        $(document).ready(
            function () {
                // Uses default settings
                $("#upl_photo").dragAndUpload();
            }
        );

        function delPrew(id) {
            $('#preview-id-' + id).remove();
            delete filess[id];
        }

        function delPhoto(id) {
            $('#preview-id-' + id).css('display', 'none');
            $.ajax({
                url: '/scouting/admin/delPhoto/' + id,
                type: "GET",
                done: function (response) {
                    console.log(response);
                }
            });
        }

        function delSharscope(id) {
            $.ajax({
                url: '/scouting/admin/delSharscope/' + id,
                type: "GET",
                done: function (response) {
                    console.log(response);
                }
            });
        }

        function delGraphPrew(id) {
            $('#graph-preview-id-' + id).remove();
            delete graphs[id];
        }

        function delGraphPhoto(id) {
            current_graphs--;
            $('#graph-preview-id-' + id).css('display', 'none');
            $.ajax({
                url: '/scouting/admin/delete_graph/' + id,
                type: "GET",
                done: function (response) {
                }
            });
        }

        function delReferencesPrew(id) {
            $('#references-preview-id-' + id).remove();
            delete references[id];
        }

        function delReferencesPhoto(id) {
            current_references--;
            $('#references-preview-id-' + id).css('display', 'none');
            $.ajax({
                url: '/scouting/admin/delete_references/' + id,
                type: "GET",
                done: function (response) {
                }
            });
        }

        function readURL(input) {
            if (filess.length < 10) {

                file = input.files[0];
                var uploaded = uploadF(file);

                var reader = new FileReader();
                filess.push(file);
                var preview_ph_o = preview_ph;
                preview_ph_o = preview_ph_o.replace('{id}', filess.length);
                preview_ph_o = preview_ph_o.replace('{idl}', filess.length);
                reader.onload = function (e) {
                    preview_ph_o = preview_ph_o.replace('{e_result}', e.target.result);
                    $('#photos').append(preview_ph_o);
                };

                reader.readAsDataURL(file);
                input.value = '';

            }
        }

        function readGraphURL(input) {
            //if(graphs.length < 1) {
            file = input.files[0];
            var reader = new FileReader();
            graphs.push(file);
            var preview_ph_o = preview_ph_graph;
            preview_ph_o = preview_ph_o.replace('{id}', graphs.length);
            preview_ph_o = preview_ph_o.replace('{idl}', graphs.length);
            reader.onload = function (e) {
                preview_ph_o = preview_ph_o.replace('{e_result}', e.target.result);
                $('#graphs').append(preview_ph_o);
            };
            reader.readAsDataURL(file);
            //  input.value = '';
            // }
        }

        function readReferencesURL(input) {
            if (references.length < 10) {
                file = input.files[0];
                var reader = new FileReader();
                references.push(file);
                var preview_ph_o = preview_ph_references;
                preview_ph_o = preview_ph_o.replace('{id}', references.length);
                preview_ph_o = preview_ph_o.replace('{idl}', references.length);
                reader.onload = function (e) {
                    preview_ph_o = preview_ph_o.replace('{e_result}', e.target.result);
                    $('#references').append(preview_ph_o);
                };

                reader.readAsDataURL(file);
                input.value = '';
            }
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function uploadF(file) {
            var form = new FormData();
            form.append('photo', file);
            form.append('id', '{{$player->id}}');
            $.ajax({
                url: '{{route('scouting.admin.uploadPhoto')}}',
                type: 'POST',
                data: form,
                done: function (data) {
                    return true
                },
                cache: false,
                contentType: false,
                processData: false
            });
        }
    </script>
@endsection
