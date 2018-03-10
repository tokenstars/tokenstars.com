@extends('layouts.promo.layout', ['gaLabel' => 'deals'])

@section('title', 'Tokenator - Deals')

@section("header.menu")
    @include("layouts.promo.includes.header", ['gaLabel' => 'deals', 'root' => true])
@endsection

@section("content")
    <section class="dashboard">
        <div class="page__layout">
            <div class="dashboard__row">
                <div class="dashboard__lcol">
                    <h2>Previous deals</h2>

                    <p>The pre-sale collective sales club started in&nbsp;June in&nbsp;Silicon Valley and grew organically. In&nbsp;June-September the club functioned via chat, email, Excel tables.</p>

                    <p>The more members we&nbsp;had the more complicated were the communications and transactions. So, October, 10&nbsp;the web service was launched with automated token distribution, private dashboards (balance, deal history).</p>

                </div>
                <div class="dashboard__rcol dashboard__telegram">
                    <div>
                        <p class="dashboard__telegram-title">Now you'll never miss a good deal!</p>
                        <a href="https://t.me/tokenator" target="_blank" class="button st-telegram" onclick="ga('send', 'event', 'join', 'telegram', 'deals');">Join chat in <br>TELEGRAM</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="page__layout">
            <div class="dashboard__row">

                <div class="event st-big">

                    <div class="event-header" style="background-image: url('/images/events/hacken.jpg');">
                        <div class="event--image"></div>
                    </div>

                    <div class="event-body">
                        <div>
                            <span class="event__title">Hacken</span>
                            <span class="event__caption">HKN TOKEN / 25% BONUS <br /> Collected: 109,304956796&nbsp;ETH</span>
                            <span class="event__date">28 November, 2017 - 1&nbsp;December,&nbsp;2017</span>
                        </div>
                    </div>
                </div>


                <div class="event st-big">

                    <div class="event-header" style="background-image: url('/images/events/bitclave.jpg');">
                        <div class="event--image"></div>
                    </div>

                    <div class="event-body">
                        <div>
                            <span class="event__title">Bitclave</span>
                            <span class="event__caption">CAT TOKEN / 30% BONUS <br /> Collected: 50 ETH</span>
                            <span class="event__date">24 – 28 November, 2017</span>
                        </div>
                    </div>
                </div>

                <div class="event st-big">

                    <div class="event-header" style="background-image: url('/images/events/gladius.jpg');">
                        <div class="event--image"></div>
                    </div>

                    <div class="event-body">
                        <div>
                            <span class="event__title">Gladius</span>
                            <span class="event__caption">GLA TOKEN / 50% BONUS <br /> Collected: 139.77 ETH</span>
                            <span class="event__date">17 – 24 November, 2017</span>
                        </div>
                    </div>
                </div>
                <div class="event st-big">

                    <div class="event-header" style="background-image: url('/images/events/goldmint.jpg');">
                        <div class="event--image"></div>
                    </div>

                    <div class="event-body">
                        <div>
                            <span class="event__title">GOLDMINT</span>
                            <span class="event__caption">MNTP TOKEN / 50% BONUS <br /> Collected: 22.3 ETH</span>
                            <span class="event__date">20 – 25 October, 2017</span>
                        </div>
                    </div>
                </div>
                <div class="event st-big">

                    <div class="event-header" style="background-image: url('/images/events/paykey.jpg');">
                        <div class="event--image"></div>
                    </div>

                    <div class="event-body">
                        <div>
                            <span class="event__title">Playkey</span>
                            <span class="event__caption">PKT TOKEN / 50% BONUS <br /> Collected: 111 ETH</span>
                            <span class="event__date">14 – 20 October, 2017</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="events">
        <div class="page__layout">
            <div class="event">
                <div class="event-header" style="background-image: url('/images/events/kin.png');">
                    <div class="event--image"></div>
                </div>

                <div class="event-body">
                    <div>
                        <span class="event__title">Kin</span>
                        <span class="event__date">September, 2017</span>
                    </div>
                </div>
            </div>

            <div class="event">
                <div class="event-header" style="background-image: url('/images/events/enigma.png');">
                    <div class="event--image"></div>
                </div>

                <div class="event-body">
                    <div>
                        <span class="event__title">Enigma</span>
                        <span class="event__date">September, 2017</span>
                    </div>
                </div>
            </div>

            <div class="event">
                <div class="event-header" style="background-image: url('/images/events/maecenas.png');">
                    <div class="event--image"></div>
                </div>

                <div class="event-body">
                    <div>
                        <span class="event__title">Maecenas</span>
                        <span class="event__date">14 – 18 October, 2017</span>
                    </div>
                </div>
            </div>

            <div class="event">
                <div class="event-header" style="background-image: url('/images/events/0x-project.png');">
                    <div class="event--image"></div>
                </div>

                <div class="event-body">
                    <div>
                        <span class="event__title">0x project</span>
                        <span class="event__date">August, 2017</span>
                    </div>
                </div>
            </div>

            <div class="event">
                <div class="event-header" style="background-image: url('/images/events/propy.png');">
                    <div class="event--image"></div>
                </div>

                <div class="event-body">
                    <div>
                        <span class="event__title">Propy</span>
                        <span class="event__date">August, 2017</span>
                    </div>
                </div>
            </div>

            <div class="event">
                <div class="event-header" style="background-image: url('/images/events/coindash.png');">
                    <div class="event--image"></div>
                </div>

                <div class="event-body">
                    <div>
                        <span class="event__title">Coindash</span>
                        <span class="event__date">July, 2017</span>
                    </div>
                </div>
            </div>

            <div class="event">
                <div class="event-header" style="background-image: url('/images/events/soundchain.png');">
                    <div class="event--image"></div>
                </div>

                <div class="event-body">
                    <div>
                        <span class="event__title">Soundchain</span>
                        <span class="event__date">July, 2017</span>
                    </div>
                </div>
            </div>

            <div class="event">
                <div class="event-header" style="background-image: url('/images/events/tierion.png');">
                    <div class="event--image"></div>
                </div>

                <div class="event-body">
                    <div>
                        <span class="event__title">Tierion</span>
                        <span class="event__date">July, 2017</span>
                    </div>
                </div>
            </div>

            <div class="event">
                <div class="event-header" style="background-image: url('/images/events/civic.png');">
                    <div class="event--image"></div>
                </div>

                <div class="event-body">
                    <div>
                        <span class="event__title">Civic</span>
                        <span class="event__date">June, 2017</span>
                    </div>
                </div>
            </div>

            <div class="event">
                <div class="event-header" style="background-image: url('/images/events/eos.png');">
                    <div class="event--image"></div>
                </div>

                <div class="event-body">
                    <div>
                        <span class="event__title">EOS</span>
                        <span class="event__date">June, 2017</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
