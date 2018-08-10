<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://tokenstars.com/build/fresh.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/assets/card/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    <link rel='stylesheet' href='https://cdn.rawgit.com/alangrafu/radar-chart-d3/master/src/radar-chart.min.css'>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="/js/cropper.js"></script>
    <script type="text/javascript" src="/js/jquery-cropper.min.js"></script>

    <!--<script type="text/javascript" src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script type="text/javascript" src="https://www.amcharts.com/lib/3/radar.js"></script>-->
<style>
    .chart-container {
        margin: 2em;

    }


    .radar-chart.focus .area {
        fill-opacity: 0.5;
    }

    .radar-chart.focus .area.focused {
        fill-opacity: 0.5;
    }

    .area.real, .real .circle {
        fill: #E50422;
        stroke: none;
    }

    .area.level_5, .level_5 .circle {
        fill: #001E78;
        stroke: none;
    }

    .radar-chart .axis .legend {
        font-size: 15px;
        color: #9898aa;
    }

    .left {
        font-size: 1px;
        color: #9191A5;
    }

    .level_1 .circle,
    .level_2 .circle,
    .level_3 .circle,
    .level_4 .circle,
    .level_5 .circle {
        display: none;
    }

    .level_5 polygon {
        stroke: none !important;
    }
    tspan {
        /*font-weight: bolder;*/
        color:#9898aa;
        font-family: "Exo 2", "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    }
</style>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.12/d3.min.js'></script>
    <script src='https://cdn.rawgit.com/alangrafu/radar-chart-d3/master/src/radar-chart.min.js'></script>

    <style>
        .ekko-lightbox iframe
        {
            width: 100%;
            height: 315px;
        }
        .amcharts-chart-div a {display:none !important;}
    </style>
    @include('scouting.app-icons')
    <!-- Generate using http://realfavicongenerator.net/ -->

</head>
<body class="page-body">
@include('layouts.cabinet.header')

<div class="page-wrapper">

    <div class="container">
        <div class="mt-5"></div>
        @yield('content')
    </div>

</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
<script src="/assets/card/jquery.dotdotdot.js"></script>
<script type="text/javascript" src="/js/oc.js"></script>
<script type="text/javascript" charset="utf-8">
    class DotDotDot {
        constructor(el) {
            this.el = el;
            $(this.el).each(function () {
                const $wrapper = $(this);
                const height = $wrapper.data('height') || 100;
                const ellipsis = $wrapper.data('ellipsis') === undefined ? '\u2026' : $wrapper.data('ellipsis');
                const $text = $wrapper.find('.js-text');
                const $toggle = $wrapper.find('.js-toggle');

                const options = {
                    ellipsis: ellipsis,
                    wrap: 'word',
                    watch: true,
                    height,
                };

                $text.dotdotdot(options);

                $toggle.on('click', (e) => {
                    e.preventDefault();

                    if ($wrapper.hasClass('dotdotdot_full-text')) {
                        $wrapper.removeClass('dotdotdot_full-text');
                        $text.dotdotdot(options);
                    } else {
                        $wrapper.addClass('dotdotdot_full-text');
                        $text.trigger('destroy.dot');
                    }
                });
            });
        }
    }
    new DotDotDot($('.dotdotdot'));

    $(document).ready(function() {
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
    });

</script>
</body>
</html>
