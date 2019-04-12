@extends('tokenstars.layouts.layout-team')

@php
    $lang = app('translator')->getLocale()
@endphp

@section('content')
        <div class="popup-container j-popup j-subscribe-popup">
            <div class="popup-holder popup-holder--default j-popup-holder">
                <div class="popup-hide-btn j-hide-popup">
                    <img src="/images/ace/tech-version/close-icon-red.png">
                </div>
                <form class="bold-font j-top-form" target="_blank" onsubmit="ga('send', 'event', 'email-add', 'notify-ok', 'menu');">
                    <input type="email" name="EMAIL" id="mce-EMAIL" class="text-input main-form__input medium-font" placeholder="E-mail">
                    <input type="hidden" name="LANGUAGE" value="{{ $lang }}">
                    <input type="hidden" name="SOURCE" value="">
                    <div class="big-margin-before j-top-response"></div>
                    <input type="submit" id="mc-embedded-subscribe" class="btn btn-blue btn-big big-margin-before" value="@lang('tokenstars-team.main_form.subscribe')">
                </form>
            </div>
        </div>

        <div class="popup-container j-popup j-bonus-popup">
            <div class="popup-holder popup-holder--default j-popup-holder">
                <div class="popup-hide-btn j-hide-popup">
                    <img src="/images/ace/tech-version/close-icon-red.png">
                </div>
                <div class="j-bonus-form">
                <h3 class="bonus-popup-title bold-font">@lang('tokenstars-team.crowdsale.title')</h3>
                <p class="big-font-size big-margin-before">@lang('tokenstars-team.crowdsale.subtitle')</p>

                <form class="bold-font big-margin-before j-bonus-form" target="_blank">
                    <input type="hidden" name="LANGUAGE" value="{{ $lang }}">
                    <input type="hidden" name="SOURCE" value="">

                    <div class="row">
                        <div class="col-lg-12 big-margin-before">
                            <p class="big-font-size sub-font-color medium-font">E-mail</p>
                            <input type="email" name="EMAIL" id="mce-EMAIL" class="text-input main-form__input small-margin-before medium-font" placeholder="">
                        </div>
                    </div>

                    <div class="row">
                        <!-- <div class="col-lg-6 big-margin-before">
                            <p class="big-font-size sub-font-color medium-font medium-margin-before">I will pay in</p>
                            <input type="radio" class="radio-input" name="coin" id="bonus-btc" checked value="BTC">
                            <label for="bonus-btc" class="big-margin-before">BTC</label>
                            <input type="radio" class="radio-input" name="coin" id="bonus-eth" value="ETH">
                            <label for="bonus-eth" class="big-margin-before">ETH</label>
                        </div> -->
                        <div class="col-lg-12 big-margin-before">
                            <p class="big-font-size sub-font-color medium-font medium-margin-before">@lang('tokenstars-team.crowdsale.range')</p>
                            <select class="select-input small-margin-before" name="range">
                                <option value="1">0.01BTC - 0.1BTC</option>
                                <option value="2">0.1BTC - 0.5BTC</option>
                                <option value="3">0.5BTC - 1 BTC </option>
                                <option value="4">1 BTC - 3 BTC (amount bonus 5%)</option>
                                <option value="5">3 BTC - 5 BTC (amount bonus 10%)</option>
                                <option value="6">5 BTC+  (amount bonus 20%)</option>
                            </select>
                        </div>
                    </div>
                    <div class="big-margin-before j-top-response"></div>
                    <div class="row huge-margin-before">
                        <div class="col-lg-6 offset-lg-3 big-margin-before">
                            <input type="submit" id="mc-embedded-subscribe" class="btn btn-blue btn-big btn-long" value="@lang('tokenstars-team.crowdsale.btn')">
                        </div>
                    </div>
                </form>
                </div>
                <div class="align-center hide j-bonus-response">
                    <p class="title-size bold-font">@lang('tokenstars-team.crowdsale.response_title')</p>
                    <p class="big-font-size huge-margin-before">@lang('tokenstars-team.crowdsale.response_text')</p>
                </div>
            </div>
        </div>

        <div class="popup-container j-popup j-stay-popup">
            <div class="popup-holder popup-holder--default j-popup-holder">
                <div class="popup-hide-btn j-hide-popup">
                    <img src="/images/ace/tech-version/close-icon-red.png">
                </div>
                <h3 class="bonus-popup-title bold-font">@lang('tokenstars-team.stay_popup.title')</h3>
                <p class="big-font-size big-margin-before">@lang('tokenstars-team.stay_popup.subtitle')</p>

                <form class="bold-font huge-margin-before j-top-form" target="_blank" onsubmit="">
                    <input type="hidden" name="LANGUAGE" value="{{ $lang }}">
                    <input type="hidden" name="SOURCE" value="">

                    <p class="big-font-size sub-font-color medium-font">E-mail</p>
                    <input type="email" name="EMAIL" id="mce-EMAIL" class="text-input main-form__input small-margin-before medium-font" placeholder="">

                    <div class="big-margin-before j-top-response"></div>
                        <div class="row huge-margin-before">
                            <div class="col-lg-6 big-margin-before">
                                <input type="submit" id="mc-embedded-subscribe" class="btn btn-blue btn-big btn-long" value="@lang('tokenstars-team.main_form.subscribe')">
                            </div>
                        </div>
                </form>
            </div>
        </div>

        <div class="popup-container j-popup j-why-team">
            <div class="popup-holder popup-holder--default j-popup-holder">
                <div class="popup-hide-btn j-hide-popup">
                    <img src="/images/ace/tech-version/close-icon-red.png">
                </div>
                <div class="title-size uppercase bold-font">5 REASONS TO JOIN TEAM</div>
                <ol>
                    <li class="big-margin-before"><b>Huge audience around sports stars:</b> 15+ top athletes support TokenStars and participate in our project. They bring expertise and attract fan audience to our platform.</li>
                    <li class="big-margin-before"><b>TEAM tokens are required:</b> to get access and pay for interaction on the platform. TokenStars encourages interaction between stars, advertisers & fans, and provides strong incentives to token holders for participation.</li>
                    <li class="big-margin-before"><b>Large market:</b> TokenStars disrupts a $100 billion industry that’s grown ~4 times over the last 15 years.</li>
                    <li class="big-margin-before"><b>Platform is live:</b> The first module was launched in 2017. The TokenStars platform is built on blockchain to provide transparency and scalability to the highly lucrative celebrity management industry.</li>
                    <li class="big-margin-before"><b>Successful track record:</b> more that 4,000 registered users, professional athletes in advisory board, core platform modules are launched.</li>
            </div>
        </div>
