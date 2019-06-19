<!DOCTYPE html>
@php
    $lang = app('translator')->getLocale()
@endphp
<html lang="{{ $lang }}">
<head>
    <title>TokenStars | Celebrities on Blockchain</title>
    <style>
        .nav {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-flex-wrap: wrap;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            padding-left: 0;
            margin-bottom: 0;
            list-style: none; }

        .nav-link {
            display: block;
            padding: 0.5rem 1rem; }
        .nav-link:hover, .nav-link:focus {
            text-decoration: none; }
        .nav-link.disabled {
            color: #6c757d; }

        .nav-tabs {
            border-bottom: 1px solid #dee2e6; }
        .nav-tabs .nav-item {
            margin-bottom: -1px; }
        .nav-tabs .nav-link {
            border: 1px solid transparent;
            border-top-left-radius: 0.25rem;
            border-top-right-radius: 0.25rem; }
        .nav-tabs .nav-link:hover, .nav-tabs .nav-link:focus {
            border-color: #e9ecef #e9ecef #dee2e6; }
        .nav-tabs .nav-link.disabled {
            color: #6c757d;
            background-color: transparent;
            border-color: transparent; }
        .nav-tabs .nav-link.active,
        .nav-tabs .nav-item.show .nav-link {
            color: #495057;
            background-color: #fff;
            border-color: #dee2e6 #dee2e6 #fff; }
        .nav-tabs .dropdown-menu {
            margin-top: -1px;
            border-top-left-radius: 0;
            border-top-right-radius: 0; }

        .nav-pills .nav-link {
            border-radius: 0.25rem; }

        .nav-pills .nav-link.active,
        .nav-pills .show > .nav-link {
            color: #fff;
            background-color: #007bff; }

        .nav-fill .nav-item {
            -webkit-box-flex: 1;
            -webkit-flex: 1 1 auto;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            text-align: center; }

        .nav-justified .nav-item {
            -webkit-flex-basis: 0;
            -ms-flex-preferred-size: 0;
            flex-basis: 0;
            -webkit-box-flex: 1;
            -webkit-flex-grow: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            text-align: center; }

        .tab-content > .tab-pane {
            display: none; }

        .tab-content > .active {
            display: block; }

        .navbar {
            position: relative;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-flex-wrap: wrap;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: justify;
            -webkit-justify-content: space-between;
            -ms-flex-pack: justify;
            justify-content: space-between;
            padding: 0.625rem 1.25rem; }
        .navbar > .container,
        .navbar > .container-fluid {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-flex-wrap: wrap;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: justify;
            -webkit-justify-content: space-between;
            -ms-flex-pack: justify;
            justify-content: space-between; }

        .btn-primary {
            color: #fff;
            background-color: #3185fc;
            border-color: #3185fc;
            box-shadow: none; }
        .btn-primary:hover {
            color: #fff;
            background-color: #0b6ffb;
            border-color: #0468f6; }
        .btn-primary:focus, .btn-primary.focus {
            box-shadow: none, 0 0 0 0.2rem rgba(49, 133, 252, 0.5); }
        .btn-primary.disabled, .btn-primary:disabled {
            color: #fff;
            background-color: #3185fc;
            border-color: #3185fc; }
        .btn-primary:not(:disabled):not(.disabled):active, .btn-primary:not(:disabled):not(.disabled).active,
        .show > .btn-primary.dropdown-toggle {
            color: #fff;
            background-color: #0468f6;
            border-color: #0363ea; }
        .btn-primary:not(:disabled):not(.disabled):active:focus, .btn-primary:not(:disabled):not(.disabled).active:focus,
        .show > .btn-primary.dropdown-toggle:focus {
            box-shadow: none, 0 0 0 0.2rem rgba(49, 133, 252, 0.5); }
        .dropup,
        .dropright,
        .dropdown,
        .dropleft {
            position: relative; }

        .dropdown-toggle::after {
            display: inline-block;
            width: 0;
            height: 0;
            margin-left: 0.255em;
            vertical-align: 0.255em;
            content: "";
            border-top: 0.3em solid;
            border-right: 0.3em solid transparent;
            border-bottom: 0;
            border-left: 0.3em solid transparent; }

        .dropdown-toggle:empty::after {
            margin-left: 0; }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
            display: none;
            float: left;
            min-width: 10rem;
            padding: 0.5rem 0;
            margin: 0.125rem 0 0;
            font-size: 1rem;
            color: #2b2b2b;
            text-align: left;
            list-style: none;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid rgba(0, 0, 0, 0.15);
            border-radius: 0.25rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.175); }

        .dropdown-menu-right {
            right: 0;
            left: auto; }

        .dropup .dropdown-menu {
            top: auto;
            bottom: 100%;
            margin-top: 0;
            margin-bottom: 0.125rem; }

        .dropup .dropdown-toggle::after {
            display: inline-block;
            width: 0;
            height: 0;
            margin-left: 0.255em;
            vertical-align: 0.255em;
            content: "";
            border-top: 0;
            border-right: 0.3em solid transparent;
            border-bottom: 0.3em solid;
            border-left: 0.3em solid transparent; }

        .dropup .dropdown-toggle:empty::after {
            margin-left: 0; }

        .dropright .dropdown-menu {
            top: 0;
            right: auto;
            left: 100%;
            margin-top: 0;
            margin-left: 0.125rem; }

        .dropright .dropdown-toggle::after {
            display: inline-block;
            width: 0;
            height: 0;
            margin-left: 0.255em;
            vertical-align: 0.255em;
            content: "";
            border-top: 0.3em solid transparent;
            border-right: 0;
            border-bottom: 0.3em solid transparent;
            border-left: 0.3em solid; }

        .dropright .dropdown-toggle:empty::after {
            margin-left: 0; }

        .dropright .dropdown-toggle::after {
            vertical-align: 0; }

        .dropleft .dropdown-menu {
            top: 0;
            right: 100%;
            left: auto;
            margin-top: 0;
            margin-right: 0.125rem; }

        .dropleft .dropdown-toggle::after {
            display: inline-block;
            width: 0;
            height: 0;
            margin-left: 0.255em;
            vertical-align: 0.255em;
            content: ""; }

        .dropleft .dropdown-toggle::after {
            display: none; }

        .dropleft .dropdown-toggle::before {
            display: inline-block;
            width: 0;
            height: 0;
            margin-right: 0.255em;
            vertical-align: 0.255em;
            content: "";
            border-top: 0.3em solid transparent;
            border-right: 0.3em solid;
            border-bottom: 0.3em solid transparent; }

        .dropleft .dropdown-toggle:empty::after {
            margin-left: 0; }

        .dropleft .dropdown-toggle::before {
            vertical-align: 0; }

        .dropdown-menu[x-placement^="top"], .dropdown-menu[x-placement^="right"], .dropdown-menu[x-placement^="bottom"], .dropdown-menu[x-placement^="left"] {
            right: auto;
            bottom: auto; }

        .dropdown-divider {
            height: 0;
            margin: 0.5rem 0;
            overflow: hidden;
            border-top: 1px solid #e9ecef; }

        .dropdown-item {
            display: block;
            width: 100%;
            padding: 0.25rem 1.5rem;
            clear: both;
            font-weight: 400;
            color: #212529;
            text-align: inherit;
            white-space: nowrap;
            background-color: transparent;
            border: 0; }
        .dropdown-item:hover, .dropdown-item:focus {
            color: #16181b;
            text-decoration: none;
            background-color: #f8f9fa; }
        .dropdown-item.active, .dropdown-item:active {
            color: #fff;
            text-decoration: none;
            background-color: #007bff; }
        .dropdown-item.disabled, .dropdown-item:disabled {
            color: #6c757d;
            background-color: transparent; }

        .dropdown-menu.show {
            display: block; }

        .dropdown-header {
            display: block;
            padding: 0.5rem 1.5rem;
            margin-bottom: 0;
            font-size: 0.875rem;
            color: #6c757d;
            white-space: nowrap; }

        .dropdown-item-text {
            display: block;
            padding: 0.25rem 1.5rem;
            color: #212529; }

    </style>
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

    <link href="/build/fresh.css?5" rel="stylesheet" />
    <link href="/build/landing-ace-v2.css?1" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Exo+2:400,500,700&amp;subset=cyrillic" rel="stylesheet">

    @include('tokenstars.partial.analitics-head')
</head>


<body>
<header class="header">
    <div class="wrap">
        <div class="header-logo">
            <a href="/"><img class="header-logo__image" alt="" src="/images/ace/logotype_tokenstars.png" /></a>
            <img class="header-logo__image j-jump-to-top" alt="" src="/images/team/logo-team.png" />
        </div>
        <div class="header-nav__mob-menu j-mob-menu"><span></span> <span></span> <span></span></div>
        <nav class="header-nav j-header-nav">
            <ul class="header-nav__list j-header-nav-list">
            <!--<li class="header-nav__listitem"><a href="#vision">@lang('tokenstars-messages.menu.how')</a></li>
                <li class="header-nav__listitem"><a href="#why">@lang('tokenstars-messages.menu.technology')</a></li>-->
                <li class="header-nav__listitem" style="margin-right: -15px;">
                    <a class="nav-link header-link dropdown-toggle px-3" href="#" id="navbarPlatform">Platform</a>
                    <div class="dropdown-menu position-absolute" aria-labelledby="navbarPlatform" style="left: 750px;display:none; " id="drpdwn">
                        <a class="dropdown-item" href="/charity">Auctions</a>
                        <a class="dropdown-item" href="/voting">Voting</a>
                        <a class="dropdown-item" href="/predictions">Predictions</a>
                        <a class="dropdown-item" href="/scouting">Scouting</a>
                        <a class="dropdown-item" href="/players">Players</a>
                        <a class="dropdown-item" href="/brand">Brand relations</a>
                        <a class="dropdown-item" href="/bounty">Bounty fan club</a>
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
                <li class="header-nav__listitem"><a href="#news">News</a></li>
                <li class="header-nav__listitem"><a href="#team">@lang('tokenstars-messages.menu.team')</a></li>
                <li class="header-nav__listitem"><a href="/upload/files/team_whitepaper.pdf" target="_blank" onclick="ga('send', 'event', 'click', 'downloadwp', 'menu');">@lang('tokenstars-messages.menu.whitepaper')</a></li>
                <li class="header-nav__listitem header-nav__listitem--bottom">
                    @guest
                        <a href="/signin" onclick="ga('send', 'event', 'login_main', 'login', 'main');">@lang('tokenstars-messages.menu.login')</a>
                        <span class="sub-font-color">/</span>
                        <a href="/signup" onclick="ga('send', 'event', 'signup_main', 'signup', 'main');">@lang('tokenstars-messages.menu.signup')</a>
                    @endguest
                    @auth
                        <a href="/dashboard" data-toggle="tooltip" title="Edit profile" onclick="ga('send', 'event', 'Click', 'profile_clk', 'navig');">{{ Auth::user()->name_or_email  }}</a>
                        <span class="sub-font-color">/</span>
                        <a href="/logout" onclick="ga('send', 'event', 'Click', 'logout_clk', 'navig');">@lang('messages.menu.logout')</a>
                    @endauth
                </li>
                <li class="header-nav__listitem">
                    <div class="header-nav__lang">
                        <i class="header-nav__flag flag-{{ $lang }}"></i>
                        <select class="header-nav__lang_selector j-lang-selector">
                            <option {{ $lang == 'en' ? 'selected' : '' }} value="/en/team">English</option>
                            <option {{ $lang == 'en' ? 'selected' : '' }} value="/en/team">Русский</option>
                            <option {{ $lang == 'en' ? 'selected' : '' }} value="/en/team">한국어</option>
                            <option {{ $lang == 'en' ? 'selected' : '' }} value="/en/team">中文（简体）</option>
                            <option {{ $lang == 'en' ? 'selected' : '' }} value="/en/team">日本語</option>
                        </select>
                    </div>
                </li>

            </ul>
        </nav>
    </div>
    @include('tokenstars.partial.sticky-white')
</header>
<div class="header-clear"></div>


@yield('content')

<footer class="align-center">
    <div class="wrap">
        <div class="row">
            <div class="huge-margin-before">
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
                    <a href="/team/#team" onclick="ga('send', 'event', 'menu', 'team', 'footer');">@lang('tokenstars-messages.menu.team')</a>
                </nav>
            </div>
            <div class="huge-margin-before">
                <a href="/pdfs/Privacy_Policy.pdf" target="_blank" class="footer-terms" onclick="ga('send', 'event', 'click', 'privacy');">@lang('tokenstars-messages.footer.privacy')</a>
                <a href="/pdfs/Terms_of_Use.pdf" target="_blank" class="footer-terms" onclick="ga('send', 'event', 'click', 'terms');">@lang('tokenstars-messages.footer.terms')</a>

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
<script src="https://player.vimeo.com/api/player.js"></script>

<script>

    $(document).ready(function() {

        $(window).scroll(function(){
            check_modules();
        });

        function check_modules() {

            if ($('#modules').length > 0)
            {
                var diff = $('#modules').offset().top - $(window).scrollTop() - $(window).height();
                var diff2 = $('#modules').offset().top + $('#modules').height() - $(window).scrollTop() - $(window).height();

                if((diff < -70) && (diff2 > -40)) {
                    $('.j-modules-scroll').addClass('fixed');
                } else{
                    $('.j-modules-scroll').removeClass('fixed');
                }
            }
        }

        $('.j-modules-scroll').click(function() {

            $('html, body').animate({
                scrollTop: $('#modules').offset().top + $('#modules').height() + 40 - $(window).height()
            }, 500);
        });

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
    });

    // Bonus popup
    var bonus_send = false;
    $('.j-bonus-popup').on('j-popup:close', function (e) {
        if (!bonus_send)
        {
            if(!$(e.target).closest('.j-popup-holder').length) {
                $('.j-stay-popup').addClass('showing');
            }
            if($(e.target).closest('.j-hide-popup').length)
            {
                $('.j-stay-popup').addClass('showing');
            }
        }
    });

    $('.j-bonus-form').submit(function(e) {
        e.preventDefault();
        var $this = $(this),
            $submit = $('[type="submit"]', $this),
            $input = $('[name="EMAIL"]', $this),
            coin = $('[name="coin"]:checked', $this).val(),
            email = $input.val();
        console.log($this.serialize());
        if (email) {
            $submit.prop("disabled", true);
            $.post("/ajax/subscribe-waitlist", $this.serialize(), function(data){
                if (data['status'] && data['status'] === true) {
                    bonus_send = true;
                    $('.j-top-response', $this).html("@lang('tokenstars-messages.main_form.form_confirm_email')");
                    $input.prop("disabled", true);
                    $('.j-bonus-form').addClass('hide');
                    $('.j-bonus-response').removeClass('hide');
                } else {
                    $('.j-top-response', $this).html(data['error']);
                    $submit.prop("disabled", false);
                }
            });
        }
        return false;
    });

    // $('.j-top-form').submit(function (e) {
    //     e.preventDefault();
    //     var $this = $(this),
    //         $submit = $('[type="submit"]', $this),
    //         $input = $('[name="EMAIL"]', $this),
    //         email = $input.val();
    //     if (email) {
    //         $submit.prop("disabled", true);
    //         $.post("/ajax/subscribe",$this.serialize(),function(data){
    //             if (data['status'] && data['status'] === true) {
    //                 $('.j-top-response', $this).html("@lang('tokenstars-messages.main_form.form_confirm_email')");
    //                 $input.prop("disabled", true);
    //             } else {
    //                 $('.j-top-response', $this).html(data['error']);
    //                 $submit.prop("disabled", false);
    //             }
    //         });
    //     }
    // });

    // Toggle mob menu
    $('.j-mob-menu').click(function() {
        $('.j-header-nav').toggleClass('opened');
        $('.sticky').toggleClass('hide');
        $('html').toggleClass('no-scroll');
    });
    $(window).on('resize', function(){
        $('.j-header-nav').removeClass('opened');
        $('html').removeClass('no-scroll')
    });

    // Learn list toggler
    $('.j-learn-list-item').click(function() {
        $('.j-learn-list-item').removeClass('opened');
        $(this).addClass('opened');
    });

    // Lang selector
    $('.j-lang-selector').on('change blur', function( ) {
        location = this.value;
    });

    // Show mob team btn
    $('.j-mob-show-team').click(function(e) {
        e.preventDefault();
        $(this).closest('.j-team-mob').removeClass('closed');
        $(this).hide();
    })

    // Time Counter
    // counter('.j-counter-', 'Mar 28, 2018 23:00:00 UTC+3');

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
    $('.j-platform-item, .j-modules-description-toggle').click(function(e){
        $('.platform-description-holder').removeClass('hide');
    });


    // Allocation Graphs
    function funding_allocations() {
        return  [
        @foreach(app('translator')->get('tokenstars-messages.allocation.funding_allocations') as $i => $x)
          {
            "label": "@lang('tokenstars-messages.allocation.funding_allocations.' . $i . '.label')",
            "value": "@lang('tokenstars-messages.allocation.funding_allocations.' . $i . '.value')",
            "color": "@lang('tokenstars-messages.allocation.funding_allocations.' . $i . '.color')"
          },
        @endforeach
        ];
    }

    function token_allocations() {
        return  [
        @foreach(app('translator')->get('tokenstars-team.allocation.token_allocations') as $i => $x)
          {
            "label": "@lang('tokenstars-team.allocation.token_allocations.' . $i . '.label')",
            "value": "@lang('tokenstars-team.allocation.token_allocations.' . $i . '.value')",
            "color": "@lang('tokenstars-team.allocation.token_allocations.' . $i . '.color')"
          },
        @endforeach
        ];
    }

    $('.j-top-form').submit(function (e) {
        e.preventDefault();
        var $this = $(this),
            $submit = $('[type="submit"]', $this),
            $input = $('[name="EMAIL"]', $this),
            email = $input.val();
        if (email) {
            $submit.prop("disabled", true);
            $.post("/ajax/subscribe",$this.serialize(),function(data){
                if (data['status'] && data['status'] === true) {
                    $('.j-top-response', $this).html("@lang('tokenstars-messages.main_form.form_confirm_email')");
                    $input.prop("disabled", true);
                    if(typeof OHTracking1 !== 'undefined') {
                        OHTracking.lead({'email': email_value});
                    }
                } else {
                    $('.j-top-response', $this).html(data['error']);
                    $submit.prop("disabled", false);
                }
            });
        }
    });

    nv.addGraph(function() {
        var chart = nv.models.pieChart()
          .x(function(d) { return d.label })
          .y(function(d) { return d.value })
          .showLabels(false)
          .showLegend(false)
          .labelThreshold(.05)
          .labelType("percent")
          .donut(true)
          .donutRatio(0.50)
          ;

        d3.select(".j-funding-distribution-graph")
            .attr('width', 400)
            .attr('height', 400)
            .datum(funding_allocations) // SHOULD CHANGE THAT TO GET DIRECT FROM $data
            .transition().duration(350)
            .call(chart);

        nv.utils.windowResize(chart.update);

        return chart;
    });

    nv.addGraph(function() {
        var chart = nv.models.pieChart()
          .x(function(d) { return d.label })
          .y(function(d) { return d.value })
          .showLabels(false)
          .showLegend(false)
          .labelThreshold(.05)
          .labelType("percent")
          .donut(true)
          .donutRatio(0.50)
          ;

        d3.select(".j-token-distribution-graph")
            .attr('width', 400)
            .attr('height', 400)
            .datum(token_allocations) // SHOULD CHANGE THAT TO GET DIRECT FROM $data
            .transition().duration(350)
            .call(chart);

        nv.utils.windowResize(chart.update);

        return chart;
    });

</script>

@include('tokenstars.partial.analitics')

</body>
</html>
