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

    <link href="/lib-charity.css" rel="stylesheet" />
    <link href="/landing-ace-v2-charity.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Exo+2:400,500,700&amp;subset=cyrillic" rel="stylesheet">
    @include('tokenstars.partial.analitics-head')
</head>


<body>
<header class="header">
    <div class="wrap">
        <div class="header-logo">
            <img class="header-logo__image" alt="" src="/images/ace/logotype_tokenstars.png" />
            <img class="header-logo__image" alt="" src="/images/team/logo-team.png" />
        </div>
        <div class="header-nav__mob-menu j-mob-menu"><span></span> <span></span> <span></span></div>
        <nav class="header-nav j-header-nav">
            <ul class="header-nav__list j-header-nav-list">
                <li class="header-nav__listitem"><a href="/charity">Charity event</a></li>
                <li class="header-nav__listitem"><a href="/team/#ambassadors" onclick="ga('send', 'event', 'menu', 'ambassadors', 'menu');">@lang('tokenstars-messages.menu.ambassadors')</a></li>
                <li class="header-nav__listitem"><a href="/team/#modules" onclick="ga('send', 'event', 'menu', 'how_it_wokrs', 'menu');">@lang('tokenstars-messages.menu.how')</a></li>
                <li class="header-nav__listitem"><a href="/team/#team" onclick="ga('send', 'event', 'menu', 'team', 'menu');">@lang('tokenstars-messages.menu.team')</a></li>
                @if(false)
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
                @endif
                <li class="header-nav__listitem">
                    <div class="header-nav__lang">
                        <i class="header-nav__flag flag-{{ $lang }}"></i>
                        <select class="header-nav__lang_selector j-lang-selector">
                            <option {{ $lang == 'en' ? 'selected' : '' }} value="/en/team">English</option>
                            <option {{ $lang == 'ru' ? 'selected' : '' }} value="/ru/team">Русский</option>
                            <option {{ $lang == 'ko' ? 'selected' : '' }} value="/ko/team">한국어</option>
                            <option {{ $lang == 'zh' ? 'selected' : '' }} value="/zh/team">中文（简体）</option>
                            <option {{ $lang == 'jp' ? 'selected' : '' }} value="/jp/team">日本語</option>
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
                <a href="https://www.facebook.com/TokenStars/" target="_blank" class="footer-social-link" onclick="ga('send', 'event', 'click', 'facebook', 'footer');"><img title="Facebook" alt="Facebook" src="/images/ace/facebook.png" /></a>
                <a href="https://twitter.com/TokenStars" target="_blank" class="footer-social-link" onclick="ga('send', 'event', 'click', 'twitter', 'footer');"><img title="Twitter" alt="Twitter" src="/images/ace/twitter.png" /></a>
                <a href="https://medium.com/@tokenstars" target="_blank" class="footer-social-link" onclick="ga('send', 'event', 'click', 'medium', 'footer');"><img title="Medium" alt="Medium" src="/images/ace/medium.png" /></a>
                <a href="https://t.me/TokenStars{{ $lang == 'ru' ? '_ru' : ($lang == 'jp'? 'Japan' : '_en') }}" target="_blank" class="footer-social-link" onclick="ga('send', 'event', 'click', 'telegram', 'footer');"><img title="Telegram" alt="Telegram" src="/images/ace/telegram.png" /></a>
                <a href="{{ $lang == 'ru' ? 'https://bitcointalk.org/index.php?topic=2045165.0' : 'https://bitcointalk.org/index.php?topic=2043613.0' }}" target="_blank" class="footer-social-link" onclick="ga('send', 'event', 'click', 'bitcointalk', 'footer');"><img title="BitCoinTalk" alt="BitCoinTalk" src="/images/ace/bitcointalk.png" /></a>
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

<script src="/scripts-min-charity.js"></script>
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
    counter('.j-counter-', 'Nov 7, 2017 22:00:00 UTC+3');

    $('.j-popup-trigger').click(function(e){
        $($(this).data('target-popup')).addClass('showing');
    });


    $('.j-hide-popup').click(function(e){
      $('.popup-container').removeClass('showing');
    });

    $('.j-popup').click(function(e){
        if(!$(e.target).closest('.j-popup-holder').length) {
            $(this).removeClass('showing');
        }
    });

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
