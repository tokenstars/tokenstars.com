@extends('layouts.promo.layout')


@section('title', 'Tokenator - get the best token price like a whale.')
@section('header.class', 'header--landing')


@section("header.menu")
    @include("layouts.promo.includes.header")
@endsection

@section("header.promo")
    <div class="page__layout">
        <div class="header-box">
            <span class="header__title">The best token sales every day<br /><strong>with discounts up to 80%</strong></span>
            <div class="header--stripe"></div>
            <span class="header__advant">New deal every day<i>•</i>Limited time offer<i>•</i>Money back guarantee</span>

            <div class="tabs">
                <div class="tabs__item">TODAY’S DEAL</div>
                <a href="{{ route('prev') }}" class="tabs__item" target="_blank" onclick="ga('send', 'event', 'click', 'previous', 'body');">Previous Deals</a>
            </div>

            <div class="header-data">
                <div class="header-data-table">
                    <div class="header-data-cell">

                        @if($promo->end >= \Carbon\Carbon::now() )
                            @yield('header.slider')
                        @else
                            <div class="slider">
                                <div class="slider--frame">
                                    <img src="/images/promo-success.jpg">
                                </div>
                            </div>

                            <div class="slider-overlay slider-overlay--deal-success">
                                <div class="slider-control">
                                    <a class="button js-scrollto" href="#subscribe" data-type="info" onclick="ga('send', 'event', 'click', 'getnewdeals', '');">Get new deals</a>
                                </div>
                            </div>

                        @endif
                    </div>

                    <div class="header-data-cell">
                        <div class="contribute">
                            <div class="contribute__layout">
                                <span class="contribute__title">{{ $promo->currency->name }}<br />{{ $promo->currency->code }} TOKEN</span>
                                <span class="contribute__bonus">+{{ $promo->bonus }}% Bonus</span>
                                <span class="contribute__time">till {{ $promo->end->format('j F, h:i A e') }}</span>
                            </div>

                            <div class="contribute-timer" data-value="{{ $promo->end->format('Y-m-d H:i:s') }}">
                                <div class="contribute__layout">
                                    <div class="contribute--flex">
                                        <div class="contribute__value"><span class="js-timer__days"></span><i>days</i></div>
                                        <div class="contribute__value"><span class="js-timer__hours"></span><i>hours</i></div>
                                        <div class="contribute__value"><span class="js-timer__minutes"></span><i>min</i></div>
                                        <div class="contribute__value"><span class="js-timer__seconds"></span><i>sec</i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="contribute-collect">
                                <div class="contribute__layout">
                                    <span class="contribute-collect__title">collected:</span>
                                    <span class="contribute-collect__value">{{$collected['ETH']}} ETH <i>(${{number_format($collected['USD'], 0, '.', ' ')}})</i></span>

                                    <div class="contribute-bar">
                                        <div class="contribute-bar--line"
                                             @if ($collected['ETH'] < $targetAmount)
                                             style="width: {{ $promo->getProgressPercent($collected['ETH']) }}%;">
                                             @else
                                             style="width: 100%;">
                                             @endif
                                        </div>
                                        <div class="contribute-bar--stripe" style="left: 20%;"></div>
                                    </div>

                                    <div class="contribute-values">
                                        <span class="contribute-values__item st-min" style="width: 6%;"><i>min</i>{{ $minAmount }} {{ $promo->mainCurrency->code }}</span>
                                        <span class="contribute-values__item st-max"><i>max</i>{{ $targetAmount }} {{ $promo->mainCurrency->code }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="contribute__layout">
                                <div class="contribute--separator"></div>
                                @if($promo->end >= \Carbon\Carbon::now() )
                                    <a @guest href="{{ route("register") }}" @endguest
                                       @auth href="{{ route("portfolio") }}" @endauth class="button"
                                       @guest onclick="ga('send', 'event', 'Contribute', '{{ $gaLabel or 'contribute' }}');" @endguest>
                                       Contribute
                                    </a>
                                @else
                                    <span class="button disabled">
                                       Contribute
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    @include('layouts.promo.includes.advant')

    <section class="procedure">
        <div class="page__layout">
            <div class="procedure__image"></div>
        </div>
    </section>

    <section class="telegram">
        <div class="page__layout">
            <div class="telegram-chat">
                <div class="telegram-chat--image"></div>
            </div>

            <div class="telegram__layout">
                <div class="telegram-form">
                    <div>
                        <a href="https://t.me/tokenator" target="_blank" class="button st-telegram"
                           onclick="ga('send', 'event', 'join', 'telegram', 'middle');">Join chat in <br />TELEGRAM</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="follow" id="subscribe">
        <div class="page__layout">
            <div class="follow-flex">
                <div>
                    <span class="follow__title">New deal every day. Don't miss!</span>
                    @include('layouts.promo.includes.subscribe_form', ['gaLabel' => 'bottom', 'formClass' => 'follow-form'])
                </div>
            </div>
        </div>
    </section>

    @include('layouts.promo.includes.team')

@endsection
