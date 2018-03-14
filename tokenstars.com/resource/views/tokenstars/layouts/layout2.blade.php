<!DOCTYPE html>
@php
    $lang = app('translator')->getLocale()
@endphp
<html lang="{{ $lang }}">
<head>
    <title>{{ trans('tokenstars-meta.title') }}</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="yandex-verification" content="9e28d11315c43960" />
    <meta name="google-site-verification" content="2pPYktLC9TJhKxrmrWlh30p3eXSRq-MbLVHewsZqdic" />

    <meta name="title" content="{{ trans('tokenstars-meta.title') }}">
    <meta name="keywords" content="{{ trans('tokenstars-meta.keywords') }}">
    <meta name="description" content="{{ trans('tokenstars-meta.description') }}">
    <link rel="shortcut icon" href="/favicon.ico?v=2" type="image/x-icon">

    <meta property="og:title" content="{{ trans('tokenstars-meta.og_title') }}"/>
    <meta property="og:description" content="{{ trans('tokenstars-meta.og_description') }}"/>
    <meta property="og:image" content="http://tokenstars.com/images/ace/og_image.jpg">
    <meta property="og:type" content="website"/>
    <meta property="og:url" content= "{{ app('url')->current() }}" />

    <link href="/build/lib.css" rel="stylesheet" />
    <link href="/build/landing-ace-v2.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Exo+2:400,500,700&amp;subset=cyrillic" rel="stylesheet">
    @include('tokenstars.partial.analitics-head')
</head>


<body>
<header class="header">
    <div class="wrap">
        <div class="header-logo">
            <img class="header-logo__image" alt="" src="/images/ace/logotype_tokenstars.png" />
            <img class="header-logo__image" alt="" src="/images/ace/logotype_ace.png" />
        </div>
        <div class="header-nav__mob-menu j-mob-menu"><span></span> <span></span> <span></span></div>
        <nav class="header-nav j-header-nav">
            <ul class="header-nav__list j-header-nav-list">
                <li class="header-nav__listitem"><a href="#vision">@lang('tokenstars-messages.menu.how')</a></li>
                <li class="header-nav__listitem"><a href="#why">@lang('tokenstars-messages.menu.technology')</a></li>
                <li class="header-nav__listitem"><a href="#roadmap">@lang('tokenstars-messages.menu.roadmap')</a></li>
                <li class="header-nav__listitem"><a href="#team">@lang('tokenstars-messages.menu.team')</a></li>
                <li class="header-nav__listitem"><a href="@lang('tokenstars-messages.other.whitepaper')" target="_blank" onclick="ga('send', 'event', 'click', 'downloadwp', 'menu');">@lang('tokenstars-messages.menu.whitepaper')</a></li>
                <li class="header-nav__listitem header-nav__listitem--bottom">
                    @guest
                    <a href="{{config('app.token_tokenstars_host') . '/users/sign_in'}}{{$contribute_url}}" onclick="ga('send', 'event', 'login_main', 'login', 'main');">@lang('tokenstars-messages.menu.login')</a> / <a href="{{config('app.token_tokenstars_host') . '/users/sign_up'}}{{$contribute_url}}" onclick="ga('send', 'event', 'signup_main', 'signup', 'main');">@lang('tokenstars-messages.menu.signup')</a>
                    @endguest
                    @auth
                    <a href="{{config('app.token_tokenstars_host') . '/profile/edit'}}" data-toggle="tooltip" title="Edit profile" onclick="ga('send', 'event', 'Click', 'profile_clk', 'navig');">{{ Auth::user()->name_or_email  }}</a>
                    <a href="{{route('auth.logout')}}" onclick="ga('send', 'event', 'Click', 'logout_clk', 'navig');">@lang('messages.menu.logout')</a>
                    @endauth
                </li>
                <li class="header-nav__listitem">
                    <div class="header-nav__lang">
                        <i class="header-nav__flag flag-{{ $lang }}"></i>
                        <select class="header-nav__lang_selector j-lang-selector">
                            <option {{ $lang == 'en' ? 'selected' : '' }} value="/en/ace">English</option>
                            <option {{ $lang == 'ru' ? 'selected' : '' }} value="/ru/ace">Русский</option>
                            <option {{ $lang == 'ko' ? 'selected' : '' }} value="/ko/ace">한국어</option>
                            <option {{ $lang == 'zh' ? 'selected' : '' }} value="/zh/ace">中文（简体）</option>
                            <option {{ $lang == 'jp' ? 'selected' : '' }} value="/jp/ace">日本語</option>
                        </select>
                    </div>
                </li>

            </ul>
        </nav>
    </div>
