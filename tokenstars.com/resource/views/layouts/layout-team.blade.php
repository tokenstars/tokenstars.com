<!DOCTYPE html>
@php
    $lang = app('translator')->getLocale()
@endphp
<html lang="{{ $lang }}">
<head>
    <title>{{ trans('meta.title') }}</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="yandex-verification" content="9e28d11315c43960" />
    <meta name="google-site-verification" content="2pPYktLC9TJhKxrmrWlh30p3eXSRq-MbLVHewsZqdic" />

    <meta name="title" content="{{ trans('meta.title') }}">
    <meta name="keywords" content="{{ trans('meta.keywords') }}">
    <meta name="description" content="{{ trans('meta.description') }}">
    <link rel="shortcut icon" href="/favicon.ico?v=2" type="image/x-icon">

    @section('meta')
        <meta property="og:title" content="{{trans('meta.og_title')}}"/>
        <meta property="og:description" content="{{ trans('meta.og_description') }}"/>
        <meta property="og:image" content="https://tokenstars.com/charity/images/charity/sharing6.jpg">
        <meta property="og:type" content="website"/>
        <meta property="og:url" content= "{{ app('url')->current() }}" />
    @endsection

    @yield('meta')
    <link href="{{asset(mix("/css/lib.css"))}}" rel="stylesheet" />
    <link href="{{asset(mix("/css/charity.css"))}}" rel="stylesheet" />
    <link href="{{asset(mix("/css/landing-ace-v2.css"))}}" rel="stylesheet" />
    <link href="{{asset("/css/notie.min.css")}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Exo+2:400,500,700&amp;subset=cyrillic" rel="stylesheet">
    @include('partial.analitics-head')
    <style>
        body .notie-container{
            z-index: 12;
        }
    </style>

</head>


<body>
@include('layouts.header')
@yield('header')

@yield('content')

<footer class="align-center">
    <div class="wrap">
        <div class="row">
            <div class="huge-margin-before">
                <a href="https://www.facebook.com/TokenStars/" target="_blank" class="footer-social-link"
                   onclick="ga('send', 'event', 'Click', 'facebook', 'Facebook');"><img title="Facebook" alt="Facebook" src="/images/ace/facebook.png" /></a>
                <a href="https://twitter.com/TokenStars" target="_blank" class="footer-social-link"
                   onclick="ga('send', 'event', 'Click', 'twitter', 'Twitter');"><img title="Twitter" alt="Twitter" src="/images/ace/twitter.png" /></a>
                <a href="https://medium.com/@tokenstars" target="_blank" class="footer-social-link"
                   onclick="ga('send', 'event', 'Click', 'medium', 'Medium');"><img title="Medium" alt="Medium" src="/images/ace/medium.png" /></a>
                <a href="https://t.me/TokenStars{{ $lang === 'ru' ? '_ru' : ($lang === 'jp'? 'Japan' : '_en') }}" target="_blank" class="footer-social-link"
                   onclick="ga('send', 'event', 'Click', 'telegram', 'Telegram');"><img title="Telegram" alt="Telegram" src="/images/ace/telegram.png" /></a>
                <a href="{{ $lang == 'ru' ? 'https://bitcointalk.org/index.php?topic=2045165.0' : 'https://bitcointalk.org/index.php?topic=2043613.0' }}" target="_blank" class="footer-social-link"
                   onclick="ga('send', 'event', 'Click', 'bitcointalk', 'Bitcoin Talk');"><img title="BitCoinTalk" alt="BitCoinTalk" src="/images/ace/bitcointalk.png" /></a>
                <a href="https://github.com/tokenstars/SolidityAuction" target="_blank" class="footer-social-link" onclick="ga('send', 'event', 'click', 'github', 'footer');"><img title="GitHub" alt="GitHub" src="/images/ace/github.png" /></a>
            </div>
            <div class="medium-margin-before">
                <nav class="footer-nav">
                    <a href="/charity" onclick="ga('send', 'event', 'Click', 'charity_clk', 'footer');">Crypto Auction</a>
                    <a href="/voting" onclick="ga('send', 'event', 'Click', 'voting_clk', 'footer');">Crypto Voting</a>
                    <a href="/ace" onclick="ga('send', 'event', 'Click', 'ace', 'footer');">ACE</a>
                    <a href="/team" onclick="ga('send', 'event', 'Click', 'team', 'footer');">TEAM</a>
                </nav>
            </div>
            <div class="huge-margin-before">
                <a href="/pdfs/Privacy_Policy.pdf" target="_blank" class="footer-terms"
                   onclick="ga('send', 'event', 'Click', 'privacy_policy', 'footer');">@lang('messages.footer.privacy')</a>
                <a href="/pdfs/Terms_of_Use.pdf" target="_blank" class="footer-terms"
                   onclick="ga('send', 'event', 'Click', 'terms_use', 'footer');">@lang('messages.footer.terms')</a>
                <a href="{{url("/rules")}}" target="_blank" class="footer-terms"
                   onclick="ga('send', 'event', 'Click', 'auction_rules', 'footer');">Auction rules</a>
            </div>
            <div class="medium-margin-before">
                    <a href="mailto:ask@tokenstars.com" class="footer-mail">ask@tokenstars.com</a>
                    <br />
                    <br />
            </div>
        </div>
    </div>
</footer>

<script src="{{ url(mix("/js/app.js")) }}"></script>
<script src="{{asset("/plugins/jquery.min.js")}}"></script>
<script src="{{asset("/plugins/fotorama/fotorama.js")}}"></script>
<link href="{{asset("/plugins/fotorama/fotorama.css")}}" rel="stylesheet">
{{--
<script src="https://player.vimeo.com/api/player.js"></script>
--}}
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
    });

    // Show bid history
    $('.j-toggle-bid-history').click(function(e) {
        e.preventDefault();
        $('.bid-history-holder').toggleClass('hide');
    });
</script>
{{--

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
        @foreach(app('translator')->get('messages.allocation.funding_allocations') as $i => $x)
          {
            "label": "@lang('messages.allocation.funding_allocations.' . $i . '.label')",
            "value": "@lang('messages.allocation.funding_allocations.' . $i . '.value')",
            "color": "@lang('messages.allocation.funding_allocations.' . $i . '.color')"
          },
        @endforeach
        ];
    }

    function token_allocations() {
        return  [
        @foreach(app('translator')->get('messages.allocation.token_allocations') as $i => $x)
          {
            "label": "@lang('messages.allocation.token_allocations.' . $i . '.label')",
            "value": "@lang('messages.allocation.token_allocations.' . $i . '.value')",
            "color": "@lang('messages.allocation.token_allocations.' . $i . '.color')"
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
                    $('.j-top-response', $this).html("@lang('messages.main_form.form_confirm_email')");
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

</script>--}}
@include('partial.analitics')
{{--<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>--}}

{{--<script type="text/javascript">
    window.twttr = (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0],
            t = window.twttr || {};
        if (d.getElementById(id)) return t;
        js = d.createElement(s);
        js.id = id;
        js.src = "https://platform.twitter.com/widgets.js";
        fjs.parentNode.insertBefore(js, fjs);

        t._e = [];
        t.ready = function(f) {
            t._e.push(f);
        };

        return t;
    }(document, "script", "twitter-wjs"));
</script>--}}
</body>
</html>
