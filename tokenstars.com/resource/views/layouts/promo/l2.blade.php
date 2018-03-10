@extends('layouts.promo.layout-l2')


@section('title', 'Tokenator - get the best token price like a whale.')
@section('header.class', 'header-l2--landing')

@section("header.promo")
<div class="page__layout">
    <div class="header-box">
        <!--<span class="header__title">The best token sales every day<br /><strong>with discounts up to 80%</strong></span>-->

        <div class="header-data header-l2-data">
            <div class="header-l2-fish">
                <h2 style="text-indent: 0;">New token sale every day with discounts up to 80%</h2>
            </div>
            <div class="header-l2__form-holder">
                @include('layouts.promo.includes.subscribe_form', ['gaLabel' => 'popup_lp2'])
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('content')
    @include('layouts.promo.includes.advant')
@endsection
