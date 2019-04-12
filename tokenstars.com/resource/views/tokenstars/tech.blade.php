@extends('tokenstars.layouts.layout')

@php
    $lang = app('translator')->getLocale()
@endphp

@section('content')

        <div class="popup-container j-popup j-video-popup">
            <div class="popup-holder popup-holder-video j-popup-holder">
                <div class="popup-hide-btn j-hide-popup">
                    <img src="/images/ace/tech-version/close-icon.png">
                </div>
                <div class="popup-holder-video-container">
                    <iframe class="j-youtube-video" width="560" height="315" src="https://www.youtube.com/embed/t0ZaxGaUFTQ?enablejsapi=1&version=3" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>

        <div class="popup-container j-popup j-subscribe-popup">
            <div class="popup-holder popup-holder--default j-popup-holder">
                <div class="popup-hide-btn j-hide-popup">
                    <img src="/images/ace/tech-version/close-icon-red.png">
                </div>
                <form class="bold-font j-top-form" target="_blank" onsubmit="ga('send', 'event', 'email-add', 'notify-ok', 'updates');">
                    <input type="email" name="EMAIL" id="mce-EMAIL" class="text-input main-form__input medium-font" placeholder="E-mail">
                    <input type="hidden" name="LANGUAGE" value="{{ $lang }}">
                    <input type="hidden" name="SOURCE" value="ace">
                    <div class="big-margin-before j-top-response"></div>
                    <input type="submit" id="mc-embedded-subscribe" class="btn btn-blue btn-big big-margin-before" value="@lang('tokenstars-team.main_form.subscribe')">
                </form>
            </div>
        </div>
        <section class="section-holder main main--team">
            <div class="wrap">
                <div class="row row-eq-height">
                    <div class="col-lg-6 col-md-12">
                        <div class="bold-font">
                            <!-- <div class="main-left-side"></div> -->
                            <h1 class="main-title main-title--team">THE FIRST TALENT MANAGEMENT PLATFORM ON BLOCKCHAIN</h1>
                            <h2 class="big-font-size medium-font huge-margin-before">ACE by TokenStars connects prospective tennis talents and successful PROs with fans and advertisers.</h2>
                            <a href="https://tokenstars.com/upload/files/ace_by_tokenstars_whitepaper.pdf" target="_blank" class="btn btn-highlight btn-big huge-margin-before" onclick="ga('send', 'event', 'click', 'downloadwp', 'top_team');">@lang('tokenstars-team.main.whitepaper')</a>
                            <br />
                            <span class="j-popup-trigger btn btn-white-border btn-regular big-margin-before" data-target-popup=".j-why-team" onclick="ga('send', 'event', '5reasons', '5reasons', '');">5 reasons to join ACE</span>
                        </div>


                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="main-form bold-font">
                            <div class="">
                                <a target="_blank" onclick="ga('send', 'event', 'listing', 'icorating', 'top');" href="#"><img style="background-color: #2f349f" src="/images/team/reviews/icorating.png" alt="TokenStars TEAM Rating Review" class="main-review-badge"></a>
                                <a target="_blank" onclick="ga('send', 'event', 'listing', 'top_ico_gold', 'top');" href="#"><img style="background-color: #2f349f" src="/images/team/reviews/topicolist.png" alt="TokenStars Gold Level TOP ICO LIST" class="main-review-badge"></a>
                                <a target="_blank" onclick="ga('send', 'event', 'listing', 'ico_bazaar', 'top');" href="#"><img style="background-color: #2f349f" src="/images/team/reviews/icobazar.png" alt="TokenStars AA ICO Bazaar" class="main-review-badge"></a>
                                <a target="_blank" onclick="ga('send', 'event', 'listing', 'ico_bench', 'top');" href="#"><img style="background-color: #2f349f" src="/images/team/reviews/icobench.png" alt="TokenStars ICObench" class="main-review-badge"></a>
                                <a target="_blank" onclick="ga('send', 'event', 'listing', 'track_ico', 'top');" href="#"><img style="background-color: #2f349f" src="/images/team/reviews/trackico.png" alt="TokenStars TrackICO" class="main-review-badge"></a>
                                <a target="_blank" onclick="ga('send', 'event', 'listing', 'ico_ranker', 'top');" href="#"><img style="background-color: #2f349f" src="/images/team/reviews/icoranker.png" alt="TokenStars ICORanker" class="main-review-badge"></a>
                            </div>

                            <div class="big-margin-before main-line--black"></div>
                            <a href="https://tokenstars.com/upload/files/how_to_add_ACE_tokens.pdf" target="_blank" class="btn btn-blue-border btn-small big-margin-before">@lang('tokenstars-team.main_form.how_to')</a>
                            <br />
                            <a href="https://tokenstars.com/signin" class="btn btn-blue btn-big big-margin-before">@lang('tokenstars-team.main_form.kyc')</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<!--
        <a href="https://tokenstars.com/charity" target="_blank" class="section-holder christmas-banner j-christmas-banner">
            <div class="wrap">
                <div class="christmas-close phone-only j-christmas-close">
                    <img src="/images/ace/tech-version/close-icon-red.png">
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="christmas-banner-text">
                            <p class="big-font-size">@lang('tokenstars-messages.christmas.subtitle')</p>
                            <h3 class="big-title-size bold-font">@lang('tokenstars-messages.christmas.title')</h3>
                        </div>
                    </div>
                    <div class="col-lg-6 huge-margin-before">
                        <div class="christmas-banner-images">
                            <img class="" src="/images/christmas/hingis.png"><img class="" src="/images/christmas/matthaus.png"><img class="" src="/images/christmas/redfoo.png"><img class="" src="/images/christmas/datsyuk.png"><img class="" src="/images/christmas/haas.png">
                        </div>
                    </div>
                </div>
            </div>
        </a>
