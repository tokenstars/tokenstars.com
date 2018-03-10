<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, maximum-scale=1.0, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title> @yield("title") </title>

        <meta property="og:title" content="Tokenator - get the best token price like a whale." />
        <meta property="og:type" content="website" />
        <meta property="og:description" content="Tokenator offers huge discounts and bonuses on many different tokens. New deal every day!" />
        <meta property="og:keywords" content="token, token bonus, token discount, ico, token sale, pre-ico, cryptocurrency, blockchain" />
        <meta property="og:image" content="{{ asset('/images/image.png') }}" />
        <meta property="og:url" content="{{ Request::url() }}" />

        <link href="/plugins/fotorama/fotorama.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/css/main2.css">

        <meta name="mobile-web-app-capable" content="yes">
        <meta name="theme-color" content="#157ffb">
        <meta name="application-name">
        <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon-32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon-16.png">

        <meta name="google-site-verification" content="ZKnaWGXe3K2llPjIQ4kU5RwaT4V7_OwD_2LeLibXKNo" />
        <meta name="yandex-verification" content="2e63d20674e6573c" />

        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-MS2W8W3');</script>
        <!-- End Google Tag Manager -->

        <script charset="UTF-8" src="//cdn.sendpulse.com/28edd3380a1c17cf65b137fe96516659/js/push/949f9d25d6ec41572bc3e81b13f43c62_1.js" async></script>

        <!-- Start Visual Website Optimizer Asynchronous Code -->
        <!-- <script type='text/javascript'>
         var _vwo_code=(function(){
             var account_id=320491,
                 settings_tolerance=2000,
                 library_tolerance=2500,
                 use_existing_jquery=false,
                 / DO NOT EDIT BELOW THIS LINE /
             f=false,d=document;return{use_existing_jquery:function(){return use_existing_jquery;},library_tolerance:function(){return library_tolerance;},finish:function(){if(!f){f=true;var a=d.getElementById('_vis_opt_path_hides');if(a)a.parentNode.removeChild(a);}},finished:function(){return f;},load:function(a){var b=d.createElement('script');b.src=a;b.type='text/javascript';b.innerText;b.onerror=function(){_vwo_code.finish();};d.getElementsByTagName('head')[0].appendChild(b);},init:function(){settings_timer=setTimeout('_vwo_code.finish()',settings_tolerance);var a=d.createElement('style'),b='body{opacity:0 !important;filter:alpha(opacity=0) !important;background:none !important;}',h=d.getElementsByTagName('head')[0];a.setAttribute('id','_vis_opt_path_hides');a.setAttribute('type','text/css');if(a.styleSheet)a.styleSheet.cssText=b;else a.appendChild(d.createTextNode(b));h.appendChild(a);this.load('//dev.visualwebsiteoptimizer.com/j.php?a='+account_id+'&u='+encodeURIComponent(d.URL)+'&r='+Math.random());return settings_timer;}};}());_vwo_settings_timer=_vwo_code.init();
        </script> -->
        <!-- End Visual Website Optimizer Asynchronous Code -->
    </head>
    <body>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MS2W8W3"
                          height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        @if (session('status'))
            <!-- Google Code for Tokenator Conversion Page -->
            <script type="text/javascript">
                var google_conversion_id = 831256701;
                 var google_conversion_label = "M7LOCNiM73UQ_fCvjAM";
                 var google_remarketing_only = false;
            </script>
            <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
            </script>
            <noscript>
                <div style="display:inline;">
                    <img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/831256701/?label=M7LOCNiM73UQ_fCvjAM&amp;guid=ON&amp;script=0"/>
                </div>
            </noscript>
        @endif
        <section class="header @yield("header.class") ">
            <div class="menu">
                <div class="page__layout">
                    <div class="menu-table">
                        <div class="menu-cell">
                            <a href="/l2" class="menu--logo menu--logo--l2" onclick="ga('send', 'event', 'click', 'logo', '{{ $gaLabel or 'main' }}');"></a>
                        </div>
                        @yield("header.menu")
                    </div>
                </div>
            </div>

            @yield("header.promo")
        </section>

        @yield("content")

        <section class="footer footer--l2">
            <div class="page__layout">

                <div class="footer-links">

                    <a href="/Tokenator_Privacy_Policy.pdf" target="_blank" class="footer__link" onclick="ga('send', 'event', 'click', 'policy');">Privacy Policy</a>
                    <a href="/Tokenator_Terms_of_Use.pdf" target="_blank" class="footer__link" onclick="ga('send', 'event', 'click', 'terms');">Terms of Use</a>
                    {{-- <a href="#" class="footer__link" onclick="ga('send', 'event', 'click', 'faq');">FAQ</a> --}}

                </div>
            </div>
        </section>

        <script src="/js/app.js"></script>
        <script type="text/javascript" src="/plugins/fotorama/fotorama.js"></script>
    </body>
</html>