<!--
        <div class="chat-float-holder">
            <div class="bold-font">@lang('tokenstars-messages.float_chat.chat_float_name')</div>
            <div class="sub-font-color">@lang('tokenstars-messages.float_chat.chat_float_title')</div>
            <div class="small-margin-before">
                <div class="chat-float-photo" style="background-image: url('/upload/images/stukolov.jpg')"></div>
                <a href="https://t.me/TokenStars_en" target="_blank" class="btn btn-regular btn-blue" onclick="ga('send', 'event', 'click', 'telegram', 'float');"><img src="/images/ace/tech-version/telegram-white.png" alt="" class="chat-float-icon"> @lang('tokenstars-messages.float_chat.chat_float_button')</a>
            </div>
        </div>
-->
        <section class="section-holder main main--team">
            <div class="wrap">
                <div class="row row-eq-height">
                    <div class="col-lg-6 col-md-12">
                        <div class="bold-font">
                            <!-- <div class="main-left-side"></div> -->
                            <h1 class="main-title main-title--team">THE FIRST TALENT MANAGEMENT PLATFORM ON BLOCKCHAIN</h1>
                            <h2 class="big-font-size medium-font huge-margin-before">TEAM by TokenStars connects rising talents and successful PROs in sports and entertainment with fans and advertisers.</h2>
                            <a href="https://tokenstars.com/upload/files/team_whitepaper.pdf" target="_blank" class="btn btn-highlight btn-big huge-margin-before" onclick="ga('send', 'event', 'click', 'downloadwp', 'top_team');">@lang('tokenstars-team.main.whitepaper')</a>
                            <br />
                            <span class="j-popup-trigger btn btn-white-border btn-regular big-margin-before" data-target-popup=".j-why-team" onclick="ga('send', 'event', '5reasons', '5reasons', '');">5 reasons to join TEAM</span>
                        </div>


                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="main-form bold-font">
                            <div class="">
                                <a target="_blank" onclick="ga('send', 'event', 'listing', 'icorating', 'top');" href="https://icorating.com/ico/tokenstars-team/"><img style="background-color: #2f349f" src="/images/team/reviews/icorating.png" alt="TokenStars TEAM Rating Review" class="main-review-badge"></a>
                                <a target="_blank" onclick="ga('send', 'event', 'listing', 'top_ico_gold', 'top');" href="https://topicolist.com/ico/tokenstars-team "><img style="background-color: #2f349f" src="/images/team/reviews/topicolist.png" alt="TokenStars Gold Level TOP ICO LIST" class="main-review-badge"></a>
                                <a target="_blank" onclick="ga('send', 'event', 'listing', 'ico_bazaar', 'top');" href="https://icobazaar.com/v2/tokenstars_team"><img style="background-color: #2f349f" src="/images/team/reviews/icobazar.png" alt="TokenStars AA ICO Bazaar" class="main-review-badge"></a>
                                <a target="_blank" onclick="ga('send', 'event', 'listing', 'ico_bench', 'top');" href="https://icobench.com/ico/tokenstars-team"><img style="background-color: #2f349f" src="/images/team/reviews/icobench.png" alt="TokenStars ICObench" class="main-review-badge"></a>
                                <a target="_blank" onclick="ga('send', 'event', 'listing', 'track_ico', 'top');" href="https://www.trackico.io/ico/tokenstars-team/#rating"><img style="background-color: #2f349f" src="/images/team/reviews/trackico.png" alt="TokenStars TrackICO" class="main-review-badge"></a>
                                <a target="_blank" onclick="ga('send', 'event', 'listing', 'ico_ranker', 'top');" href="https://www.icoranker.com/ico/tokenstars-team/"><img style="background-color: #2f349f" src="/images/team/reviews/icoranker.png" alt="TokenStars ICORanker" class="main-review-badge"></a>
                            </div>

                            <div class="big-margin-before main-line--black"></div>
                            <a href="https://tokenstars.com/upload/files/how_to_add_TEAM_tokens.pdf" target="_blank" class="btn btn-blue-border btn-small big-margin-before">@lang('tokenstars-team.main_form.how_to')</a>
                            <br />
                            <a href="https://tokenstars.com/signin" class="btn btn-blue btn-big big-margin-before">@lang('tokenstars-team.main_form.kyc')</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="banner-bg desktop-only">
            <div class="wrap">
                <div class="row roadmap-features-holder bold-font">
                    <div class="col-md-3 roadmap-feature">@lang('tokenstars-messages.roadmap.banner.item1')</div>
                    <div class="col-md-3 roadmap-feature">@lang('tokenstars-messages.roadmap.banner.item5')</div>
                    <div class="col-md-3 roadmap-feature">@lang('tokenstars-messages.roadmap.banner.item3')</div>
                    <div class="col-md-3 roadmap-feature">@lang('tokenstars-messages.roadmap.banner.item6')</div>
                </div>
            </div>
        </section>



        <!--<section class="section-holder alt-bg-color" id="rico">
            <div class="wrap">
                <h2 class="section-title section-title--labeled bold-font">@lang('tokenstars-team.rico.title')</h2>
                <div class="sub-section-title bold-font medium-margin-before">@lang('tokenstars-team.rico.subtitle')</div>
                <ul class="lightSlider">
                    <li>
                        <img src="/images/team/rico/west.jpg" alt="Kaney West by Rico Torres" class="rico-images huge-margin-before">
                    </li>
                    <li>
                        <img src="/images/team/rico/usher.jpg" alt="Usher by Rico Torres" class="rico-images huge-margin-before">
                    </li>
                    <li>
                        <img src="/images/team/rico/sincity.jpg" alt="Sin City by Rico Torres" class="rico-images huge-margin-before">
                    </li>
                    <li>
                        <img src="/images/team/rico/brody.jpg" alt="Adrien Brody by Rico Torres" class="rico-images huge-margin-before">
                    </li>
                    <li>
                        <img src="/images/team/rico/gaga.jpg" alt="Lady Gaga by Rico Torres" class="rico-images huge-margin-before">
                    </li>
                    <li>
                        <img src="/images/team/rico/bryant.jpg" alt="Kobe Bryant by Rico Torres" class="rico-images huge-margin-before">
                    </li>
                    <li>
                        <img src="/images/team/rico/alba.jpg" alt="Lady Gaga by Jessica Alba Torres" class="rico-images huge-margin-before">
                    </li>
                    <li>
                        <img src="/images/team/rico/jagger.jpg" alt="Mick Jagger by Rico Torres" class="rico-images huge-margin-before">
                    </li>
                    <li>
                        <img src="/images/team/rico/garcia.jpg" alt="Andy Garcia by Rico Torres" class="rico-images huge-margin-before">
                    </li>
                </ul>
            </div>
        </section>-->

        <section class="section-holder alt-bg-color platform" id="platform">
            <div class="wrap">
                <div class="platform-holder">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="platform-star-holder">
                                <img class="platform-star" src="/images/team/star.png">
                                <h2 class="section-title bold-font">@lang('tokenstars-team.platform.title')</h2>
                                <p class="sub-title-size sub-font-color">@lang('tokenstars-team.platform.subtitle')</p>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="platform-tokens-block huge-margin-before">
                                <div class="platform-token j-platform-token" data-type="ace">
                                    <b>ACE</b> <br />@lang('tokenstars-team.platform.token')
                                </div>
                                <div class="platform-token j-platform-token" data-type="team">
                                    <b>TEAM</b> <br />@lang('tokenstars-team.platform.token')
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="platform-tabs-holder huge-margin-before">
                        <li><span class="selected j-platform-tab">@lang('tokenstars-team.platform.tabs.tab1')</span></li>
                        <li><span class="j-platform-tab">@lang('tokenstars-team.platform.tabs.tab2')</span></li>
                        <li><span class="j-platform-tab">@lang('tokenstars-team.platform.tabs.tab3')</span></li>
                        <li><span class="j-platform-tab">@lang('tokenstars-team.platform.tabs.tab4')</span></li>

                    </ul>
                    <div class="platform-items-holder huge-margin-before">
                        <p class="platform-items-row-label bold-font big-margin-before">@lang('tokenstars-team.platform.section1')</p>
                        <div class="platform-items-row clearfix">
                            <a href="#module-1" class="platform-item platform-item--crowd j-platform-item">@lang('tokenstars-team.platform.items.item1')</a>
                            <a href="#module-2" class="platform-item platform-item--time j-platform-item" style="height: 78px;"></a>
                            <a href="#module-3" class="platform-item platform-item--income j-platform-item" style="height: 78px;"></a>
                        </div>
                        <p class="platform-items-row-label bold-font big-margin-before">@lang('tokenstars-team.platform.section2')</p>
                        <div class="platform-items-row clearfix">
                            <a href="#module-8" class="platform-item platform-item--search highlighted j-platform-item">@lang('tokenstars-team.platform.items.item4')</a>
                            <a href="#module-10" class="platform-item platform-item--vote highlighted j-platform-item">@lang('tokenstars-team.platform.items.item5')</a>
                            <a href="#module-11" class="platform-item platform-item--bet highlighted j-platform-item" style="height: 78px;">@lang('tokenstars-team.platform.items.item6')</a>
                        </div>
                        <p class="platform-items-row-label bold-font big-margin-before">@lang('tokenstars-team.platform.section3')</p>
                        <div class="platform-items-row clearfix">
                            <a href="#module-7" class="platform-item platform-item--check highlighted j-platform-item">@lang('tokenstars-team.platform.items.item7')</a>
                            <a href="#module-4" class="platform-item platform-item--video j-platform-item">@lang('tokenstars-team.platform.items.item8')</a>
                            <a href="#module-6" class="platform-item platform-item--cup highlighted j-platform-item">@lang('tokenstars-team.platform.items.item9')</a>
                        </div>
                        <p class="platform-items-row-label bold-font big-margin-before">@lang('tokenstars-team.platform.section4')</p>
                        <div class="platform-items-row clearfix">
                            <a href="#module-5" class="platform-item platform-item--percent j-platform-item">@lang('tokenstars-team.platform.items.item10')</a>
                            <a href="#module-9" class="platform-item platform-item--promotion highlighted j-platform-item">@lang('tokenstars-team.platform.items.item11')</a>
                            <a href="#module-12" class="platform-item platform-item--merch j-platform-item">@lang('tokenstars-team.platform.items.item12')</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <section class="section-holder alt-bg-color platform-description-toggle">
            <div class="wrap align-center">
                <span class="btn btn-highlight btn-big j-platfrom-full-description-toggle" onclick="ga('send', 'event', 'plt_dsc', 'details', '');">@lang('tokenstars-team.platform.show_btn')</span>
            </div>
        </section>

        <!-- Token and platform descriptions -->
        <div class="hide platform-description-holder">


            <section class="module-section section-holder alt-bg-color big-margin-before" id="modules">
                <div class="module-scroll-holder j-modules-scroll">
                    <img src="/images/team/scroll-arrow.png" > @lang('tokenstars-team.modules.scroll')
                </div>
                <div class="wrap">
                    <div class="row module-1" id="module-1">
                        <div class="col-md-6">
                            <h2 class="section-title bold-font">Talent Support Module</h2>
                            <p class="big-margin-before">Fans support future stars by buying tokens. A rising star receives money to train, improve the skills. When successful, the star pays the platform commission from the sponsorship deals and prize money. Commission is paid in tokens, which are bought on the market.</p>
                            <p class="medium-margin-before">During the growth period (which is 4 years in tennis, 0 in poker) the fans can redeem tokens for various services, provided by the rising stars.</p>
                            <p class="huge-margin-before  highlight-color big-font-size bold-font">Fans support 14-year old ‘Maria Sharapova’, she wins Wimbledon at 17. The platform receives 30% commission, paid in tokens.</p>
                        </div>
                        <div class="col-md-6 align-center">
                            <img src="/images/team/modules/1.png" alt="TokenStars Team Module" class="module-image">
                        </div>
                    </div>
                    <div class="row module-block huge-margin-before module-8"  id="module-8">
                        <div class="col-md-6 align-center">
                            <img src="/images/team/modules/8.png" alt="TokenStars Team Module" class="module-image">
                        </div>
                        <div class="col-md-6">
                            <h2 class="section-title bold-font">@lang('tokenstars-team.modules.module_8.name')</h2>
                            <p class="big-margin-before">@lang('tokenstars-team.modules.module_8.text1')</p>
                            <p class="huge-margin-before  highlight-color big-font-size bold-font">@lang('tokenstars-team.modules.module_8.info')</p>
                        </div>
                    </div>


                    <div class="row module-block huge-margin-before module-10" id="module-10">
                        <div class="col-md-6">
                            <h2 class="section-title bold-font">@lang('tokenstars-team.modules.module_10.name')</h2>
                            <p class="big-margin-before">@lang('tokenstars-team.modules.module_10.text1')</p>
                            <p class="medium-margin-before">@lang('tokenstars-team.modules.module_10.text2')</p>
                            <p class="huge-margin-before  highlight-color big-font-size bold-font">@lang('tokenstars-team.modules.module_10.info')</p>
                        </div>
                        <div class="col-md-6 align-center">
                            <img src="/images/team/modules/10.png" alt="TokenStars Team Module" class="module-image">
                        </div>
                    </div>
                    <div class="row module-block huge-margin-before module-11" id="module-11">
                        <div class="col-md-6 align-center">
                            <img src="/images/team/modules/11.png" alt="TokenStars Team Module" class="module-image">
                        </div>
                        <div class="col-md-6">
                            <h2 class="section-title bold-font">@lang('tokenstars-team.modules.module_11.name') Module</h2>
                            <p class="big-margin-before">@lang('tokenstars-team.modules.module_11.text1')</p>
                            <p class="medium-margin-before">@lang('tokenstars-team.modules.module_11.text2')</p>
                            <p class="huge-margin-before  highlight-color big-font-size bold-font">@lang('tokenstars-team.modules.module_11.info')</p>
                        </div>
                    </div>


                    <div class="row module-block huge-margin-before module-7" id="module-7">
                        <div class="col-md-6">
                            <h2 class="section-title bold-font">@lang('tokenstars-team.modules.module_7.name')</h2>
                            <p class="big-margin-before">@lang('tokenstars-team.modules.module_7.text1')</p>
                            <p class="huge-margin-before  highlight-color big-font-size bold-font">@lang('tokenstars-team.modules.module_7.info')</p>
                        </div>
                        <div class="col-md-6 align-center">
                            <img src="/images/team/modules/@lang('tokenstars-team.modules.module_7.image')" alt="TokenStars Team Module" class="module-image">
                        </div>
                    </div>
                    <div class="row module-block huge-margin-before module-4" id="module-4">
                        <div class="col-md-6 align-center">
                            <img src="/images/team/modules/4.png" alt="TokenStars Team Module" class="module-image">
                        </div>
                        <div class="col-md-6">
                            <h2 class="section-title bold-font">@lang('tokenstars-team.modules.module_4.name')</h2>
                            <p class="big-margin-before">@lang('tokenstars-team.modules.module_4.text1')</p>
                            <p class="huge-margin-before  highlight-color big-font-size bold-font">@lang('tokenstars-team.modules.module_4.info')</p>
                        </div>
                    </div>
                    <div class="row module-block huge-margin-before module-6" id="module-6">
                        <div class="col-md-6">
                            <h2 class="section-title bold-font">@lang('tokenstars-team.modules.module_6.name')</h2>
                            <p class="big-margin-before">@lang('tokenstars-team.modules.module_6.text1')</p>
                            <p class="huge-margin-before  highlight-color big-font-size bold-font">@lang('tokenstars-team.modules.module_6.info')</p>
                        </div>
                        <div class="col-md-6 align-center">
                            <img src="/images/team/modules/@lang('tokenstars-team.modules.module_6.image')" alt="TokenStars Team Module" class="module-image">
                        </div>
                    </div>
                    <div class="row module-block huge-margin-before module-5" id="module-5">
                        <div class="col-md-6 align-center">
                            <img src="/images/team/modules/@lang('tokenstars-team.modules.module_5.image')" alt="TokenStars Team Module" class="module-image">
                        </div>
                        <div class="col-md-6">
                            <h2 class="section-title bold-font">@lang('tokenstars-team.modules.module_5.name')</h2>
                            <p class="big-margin-before">@lang('tokenstars-team.modules.module_5.text1')</p>
                            <ul class="medium-margin-before vision-list">
                                <li>@lang('tokenstars-team.modules.module_5.list.item1')</li>
                                <li>@lang('tokenstars-team.modules.module_5.list.item2')</li>
                                <li>@lang('tokenstars-team.modules.module_5.list.item3')</li>
                            </ul>
                            <p class="huge-margin-before  highlight-color big-font-size bold-font">@lang('tokenstars-team.modules.module_5.info')</p>
                        </div>
                    </div>
                    <div class="row module-block huge-margin-before module-9" id="module-9">
                        <div class="col-md-6">
                            <h2 class="section-title bold-font">@lang('tokenstars-team.modules.module_9.name')</h2>
                            <p class="big-margin-before">@lang('tokenstars-team.modules.module_9.text1')</p>
                            <p class="huge-margin-before  highlight-color big-font-size bold-font">@lang('tokenstars-team.modules.module_9.info')</p>
                        </div>
                        <div class="col-md-6 align-center">
                            <img src="/images/team/modules/@lang('tokenstars-team.modules.module_9.image')" alt="TokenStars Team Module" class="module-image">
                        </div>
                    </div>
                    <div class="row module-block huge-margin-before module-12" id="module-12">
                        <div class="col-md-6 align-center">
                            <img src="/images/team/modules/12.png" alt="TokenStars Team Module" class="module-image">
                        </div>
                        <div class="col-md-6">
                            <h2 class="section-title bold-font">@lang('tokenstars-team.modules.module_12.name')</h2>
                            <p class="big-margin-before">@lang('tokenstars-team.modules.module_12.text1')</p>
                            <p class="huge-margin-before  highlight-color big-font-size bold-font">@lang('tokenstars-team.modules.module_12.info')</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>



        <section class="section-holder smart-team alt-bg-color">
            <div class="wrap">
                <h2 class="section-title bold-font align-center">@lang('tokenstars-messages.smart.title')</h2>
                <div class="huge-margin-before">
                    <script src="https://gist.github.com/anonymous/c9e41f62c49266ba1724c471021f5200.js"></script>
                </div>
                <div class="align-center huge-margin-before">
                    <a href="https://github.com/tokenstars/team-token" target="_blank" class="btn btn-regular btn-highlight" onclick="ga('send', 'event', 'click_github', 'github');">@lang('tokenstars-messages.smart.btn')</a>
                </div>
            </div>
        </section>



        <section class="section-holder team-holder" id="team">
            <div class="wrap">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="section-title bold-font">@lang('tokenstars-messages.team.title')</h2>
                        <p class="big-margin-before">@lang('tokenstars-messages.team.text')</p>
                    </div>
                    <div class="col-md-6">
                        <img src="/images/ace/tech-version/team-logos.jpg" alt="" class="team-logos">
                    </div>
                </div>
                <div class="row huge-margin-before">
                    <div class="col-md-4 small-margin-before">
                        <div class="team-feature">
                            <img src="/images/ace/tech-version/team-feature-1.png" alt="" class="team-feature-image">
                            @lang('tokenstars-messages.team.features.feature1')
                        </div>
                    </div>
                    <div class="col-md-4 small-margin-before">
                        <div class="team-feature">
                            <img src="/images/ace/tech-version/team-feature-2.png" alt="" class="team-feature-image">
                            @lang('tokenstars-messages.team.features.feature2')
                        </div>
                    </div>
                    <div class="col-md-4 small-margin-before">
                        <div class="team-feature">
                            <img src="/images/ace/tech-version/team-feature-3.png" alt="" class="team-feature-image">
                            @lang('tokenstars-messages.team.features.feature3')
                        </div>
                    </div>

                <!--<div class="row team-holder team-mob-limit team-holder--light closed j-team-mob huge-margin-before">
                    <h3 class="col-lg-12 sub-section-title bold-font huge-margin-before">@lang('tokenstars-messages.team.roles.blockchain_n_business')</h3>
                    @php
                        $team2 = ['kampers', "kaal", "danilov", "sato", 'chabanenko', 'kuznetsov', 'zanko', 'krivochurov'];
                    @endphp
                    @foreach($team2 as $name)
                    <div class="col-md-4 col-lg-4 col-xl-3 team-item-mob">
                        <div class="team-card">
                            <div class="team-photo-holder" style="background-image: url('/upload/images/{{ $name }}.jpg')"></div>
                            @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.fb')))
                                <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.fb')" target="_blank"><img src="/images/ace/tech-version/fb.png" alt="" class="team-social-link"></a>
                            @endif
                            @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.in')))
                                <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.in')" target="_blank"><img src="/images/ace/tech-version/in.png" alt="" class="team-social-link"></a>
                            @endif
                            @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.ig')))
                                <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.ig')" target="_blank"><img src="/images/ace/tech-version/ig.png" alt="" class="team-social-link"></a>
                            @endif
                            @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.url')))
                                <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.url')" target="_blank"><img src="/images/ace/tech-version/url.png" alt="" class="team-social-link"></a>
                            @endif
                            @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.tw')))
                                <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.tw')" target="_blank"><img src="/images/ace/tech-version/tw.png" alt="" class="team-social-link"></a>
                            @endif
                            @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.me')))
                                <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.me')" target="_blank"><img src="/images/ace/tech-version/me.png" alt="" class="team-social-link"></a>
                            @endif
                            <div class="medium-font">@lang('tokenstars-messages.team.members.' . $name . '.name')&nbsp;</div>
                            <div class="small-font-size sub-font-color">@lang('tokenstars-messages.team.members.' . $name . '.title')&nbsp;</div>
                            <div class="team-description super-small-font-size">@lang('tokenstars-messages.team.members.' . $name . '.text')</div>
                        </div>
                    </div>
                    @endforeach
                    <div class="medium-margin-before align-center">
                        <a href="" class="btn btn-small btn-blue-border team-mob-show-btn j-mob-show-team">@lang('tokenstars-messages.team.mob_btn')</a>
                    </div>
                </div>
                <div class="row team-mob-limit closed medium-margin-before j-team-mob">
                    <h3 class="col-lg-12 sub-section-title bold-font huge-margin-before">@lang('tokenstars-messages.team.roles.team')</h3>
                    @php
                        $team1 = ['stukolov', 'zak', 'krivochurov', 'mintz', 'shashkina'];
                    @endphp
                    @foreach($team1 as $name)
                    <div class="col-md-4 col-lg-4 col-xl-3 team-item-mob">
                        <div class="team-card">
                            <div class="team-photo-holder" style="background-image: url('/upload/images/{{ $name }}.jpg')"></div>
                            @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.fb')))
                                <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.fb')" target="_blank"><img src="/images/ace/tech-version/fb.png" alt="" class="team-social-link"></a>
                            @endif
                            @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.in')))
                                <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.in')" target="_blank"><img src="/images/ace/tech-version/in.png" alt="" class="team-social-link"></a>
                            @endif
                            @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.ig')))
                                <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.ig')" target="_blank"><img src="/images/ace/tech-version/ig.png" alt="" class="team-social-link"></a>
                            @endif
                            @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.url')))
                                <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.url')" target="_blank"><img src="/images/ace/tech-version/url.png" alt="" class="team-social-link"></a>
                            @endif
                            @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.tw')))
                                <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.tw')" target="_blank"><img src="/images/ace/tech-version/tw.png" alt="" class="team-social-link"></a>
                            @endif
                            @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.me')))
                                <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.me')" target="_blank"><img src="/images/ace/tech-version/me.png" alt="" class="team-social-link"></a>
                            @endif
                            <div class="medium-font">@lang('tokenstars-messages.team.members.' . $name . '.name')&nbsp;</div>
                            <div class="small-font-size sub-font-color">@lang('tokenstars-messages.team.members.' . $name . '.title')&nbsp;</div>
                            <div class="team-description super-small-font-size">@lang('tokenstars-messages.team.members.' . $name . '.text')</div>
                        </div>
                    </div>
                    @endforeach
                    <div class="medium-margin-before align-center">
                        <a href="" class="btn btn-small btn-blue-border team-mob-show-btn j-mob-show-team">@lang('tokenstars-messages.team.mob_btn')</a>
                    </div>
                </div>

                <div class="row team-mob-limit closed j-team-mob">
                    <h3 class="col-lg-12 sub-section-title bold-font huge-margin-before">@lang('tokenstars-messages.team.roles.investors')</h3>
                    @php
                        $team3 = ['masolova', 'shpakovsky', 'tokenfund', 'rusakov', 'nomadic'];
                    @endphp
                    @foreach($team3 as $name)
                    <div class="col-md-4 col-lg-4 col-xl-3 team-item-mob">
                        <div class="team-card">
                            <div class="team-photo-holder" style="background-image: url('/upload/images/{{ $name }}.jpg')"></div>
                            @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.fb')))
                                <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.fb')" target="_blank"><img src="/images/ace/tech-version/fb.png" alt="" class="team-social-link"></a>
                            @endif
                            @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.in')))
                                <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.in')" target="_blank"><img src="/images/ace/tech-version/in.png" alt="" class="team-social-link"></a>
                            @endif
                            @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.ig')))
                                <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.ig')" target="_blank"><img src="/images/ace/tech-version/ig.png" alt="" class="team-social-link"></a>
                            @endif
                            @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.url')))
                                <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.url')" target="_blank"><img src="/images/ace/tech-version/url.png" alt="" class="team-social-link"></a>
                            @endif
                            @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.tw')))
                                <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.tw')" target="_blank"><img src="/images/ace/tech-version/tw.png" alt="" class="team-social-link"></a>
                            @endif
                            @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.me')))
                                <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.me')" target="_blank"><img src="/images/ace/tech-version/me.png" alt="" class="team-social-link"></a>
                            @endif
                            <div class="medium-font">@lang('tokenstars-messages.team.members.' . $name . '.name')&nbsp;</div>
                            <div class="small-font-size sub-font-color">@lang('tokenstars-messages.team.members.' . $name . '.title')&nbsp;</div>
                            <div class="team-description super-small-font-size">@lang('tokenstars-messages.team.members.' . $name . '.text')</div>
                        </div>
                    </div>
                    @endforeach
                    <div class="medium-margin-before align-center">
                        <a href="" class="btn btn-small btn-blue-border team-mob-show-btn j-mob-show-team">@lang('tokenstars-messages.team.mob_btn')</a>
                    </div>
                </div>

                <div class="row">
                    <h3 class="col-md-8 col-lg-8 col-xl-6 sub-section-title bold-font huge-margin-before">@lang('tokenstars-messages.team.roles.players')</h3>
                    <h3 class="col-md-4 col-lg-4 col-xl-6 sub-section-title bold-font huge-margin-before desktop-only">@lang('tokenstars-messages.team.roles.sports')</h3>
                    @php
                        $team4 = ['kudermetova', 'makarova'];
                    @endphp
                    @foreach($team4 as $name)
                    <div class="col-md-4 col-lg-4 col-xl-3">
                        <div class="team-card">
                            <div class="team-photo-holder" style="background-image: url('/upload/images/{{ $name }}.jpg')"></div>
                            @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.fb')))
                                <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.fb')" target="_blank"><img src="/images/ace/tech-version/fb.png" alt="" class="team-social-link"></a>
                            @endif
                            @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.in')))
                                <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.in')" target="_blank"><img src="/images/ace/tech-version/in.png" alt="" class="team-social-link"></a>
                            @endif
                            @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.ig')))
                                <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.ig')" target="_blank"><img src="/images/ace/tech-version/ig.png" alt="" class="team-social-link"></a>
                            @endif
                            @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.url')))
                                <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.url')" target="_blank"><img src="/images/ace/tech-version/url.png" alt="" class="team-social-link"></a>
                            @endif
                            @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.tw')))
                                <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.tw')" target="_blank"><img src="/images/ace/tech-version/tw.png" alt="" class="team-social-link"></a>
                            @endif
                            @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.me')))
                                <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.me')" target="_blank"><img src="/images/ace/tech-version/me.png" alt="" class="team-social-link"></a>
                            @endif
                            <div class="medium-font">@lang('tokenstars-messages.team.members.' . $name . '.name')&nbsp;</div>
                            <div class="small-font-size sub-font-color">@lang('tokenstars-messages.team.members.' . $name . '.title')&nbsp;</div>
                            <div class="team-description super-small-font-size">@lang('tokenstars-messages.team.members.' . $name . '.text')</div>
                        </div>
                    </div>
                    @endforeach
                    <h3 class="col-md-12 sub-section-title bold-font huge-margin-before phone-only">@lang('tokenstars-messages.team.roles.tennis')</h3>
                    @php
                        $team4 = ['antunes', 'demekhine', 'sergeev'];
                    @endphp
                    @foreach($team4 as $name)
                    <div class="col-md-4 col-lg-4 col-xl-3">
                        <div class="team-card">
                            <div class="team-photo-holder" style="background-image: url('/upload/images/{{ $name }}.jpg')"></div>

                            @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.fb')))
                                <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.fb')" target="_blank"><img src="/images/ace/tech-version/fb.png" alt="" class="team-social-link"></a>
                            @endif
                            @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.in')))
                                <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.in')" target="_blank"><img src="/images/ace/tech-version/in.png" alt="" class="team-social-link"></a>
                            @endif
                            @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.ig')))
                                <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.ig')" target="_blank"><img src="/images/ace/tech-version/ig.png" alt="" class="team-social-link"></a>
                            @endif
                            @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.url')))
                                <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.url')" target="_blank"><img src="/images/ace/tech-version/url.png" alt="" class="team-social-link"></a>
                            @endif
                            @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.tw')))
                                <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.tw')" target="_blank"><img src="/images/ace/tech-version/tw.png" alt="" class="team-social-link"></a>
                            @endif
                            @if(!empty(trans('tokenstars-messages.team.members.' . $name . '.social.me')))
                                <a href="@lang('tokenstars-messages.team.members.' . $name . '.social.me')" target="_blank"><img src="/images/ace/tech-version/me.png" alt="" class="team-social-link"></a>
                            @endif
                            <div class="medium-font">@lang('tokenstars-messages.team.members.' . $name . '.name')&nbsp;</div>
                            <div class="small-font-size sub-font-color">@lang('tokenstars-messages.team.members.' . $name . '.title')&nbsp;</div>
                            <div class="team-description super-small-font-size">@lang('tokenstars-messages.team.members.' . $name . '.text')</div>
                        </div>
                    </div>
                    @endforeach
                    <div class="medium-margin-before align-center">
                        <a href="" class="btn btn-small btn-blue-border team-mob-show-btn j-mob-show-team">@lang('tokenstars-messages.team.mob_btn')</a>
                    </div>-->
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
        <style>
            .team-card {
                border:0;
            }
        </style>
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

        <section class="section-holder banner-bg partners-holder">
            <div class="wrap align-center">
                <h2 class="section-title title-size bold-font highlight-color">@lang('tokenstars-messages.partners.title')</h2>
                <img src="/images/team/partners/group-2@2x.png" alt="TokenStars Partners" class="medium-margin-before partners-logos">
            </div>
        </section>

        <section class="section-holder" id="press">
            <div class="wrap press-holder">
                <h2 class="section-title bold-font">@lang('tokenstars-messages.press.title')</h2>

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
                    @include('tokenstars.partial.press')
                </div>
            </div>
        </section>

        <style>
            .module-item {
                min-height: 480px;
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
                min-height: 480px;
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
                min-height: 480px;
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