-->
        <section class="section-holder vision" id="vision">
            <div class="wrap">
                <div class="row">
                    <div class="col-lg-6">
                        <h2 class="section-title bold-font">@lang('tokenstars-messages.vision.title')</h2>
                        <p class="big-margin-before">@lang('tokenstars-messages.vision.text')</p>
                    </div>
                </div>
                <div class="vision-grey-banner huge-margin-before">
                    <div class="row  auto-clear">
                        <div class="col-lg-3 col-md-6 huge-margin-before">
                            <p class="team-feature">
                                <img src="/images/ace/tech-version/vision-feature-1.png" alt="" class="team-feature-image">
                                @lang('tokenstars-messages.vision.feature1')
                            </p>
                        </div>
                        <div class="col-lg-3 col-md-6 huge-margin-before">
                            <p class="team-feature">
                                <img src="/images/ace/tech-version/vision-feature-2.png" alt="" class="team-feature-image">
                                @lang('tokenstars-messages.vision.feature2')
                            </p>
                        </div>
                        <div class="col-lg-3 col-md-6 huge-margin-before">
                            <p class="team-feature">
                                <img src="/images/ace/tech-version/vision-feature-3.png" alt="" class="team-feature-image">
                                @lang('tokenstars-messages.vision.feature3')
                            </p>
                        </div>
                        <div class="col-lg-3 col-md-6 huge-margin-before">
                            <p class="team-feature">
                                <img src="/images/ace/tech-version/vision-feature-4.png" alt="" class="team-feature-image">
                                @lang('tokenstars-messages.vision.feature4')
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 huge-margin-before">
                            <p class="team-feature">
                                <img src="/images/ace/tech-version/vision-feature-5.png" alt="" class="team-feature-image">
                                @lang('tokenstars-messages.vision.feature5')
                            </p>
                        </div>
                        <div class="col-lg-3 col-md-6 huge-margin-before">
                            <p class="team-feature">
                                <img src="/images/ace/tech-version/vision-feature-6.png" alt="" class="team-feature-image">
                                @lang('tokenstars-messages.vision.feature6')
                            </p>
                        </div>
                        <div class="col-lg-3 col-md-6 huge-margin-before">
                            <p class="team-feature">
                                <img src="/images/ace/tech-version/vision-feature-7.png" alt="" class="team-feature-image">
                                @lang('tokenstars-messages.vision.feature7')
                            </p>
                        </div>
                        <div class="col-lg-3 col-md-6 huge-margin-before">
                            <p class="team-feature">
                                <img src="/images/ace/tech-version/vision-feature-8.png" alt="" class="team-feature-image">
                                @lang('tokenstars-messages.vision.feature8')
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="popup-container j-popup j-why-team">
            <div class="popup-holder popup-holder--default j-popup-holder">
                <div class="popup-hide-btn j-hide-popup">
                    <img src="/images/ace/tech-version/close-icon-red.png">
                </div>
                <div class="title-size uppercase bold-font">5 REASONS TO JOIN ACE</div>
                <ol>
                    <li class="big-margin-before"><b>Huge audience around sports stars:</b> 15+ top athletes support TokenStars and participate in our project. They bring expertise and attract fan audience to our platform.</li>
                    <li class="big-margin-before"><b>ACE tokens are required</b> to get access and pay for interaction on the platform. TokenStars encourages interaction between stars, advertisers & fans, and provides strong incentives to token holders for participation.</li>
                    <li class="big-margin-before"><b>Large market:</b> TokenStars disrupts a $100 billion industry that’s grown ~4 times over the last 15 years.</li>
                    <li class="big-margin-before"><b>Platform is live:</b> The first module was launched in 2017. The TokenStars platform is built on blockchain to provide transparency and scalability to the highly lucrative celebrity management industry.</li>
                    <li class="big-margin-before"><b>Successful track record:</b> more that 4,000 registered users, professional athletes in advisory board, core platform modules are launched.</li>
            </div>
        </div>
        <section class="section-holder why alt-bg-color" id="why">
            <div class="why-bg"></div>
            <div class="wrap">
                <h2 class="section-title bold-font">@lang('tokenstars-messages.why.title')</h2>
                <div class="row auto-clear">
                    <div class="col-lg-4 col-md-6 huge-margin-before">
                        <h3 class="big-font-size bold-font">@lang('tokenstars-messages.why.feature1.title')</h3>
                        <p class="medium-margin-before">@lang('tokenstars-messages.why.feature1.text')</p>
                    </div>
                    <div class="col-lg-4 col-md-6 huge-margin-before">
                        <h3 class="big-font-size bold-font">@lang('tokenstars-messages.why.feature2.title')</h3>
                        <p class="medium-margin-before">@lang('tokenstars-messages.why.feature2.text')</p>
                    </div>
                    <div class="col-lg-4 col-md-6 huge-margin-before">
                        <h3 class="big-font-size bold-font">@lang('tokenstars-messages.why.feature3.title')</h3>
                        <p class="medium-margin-before">@lang('tokenstars-messages.why.feature3.text')</p>
                    </div>
                    <div class="col-lg-4 col-md-6 huge-margin-before">
                        <h3 class="big-font-size bold-font">@lang('tokenstars-messages.why.feature4.title')</h3>
                        <p class="medium-margin-before">@lang('tokenstars-messages.why.feature4.text')</p>
                    </div>
                    <div class="col-lg-4 col-md-6 huge-margin-before">
                        <h3 class="big-font-size bold-font">@lang('tokenstars-messages.why.feature5.title')</h3>
                        <p class="medium-margin-before">@lang('tokenstars-messages.why.feature5.text')</p>
                    </div>
                    <div class="col-lg-4 col-md-6 huge-margin-before">
                        <h3 class="big-font-size bold-font">@lang('tokenstars-messages.why.feature6.title')</h3>
                        <p class="medium-margin-before">@lang('tokenstars-messages.why.feature6.text')</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-holder smart alt-bg-color">
            <div class="wrap">
                <h2 class="section-title bold-font">@lang('tokenstars-messages.smart.title')</h2>
                <div class="huge-margin-before">
                    <script src="https://gist.github.com/tokenstars/466210371e17688642bc72b1aa1f1ddb.js"></script>
                </div>
                <div class="align-center huge-margin-before">
                    <a href="https://github.com/token-stars/ace-token" target="_blank" class="btn btn-regular btn-highlight" onclick="ga('send', 'event', 'click_github', 'github');">@lang('tokenstars-messages.smart.btn')</a>
                </div>
            </div>
        </section>

        <section class="section-holder alt-bg-color" id="roadmap">
            <div class="wrap">
                <h2 class="section-title bold-font">@lang('tokenstars-messages.roadmap.title')</h2>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="roadmap-holder huge-margin-before">
                            <div class="roadmap-top-row">
                                <div class="roadmap-point">
                                    <div class="bold-font highlight-color">@lang('tokenstars-messages.roadmap.date1.date')</div>
                                    <p class="small-font-size">@lang('tokenstars-messages.roadmap.date1.text')</p>
                                </div><div class="roadmap-point">
                                    <div class="bold-font highlight-color">@lang('tokenstars-messages.roadmap.date2.date')</div>
                                    <p class="small-font-size">@lang('tokenstars-messages.roadmap.date2.text')</p>
                                </div><div class="roadmap-point">
                                    <div class="bold-font highlight-color">@lang('tokenstars-messages.roadmap.date3.date')</div>
                                    <p class="small-font-size">@lang('tokenstars-messages.roadmap.date3.text')</p>
                                </div><div class="roadmap-point">
                                    <div class="bold-font highlight-color">@lang('tokenstars-messages.roadmap.date4.date')</div>
                                    <p class="small-font-size">@lang('tokenstars-messages.roadmap.date4.text')</p>
                                </div>
                            </div>
                            <div class="roadmap-bottom-row">
                                <div class="roadmap-point">
                                    <div class="bold-font highlight-color">@lang('tokenstars-messages.roadmap.date6.date')</div>
                                    <p class="small-font-size">@lang('tokenstars-messages.roadmap.date6.text')</p>
                                </div><div class="roadmap-point">
                                    <div class="bold-font highlight-color">@lang('tokenstars-messages.roadmap.date7.date')</div>
                                    <p class="small-font-size">@lang('tokenstars-messages.roadmap.date7.text')</p>
                                </div><div class="roadmap-point">
                                    <div class="bold-font highlight-color">@lang('tokenstars-messages.roadmap.date8.date')</div>
                                    <p class="small-font-size">@lang('tokenstars-messages.roadmap.date8.text')</p>
                                </div><div class="roadmap-point">
                                    <div class="bold-font highlight-color">@lang('tokenstars-messages.roadmap.date9.date')</div>
                                    <p class="small-font-size">@lang('tokenstars-messages.roadmap.date9.text')</p>
                                </div>
                            </div>
                        </div>
                        <div class="mobile-roadmap-holder huge-margin-before phone-only">
                            <div class="roadmap-top-row">
                                <div class="roadmap-point">
                                    <div class="bold-font highlight-color">@lang('tokenstars-messages.roadmap.date1.date')</div>
                                    <p class="small-font-size">@lang('tokenstars-messages.roadmap.date1.text')</p>
                                </div>
                                <div class="roadmap-point">
                                    <div class="bold-font highlight-color">@lang('tokenstars-messages.roadmap.date2.date')</div>
                                    <p class="small-font-size">@lang('tokenstars-messages.roadmap.date2.text')</p>
                                </div>
                                <div class="roadmap-point">
                                    <div class="bold-font highlight-color">@lang('tokenstars-messages.roadmap.date3.date')</div>
                                    <p class="small-font-size">@lang('tokenstars-messages.roadmap.date3.text')</p>
                                </div>
                                <div class="roadmap-point">
                                    <div class="bold-font highlight-color">@lang('tokenstars-messages.roadmap.date4.date')</div>
                                    <p class="small-font-size">@lang('tokenstars-messages.roadmap.date4.text')</p>
                                </div>
                                <div class="roadmap-point">
                                    <div class="bold-font highlight-color">@lang('tokenstars-messages.roadmap.date5.date')</div>
                                    <p class="small-font-size">@lang('tokenstars-messages.roadmap.date5.text')</p>
                                </div>
                                <div class="roadmap-point">
                                    <div class="bold-font highlight-color">@lang('tokenstars-messages.roadmap.date6.date')</div>
                                    <p class="small-font-size">@lang('tokenstars-messages.roadmap.date6.text')</p>
                                </div>
                                <div class="roadmap-point">
                                    <div class="bold-font highlight-color">@lang('tokenstars-messages.roadmap.date7.date')</div>
                                    <p class="small-font-size">@lang('tokenstars-messages.roadmap.date7.text')</p>
                                </div>
                                <div class="roadmap-point">
                                    <div class="bold-font highlight-color">@lang('tokenstars-messages.roadmap.date8.date')</div>
                                    <p class="small-font-size">@lang('tokenstars-messages.roadmap.date8.text')</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row roadmap-features-holder bold-font huge-margin-before">
                    <div class="col-md-3 roadmap-feature">@lang('tokenstars-messages.roadmap.banner.item1')</div>
                    <div class="col-md-3 roadmap-feature">@lang('tokenstars-messages.roadmap.banner.item2')</div>
                    <div class="col-md-3 roadmap-feature">@lang('tokenstars-messages.roadmap.banner.item3')</div>
                    <div class="col-md-3 roadmap-feature">@lang('tokenstars-messages.roadmap.banner.item4')</div>
                </div>
            </div>
        </section>
        <style>
            .team-section {
                color: #000;
                background: #fafafa;
                position: relative;
            }
            .section {
                padding: 40px 0;
            }
            .align-center {
                text-align: center;
            }
            .wrap {
                max-width: 1200px;
                padding: 0 40px;
                margin: 0 auto;
                position: relative;
            }
            .team-splitter {
                margin-top: 35px;
                padding-top: 30px;
                border-top: 1px solid rgba(40,42,101,.2);
            }
            .team-ambassador-card {
                text-align: center;
                background: #fff;
                margin-top: 25px;
                padding: 10px 20px;
                -webkit-box-shadow: 0 0 5px rgba(0,0,0,.2);
                box-shadow: 0 0 5px rgba(0,0,0,.2);
                position: relative;
                overflow: hidden;
            }
            .team-card {
                background: transparent;
                padding: 0;
                -webkit-box-shadow: none;
                box-shadow: none;
                border: 0;
            }

            .team-card .team-ambassador-card-image {
                border-radius: 120px;
            }
            .team-ambassador-card-image {
                width: 120px;
            }
            .team-ambassador-job.small {
                min-height: 0;
            }
            .team-ambassador-job {
                font-size: 12px;
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-align: end;
                -ms-flex-align: end;
                align-items: flex-end;
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                justify-content: center;
                min-height: 30px;
            }
            .small-margin-before {
                margin-top: 5px;
            }
            .small-margin-before {
                margin-top: 5px;
            }
            .bold-font, b {
                font-weight: 700;
            }

            .team-card:hover {
                margin-right: 0;
                margin-left: 0;
                position: unset;
                z-index: 3;
            }
            .team-social:hover {
                opacity: 1;
            }
            .team-social {
                opacity: .6;
            }
            .team-ambassador-card-flag {
                width: 25px;
            }
            .medium-margin-before {
                margin-top: 10px;
            }
            .team-ambassador-card-info {
                line-height: 1.6;
                text-align: left;
                background: #fff;
                padding: 10px 20px;
                position: absolute;
                top: 100%;
                right: 0;
                bottom: 0;
                left: 0;
                z-index: 5;
                -webkit-transition: all .25s ease-in-out;
                transition: all .25s ease-in-out;
            }
            .team-ambassador-card:hover .team-ambassador-card-info{top:0}
        </style>
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
                                <img src="/upload/images/tsagolov.png" alt="" class="team-ambassador-card-image">
                                <div class="team-ambassador-job small-margin-before">@lang('tokenstars-messages.team.members.tsagolov.title')</div>
                                <div class="bold-font small-margin-before">@lang('tokenstars-messages.team.members.tsagolov.name')</div>
                                <a href="@lang('tokenstars-messages.team.members.tsagolov.social.fb')">
                                    <img src="/images/ace/tech-version/fb.png" alt="" class="medium-margin-before team-ambassador-card-flag team-social">
                                </a>
                                <a href="@lang('tokenstars-messages.team.members.tsagolov.social.in')">
                                    <img src="/images/ace/tech-version/in.png" alt="" class="medium-margin-before team-ambassador-card-flag team-social">
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
                        <div style="clear: both"></div>
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
                        <div style="clear: both"></div>
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
<br>
        <section class="section-holder alt-bg-color" id="ecosystem">
            <div class="wrap">
                <h2 class="section-title bold-font">@lang('tokenstars-messages.ecosystem.title')</h2>
                <div class="row">
                    <div class="col-md-6">
                        <img src="/images/ace/tech-version/scheme-1.png" alt="" class="eco-header-img huge-margin-before">
                    </div>
                    <div class="col-md-6">
                        <p class="big-font-size huge-margin-before">@lang('tokenstars-messages.ecosystem.top_text')</p>
                        <ul class="vision-list big-margin-before medium-font">
                            <li class="vision-list__item">@lang('tokenstars-messages.ecosystem.top_list.line1')</li>
                            <li class="vision-list__item">@lang('tokenstars-messages.ecosystem.top_list.line2')</li>
                            <li class="vision-list__item">@lang('tokenstars-messages.ecosystem.top_list.line3')</li>
                            <li class="vision-list__item">@lang('tokenstars-messages.ecosystem.top_list.line4')</li>
                            <li class="vision-list__item">@lang('tokenstars-messages.ecosystem.top_list.line5')</li>
                        </ul>
                    </div>
                </div>

            </div>
        </section>

        <section class="section-holder" id="press">
            <div class="wrap press-holder">
                <h2 class="section-title bold-font">@lang('tokenstars-messages.press.title')</h2>
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="press-card align-center huge-margin-before big-font-size medium-font">
                            <img src="/images/ace/tech-version/forbes.png" class="press-logo">
                            @lang('tokenstars-messages.press.text1')</div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="press-card align-center huge-margin-before big-font-size medium-font">
                            <img src="/images/ace/tech-version/huffpost.png" class="press-logo">
                            @lang('tokenstars-messages.press.text2')</div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="press-card align-center huge-margin-before big-font-size medium-font">
                            <img src="/images/ace/tech-version/inc.png" class="press-logo">
                            @lang('tokenstars-messages.press.text6')</div>
                    </div>
                </div>
                <div class="press-logos-holder align-center">
                    @include('tokenstars.partial.press')
                </div>
            </div>
        </section>

        <style>
            .module-item {
                min-height: 480;
            }
            .section-subtitle, .section-title {
                font-weight: 700;
                text-transform: uppercase;
                text-align: center;
            }
            .section-title {
                font-size: 32px;
            }
            .module-item {
                min-height: 480;
            }
            .module-item {
                background: #fff;
                min-height: 420px;
                margin-top: 40px;
                padding: 20px;
                border-radius: 5px;
                -webkit-box-shadow: 0 2px 8px rgba(0,0,0,.1);
                box-shadow: 0 2px 8px rgba(0,0,0,.1);
                overflow: hidden;
                position: relative;
            }
            .module-label {
                font-size: 30px;
                color: #27eacf;
                font-weight: 700;
                text-transform: uppercase;
                background: hsla(0,0%,100%,.5);
                border-radius: 0 0 5px 0;
                padding: 10px 20px;
                position: absolute;
                top: 0;
                left: 0;
                z-index: 1;
                -webkit-box-shadow: 0 0 20px rgba(39,234,207,.2);
                box-shadow: 0 0 20px rgba(39,234,207,.2);
                -webkit-animation-name: live;
                animation-name: live;
                -webkit-animation-duration: 1s;
                animation-duration: 1s;
                -webkit-animation-iteration-count: infinite;
                animation-iteration-count: infinite;
                -webkit-animation-timing-function: ease-in;
                animation-timing-function: ease-in;
            }
            .module-item__image {
                width: calc(100% + 40px);
                margin: -20px -20px 0;
            }
            .module-item__image+.module-item__title {
                margin-top: 10px;
            }
            .module-item__title {
                font-size: 24px;
                font-weight: 700;
            }
            .module-item__text {
                margin-top: 5px;
            }
            .module-item__text+a {
                margin-top: 15px;
            }
            .btn-blue {
                color: #fff;
                background: -webkit-gradient(linear,left top,left bottom,from(#3d6bd1),to(#2845b8));
                background: linear-gradient(180deg,#3d6bd1,#2845b8);
            }
            .module-item {
                min-height: 480;
            }
            .module-item--highlights {
                margin: 5px 10px;
                min-height: 555px;
            }
            .module-item {
                background: #fff;
                min-height: 420px;
                margin-top: 40px;
                padding: 20px;
                border-radius: 5px;
                -webkit-box-shadow: 0 2px 8px rgba(0,0,0,.1);
                box-shadow: 0 2px 8px rgba(0,0,0,.1);
                overflow: hidden;
                position: relative;
            }
            .module-item__date {
                color: #737373;
                text-transform: uppercase;
                margin-top: 10px;
            }
            .module-item__title {
                font-size: 24px;
                font-weight: 700;
            }
            .module-item__text {
                margin-top: 5px;
            }
            .module-item__text+a {
                margin-top: 15px;
            }

        </style>

<br/>
        <section class="section highlights-section" id="news">
            <div class="wrap">
                <h2 class="section-title">@lang('fresh.project_news.title')</h2>
                <ul class="lightSliderHighlights">
                    @foreach(trans('fresh.project_news.items') as $item)
                        <li>
                            <div class="module-item module-item--highlights" style="min-height: 550px;">
                                <img class="module-item__image" src="/images/fresh/{{$item['img']}}" />
                                <p class="module-item__date" style="line-height: 1.3em">{{$item['post_date']}}</p>
                                <p class="module-item__title" style="line-height: 1.3em">{{$item['title']}}</p>
                                <p class="module-item__text" style="line-height: 1.3em">{{$item['text']}}</p>
                                <a style="position: fixed; bottom:1px; margin-bottom: 25px;" onclick="ga('send', 'event', 'news', 'post{{$loop->iteration}}', 'main');" href="{{$item['medium_url']}}" class="btn btn-blue btn-regular">@lang('fresh.project_news.button')</a>
                            </div>
                        </li>
                    @endforeach
                </ul>

            </div>
        </section>

        <br><br>
        <section class="section-holder alt-bg-color">
            <div class="wrap">
                <h2 class="section-title bold-font">@lang('tokenstars-messages.downloads.title')</h2>
                <div class="row row-eq-height">
                    <div class="col-lg-4 col-md-6 huge-margin-before">
                        <div class="downloads-box">
                            <img class="downloads-box__image" src="/images/ace/materials-presentation.jpg">
                            <h3 class="bold-font sub-title-size big-margin-before">@lang('tokenstars-messages.downloads.presentation.title')</h3>
                            <div class="downloads-box__bottom-block">
                                <a href="/upload/files/presentation{{ $lang == 'ru' ? '_ru' : '_en' }}.pdf" target="_blank" class="btn btn-regular btn-blue-border btn-long" onclick="ga('send', 'event', 'click', 'dl_projectsum');">@lang('tokenstars-messages.downloads.presentation.btn')</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 huge-margin-before">
                        <div class="downloads-box">
                            <span class="materials-video-link j-popup-trigger j-popup-video-trigger" data-target-popup=".j-video-popup">
                                <img class="downloads-box__image" src="/images/ace/materials-video.jpg">
                            </span>

                            <h3 class="bold-font sub-title-size big-margin-before">@lang('tokenstars-messages.downloads.video.title')</h3>
                            <div class="downloads-box__bottom-block">
                                <span class="btn btn-regular btn-blue-border btn-long j-popup-trigger j-popup-video-trigger" data-target-popup=".j-video-popup" onclick="ga('send', 'event', 'click', 'watch_our_video');">@lang('tokenstars-messages.downloads.video.btn')</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 huge-margin-before">
                        <div class="downloads-box">
                            <img class="downloads-box__image" src="/images/ace/materials-marketing.jpg">
                            <h3 class="bold-font sub-title-size big-margin-before">@lang('tokenstars-messages.downloads.marketing.title')</h3>
                            <div class="downloads-box__bottom-block">
                                <a href="/upload/files/marketing.pdf" target="_blank" class="btn btn-regular btn-blue-border btn-long" onclick="ga('send', 'event', 'click', 'dl_mrkstrat');">@lang('tokenstars-messages.downloads.marketing.btn')</a>
                            </div>
                        </div>
                    </div>
                    <!--<div class="col-lg-3 col-md-6 huge-margin-before">
                        <div class="downloads-box">
                            <img class="downloads-box__image" src="/images/ace/materials-financial.jpg">
                            <h3 class="bold-font sub-title-size big-margin-before">@lang('tokenstars-messages.downloads.financial.title')</h3>
                            <div class="downloads-box__bottom-block">
                                <a href="https://docs.google.com/spreadsheets/d/1Ev4iqlqPu_223CBltd6yy3zn9Ciu4-sWDxDVki8M0iM/edit#gid=2079503814" target="_blank" class="btn btn-regular btn-blue-border btn-long" onclick="ga('send', 'event', 'click', 'dl_finmodel');">@lang('tokenstars-messages.downloads.financial.btn')</a>
                            </div>
                        </div>
                    </div>-->
                </div>
                <div class="bottom-sale-holder huge-margin-before align-center">
                    <div class="row">
                        <div class=".col-xl-6 col-lg-8 col-md-10 offset-lg-2 offset-md-1">
                            <div class="main-form">
                                <h3 class="main-form__title bold-font">Check TEAM token</h3>
                                <p class="sub-font-color big-font-size bold-font small-margin-before">@lang('tokenstars-messages.team_form.subtitle')</p>


                                <div class="big-margin-before main-line--black"></div>

                                <p class="big-font-size medium-font big-margin-before">@lang('tokenstars-messages.team_form.text1')</p>
                                <a href="https://www.tokenstars.com/team" target="_blank"  class="btn btn-blue btn-big big-margin-before">@lang('tokenstars-messages.team_form.learn_more')</a>

                                @if(false)
                                <div class="big-margin-before main-line--black"></div>

                                <p class="big-font-size sub-font-color medium-font big-margin-before">@lang('tokenstars-messages.team_form.text2')</p>
                                <a href="#" class="btn btn-highlight btn-regular big-margin-before">@lang('tokenstars-messages.team_form.get_updates')</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @if($lang == 'zh')
        <section class="section-holder qr-section align-center">
            <div class="wrap">
                <h2 class="section-title bold-font">TokenStars 粉丝组</h2>
                <div class="huge-margin-before">
                    <div class="row">
                        <div class="col-lg-4 offset-lg-4">
                            <img class="qr__image" src="/images/ace/qr-zh-3.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
@endsection
