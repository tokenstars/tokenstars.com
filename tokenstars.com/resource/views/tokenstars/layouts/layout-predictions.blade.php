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
    <link href="/build/predictions.css?1" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Exo+2:400,500,700&amp;subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" href="/assets/card/app.css">
    <script src='https://www.google.com/recaptcha/api.js?explicit&hl=en'></script>

    @include('tokenstars.partial.analitics-head')
</head>


<body class="page-body">
@include('layouts.cabinet.header')
<!--<header class="header">
    <div class="wrap">
        <div class="header-logo">
            <a href="/" onclick="ga('send', 'event', 'click', 'TEAM_logo_pred')"><img class="header-logo__image" alt="" src="/images/ace/logotype_tokenstars.png" /></a>
            <img class="header-logo__image j-jump-to-top" alt="" src="/images/team/logo-team.png" />
        </div>
        <div class="header-nav__mob-menu j-mob-menu"><span></span> <span></span> <span></span></div>
        <nav class="header-nav j-header-nav">
            <ul class="header-nav__list j-header-nav-list">
                <li class="header-nav__listitem"><a href="https://tokenstars.com/predictions" onclick="ga('send', 'event', 'click', 'Pred_top');">Predictions</a></li>
                <li class="header-nav__listitem"><a href="https://tokenstars.com/voting" onclick="ga('send', 'event', 'click', 'Voting_pred');">Crypto Voting</a></li>
                <li class="header-nav__listitem"><a href="https://tokenstars.com/charity" onclick="ga('send', 'event', 'click', 'Charity_pred');">Charity Crypto Auction</a></li>
                <li class="header-nav__listitem"><a href="/team" onclick="ga('send', 'event', 'click', 'TEAM_pred');">TEAM</a></li>
                <li class="header-nav__listitem"><a href="/ace" onclick="ga('send', 'event', 'click', 'ACE_pred');">ACE</a></li>

                <li class="header-nav__listitem header-nav__listitem--bottom">
                    @guest
                    <a href="{{config('app.token_tokenstars_host') . '/users/sign_in'}}{{$contribute_url}}" onclick="ga('send', 'event', 'Login', 'Login_predictions');">@lang('tokenstars-messages.menu.login')</a>
                    <span class="sub-font-color">/</span>
                    <a href="{{config('app.token_tokenstars_host') . '/users/sign_up'}}{{$contribute_url}}" onclick="ga('send', 'event', 'Sign up', 'Signup_predictions');">@lang('tokenstars-messages.menu.signup')</a>
                    @endguest
                    @auth
                    <a href="{{config('app.token_tokenstars_host') . '/profile/edit'}}" data-toggle="tooltip" title="Edit profile" onclick="ga('send', 'event', 'Click', 'profile_clk', 'navig');">{{ Auth::user()->name_or_email  }}</a>
                    <a href="{{route('auth.logout')}}" onclick="ga('send', 'event', 'Click', 'logout_clk', 'navig');">@lang('messages.menu.logout')</a>
                    @endauth
                </li>
            </ul>
        </nav>
    </div>
</header>-->
<!--<div class="header-clear"></div>-->

@yield('content')

<footer class="align-center">
    <div class="wrap">
        <div class="row">
            <div class="col-xs-6 align-left">
                <div class="big-margin-before">
                    <a href="/pdfs/Privacy_Policy.pdf" target="_blank" class="footer-terms" onclick="ga('send', 'event', 'click', 'privacy_predictions');">@lang('tokenstars-messages.footer.privacy')</a>
                    <a href="/pdfs/Terms_of_Use.pdf" target="_blank" class="footer-terms" onclick="ga('send', 'event', 'click', 'terms_predictions');">@lang('tokenstars-messages.footer.terms')</a>
                </div>
            </div>
            <div class="col-xs-6 align-right">
                <div class="big-margin-before">
                    <a href="mailto:ask@tokenstars.com" class="footer-mail">ask@tokenstars.com</a>
                    <br />
                    <br />
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="{{asset(mix('/build/scripts-min.js'))}}"></script>
<script src="https://player.vimeo.com/api/player.js"></script>

<script>

    $(document).ready(function() {

        
    });

</script>
@include('tokenstars.partial.analitics')

</body>
</html>
