@extends('tokenstars.layouts.layout-fresh')

@php
    $lang = app('translator')->getLocale()
@endphp

@section('content')


    <section class="section main-section">

        <div class="main-gradient"></div>

        <div class="wrap">
            <div class="row">
                <div class="col-lg-5">
                    <h1 class="main-title">@lang('fresh.header.title')</h1>
                    <h2 class="sub-title-font-size medium-margin-before">@lang('fresh.header.subtitle')</h2>

                    <div class="main-reviews">
                        <img src="/images/team/reviews/icorating.png" alt="TokenStars TEAM Rating Review" onclick="ga('send', 'event', 'listing', 'ico_rating', 'top');" class="">
                        <img src="/images/team/reviews/topicolist.png" alt="TokenStars Gold Level TOP ICO LIST" onclick="ga('send', 'event', 'listing', 'top_ico_gold', 'top');" class="">
                        <img src="/images/team/reviews/icobazar.png" alt="TokenStars AA ICO Bazaar" onclick="ga('send', 'event', 'listing', 'ico_bazaar', 'top');" class="">
                        <img src="/images/team/reviews/icobench.png" alt="TokenStars ICObench" onclick="ga('send', 'event', 'listing', 'ico_bench', 'top');" class="">
                        <img src="/images/team/reviews/trackico.png" alt="TokenStars TrackICO" onclick="ga('send', 'event', 'listing', 'track_ico', 'top');" class="">
                        <img src="/images/team/reviews/icoranker.png" alt="TokenStars ICORanker" onclick="ga('send', 'event', 'listing', 'ico_ranker', 'top');" class="">
                    </div>

                    <!-- <div class="main-exchange">
                        <p class="main-exchange__label uppercase">Where can i get the tokens for the platform?</p>
                        <p class="main-exchange__title">Buy <b>TEAM</b> and <b>ACE</b> Tokens at the exchange</p>



                        <a href="#" class="btn btn-violet btn-regular" style="margin-top: 10px">Buy Tokens</a>
                    </div> -->

                </div>
                <div class="col-lg-7">
                    <div class="main-widget">
                        <p class="main-widget__title">@lang('fresh.header.calculator.title')</p>
                        <p class="main-widget__subtitle">@lang('fresh.header.calculator.subtitle')</p>
                        <div class="exchanges_logo">
                            <a href="https://www.okex.com/market?product=ace_btc" target="_blank"><img src="/images/fresh/okex_logo.png" width="135"/></a>
                            <a href="https://www.bit-z.com/exchange/team_btc" target="_blank"><img src="/images/fresh/bit-z_logo.png" width="135"/></a>
                        </div>

                        <div class="main-widget__inputs j-calc-widget">
                            <div class="main-widget__input-holder">
                                <div class="main-widget__flex">
                                    <div  class="main-widget__select">
                                        <label>@lang('fresh.header.calculator.send')</label>
                                        <select class="left" id="currency_token" onchange="document.getElementById('token_type').innerHTML = this.value;">
                                            <option value="ACE" selected>ACE</optionselected>
                                            <option value="TEAM">TEAM</option>
                                        </select>
                                    </div>
                                    <div>
                                        <div class="main-widget__input">
                                            <input type="text" name="send-value" value="0.10" class="main-widget__input-activable active send-value">
                                            <div class="bg_input"></div>
                                            <select class="js-select-currency">
                                                <option selected>BTC</option>
                                                <!--<option>ETH</option>-->
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <img class="main-widget__arrow" src="/images/fresh/widget-arrow.png" >
                            <div class="main-widget__input-holder">
                                <label style="text-align: right; padding-right: 14px;">@lang('fresh.header.calculator.get')</label>
                                <div class="main-widget__input__right">
                                    <input type="text" name="send-value" value="18975" class="main-widget__input-activable get-value">
                                    <span id="token_type">ACE</span>
                                </div>
                            </div>
                        </div>
                        <div class="main-widget__footer">
                            <p>@lang('fresh.header.calculator.updated'): <br> {{date("d.m.Y, H:i", strtotime($exchange_rates['last_updated']))}}</p>
                            <a href="https://www.bit-z.com/exchange/team_btc" class="btn btn-violet btn-big js-buy-tokens">Get tokens</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-video-background"></div>
        <div class="main-video">
            <video autoplay muted loop >
              <source src="/images/fresh/tokenstars-main.mp4" type="video/mp4">
            </video>
        </div>

        {{--<div class="main-scroll">@lang('fresh.header.scroll')</div>--}}
    </section>

    <section class="section">
        <div class="wrap">
            <div class="row main-link-row">
                <div class="col-lg-3 col-xs-6">
                    <a onclick="ga('send', 'event', 'scroll', 'about_stars', 'main');" href="#ambassadors" class="main-link">
                        <p>@lang('fresh.card_menu.read_more')</p>
                    </a>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <a onclick="ga('send', 'event', 'scroll', 'platfrom_modules', 'main');" href="#platform" class="main-link main-link--2">
                        <p>@lang('fresh.card_menu.platform_modules')</p>
                    </a>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <a onclick="ga('send', 'event', 'scroll', 'project_news', 'main');" href="#news" class="main-link main-link--3">
                        <p>@lang('fresh.card_menu.news')</p>
                    </a>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <a onclick="ga('send', 'event', 'scroll', 'press_mentions', 'main');" href="#press" class="main-link main-link--4">
                        <p>@lang('fresh.card_menu.mentions')</p>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="section modules-section" id="platform">
        <div class="wrap">
            <h2 class="section-title">@lang('fresh.platform_modules.title')</h2>
            <div class="row">
                <div class="col-lg-6">
                    <div class="module-item" style="max-height: 450px">
                        <p class="module-label">NEW!</p>
                        <img class="module-item__image" src="/images/fresh/module-scouting-bg.jpg" />
                        <p class="module-item__title">@lang('fresh.scouting_module.platform_1.title')</p>
                        <p class="module-item__text">@lang('fresh.scouting_module.platform_1.text')</p>
                        <a onclick="ga('send', 'event', 'module', 'scouting', 'main');" href="/scouting" class="btn btn-blue btn-regular">@lang('fresh.scouting_module.platform_1.button')</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="module-item" style="max-height: 450px">
                        <p class="module-label">@lang('fresh.platform_modules.live')</p>
                        <img class="module-item__image" src="/images/fresh/module-auction-bg.jpg" />
                        <p class="module-item__title">@lang('fresh.platform_modules.platform_1.title')</p>
                        <p class="module-item__text">@lang('fresh.platform_modules.platform_1.text')</p>

                        <a onclick="ga('send', 'event', 'module', 'auctions', 'main');" href="/charity" class="btn btn-blue btn-regular">@lang('fresh.platform_modules.platform_1.button')</a>
                    </div>
                </div>

            </div>