</header>
<div class="header-clear"></div>

@yield('content')

<footer class="align-center">
    <div class="wrap">
        <div class="row">
            <div class="huge-margin-before">
                <a href="https://www.facebook.com/TokenStars/" target="_blank" class="footer-social-link"><img title="Facebook" alt="Facebook" src="/images/ace/facebook.png" /></a>
                <a href="https://twitter.com/TokenStars" target="_blank" class="footer-social-link"><img title="Twitter" alt="Twitter" src="/images/ace/twitter.png" /></a>
                <a href="https://medium.com/@tokenstars" target="_blank" class="footer-social-link"><img title="Medium" alt="Medium" src="/images/ace/medium.png" /></a>
                <a href="https://t.me/TokenStars{{ $lang == 'ru' ? '_ru' : ($lang == 'jp'? 'Japan' : '_en') }}" target="_blank" class="footer-social-link" onclick="ga('send', 'event', 'click', 'telegram', 'bottom');"><img title="Telegram" alt="Telegram" src="/images/ace/telegram.png" /></a>
                <a href="{{ $lang == 'ru' ? 'https://bitcointalk.org/index.php?topic=2045165.0' : 'https://bitcointalk.org/index.php?topic=2043613.0' }}" target="_blank" class="footer-social-link"><img title="BitCoinTalk" alt="BitCoinTalk" src="/images/ace/bitcointalk.png" /></a>
            </div>
            <div class="medium-margin-before">
                <nav class="footer-nav">
                    <a href="#vision">@lang('tokenstars-messages.vision.title')</a>
                    <a href="#roadmap">@lang('tokenstars-messages.menu.roadmap')</a>
                    <a href="#team">@lang('tokenstars-messages.menu.team')</a>
                    <a href="#press">@lang('tokenstars-messages.menu.press')</a>
                </nav>
            </div>
            <div class="huge-margin-before">
                <a href="/pdfs/Privacy_Policy.pdf" target="_blank" class="footer-terms">@lang('tokenstars-messages.footer.privacy')</a>
                <a href="/pdfs/Terms_of_Use.pdf" target="_blank" class="footer-terms">@lang('tokenstars-messages.footer.terms')</a>
                <a href="@lang('tokenstars-messages.other.faq')" target="_blank" class="footer-terms">@lang('tokenstars-messages.footer.faq')</a>
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

    // Toggle mob menu
    $('.j-mob-menu').click(function() {
        $('.j-header-nav').toggleClass('opened');
        $('html').toggleClass('no-scroll')
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
    counter('.j-counter-', 'Oct 31, 2017 22:00:00 UTC+3');

    // Vimeo Popup
    var vimeovideo = document.getElementById('j-vimeo-video');

    if(vimeovideo)
      var vimeoplayer = new Vimeo.Player(vimeovideo);

    $('.j-popup-trigger').click(function(e){
        $($(this).data('target-popup')).addClass('showing');
    });

    $('.j-popup-video-trigger').click(function(e){
      if(vimeoplayer)
        vimeoplayer.play();
    });

    $('.j-hide-popup').click(function(e){
      $('.popup-container').removeClass('showing');
      if(vimeoplayer)
        vimeoplayer.unload();
    });

    $('.j-popup').click(function(e){
        if(!$(e.target).closest('.j-popup-holder').length) {
            $(this).removeClass('showing');
            if(vimeoplayer)
              vimeoplayer.unload();
        }
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
        @foreach(app('translator')->get('tokenstars-messages.allocation.token_allocations') as $i => $x)
          {
            "label": "@lang('tokenstars-messages.allocation.token_allocations.' . $i . '.label')",
            "value": "@lang('tokenstars-messages.allocation.token_allocations.' . $i . '.value')",
            "color": "@lang('tokenstars-messages.allocation.token_allocations.' . $i . '.color')"
          },
        @endforeach
        ];
    }

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
                } else {
                    $('.j-top-response', $this).html(data['error']);
                    $submit.prop("disabled", false);
                }
            });
        }
    });

</script>
@include('tokenstars.partial.analitics')

</body>
</html>
