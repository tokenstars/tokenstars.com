<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, maximum-scale=1.0, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title> @yield("title") </title>

        <meta name="mobile-web-app-capable" content="yes">
        <meta name="theme-color" content="#157ffb">
        <meta name="application-name">
        <link href="{{asset(mix("/css/lib.css"))}}" rel="stylesheet" />
        <link href="{{asset(mix("/css/charity.css"))}}" rel="stylesheet" />
        <link href="{{asset(mix("/css/landing-ace-v2.css"))}}" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Exo+2:400,500,700&amp;subset=cyrillic" rel="stylesheet">
        <style>
            body .notie-container{
                z-index: 12;
            }
            .popup-box{
                display: none;
            }
        </style>
    </head>
    <body >

        @yield("content")

        <div class="popup">
            <div class="popup-box el-info">
                <div class="popup--close js-popup_close"></div>
                @yield('about_promo')

                <div class="popup-footer">
                    <div>
                        <div class="popup-sc">
                            <span class="popup-sc__title">View also:</span>

                            <div>
                                @yield('view_also')
                            </div>
                        </div>
                    </div>

                    <div>
                        <a href="@guest{{ route("register") }}@endguest" class="button" @guest onclick="ga('send', 'event', 'Contribute', 'contribute');" @endguest>Contribute</a>
                    </div>
                </div>
            </div>
        </div>

    <noscript id="deferred-styles">
        {{--<link rel="stylesheet" type="text/css" href="{{ asset(mix("/css/main2.css")) }}">--}}
        {{--<link href="{{asset("/css/lib.css")}}" rel="stylesheet" />--}}
        <link href="{{asset(mix("/css/charity.css"))}}" rel="stylesheet" />
        <link href="{{asset(mix("/css/landing-ace-v2.css"))}}" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="{{ asset(mix("/css/notie.min.css")) }}">
        <link href="/plugins/fotorama/fotorama.css" rel="stylesheet">
    </noscript>
    <script>
        var loadDeferredStyles = function() {
            var addStylesNode = document.getElementById("deferred-styles");
            if (addStylesNode) {
                var replacement = document.createElement("div");
                replacement.innerHTML = addStylesNode.textContent;
                document.body.appendChild(replacement);
                addStylesNode.parentElement.removeChild(addStylesNode);
            }
        };
        var raf = requestAnimationFrame || mozRequestAnimationFrame ||
            webkitRequestAnimationFrame || msRequestAnimationFrame;
        if (raf) raf(function() { window.setTimeout(loadDeferredStyles, 0); });
        else window.addEventListener('load', loadDeferredStyles);
    </script>
    <script type="text/javascript" src="{{ asset(mix("/js/app.js")) }}"></script>
    <script type="text/javascript" src="{{asset("/plugins/fotorama/fotorama.js")}}"></script>
</body>

</html>
