<div class="popup">
   <div class="popup-box el-info" style="background: rgb(39, 54, 155);
padding-bottom: 0px; padding-top: 0px;">
        <form action="@yield('bid_action', route('tokens.wallet'))"
              method="POST"
              class="@yield('bid_class', 'js-wallet_form')">
            {{ csrf_field() }}

            <input type="hidden" name="item_id" class="js-item_id_input">
            
            <div class="bid-title">
                <div class="bid-title__text">Place your bid!</div>            
                <div class="bid-title__close js-popup_close"></div>
            </div>

            <div class="bid-block js-bid-empty">
                Choose your payment method to continue:
            </div>

            <div class="bid-currencies">
                <!--<input type="radio" name="currency" value="BCH" id="radioBCH" onclick="ga('send', 'event', 'click', 'bch', 'Choosing Bitcoin Cash');"/>
                <label for="radioBCH"  class="js-bch-radio">Bitcoin Cash</label>

                <input type="radio" name="currency" value="BTC" id="radioBTC" onclick="ga('send', 'event', 'click', 'bitcoin', 'Choosing Bitcoin');"/>
                <label for="radioBTC"  class="js-btc-radio">Bitcoin</label>-->

                <input type="radio" name="currency" value="ETH" id="radioETH" onclick="ga('send', 'event', 'click', 'ether', 'Choosing Ether');"/>
                <label for="radioETH">Ethereum</label>

                <input type="radio" name="currency" value="ACE" id="radioACE"  onclick="ga('send', 'event', 'click', 'ace', 'Choosing ACE');"/>
                <label for="radioACE" class="js-ace-token-radio">ACE Tokens</label>

                <input type="radio" name="currency" value="TEAM" id="radioTEAM" onclick="ga('send', 'event', 'click', 'team', 'Choosing TEAM');"/>
                <label for="radioTEAM" class="js-team-token-radio">TEAM Tokens</label>

            @if(config('app.debug'))
                    <!--<input type="radio" name="currency" value="LTCT" id="radioLTCT">
                    <label for="radioLTCT">Litecoin Testnet</label>-->
                @endif
            </div>
            @yield('bid_block')
        </form>
        <div class="bid-payments js-loader" style="display: none">
            <div class="loader"></div>
        </div>

        <div class="bid-payments js-bid-payments js-paymentsBTC js-paymentsBCH js-paymentsLTCT" style="display: none;">
            <div class="bid-payments__options">
                <div>
                    <span class="js-highest-bid"></span>
                    <span class="js-your-bid"></span>
                </div>

                <div class="bid-wallet">
                    <span class="bid-wallet__title">Deposit your bid directly to this wallet:</span>
                    <span class="bid-wallet__address js-wallet_address"></span>
                </div>
            </div>
        </div>

        <div class="bid-payments js-bid-error" style="display: none;">
        </div>
        <div class="bid-payments js-bid-payments js-paymentsETH" style="display: none;">
            <div class="bid-payments__options">
                <div>
                    <span class="js-highest-bid"></span>
                    <span class="js-your-bid"></span>
                </div>

                <div class="bid-wallet">
                    <span class="bid-wallet__title">Deposit your bid directly to this wallet:</span>
                    <span class="bid-wallet__address js-wallet_address"></span>
                </div>
                @auth
                <div class="bid-wallet">
                    <span class="bid-wallet__title">or Deposit your bid directly to the address<br>of the Ethereum smart contract for this auction:</span>
                    <span class="bid-wallet__address js-item-eth-wallet"></span>
                    <div class="bid-metamask">
                        <input type="text" class="input">
                        <div class="tip-button js-metamask-tip" data-eth-wallet="" onclick="ga('send', 'event', 'click', 'pay_metamask', 'Paying with METAMASK');"></div>
                    </div>
                </div>
                @endauth
            </div>
        </div>

        <div class="bid-payments js-bid-payments js-paymentsACE">
            <div class="bid-payments__options">
                <div>
                    <span class="js-highest-bid"></span>
                    <span class="js-your-bid"></span>
                </div>

                @auth
                <span>Please note that you can use no more than 500 ACE<br>while bidding for this lot (see auction rules for details).</span>
                <div class="bid-wallet">
                    <span class="bid-wallet__title">Placing a bid in tokens requires two transactions. First transaction approves the auction address for your tokens. Second transaction calls the Bid function on the Auction smart-contract. You can find the Auction smart-contract address below. If you use Metamask you can initiate both transactions with one click on the button below.</span>
                    <span class="bid-wallet__address js-item-eth-wallet"></span>
                    <div class="bid-metamask">
                        <input type="text" class="input">
                        <div class="tip-button js-metamask-tip" data-eth-wallet="" data-token="ACE" data-token-address="{{ env('ACE_TOKEN_ADDRESS') }}"
                             onclick="ga('send', 'event', 'click', 'pay_metamask', 'Paying with METAMASK');"></div>
                    </div>
                </div>
                @else
                    <div class="bid-block">
                        To be able to bidd in TEAMS/ACES please&nbsp;<a href="{{route('login')}}">sign&nbsp;in</a>
                    </div>
                @endauth
            </div>
        </div>

       <div class="bid-payments js-bid-payments js-paymentsTEAM">
           <div class="bid-payments__options">
               <div>
                   <span class="js-highest-bid"></span>
                   <span class="js-your-bid"></span>
               </div>

               @auth
               <span>Please note that you can use no more than 500 TEAM<br>while bidding for this lot (see auction rules for details).</span>
               <div class="bid-wallet">
                   <span class="bid-wallet__title">Placing a bid in tokens requires two transactions. First transaction approves the auction address for your tokens. Second transaction calls the Bid function on the Auction smart-contract. You can find the Auction smart-contract address below. If you use Metamask you can initiate both transactions with one click on the button below.</span>
                   <span class="bid-wallet__address js-item-eth-wallet"></span>
                   <div class="bid-metamask">
                       <input type="text" class="input">
                       <div class="tip-button js-metamask-tip" data-eth-wallet="" data-token="TEAM" data-token-address="{{ env('TEAM_TOKEN_ADDRESS') }}"
                            onclick="ga('send', 'event', 'click', 'pay_metamask', 'Paying with METAMASK');"></div>
                   </div>
               </div>
               @else
                   <div class="bid-block">
                       To be able to bidd in TEAMS/ACES please&nbsp;<a href="{{route('login')}}">sign&nbsp;in</a>
                   </div>
               @endauth
           </div>
       </div>

        <div class="bid-block">
            Thank you and good luck with your bid! Please note that it&nbsp;might take from several minutes to&nbsp;an&nbsp;hour to&nbsp;register your transaction depending on&nbsp;the load of&nbsp;the blockchain.&nbsp;90% of&nbsp;transactions are usually registered in&nbsp;less than 5&nbsp;minutes. We&nbsp;will send you an&nbsp;email confirmation on&nbsp;receiving your bid.
        </div>

        <div class="bid-footer">
            <span class="bid-footer__title">By bidding you accept the following terms:</span>

            <span class="bid-footer__item"><a href="/pdfs/Privacy_Policy.pdf" target="_blank" class="footer-terms"
                                              onclick="ga('send', 'event', 'click', 'privacy_policy', 'footer');">@lang('messages.footer.privacy')</a>(PDF, 1 mb)</span>
            <span class="bid-footer__item"><a href="/pdfs/Terms_of_Use.pdf" target="_blank" class="footer-terms"
                                              onclick="ga('send', 'event', 'click', 'terms_use', 'footer');">@lang('messages.footer.terms')</a>(PDF, 1 mb)</span>
            <span class="bid-footer__item"><a href="{{ url("/rules") }}" target="_blank" class="footer-terms"
                                              onclick="ga('send', 'event', 'Click', 'auction_rules', 'footer');">Auction rules</a></span>
        </div>

    </div>
</div>
