<div class="popup">
    <div class="popup-box popup-box--empty el-subscribe">
        <div class="header-data header-l2-data">
            <div class="popup--close js-popup_close"
                 onclick="ga('send', 'event', 'close', 'close' @if (isset($gaLabel)), '{{ $gaLabel }}' @endif );"></div>
            <div class="header-l2-fish">
                <h2 style="text-indent: 0; font-size: 28px">New token sale every day with discounts up to 80%</h2>
            </div>
            <div class="header-l2__form-holder">
                @include('layouts.promo.includes.subscribe_form', ['gaLabel' => 'popup'])
            </div>
        </div>
    </div>
</div>
