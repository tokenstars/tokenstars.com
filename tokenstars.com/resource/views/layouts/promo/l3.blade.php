@extends('layouts.promo.landing', ['gaLabel' => 'lp3', 'hideTopSubscription' => true])

@section('title', 'Tokenator - get the best token price like a whale.')
@section('header.class', 'header-l3')

@section("header.menu")
@include("layouts.promo.includes.header", ['gaLabel' => 'lp3'])
@endsection

@section("header.promo")
    <div class="page__layout">
        <div class="header-box">
            <span class="header__title">New deal every day<br />with discounts up to 80%</span>
            <div class="header--stripe"></div>
        </div>
        <section id="advant" class="advant advant-l3">
            <div class="page__layout">
                <div class="advant-item" data-item="1">
                    <span class="advant__title">No Scam</span>
                    <p>Our experts select the best token sales out of&nbsp;300+ new ICOs every month.</p>
                </div>

                <div class="advant-item" data-item="2">
                    <span class="advant__title">High Bonus</span>
                    <p>We&nbsp;negotiate the best terms (high discounts for collective tokens&rsquo; purchase).</p>
                </div>

                <div class="advant-item" data-item="3">
                    <span class="advant__title">Collective Power</span>
                    <p>Our club members participate in&nbsp;the sale together and collectively buy large number of&nbsp;tokens.</p>
                </div>

                <div class="advant-item" data-item="4">
                    <span class="advant__title">Like a Whale!</span>
                    <p>In&nbsp;the end, each individual club member gets the best price, like all &rsquo;whales&rsquo;.</p>
                </div>
            </div>
        </section>
    </div>

    @guest
    @if(!isset($subscribed) || !$subscribed)
    <div id="subscribe" class="subscribe-sticky-base js-subscribe-sticky-holder">
        <div class="subscribe js-subscribe-sticky">
            <div class="page__layout">
                <div class="subscribe-table">
                    <div class="subscribe-cell">
                        <div class="subscribe__caption">Join 10&nbsp;000 investors who get best deals and&nbsp;buy their tokens with TOKENATOR.</div>
                    </div>

                    <div class="subscribe-cell">
                        @include('layouts.promo.includes.subscribe_form', ['gaLabel' => 'top_lp3'])
                    </div>
                </div>

                <div class="subscribe--close js-subscribe-sticky_close"
                     onclick="ga('send', 'event', 'close', 'close'@isset($gaLabel), '{{ $gaLabel }}'@endisset );"></div>
            </div>
        </div>
    </div>
    @endif
    @endguest

    @parent
@endsection

@section('content')

    <section class="telegram telegram-l3">
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

    @include('layouts.promo.includes.team')
    @include('layouts.promo.includes.subscribe_popup')

@endsection
