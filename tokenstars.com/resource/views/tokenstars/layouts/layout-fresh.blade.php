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
    <link rel="shortcut icon" href="/fresh-favicon/favicon_png.ico?v=3" type="image/x-icon">

    <meta property="og:title" content="{{ trans('meta_team.og_title') }}"/>
    <meta property="og:description" content="{{ trans('meta_team.og_description_ref') }}"/>
    <meta property="og:image" content="http://tokenstars.com/images/ace/og_image.jpg">
    <meta property="og:type" content="website"/>
    <meta property="og:url" content= "{{ app('url')->current() }}" />

    <link href="/build/lib.css?5" rel="stylesheet" />
    <link href="/build/fresh.css?5" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Exo+2:400,500,700&amp;subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" href="/css/main3.css">

    <style>
        .header-nav__list a:hover{
            color:white;
        }
        .nav-link {
            padding: 0;
        }
        .dropdown-menu a:hover {
            color:black;
        }
        .main-section {
            max-height: 1200px;
        }
        .main-widget__input-holder label {
            padding-left: unset;
        }
    </style>
    @include('tokenstars.partial.analitics-head')
</head>


<body>
<header class="header">
    <div class="wrap">
        <style>
            .navbar-dark .navbar-brand {
                color: #fff;
                font-family: "Exo 2", "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            }
            .header-brand {
                font-size: 1.5rem;
            }
            .header-brand {
                opacity: .8;
                width: 160px;
                font-size: 0;
            }
            .font-weight-bold {
                font-weight: 700 !important;
            }
            .navbar-brand {
                display: inline-block;
                padding-top: 0.155rem;
                padding-bottom: 0.155rem;
                margin-right: 1.25rem;
                font-size: 1.5rem;
                line-height: inherit;
                white-space: nowrap;


            }
            .header-logo a{
                background-color: #060535;
                background-color: transparent;
                padding-top: 12px;
            }
        </style>
        <div class="header-logo navbar-dark">


            <!--<a href="#" onclick="ga('send', 'event', 'buy_tokens', 'pers_acc', 'top');"><img class="header-logo__image" alt="" src="/images/landing-stars/tokenstars-logo.png" /></a>-->
            <a class="navbar-brand font-weight-bold header-brand" href="/">TokenStars</a>

            <!-- <img class="header-logo__image j-jump-to-top" alt="" src="/images/team/logo-team.png" /> -->
        </div>
        <div class="header-nav__mob-menu j-mob-menu"><span></span> <span></span> <span></span></div>
        {{--<nav class="header-nav j-header-nav">--}}
            {{--<ul class="header-nav__list">--}}
                {{--<li class="header-nav__listitem header-nav__listitem--big">--}}
                    {{--<div class="header-nav__lang">--}}
                        {{--<i class="header-nav__flag flag-{{ $lang }}"></i>--}}
                        {{--<select class="header-nav__lang_selector j-lang-selector">--}}
                            {{--<option {{ $lang == 'en' ? 'selected' : '' }} value="/en/fresh">English</option>--}}
                            {{--<option {{ $lang == 'ru' ? 'selected' : '' }} value="/ru/fresh">Русский</option>--}}
                            {{--<option {{ $lang == 'ko' ? 'selected' : '' }} value="/ko/fresh">한국어</option>--}}
                            {{--<option {{ $lang == 'zh' ? 'selected' : '' }} value="/zh/fresh">中文（简体）</option>--}}
                            {{--<option {{ $lang == 'jp' ? 'selected' : '' }} value="/jp/fresh">日本語</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</nav>--}}
        <nav class="header-nav j-header-nav">

            <ul class="header-nav__list j-header-nav-list" style="z-index: 1">
                <li class="header-nav__listitem"><a href="#">Get tokens</a></li>
                <!--<li class="header-nav__listitem"><a onclick="ga('send', 'event', 'click', 'platform', 'top');" href="#platform">Platform</a></li>-->
                <li class="header-nav__listitem">
                    <a class="nav-link header-link dropdown-toggle px-3" href="#" id="navbarPlatform">Platform</a>
                    <div class="dropdown-menu position-absolute" aria-labelledby="navbarPlatform" style="left:100px;display:none; " id="drpdwn">
                        <a class="dropdown-item" href="/charity">Auctions</a>
                        <a class="dropdown-item" href="/voting">Voting</a>
                        <a class="dropdown-item" href="/predictions">Predictions</a>
                        <a class="dropdown-item" href="/scouting">Scouting</a>
                        <a class="dropdown-item" href="/players">Players</a>
                        <a class="dropdown-item" href="/brand">Brand relations</a>
                        <a class="dropdown-item" href="/bounty">Bounty fan club</a>
                        <a class="dropdown-item" href="/achievements">Achievements</a>
                    </div>
                </li>
                <script>
                    var nav = document.getElementById('navbarPlatform');
                    nav.addEventListener('click', function(){
                        var dropdown = document.getElementById('drpdwn');
                        if(dropdown.style.display == 'none')
                            dropdown.style.display = 'block';
                        else
                            dropdown.style.display = 'none';
                    })
                </script>
                <li class="header-nav__listitem"><a onclick="ga('send', 'event', 'click', 'news', 'top');" href="#news">News</a></li>
                <li class="header-nav__listitem"><a onclick="ga('send', 'event', 'click', 'team', 'top');" href="#team">Team</a></li>
                <li class="header-nav__listitem"><a href="/ace">ACE token</a></li>
                <li class="header-nav__listitem"><a href="/team">TEAM token</a></li>

                <li class="header-nav__listitem bold-font">
                    @guest
                    <a href="{{'/signin'}}{{$contribute_url}}" onclick="ga('send', 'event', 'login_main', 'login', 'main');">@lang('tokenstars-messages.menu.login')</a>
                    <span class="sub-font-color">/</span>
                    <a href="{{'/signup'}}{{$contribute_url}}" onclick="ga('send', 'event', 'signup_main', 'signup', 'main');">@lang('tokenstars-messages.menu.signup')</a>
                    @endguest
                    @auth
                    <a href="{{'/dashboard'}}" data-toggle="tooltip" title="Edit profile" onclick="ga('send', 'event', 'Click', 'profile_clk', 'navig');">@if(Auth::user()->oldCabinet->first_name != '') {{ mb_strimwidth(Auth::user()->oldCabinet->first_name, 0, 18)}} {{mb_strimwidth(Auth::user()->oldCabinet->last_name, 0,18)}} @else {{ Auth::user()->oldCabinet->email  }} @endif</a>
                    <span class="sub-font-color">/</span>
                    <a href="{{route('auth.logout')}}" onclick="ga('send', 'event', 'Click', 'logout_clk', 'navig');">@lang('messages.menu.logout')</a>
                    @endauth
                </li>

            </ul>
        </nav>
    </div>
    @include('tokenstars.partial.sticky-white')
</header>

@yield('content')

<footer class="section section-footer align-center">
    <div class="wrap">
        <div class="row">
            <div class="footer-social-holder col-12">
                <a href="https://www.facebook.com/TokenStars/" target="_blank" class="footer-social-link" onclick="ga('send', 'event', 'click', 'facebook', 'footer');"><img title="Facebook" alt="Facebook" src="/images/ace/facebook.png"></a>
                <a href="https://twitter.com/TokenStars" target="_blank" class="footer-social-link" onclick="ga('send', 'event', 'click', 'twitter', 'footer');"><img title="Twitter" alt="Twitter" src="/images/ace/twitter.png"></a>
                <a href="https://medium.com/@tokenstars" target="_blank" class="footer-social-link" onclick="ga('send', 'event', 'click', 'medium', 'footer');"><img title="Medium" alt="Medium" src="/images/ace/medium.png"></a>
                <a href="https://t.me/TokenStars_en" target="_blank" class="footer-social-link" onclick="ga('send', 'event', 'click', 'telegram', 'footer');"><img title="Telegram" alt="Telegram" src="/images/ace/telegram.png"></a>
                <a href="https://bitcointalk.org/index.php?topic=2043613.0" target="_blank" class="footer-social-link" onclick="ga('send', 'event', 'click', 'bitcointalk', 'footer');"><img title="BitCoinTalk" alt="BitCoinTalk" src="/images/ace/bitcointalk.png"></a>
                <a href="https://github.com/tokenstars" target="_blank" class="footer-social-link" onclick="ga('send', 'event', 'click', 'github', 'footer');"><img title="GitHub" alt="GitHub" src="/images/ace/github.png"></a>
            </div>
            <div class="medium-margin-before col-12">
                <nav class="footer-nav">
                    <a href="#platform" onclick="ga('send', 'event', 'menu', 'platform_v2', 'footer');">Platform</a>
                    <a href="#ambassadors" onclick="ga('send', 'event', 'menu', 'ambassadors', 'footer');">Ambassadors</a>
                    <!-- <a href="/team/#team" onclick="ga('send', 'event', 'menu', 'team', 'footer');">Team</a> -->
                </nav>
            </div>
            <div class="huge-margin-before col-12">
                <a href="/pdfs/Privacy_Policy.pdf" target="_blank" class="footer-terms" onclick="ga('send', 'event', 'click', 'privacy_policy', 'footer');">Privacy Policy</a>
                <a href="/pdfs/Terms_of_Use.pdf" target="_blank" class="footer-terms" onclick="ga('send', 'event', 'click', 'terms_of_use', 'footer');">Terms of Use</a>
                <a href="/ace" target="_blank" class="footer-terms" onclick="ga('send', 'event', 'click', 'ace_token_sale', 'footer');">ACE token</a>
                <a href="/team" target="_blank" class="footer-terms" onclick="ga('send', 'event', 'click', 'team_token_sale', 'footer');">TEAM token</a>
            </div>
            <div class="medium-margin-before col-12">
                <a href="mailto:ask@tokenstars.com" class="footer-mail">ask@tokenstars.com</a>
                <br>
                <br>
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

        speed: 800, //ms'
        auto: true,
        loop: true,
        slideEndAnimation: true,
        pause: 4000,

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

    var itemsPress = $(window).width() < 750 ? 2 : 3;


    $(".lightSliderHighlights").lightSlider({
        item: 3,
        autoWidth: false,
        slideMove: 3, // slidemove will be 1 if loop is true
        slideMargin: 0,

        addClass: '',
        mode: "slide",
        useCSS: true,
        cssEasing: 'ease', //'cubic-bezier(0.25, 0, 0.25, 1)',//
        easing: 'linear', //'for jquery animation',////

        speed: 800, //ms'
        auto: true,
        loop: true,
        slideEndAnimation: true,
        pause: 4000,

        keyPress: false,
        controls: true,
        prevHtml: '',
        nextHtml: '',

        rtl:false,
        adaptiveHeight:false,

        vertical:false,
        verticalHeight:650,
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
                    item: 1,
                    autoWidth: false,
                    slideMove: 1,
                    slideMargin: 0,
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
        $('html').removeClass('no-scroll');
    });

    $('.js-show-crypto').click(function() {
        $('.js-show-crypto').removeClass('active');
        $(this).addClass('active');

        var index = $('.js-show-crypto').index(this);

        $('.js-media').hide();
        $($('.js-media')[index]).show();

    });

    // Lang selector
    $('.j-lang-selector').on('change blur', function( ) {
        location = this.value;
    });

    // Animate progress
    $('.j-main-progress-inside').removeClass('short');

    // Platform tabs
    $('.j-platform-tab').hover(function() {
        $('.j-platform-tab').removeClass('selected');
        $(this).addClass('selected');
        var position = $('.j-platform-tab').index($(this));
        $('.j-platform-item').removeClass('highlighted');
        var items = [];
        switch (position) {
            case 0:
                items = [3, 4, 5, 6, 8, 10];
                break;
            case 1:
                items = [5, 7, 11];
                break;
            case 2:
                items = [0, 3, 4, 6, 10, 11];
                break;
            case 3:
                items = [0, 4, 5, 6, 7, 8, 9, 10, 11];
                break;
            case 4:
                items = [1, 2, 4, 5, 6, 7, 8, 9, 10, 11];
                break;
            default:
                break;
        };

        items.forEach(function(i) {
            $($('.j-platform-item')[i]).addClass('highlighted');
        });
    });

    // Platform tabs
    $('.j-platform-token').hover(
        function() {
            $('.j-platform-item').removeClass('selected-token');
            var type = $(this).data('type');
            var items = [];
            switch (type) {
                case 'ace':
                    items = [0, 3, 4, 5, 6, 7, 8, 9, 10, 11];
                    break;
                case 'team':
                    items = [0, 3, 4, 5, 6, 7, 8, 9, 10, 11];
                    break;
                case 'star':
                    items = [1, 2, 4, 5, 6, 7, 8, 9, 10, 11];
                    break;
                default:
                    break;
            };

            items.forEach(function(i) {
                $($('.j-platform-item')[i]).addClass('selected-token');
            });
        }, function() {
            $('.j-platform-item').removeClass('selected-token');
        }
    );

</script>
<script src="/js/app-achievements.js"></script>
@include('tokenstars.partial.analitics')

</body>
</html>