<style>
    .module-item {
        min-height: unset;
    }
</style>
            <div class="row" id="prediction-module">
                <div class="col-lg-6" id="voting-module">
                    <div class="module-item" style="max-height: 450px">
                        <p class="module-label">@lang('fresh.platform_modules.live')</p>
                        <img class="module-item__image" src="/images/fresh/module-voting-bg.jpg" />
                        <p class="module-item__title">@lang('fresh.platform_modules.platform_2.title')</p>
                        <p class="module-item__text">@lang('fresh.platform_modules.platform_2.text')</p>

                        <a onclick="ga('send', 'event', 'voting', 'voting_fresh', 'main');" href="/voting" class="btn btn-blue btn-regular">@lang('fresh.platform_modules.platform_2.button')</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="module-item" style="max-height: 450px">
                        <p class="module-label">@lang('fresh.predictions_module.live')</p>
                        <img class="module-item__image" src="/images/fresh/module-prediction-bg.jpg" />
                        <p class="module-item__title">@lang('fresh.predictions_module.platform_1.title')</p>
                        <p class="module-item__text" style="margin-bottom:20px;">@lang('fresh.predictions_module.platform_1.text')</p>

                        <a onclick="ga('send', 'event', 'module', 'predictions', 'main');" href="/predictions" class="btn btn-blue btn-regular">@lang('fresh.predictions_module.platform_1.button')</a>
                    </div>
                </div>

            </div>
            <div class="huge-margin-before align-center">
                <a onclick="document.getElementById('platform-wrapper').style.display='block'; return false"  class="btn btn-blue btn-big white-text">@lang('fresh.platform_modules.platform_description')</a>

            </div>
        </div>
    </section>


    <div id="platform-wrapper" style="display: none">

        <section class="section modules-section">
            <div class="wrap">
                <div class="platform-holder"  id="platform-holder">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="platform-star-holder">
                                <img class="platform-star" src="/images/team/star.png">
                                <h2 class="section-title bold-font">@lang('fresh.platform.title')</h2>
                                <p class="sub-title-size sub-font-color">@lang('fresh.platform.subtitle')</p>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="platform-tokens-block huge-margin-before">
                                <div class="platform-token j-platform-token" data-type="ace">
                                    <b>ACE</b> <br />@lang('fresh.platform.token')
                                </div>
                                <div class="platform-token j-platform-token">
                                    <b>TEAM</b> <br />@lang('fresh.platform.token')
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="platform-tabs-holder huge-margin-before">
                        <li><span class="selected j-platform-tab">@lang('fresh.platform.tabs.tab1')</span></li>
                        <li><span class="j-platform-tab">@lang('fresh.platform.tabs.tab2')</span></li>
                        <li><span class="j-platform-tab">@lang('fresh.platform.tabs.tab3')</span></li>
                        <li><span class="j-platform-tab">@lang('fresh.platform.tabs.tab4')</span></li>
                    </ul>
                    <div class="platform-items-holder huge-margin-before">
                        <p class="platform-items-row-label bold-font big-margin-before">@lang('fresh.platform.section1')</p>
                        <div class="platform-items-row clearfix">
                            <a class="platform-item platform-item--crowd j-platform-item">@lang('fresh.platform.items.item1')</a>
                            <a class="platform-item platform-item--time j-platform-item" style="min-height: 84px;"></a>
                            <a class="platform-item platform-item--income j-platform-item" style="min-height: 84px;"></a>
                        </div>
                        <p class="platform-items-row-label bold-font big-margin-before">@lang('fresh.platform.section2')</p>
                        <div class="platform-items-row clearfix">
                            <a class="platform-item platform-item--search highlighted j-platform-item">@lang('fresh.platform.items.item4')</a>
                            <a href="#voting-module" class="platform-item platform-item--vote highlighted j-platform-item">@lang('fresh.platform.items.item5')</a>
                            <a href="#prediction-module" class="platform-item platform-item--bet highlighted j-platform-item" style="min-height: 84px;">Predictions</a>
                        </div>
                        <p class="platform-items-row-label bold-font big-margin-before">@lang('fresh.platform.section3')</p>
                        <div class="platform-items-row clearfix">
                            <a class="platform-item platform-item--check highlighted j-platform-item">@lang('fresh.platform.items.item7')</a>
                            <a class="platform-item platform-item--video j-platform-item">@lang('fresh.platform.items.item8')</a>
                            <a class="platform-item platform-item--cup highlighted j-platform-item">@lang('fresh.platform.items.item9')</a>
                        </div>
                        <p class="platform-items-row-label bold-font big-margin-before">@lang('fresh.platform.section4')</p>
                        <div class="platform-items-row clearfix">
                            <a class="platform-item platform-item--percent j-platform-item">@lang('fresh.platform.items.item10')</a>
                            <a class="platform-item platform-item--promotion highlighted j-platform-item">@lang('fresh.platform.items.item11')</a>
                            <a class="platform-item platform-item--merch j-platform-item">@lang('fresh.platform.items.item12')</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <section class="section highlights-section" id="news">
        <div class="wrap">
            <h2 class="section-title">@lang('fresh.project_news.title')</h2>
            <ul class="lightSliderHighlights">
                @foreach(trans('fresh.project_news.items') as $item)
                    <li>
                        <div class="module-item module-item--highlights" style="min-height: 550px;">
                        <img class="module-item__image" src="/images/fresh/{{$item['img']}}" />
                        <p class="module-item__date">{{$item['post_date']}}</p>
                        <p class="module-item__title">{{$item['title']}}</p>
                        <p class="module-item__text">{{$item['text']}}</p>
                        <a style="position: fixed; bottom:1; margin-bottom: 25px;" onclick="ga('send', 'event', 'news', 'post{{$loop->iteration}}', 'main');" href="{{$item['medium_url']}}" class="btn btn-blue btn-regular">@lang('fresh.project_news.button')</a>
                        </div>
                    </li>
                @endforeach
            </ul>

        </div>
    </section>

    <section class="section">
        <div class="wrap align-center">
            <a class="btn btn-blue btn-big white-text" href="https://medium.com/@TokenStars" target="_blank">+ more</a>
        </div>
    </section>
    <section class="section highlights-section">
        <div class="wrap align-center">
            <div class="team-splitter">
                <h2 class="section-title">Players & talents</h2>
                <div class="huge-margin-before">
                <div class="col-lg-3 col-md-6">
                    <div class="team-ambassador-card" style="">
                        <img style="border-radius: 100%;" src="/upload/images/kudermetova.jpg" alt="" class="team-ambassador-card-image">
                        <div class="small-font-size small-margin-before">Tennis</div>
                        <div class="big-font-size bold-font small-margin-before">@lang('tokenstars-messages.team.members.kudermetova.name')</div>
                        <img style="border-radius: 100%" src="/images/landing-stars/flags/ru.png" alt="" class="medium-margin-before team-ambassador-card-flag">
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="team-ambassador-card" style="">
                        <img style="border-radius: 100%;" src="/images/landing-stars/team/copil.png" alt="" class="team-ambassador-card-image">
                        <div class="small-font-size small-margin-before">Tennis</div>
                        <div class="big-font-size bold-font small-margin-before">@lang('fresh.stars.copil')</div>
                        <img style="border-radius: 100%" src="/images/landing-stars/flags/rom.png" alt="" class="medium-margin-before team-ambassador-card-flag">
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="team-ambassador-card" style="">
                        <img style="border-radius: 100%;" src="{{asset('/images/landing-stars/team/kostova.png')}}" alt="" class="team-ambassador-card-image">
                        <div class="small-font-size small-margin-before">Tennis</div>
                        <div class="big-font-size bold-font small-margin-before">@lang('fresh.stars.kostova')</div>
                        <img style="border-radius: 100%" src="/images/landing-stars/flags/bul.png" alt="" class="medium-margin-before team-ambassador-card-flag">
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="team-ambassador-card" style="">
                        <img style="border-radius: 100%;" src="/upload/images/makarova.jpg" alt="" class="team-ambassador-card-image">
                        <div class="small-font-size small-margin-before">Tennis</div>
                        <div class="big-font-size bold-font small-margin-before">@lang('tokenstars-messages.team.members.makarova.name')</div>
                        <img style="border-radius: 100%" src="/images/landing-stars/flags/ru.png" alt="" class="medium-margin-before team-ambassador-card-flag">
                    </div>
                </div>
                </div>
                <div style="clear: both"></div>
                <!--<div class="huge-margin-before">

                    <div class="team-small-ambassador-card align-center">
                        <img src="/upload/images/kudermetova.jpg" alt="" class="team-small-ambassador-card-image" style="border-radius: 50%;">
                        <div class="bold-font small-margin-before">@lang('tokenstars-messages.team.members.kudermetova.name')</div>
                        <div class="small-font-size small-margin-before">Tennis</div>
                        <img style="border-radius: 100%" src="/images/landing-stars/flags/ru.png" alt="" class="medium-margin-before team-ambassador-card-flag">

                    </div>
                    <div class="team-small-ambassador-card align-center">
                        <img src="/images/landing-stars/team/copil.png" alt="" class="team-small-ambassador-card-image">
                        <div class="bold-font small-margin-before">@lang('fresh.stars.copil')</div>
                        <div class="small-font-size small-margin-before">Tennis</div>
                        <img style="border-radius: 100%" src="/images/landing-stars/flags/rom.png" alt="" class="medium-margin-before team-ambassador-card-flag">
                    </div>

                    <div class="team-small-ambassador-card align-center">
                        <img src="{{asset('/images/landing-stars/team/kostova.png')}}" alt="" class="team-small-ambassador-card-image">
                        <div class="bold-font small-margin-before">@lang('fresh.stars.kostova')</div>
                        <div class="small-font-size small-margin-before">Tennis</div>
                        <img style="border-radius: 100%" src="/images/landing-stars/flags/bul.png" alt="" class="medium-margin-before team-ambassador-card-flag">
                    </div>
                    <div class="team-small-ambassador-card align-center">
                        <img src="/upload/images/makarova.jpg" alt="" class="team-small-ambassador-card-image" style="border-radius: 50%;">
                        <div class="bold-font small-margin-before">@lang('tokenstars-messages.team.members.makarova.name')</div>
                        <div class="small-font-size small-margin-before">Tennis</div>
                        <img style="border-radius: 100%" src="/images/landing-stars/flags/ru.png" alt="" class="medium-margin-before team-ambassador-card-flag">
                    </div>
                </div>-->
            </div>
        </div>
    </section>
    <section class="section team-section" id="ambassadors">
        <div class="wrap align-center">
            <h2 class="section-title">@lang('tokenstars-team.main.title_work_with_platform')</h2>
            <div class="row row-eq-height">
                @php
                    $stars = ['mattheus', 'haas', 'kucherov', 'zambrotta', 'myskina', 'karpin', 'torres', 'kurilova',
                              'pioline', 'soderling', 'anter', 'lingham', 'ver', 'fedorov', 'redfoo', 'datsyuk', 'hingis', 'boe'];

		    $stars = ['mattheus', 'haas', 'kucherov', 'zambrotta', /*'myskina', 'karpin', 'torres',*/ 'kurilova',
			    'pioline', /*'soderling',*/ 'anter', 'lingham', 'ver', 'fedorov', /*'redfoo',*/ 'datsyuk', 'hingis', 'demekhine'/*,'kudermetova','makarova','marius','kostova'*/];
                @endphp

                @foreach($stars as $star)
                    <div class="col-lg-3 col-md-6">
                        <div class="team-ambassador-card" style="min-height: 227px">
                            <img style="border-radius: 100%;" src="/upload/images/amb-{{ $star }}.jpg" alt="" class="team-ambassador-card-image">
                            <div class="small-font-size small-margin-before">@lang('tokenstars-team.ambassadors.' . $star . '.title')</div>
                            <div class="big-font-size bold-font small-margin-before">@lang('tokenstars-team.ambassadors.' . $star . '.name')</div>
                            @foreach(trans('tokenstars-team.ambassadors.' . $star . '.flag') as $flag)
                                @if($flag != 'n')
                                <img style="border-radius: 100%" src="/images/landing-stars/flags/{{$flag}}.png" alt="" class="medium-margin-before team-ambassador-card-flag">
                                @endif
                            @endforeach

                            <div class="team-ambassador-card-info">
                                <div class="bold-font desktop-only">@lang('tokenstars-team.ambassadors.' . $star . '.name')</div>
                                <p class="super-small-font-size">@lang('tokenstars-team.ambassadors.' . $star . '.info')</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>



    <section class="section team-section">
        <div class="wrap align-center">
            <section class="team-splitter">
                <h2 class="section-title">@lang('fresh.partners.title')</h2>
                <div class="huge-margin-before">
                    <img src="/images/landing-stars/partners-logos-black_new.png" alt="" class="clients-logos big-margin-before">
                </div>
            </section>
        </div>
    </section>

    <section class="section highlights-section">
        <div class="wrap align-center">
            <div class="team-splitter">
                <h2 class="section-title">BLOCKCHAIN & BUSINESS ADVISORS, INVESTORS</h2>
                <div class="row">
                    @php
                        $team = ['masolova','chabanenko','shashkina','danilov'];
                    @endphp

                    @foreach($team as $name)
                        <div class="col-lg-3 col-md-3">
                            <div class="team-ambassador-card team-card">
                                <img src="/upload/images/{{ $name }}.jpg" alt="" class="team-ambassador-card-image">
                                <div class="team-ambassador-job small small-margin-before">@lang('tokenstars-messages.team.members.' . $name . '.title')</div>
                                <div class="bold-font small-margin-before">@lang('tokenstars-messages.team.members.' . $name . '.name')</div>
                                @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.fb')))
                                    <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.fb')" target="_blank"><img src="/images/ace/tech-version/fb.png" alt="" class="medium-margin-before team-ambassador-card-flag team-social"></a>
                                @endif
                                @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.in')))
                                    <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.in')" target="_blank"><img src="/images/ace/tech-version/in.png" alt="" class="medium-margin-before team-ambassador-card-flag team-social"></a>
                                @endif
                                @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.ig')))
                                    <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.ig')" target="_blank"><img src="/images/ace/tech-version/ig.png" alt="" class="medium-margin-before team-ambassador-card-flag team-social"></a>
                                @endif
                                @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.url')))
                                    <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.url')" target="_blank"><img src="/images/ace/tech-version/url.png" alt="" class="medium-margin-before team-ambassador-card-flag team-social"></a>
                                @endif
                                @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.tw')))
                                    <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.tw')" target="_blank"><img src="/images/ace/tech-version/tw.png" alt="" class="medium-margin-before team-ambassador-card-flag team-social"></a>
                                @endif
                                @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.me')))
                                    <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.me')" target="_blank"><img src="/images/ace/tech-version/me.png" alt="" class="medium-margin-before team-ambassador-card-flag team-social"></a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="row" id="hidden_team">
                    @php
                        $team = ['rusakov',  'denisov', 'zanko','derkach'];
                    @endphp

                    @foreach($team as $name)
                        <div class="col-lg-3 col-md-3">
                            <div class="team-ambassador-card team-card">
                                <img src="/upload/images/{{ $name }}.jpg" alt="" class="team-ambassador-card-image">
                                <div class="team-ambassador-job small small-margin-before">@lang('tokenstars-messages.team.members.' . $name . '.title')</div>
                                <div class="bold-font small-margin-before">@lang('tokenstars-messages.team.members.' . $name . '.name')</div>
                                @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.fb')))
                                    <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.fb')" target="_blank"><img src="/images/ace/tech-version/fb.png" alt="" class="medium-margin-before team-ambassador-card-flag team-social"></a>
                                @endif
                                @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.in')))
                                    <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.in')" target="_blank"><img src="/images/ace/tech-version/in.png" alt="" class="medium-margin-before team-ambassador-card-flag team-social"></a>
                                @endif
                                @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.ig')))
                                    <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.ig')" target="_blank"><img src="/images/ace/tech-version/ig.png" alt="" class="medium-margin-before team-ambassador-card-flag team-social"></a>
                                @endif
                                @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.url')))
                                    <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.url')" target="_blank"><img src="/images/ace/tech-version/url.png" alt="" class="medium-margin-before team-ambassador-card-flag team-social"></a>
                                @endif
                                @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.tw')))
                                    <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.tw')" target="_blank"><img src="/images/ace/tech-version/tw.png" alt="" class="medium-margin-before team-ambassador-card-flag team-social"></a>
                                @endif
                                @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.me')))
                                    <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.me')" target="_blank"><img src="/images/ace/tech-version/me.png" alt="" class="medium-margin-before team-ambassador-card-flag team-social"></a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>
    <section class="section team-section">
        <div class="wrap align-center">
            <div class="team-splitter" id="team">
                <h2 class="section-title">@lang('tokenstars-messages.team.roles.team')</h2>
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="team-ambassador-card team-card">
                            <img src="/upload/images/stukolov.jpg" alt="" class="team-ambassador-card-image">
                            <div class="team-ambassador-job small-margin-before">@lang('tokenstars-messages.team.members.stukolov.title')</div>
                            <div class="bold-font small-margin-before">@lang('tokenstars-messages.team.members.stukolov.name')</div>
                            <a href="@lang('tokenstars-messages.team.members.stukolov.social.fb')">
                                <img src="/images/ace/tech-version/fb.png" alt="" class="medium-margin-before team-ambassador-card-flag team-social">
                            </a>
                            <a href="@lang('tokenstars-messages.team.members.stukolov.social.in')">
                                <img src="/images/ace/tech-version/in.png" alt="" class="medium-margin-before team-ambassador-card-flag team-social">
                            </a>
                            <a href="@lang('tokenstars-messages.team.members.stukolov.social.ig')">
                                <img src="/images/ace/tech-version/ig.png" alt="" class="medium-margin-before team-ambassador-card-flag team-social">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="team-ambassador-card team-card">
                            <img src="/upload/images/zak.jpg" alt="" class="team-ambassador-card-image">
                            <div class="team-ambassador-job small-margin-before">@lang('tokenstars-messages.team.members.zak.title')</div>
                            <div class="bold-font small-margin-before">@lang('tokenstars-messages.team.members.zak.name')</div>
                            <a href="@lang('tokenstars-messages.team.members.zak.social.in')">
                                <img src="/images/ace/tech-version/in.png" alt="" class="medium-margin-before team-ambassador-card-flag team-social">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="team-ambassador-card team-card">
                            <img src="/upload/images/krivochurov.jpg" alt="" class="team-ambassador-card-image">
                            <div class="team-ambassador-job small-margin-before">@lang('tokenstars-messages.team.members.krivochurov.title')</div>
                            <div class="bold-font small-margin-before">@lang('tokenstars-messages.team.members.krivochurov.name')</div>
                            <a href="@lang('tokenstars-messages.team.members.krivochurov.social.fb')">
                                <img src="/images/ace/tech-version/fb.png" alt="" class="medium-margin-before team-ambassador-card-flag team-social">
                            </a>
                        </div>
                    </div>
                    @php
                        $team1 = ['mintz'];
                    @endphp


                    <div class="col-lg-3 col-md-3">
                        <div class="team-ambassador-card team-card">
                            <img style="" src="/upload/images/kureev2.png" alt="" class="team-ambassador-card-image">
                            <div class="team-ambassador-job small-margin-before">Project manager</div>
                            <div class="bold-font small-margin-before">Pavel Kureev</div>
                            <!--<a href="@lang('tokenstars-messages.team.members.krivochurov.social.fb')">
                                <img src="/images/ace/tech-version/fb.png" alt="" class="medium-margin-before team-ambassador-card-flag team-social">
                            </a>-->
                        </div>
                    </div>


                    <div style="clear: both"></div>
                    <div class="col-lg-3 col-md-3">
                        <div class="team-ambassador-card team-card">
                            <img style="" src="/upload/images/ulyanov.png" alt="" class="team-ambassador-card-image">
                            <div class="team-ambassador-job small-margin-before">Head of legal</div>
                            <div class="bold-font small-margin-before">Aleksei Ulianov</div>
                        <!--<a href="@lang('tokenstars-messages.team.members.krivochurov.social.fb')">
                                <img src="/images/ace/tech-version/fb.png" alt="" class="medium-margin-before team-ambassador-card-flag team-social">
                            </a>-->
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="team-ambassador-card team-card">
                            <img style="" src="/upload/images/maximov.png" alt="" class="team-ambassador-card-image">
                            <div class="team-ambassador-job small-margin-before">BizDev Analyst</div>
                            <div class="bold-font small-margin-before">Ilya Maksimov</div>
                        <!--<a href="@lang('tokenstars-messages.team.members.krivochurov.social.fb')">
                                <img src="/images/ace/tech-version/fb.png" alt="" class="medium-margin-before team-ambassador-card-flag team-social">
                            </a>-->
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-3">
                        <div class="team-ambassador-card team-card">
                            <img style="" src="/upload/images/mashovsky.png" alt="" class="team-ambassador-card-image">
                            <div class="team-ambassador-job small-margin-before">Head of development </div>
                            <div class="bold-font small-margin-before">Andrey Mashkovskiy</div>
                        <!--<a href="@lang('tokenstars-messages.team.members.krivochurov.social.fb')">
                                <img src="/images/ace/tech-version/fb.png" alt="" class="medium-margin-before team-ambassador-card-flag team-social">
                            </a>-->
                        </div>
                    </div>
                    @foreach($team1 as $name)
                        <div class="col-lg-3 col-md-3">
                            <div class="team-ambassador-card team-card">
                                <img src="/upload/images/{{ $name }}.jpg" alt="" class="team-ambassador-card-image">
                                <div class="team-ambassador-job small-margin-before">@lang('tokenstars-messages.team.members.' . $name . '.title')</div>
                                <div class="bold-font small-margin-before">@lang('tokenstars-messages.team.members.' . $name . '.name')</div>
                                @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.fb')))
                                    <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.fb')" target="_blank"><img src="/images/ace/tech-version/fb.png" alt="" class="medium-margin-before team-ambassador-card-flag team-social"></a>
                                @endif
                                @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.in')))
                                    <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.in')" target="_blank"><img src="/images/ace/tech-version/in.png" alt="" class="medium-margin-before team-ambassador-card-flag team-social"></a>
                                @endif
                                @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.ig')))
                                    <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.ig')" target="_blank"><img src="/images/ace/tech-version/ig.png" alt="" class="medium-margin-before team-ambassador-card-flag team-social"></a>
                                @endif
                                @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.url')))
                                    <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.url')" target="_blank"><img src="/images/ace/tech-version/url.png" alt="" class="medium-margin-before team-ambassador-card-flag team-social"></a>
                                @endif
                                @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.tw')))
                                    <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.tw')" target="_blank"><img src="/images/ace/tech-version/tw.png" alt="" class="medium-margin-before team-ambassador-card-flag team-social"></a>
                                @endif
                                @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.me')))
                                    <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.me')" target="_blank"><img src="/images/ace/tech-version/me.png" alt="" class="medium-margin-before team-ambassador-card-flag team-social"></a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    <section class="section press-section" id="press">
        <div class="wrap press-holder">
            <h2 class="section-title">@lang('tokenstars-messages.press.title')</h2>
            <ul class="lightSliderPress">
                <li>
                    <div class="press-card align-center huge-margin-before big-font-size medium-font">
                        <img src="/images/ace/tech-version/cointelegraph.png" alt="cointelegraph" class="press-logo">
                        @lang('tokenstars-messages.press.text4')</div>
                </li>
                <li>
                    <div class="press-card align-center huge-margin-before big-font-size medium-font">
                        <img src="/images/ace/tech-version/forbes.png" alt="forbes" class="press-logo">
                        @lang('tokenstars-messages.press.text1')</div>
                </li>
                <li>
                    <div class="press-card align-center huge-margin-before big-font-size medium-font">
                        <img src="/images/ace/tech-version/bitcoincom.png" alt="bitcoin.com" class="press-logo">
                        @lang('tokenstars-messages.press.text5')</div>
                </li>
                <li>
                    <div class="press-card align-center huge-margin-before big-font-size medium-font">
                        <img src="/images/ace/tech-version/inc.png" alt="inc" class="press-logo">
                        @lang('tokenstars-messages.press.text6')</div>
                </li>
                <li>
                    <div class="press-card align-center huge-margin-before big-font-size medium-font">
                        <img src="/images/ace/tech-version/huffpost.png" alt="huffpost" class="press-logo">
                        @lang('tokenstars-messages.press.text2')</div>
                </li>
                <li>
                    <div class="press-card align-center huge-margin-before big-font-size medium-font">
                        <img src="/images/ace/tech-version/themerkle.png" alt="huffpost" class="press-logo">
                        @lang('tokenstars-messages.press.text7')</div>
                </li>
            </ul>
            <div class="press-logos-holder align-center">
                @include('tokenstars.partial.press-fresh')
            </div>
        </div>
    </section>

@endsection



    <script type="text/javascript">

        window.prices = {

            team: {
                btc : {{$exchange_rates['team_btc']}},
                eth : {{$exchange_rates['team_eth']}}
            },

            ace :  {
                btc : {{$exchange_rates['ace_btc']}},
                eth : {{$exchange_rates['ace_eth']}}
            }
        };

    </script>

