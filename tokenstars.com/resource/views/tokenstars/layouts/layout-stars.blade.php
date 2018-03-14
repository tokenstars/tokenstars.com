<!DOCTYPE html>
@php
    $lang = app('translator')->getLocale()
@endphp
<html lang="{{ $lang }}">
<head>
    <title>{{ trans('meta_team.title') }}</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="yandex-verification" content="9e28d11315c43960" />
    <meta name="google-site-verification" content="2pPYktLC9TJhKxrmrWlh30p3eXSRq-MbLVHewsZqdic" />

    <meta name="title" content="{{ trans('meta_team.title') }}">
    <meta name="keywords" content="{{ trans('meta_team.keywords') }}">
    <meta name="description" content="{{ app('request')->input('ref') ? trans('meta_team.description_ref') : trans('meta_team.description') }}">
    <link rel="shortcut icon" href="/favicon.ico?v=2" type="image/x-icon">

    <meta property="og:title" content="{{ trans('meta_team.og_title') }}"/>
    <meta property="og:description" content="{{ trans('meta_team.og_description_ref') }}"/>
    <meta property="og:image" content="http://tokenstars.com/images/ace/og_image.jpg">
    <meta property="og:type" content="website"/>
    <meta property="og:url" content= "{{ app('url')->current() }}" />

    <link href="/build/lib.css?1" rel="stylesheet" />
    <link href="/build/stars.css?1" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&amp;subset=cyrillic" rel="stylesheet">

    @include('tokenstars.partial.analitics-head')
</head>


<body>
<header class="header">
    <div class="wrap">
        <div class="header-logo">
            <a href="#" onclick="ga('send', 'event', 'logo', 'home_clk', 'new_team_signup_page');"><img class="header-logo__image" alt="" src="/images/landing-stars/tokenstars-logo.png" /></a>
            <!-- <img class="header-logo__image j-jump-to-top" alt="" src="/images/team/logo-team.png" /> -->
        </div>
        <div class="header-nav__mob-menu j-mob-menu"><span></span> <span></span> <span></span></div>
        <nav class="header-nav j-header-nav">
            <ul class="header-nav__list j-header-nav-list">
                <li class="header-nav__listitem header-nav__listitem--highlighted"><a href="{{config('app.token_tokenstars_host') . '/users/sign_up'}}{{$contribute_url}}" onclick="ga('send', 'event', 'contribute_v1', 'pers_acc', 'new_contribute');">@lang('tokenstars-team.main_form.contribute')</a></li>
                <li class="header-nav__listitem"><a href="#ambassadors" onclick="ga('send', 'event', 'menu', 'ambassadors', 'new_menu');">@lang('tokenstars-messages.menu.ambassadors')</a></li>
                <li class="header-nav__listitem"><a href="#tokens" onclick="ga('send', 'event', 'menu', 'how_it_wokrs', 'new_menu');" class="j-modules-description-toggle">@lang('tokenstars-messages.menu.how')</a></li>
                <!-- <li class="header-nav__listitem"><a href="#team" onclick="ga('send', 'event', 'menu', 'team', 'menu');">@lang('tokenstars-messages.menu.team')</a></li> -->
                <li class="header-nav__listitem"><a href="@lang('tokenstars-messages.other.faq')" target="_blank" onclick="ga('send', 'event', 'click', 'faq', 'new_faq');">@lang('tokenstars-messages.footer.faq')</a></li>
                <li class="header-nav__listitem"><a href="@lang('tokenstars-team.other.whitepaper')" target="_blank" onclick="ga('send', 'event', 'click', 'downloadwp', 'new_top_team');">@lang('tokenstars-messages.menu.whitepaper')</a></li>

                <li class="header-nav__listitem">
                    <a href="https://t.me/TokenStars{{ $lang == 'ru' ? '_ru' : ($lang == 'jp'? 'Japan' : '_en') }}" onclick="ga('send', 'event', 'click', 'telegram', 'new_top');" target="_blank" ><img class="header-nav__telegram" title="Telegram" alt="Telegram" src="/images/ace/telegram.png" /></a>
                </li>
                <li class="header-nav__listitem bold-font">
                    @guest
                    <a href="{{config('app.token_tokenstars_host') . '/users/sign_in'}}{{$contribute_url}}" onclick="ga('send', 'event', 'login_main', 'login', 'main');">@lang('tokenstars-messages.menu.login')</a>
                    <span class="sub-font-color">/</span>
                    <a href="{{config('app.token_tokenstars_host') . '/users/sign_up'}}{{$contribute_url}}" onclick="ga('send', 'event', 'signup_main', 'signup', 'main');">@lang('tokenstars-messages.menu.signup')</a>
                    @endguest
                    @auth
                    <a href="{{config('app.token_tokenstars_host') . '/profile/edit'}}" data-toggle="tooltip" title="Edit profile" onclick="ga('send', 'event', 'Click', 'profile_clk', 'navig');">{{ Auth::user()->name_or_email  }}</a>
                    <span class="sub-font-color">/</span>
                    <a href="{{route('auth.logout')}}" onclick="ga('send', 'event', 'Click', 'logout_clk', 'navig');">@lang('messages.menu.logout')</a>
                    @endauth
                </li>
                <!-- <li class="header-nav__listitem">
                    <div class="header-nav__lang">
                        <i class="header-nav__flag flag-{{ $lang }}"></i>
                        <select class="header-nav__lang_selector j-lang-selector">
                            <option {{ $lang == 'en' ? 'selected' : '' }} value="/en/stars">English</option>
                            <option {{ $lang == 'ru' ? 'selected' : '' }} value="/ru/stars">Русский</option>
                            <option {{ $lang == 'ko' ? 'selected' : '' }} value="/ko/stars">한국어</option>
                            <option {{ $lang == 'zh' ? 'selected' : '' }} value="/zh/stars">中文（简体）</option>
                            <option {{ $lang == 'jp' ? 'selected' : '' }} value="/jp/stars">日本語</option>
                        </select>
                    </div>
                </li> -->

            </ul>
        </nav>
    </div>
