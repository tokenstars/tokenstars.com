@section('header')
    <header class="header">
        <div class="wrap">
            <a href="/" class="header-logo" onclick="ga('send', 'event', 'Click', 'home_clk', 'navig');">
                <img class="header-logo__image" alt="" src="{{asset("/images/ace/logotype_tokenstars.png")}}" />
            </a>
            <div class="header-nav__mob-menu j-mob-menu"><span></span> <span></span> <span></span></div>
            <nav class="header-nav j-header-nav">
                <ul class="header-nav__list j-header-nav-list">
                    <li class="header-nav__listitem"><a href="/voting" onclick="ga('send', 'event', 'Click', 'voting_clk', 'navig');">Crypto Voting</a></li>
                    <li class="header-nav__listitem"><a href="/charity" onclick="ga('send', 'event', 'Click', 'charity_clk', 'navig');">Charity Crypto Auction</a></li>
                    <li class="header-nav__listitem"><a href="/ace" onclick="ga('send', 'event', 'Click', 'ace', 'navig');">ACE</a></li>
                    <li class="header-nav__listitem"><a href="/team" onclick="ga('send', 'event', 'Click', 'team', 'navig');">@lang('messages.menu.team')</a></li>
                    @if(false)
                        <li class="header-nav__listitem"><a href="@lang('messages.other.whitepaper')" target="_blank" onclick="ga('send', 'event', 'click', 'downloadwp', 'menu');">@lang('messages.menu.whitepaper')</a></li>

                        <li class="header-nav__listitem header-nav__listitem--bottom">
                            <a href="https://acetoken.tokenstars.com/users/sign_in{{$contribute_url}}" onclick="ga('send', 'event', 'login_main', 'login', 'main');">@lang('messages.menu.login')</a> / <a href="https://acetoken.tokenstars.com/users/sign_up{{$contribute_url}}" onclick="ga('send', 'event', 'signup_main', 'signup', 'main');">@lang('messages.menu.signup')</a>
                        </li>
                    @endif
                    <li class="header-nav__listitem header-nav__listitem--bottom">
                        @guest
                            <a href="#login" onclick="ga('send', 'event', 'login_charity', 'login', 'navig');">@lang('messages.menu.login')</a>
                            <span>/</span>
                            <a href="#signup" onclick="ga('send', 'event', 'sign_up_charity', 'signup', 'navig');">@lang('messages.menu.signup')</a>
                        @endguest
                        @auth
                            <a href="{{asset("/profile")}}" data-toggle="tooltip" title="Edit profile" onclick="ga('send', 'event', 'Click', 'profile_clk', 'navig');">@if(Auth::user()->oldCabinet->first_name != '') {{ mb_strimwidth(Auth::user()->oldCabinet->first_name, 0, 18)}} {{mb_strimwidth(Auth::user()->oldCabinet->last_name, 0,18)}} @else {{ Auth::user()->oldCabinet->email  }} @endif</a>
                            <span>/</span>
                            <a href="{{asset("/logout")}}" onclick="ga('send', 'event', 'Click', 'logout_clk', 'navig');">@lang('messages.menu.logout')</a>
                        @endauth
                    </li>
                    {{--<li class="header-nav__listitem">
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
                    </li>--}}

                </ul>
            </nav>
        </div>
    </header>
    <div class="header-clear"></div>
@endsection