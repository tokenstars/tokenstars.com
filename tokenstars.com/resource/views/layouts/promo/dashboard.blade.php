@extends('layouts.promo.auth_layout')

@section("header.promo")
    <div class="page__layout">
        <div class="header-box" style="padding-bottom: 20px;">
            <span class="header__title">The best token sales with<br /><strong>everyday discount up to 80%</strong></span>
        </div>
    </div>
@endsection

@section('content')
    <!-- wallet popover -->
    @if ($show_wallet_popover)
        <div class="popup">
            <div class="popup-box el-wallet">
                <div class="popup--close js-popup_close"></div>

                <span class="popup__title">Enter an ERC20 compatible wallet to receive tokens</span><br>

                <form class="wallet-popover-form-ajax" action="setwallet" method="post">
                    <input type="text" name="wallet" class="input" placeholder="Wallet"/>

                    <div class="popup-footer">
                        <div>
                            <input type="submit" value="Save" class="button">
                            <label class="wallet-popover-form-errors" style="margin-left: 20px; display: none;"></label>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    @endif

    <section class="dashboard">
        <div class="page__layout">
            <div class="dashboard__row">
                <div class="dashboard__lcol">
                    <h2 class="dashboard__step">Step 1:</h2>
                    <h2>Fund your balance</h2>
                    <p>
                        First, you need to fund your balance at Tokenator.IO. You can add bitcoins (BTC)
                        or ethereum (ETH)&nbsp;&ndash; simply click button and you'll get your individual
                        address for the transfer.
                    </p>
                </div>
                <div class="dashboard__rcol">
                    <div class="dashboard__balances">
                        @foreach($accounts as $account)
                            <div class="dashboard__balance">
                                <div class="dashboard__balance-title">{{ $account['name'] }} balance</div>
                                <div class="dashboard__balance-amount">{{ $account['account'] ? rtrim(number_format($account['account']->balance, 8), '0') : 0 }} {{ $account['code'] }}</div>
                                <button class="button dashboard__balance-add"
                                        data-currency="{{ $account['code'] }}"
                                        data-name="{{ $account['name'] }}"
                                        onclick="ga('send', 'event', 'add_{{ $account['code'] }}', 'add');">Add</button>
                            </div>
                        @endforeach
                    </div>
                    <div class="dashboard__wallet" style="display:none">
                        <div class="dashboard__wallet-title">
                            <strong class="dashboard__wallet-name"></strong> transfer address
                        </div>
                        <div>
                            <div class="dashboard__wallet-address"></div>
                        </div>
                        <button class="button dashboard__wallet-close">Close</button>
                    </div>
                </div>
            </div>
            <div class="dashboard__row">
                <div class="dashboard__lcol">
                    <h2 class="dashboard__step">Step 2:</h2>
                    <h2>Buy tokens</h2>
                    <p>
                        Now you're ready to buy tokens with huge collective discounts.
                        Select the project you want to participate in, decide how many tokens you want to get.

                    </p>
                    <p>
                        You can get more details about current deal at <a href="https://tokenator.io">tokenator.io</a>.
                    </p>
                    <p class="dashboard__step-info">
                        {!! $promo->terms !!}
                    </p>
                </div>
                @if($promo->end >= \Carbon\Carbon::now() )
                <div class="dashboard__rcol dashboard__form">
                    <div class="dashboard__form-title">{{ $promo->currency->name }}</div>
                    <div class="dashboard__form-title2">{{ $promo->currency->code }} TOKEN <strong>with</strong> {{ $promo->bonus }}% BONUS</div>

                    <form action="{{ route('tokens.buy') }}" method="post">
                        {{ csrf_field() }}
                        <div class="dashboard__form-box">
                            <div class="dashboard__form-lcol">
                                @foreach($accounts as $account)
                                    <div class="dashboard__form-currency">
                                        <div>
                                            <output></output> <strong class="">{{ $account['code'] }}</strong>
                                        </div>
                                        <input type="text"
                                               class="dashboard__form-range js-input_validate"
                                               name="{{ $account['code'] }}"
                                               @if($promo->fractional)
                                               data-fixed="2"
                                               @endif
                                               min="0"
                                               data-min="{{ $account['min_amount']  }}"
                                               @if($account['current'] < $account['min_amount'])
                                               disabled="disabled"
                                               @endif
                                               value="{{ rtrim(number_format($account['current'], 8), '0') }}"
                                               max="{{ rtrim(number_format($account['current'], 8), '0') }}"
                                               data-currency="{{ $account['code'] }}"
                                               data-price="{{ $account['price'] }}"
                                        >
                                    </div>
                                @endforeach
                            </div>
                            <div class="dashboard__form-separator">
                                <div class="dashboard__form-separator-chevron">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 50 50" version="1.1">
                                        <g id="surface1">
                                            <path style=" fill:#FFFFFF;" d="M 18.136719 3 C 17.875 3.003906 17.628906 3.105469 17.441406 3.289063 L 11.417969 9.265625 C 11.027344 9.65625 11.023438 10.289063 11.410156 10.679688 L 25.644531 25.03125 L 11.296875 39.265625 C 10.902344 39.65625 10.898438 40.289063 11.289063 40.679688 L 17.265625 46.703125 C 17.65625 47.097656 18.289063 47.101563 18.679688 46.710938 L 39.765625 25.796875 C 40.15625 25.40625 40.160156 24.773438 39.769531 24.378906 L 18.859375 3.296875 C 18.667969 3.101563 18.40625 2.996094 18.136719 3 Z "></path>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                            <div class="dashboard__form-rcol">
                                <div class="dashboard__form-header1">You'll get before bonus</div>
                                <div class="dashboard__form-sum">
                                    <span id="calculator-sum">0</span> {{ $promo->currency->code }}
                                </div>
                                <div class="dashboard__form-header2">with bonus</div>
                                <div class="dashboard__form-itogo">
                                    <span id="calculator-itogo" data-bonus="{{ $promo->bonus }}">0</span> {{ $promo->currency->code }}
                                </div>
                            </div>
                        </div>
                        <button type="button" class="button dashboard__form-submit dashboard__form-submit--disabled" style="display: none;">Min. contribution: {{config('app.min_eth')}} ETH or {{config('app.min_btc')}} BTC</button>
                        <button type="submit" id="calculator-confirm" class="button dashboard__form-submit dashboard__form-submit--enabled" onclick="ga('send', 'event', 'confirm_pmn', 'confirm_pmn');">Confirm payment</button>
                    </form>
                </div>
                @endif
            </div>
            <div class="dashboard__row">
                <div class="dashboard__lcol">
                    <h2 class="dashboard__step">Step 3:</h2>
                    <h2>Get your tokens</h2>
                    <p>
                        You are all set. When tokens are issued we'll
                        notify you and transfer to your wallet.
                    </p>
                </div>
                <div class="dashboard__rcol dashboard__telegram">
                    <div>
                        <p class="dashboard__telegram-title">Now you'll never miss a good deal!</p>
                        <a href="https://t.me/tokenator" target="_blank" class="button st-telegram" onclick="ga('send', 'event', 'join', 'telegram', 'account');">Join chat in <br>TELEGRAM</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if ($userPromos)
        <section class="history">
            <div class="page__layout">
                <h2>Purchase history</h2>
                <p>Check out your previously bought tokens.</p>

                <div class="history-items">
                    @foreach($userPromos as $promo_id => $promo)
                        @foreach($promo['transactions'] as $txn)

                            <div class="history-item">
                                <div class="history-header">
                                    <div>
                                        <h3>{{ $txn->transfer->promo->currency->name }}</h3>
                                        <span class="history__type">{{ $txn->transfer->promo->currency->code }} <i>with</i>
                                            <strong> {{ $txn->transfer->bonus }}% BONUS</strong></span>
                                    </div>

                                    <div>
                                        <span class="history__date">{{ $txn->created_at->format('d.m.Y') }}</span>
                                    </div>
                                </div>

                                <div class="history--separator"></div>

                                <span class="history__value">
                      @if ($txn->transfer->promo->currency->code == "PKT")
                                        {{ ($txn->transfer->parent ? $txn->transfer->parent->amount : $txn->transfer->amount) + 0 }}&nbsp;
                                        {{ $txn->transfer->parent ? $txn->transfer->parent->source->currency->code : $txn->transfer->source->currency->code }}&nbsp;
                                        <strong>&rarr;</strong> {{ round($txn->amount) }} {{ $txn->transfer->promo->currency->code }}<br>
                                        {{round($txn->amount*($txn->transfer->bonus/($txn->transfer->bonus + 100)))}} {{$txn->transfer->promo->currency->code}} BONUS INCLUDED
                                    @else
                                        {{ ($txn->transfer->parent ? $txn->transfer->parent->amount : $txn->transfer->amount) + 0 }}&nbsp;
                                        {{ $txn->transfer->parent ? $txn->transfer->parent->source->currency->code : $txn->transfer->source->currency->code }}&nbsp;
                                        <strong>&rarr;</strong> {{ number_format($txn->amount, 2) }} {{ $txn->transfer->promo->currency->code }}<br>
                                        {{number_format($txn->amount*($txn->transfer->bonus/($txn->transfer->bonus + 100)), 2)}} {{$txn->transfer->promo->currency->code}} BONUS INCLUDED
                                    @endif
                    </span>

                                @if ($txn->transfer->promo->currency->code == "PKT")
                                    <span class="history__eta">Estimated token delivery date:
                                        {{ $promo['promo']->delivery_date ? $promo['promo']->delivery_date->format('d.m.Y') : '' }}</span>
                                @else
                                    <span class="history__eta">Estimated token delivery date:
                                        {{ $promo['promo']->delivery_date ? $promo['promo']->delivery_date->format('d.m.Y') : '' }}</span>
                                @endif
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