</header>
<div class="header-clear"></div>
@include('tokenstars.partial.sticky')

@yield('content')

<footer class="section section-footer align-center">
    <div class="wrap">
        <div class="row">
            <div class="footer-social-holder">
                <a href="https://www.facebook.com/TokenStars/" target="_blank" class="footer-social-link" onclick="ga('send', 'event', 'click', 'facebook', 'footer');"><img title="Facebook" alt="Facebook" src="/images/ace/facebook.png" /></a>
                <a href="https://twitter.com/TokenStars" target="_blank" class="footer-social-link" onclick="ga('send', 'event', 'click', 'twitter', 'footer');"><img title="Twitter" alt="Twitter" src="/images/ace/twitter.png" /></a>
                <a href="https://medium.com/@tokenstars" target="_blank" class="footer-social-link" onclick="ga('send', 'event', 'click', 'medium', 'footer');"><img title="Medium" alt="Medium" src="/images/ace/medium.png" /></a>
                <a href="https://t.me/TokenStars{{ $lang == 'ru' ? '_ru' : ($lang == 'jp'? 'Japan' : '_en') }}" target="_blank" class="footer-social-link" onclick="ga('send', 'event', 'click', 'telegram', 'footer');"><img title="Telegram" alt="Telegram" src="/images/ace/telegram.png" /></a>
                <a href="{{ $lang == 'ru' ? 'https://bitcointalk.org/index.php?topic=2045165.0' : 'https://bitcointalk.org/index.php?topic=2043613.0' }}" target="_blank" class="footer-social-link" onclick="ga('send', 'event', 'click', 'bitcointalk', 'footer');"><img title="BitCoinTalk" alt="BitCoinTalk" src="/images/ace/bitcointalk.png" /></a>
                <a href="https://github.com/tokenstars/team-token" target="_blank" class="footer-social-link" onclick="ga('send', 'event', 'click', 'github', 'footer');"><img title="GitHub" alt="GitHub" src="/images/ace/github.png" /></a>
            </div>
            <div class="medium-margin-before">
                <nav class="footer-nav">
                    <a href="/team/#ambassadors" onclick="ga('send', 'event', 'menu', 'ambassadors', 'footer');">@lang('tokenstars-messages.menu.ambassadors')</a>
                    <a href="/team/#modules" onclick="ga('send', 'event', 'menu', 'how_it_wokrs', 'footer');">@lang('tokenstars-messages.menu.how')</a>
                    <!-- <a href="/team/#team" onclick="ga('send', 'event', 'menu', 'team', 'footer');">@lang('tokenstars-messages.menu.team')</a> -->
                </nav>
            </div>
            <div class="huge-margin-before">
                <a href="/pdfs/Privacy_Policy.pdf" target="_blank" class="footer-terms" onclick="ga('send', 'event', 'click', 'privacy');">@lang('tokenstars-messages.footer.privacy')</a>
                <a href="/pdfs/Terms_of_Use.pdf" target="_blank" class="footer-terms" onclick="ga('send', 'event', 'click', 'terms');">@lang('tokenstars-messages.footer.terms')</a>
                <a href="@lang('tokenstars-messages.other.faq')" target="_blank" class="footer-terms" onclick="ga('send', 'event', 'click', 'faq');">@lang('tokenstars-messages.footer.faq')</a>
            </div>
            <div class="medium-margin-before">
                <a href="mailto:ask@tokenstars.com" class="footer-mail">ask@tokenstars.com</a>
                <br />
                <br />
            </div>
        </div>
    </div>
