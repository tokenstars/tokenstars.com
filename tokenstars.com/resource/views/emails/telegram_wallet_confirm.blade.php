@extends('emails.telegram_layout')
@section('content')
    <tbody>
        <tr>
            <td>
                <h2 class="no-border-header">THANKS FOR JOINING TOKENSTARS!</h2>
                <p class="medium-font">Hi, please confirm that you are adding {{ $wallet }} to TokenStars Predictions. TEAM and ACE token balance will allow you to get access to additional functionality and climb up the leaderboard faster.</p>
                <p class="medium-font">Here is your confirmation code</p>
                <p class="medium-font">{{ $code }}</p>
                <p class="medium-font">Send it back to {{ $bot_username }}</p>
                <p class="medium-font">
                    Please note that you can input only one address and it cannot be changed within the bot.<br />
                    All the prizes and awards will be credited only to this address.
                </p>
                <p class="medium-font">Yours, ⭐ TokenStars team.</p>
                <br><br>
            </td>
        </tr>
    </tbody>
@endsection
