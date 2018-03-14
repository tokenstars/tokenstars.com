<div class="popup">
    <style>
        .currency label{
            padding: 10px;
            border-radius: 7px;
            color: #1185f4;
            font-weight: bold;
            margin-right: 15px;
        }
        .currency input:checked+label{
            background-color: #ddd;
            color: #000;
        }

        .addition-info {
            margin: 15px 0 10px;
            font-size: 14px;
        }
        .lighter-line {
            display: flex;
            background-color: #284ab6;
            margin: 0 -40px;
            padding: 20px 40px;
        }
        .currency input{
            display: none;
        }

        .coupon {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .coupon input {
            padding: 3px;
            border-radius: 5px;
            border-color: transparent;
            color: gray;
            height: 36px;
            flex-grow: 12;
            margin: 0 25px;
        }

        .popup-box--buy-coins .button {
            height: 36px;
            line-height: 36px;
        }
        .popup-box--buy-coins{
            background-color: #183e93;
            color: #fff;
            padding-bottom: 0;
        }
        .wallet_address {
            display: none;
            margin: 0 auto;
            border: 1px solid #fff;
            border-radius: 8px;
            padding: 10px 15px;
            margin-bottom: 18px;
        }
    </style>
    <div class="popup-box popup-box--buy-coins el-wallet-notify">
        <div class="header-data header-l2-data">
            <form method="post" action="{{route('tokens.wallet')}}" class="js-wallet_form">
                {{ csrf_field() }}
                <input name="item_id" type="hidden" class="js-item_id_input">
                <div class="popup--close js-popup_close"></div>
                {{--
                <div class="coupon">
                    <span style="font-weight: bold;">Increase your bonus with coupon!</span>
                    <input type="text" class="coupon-code" name="coupon-code" placeholder="Coupon code">
                    <a href="#" disabled="disabled" class="button">Apply</a>
                </div>
                <div class="addition-info">* Promo codes have priority over referral links: if promo code is applied it will eliminate the effect of the referral link.</div>
                --}}
                <div class="currency lighter-line">
                    @if(config('app.debug'))
                        <input type="radio" name="currency" value="LTCT" id="radioLTCT" checked>
                        <label for="radioLTCT">TEST</label>
                @endif
                <!-- <input type="radio" name="currency" value="BTC" id="radioBTC" checked> -->
                    <!-- <label for="radioBTC">Bitcoin</label> -->
                    <!-- <input type="radio" name="currency" value="ETH" id="radioETH" > -->
                    <!-- <label for="radioETH">Ether</label> -->
                </div>

                {{--
                <div style="margin: 15px 0;">
                    <div style="display: flex;">
                        <input type="checkbox" name="name" id="name_1">
                        <label for="name_1">bla bla bla</label>
                    </div>
                    <div style="display: flex;">
                        <input type="checkbox" name="name" id="name_2">
                        <label for="name_2">bla bla bla</label>
                    </div>
                </div>
                --}}

                <div class="lighter-line" style="display: flex; justify-content: flex-end;padding-bottom: 20px; border-bottom-right-radius: 10px; border-bottom-left-radius: 10px">
                    <button class="button js-wallet_form_button" type="submit">Get Address</button>
                    <span class="wallet_address js-wallet_address"></span>
                </div>
            </form>
        </div>
    </div>
</div>