</footer>

<script src="{{asset(mix('/build/scripts-min.js'))}}"></script>

<script>

    var items = $(window).width() < 750 ? 2 : 6;

    $(".lightSlider").lightSlider({
        item: items,
        autoWidth: false,
        slideMove: items, // slidemove will be 1 if loop is true
        slideMargin: 10,

        addClass: '',
        mode: "slide",
        useCSS: true,
        cssEasing: 'ease', //'cubic-bezier(0.25, 0, 0.25, 1)',//
        easing: 'linear', //'for jquery animation',////

        speed: 400, //ms'
        auto: false,
        loop: false,
        slideEndAnimation: true,
        pause: 2000,

        keyPress: false,
        controls: true,
        prevHtml: '',
        nextHtml: '',

        rtl:false,
        adaptiveHeight:false,

        vertical:false,
        verticalHeight:500,
        vThumbWidth:100,

        thumbItem:10,
        pager: true,
        gallery: false,
        galleryMargin: 5,
        thumbMargin: 5,
        currentPagerPosition: 'middle',

        enableTouch:true,
        enableDrag:true,
        freeMove:true,
        swipeThreshold: 40,

        responsive : [],

        onBeforeStart: function (el) {},
        onSliderLoad: function (el) {},
        onBeforeSlide: function (el) {},
        onAfterSlide: function (el) {},
        onBeforeNextSlide: function (el) {},
        onBeforePrevSlide: function (el) {}
    });

    var itemsPress = $(window).width() < 750 ? 2 : 3;

    $(".lightSliderPress").lightSlider({
        item: itemsPress,
        autoWidth: false,
        slideMove: 3, // slidemove will be 1 if loop is true
        slideMargin: 10,

        addClass: '',
        mode: "slide",
        useCSS: true,
        cssEasing: 'ease', //'cubic-bezier(0.25, 0, 0.25, 1)',//
        easing: 'linear', //'for jquery animation',////

        speed: 400, //ms'
        auto: false,
        loop: false,
        slideEndAnimation: true,
        pause: 2000,

        keyPress: false,
        controls: true,
        prevHtml: '',
        nextHtml: '',

        rtl:false,
        adaptiveHeight:false,

        vertical:false,
        verticalHeight:550,
        vThumbWidth:100,

        thumbItem:10,
        pager: true,
        gallery: false,
        galleryMargin: 5,
        thumbMargin: 5,
        currentPagerPosition: 'middle',

        enableTouch:true,
        enableDrag:true,
        freeMove:true,
        swipeThreshold: 40,

        responsive : [
            {
                breakpoint:1024,
                settings: {
                    item:2,
                    slideMove: 1
                  }
            },
            {
                breakpoint:600,
                settings: {
                    item:1,
                    slideMove: 1,
                    adaptiveHeight:true
                  }
            }
        ],

        onBeforeStart: function (el)  {},
        onSliderLoad: function (el) {},
        onBeforeSlide: function (el) {},
        onAfterSlide: function (el) {},
        onBeforeNextSlide: function (el) {},
        onBeforePrevSlide: function (el) {}
    });

    // Toggle mob menu
    $('.j-mob-menu').click(function() {
        $('.j-header-nav').toggleClass('opened');
        $('html').toggleClass('no-scroll')
    });
    $(window).on('resize', function(){
        $('.j-header-nav').removeClass('opened');
        $('html').removeClass('no-scroll')
    });

    // Lang selector
    $('.j-lang-selector').on('change blur', function( ) {
        location = this.value;
    });

    // Animate progress
    $('.j-main-progress-inside').removeClass('short');

</script>
@include('tokenstars.partial.analitics')

</body>
</html>
