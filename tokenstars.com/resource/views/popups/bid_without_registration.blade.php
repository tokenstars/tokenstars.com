@extends('popups.bid')
@section('bid_action'){{ route('tokens.wallet_user') }}@endsection
@section('bid_class') js-no-registration-email @endsection
@section('bid_block')
<div class="js-bid-email" style="display: none;">
    <div class="bid-block">
        Please enter your email to get the address for bidding or &nbsp;<a href="{{route('login')}}">Sign in</a>
    </div>
    <div class="bid-block">
        <div class="bid-email">
            <input type="email" name="email" id="bidEmail" placeholder="Please enter your email" class="bid-input" required />
            <input type="submit" class="button" value="Submit">
        </div>
    </div>
</div>
@endsection
