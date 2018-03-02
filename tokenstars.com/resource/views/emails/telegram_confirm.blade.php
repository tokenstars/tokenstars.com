@extends('emails.telegram_layout')
@section('content')
    <tbody>
        <tr>
            <td>
                <h2 class="no-border-header">THANKS FOR JOINING TOKENSTARS PREDICTIONS!</h2>
                <p class="medium-font">We've sent you this email because you've signed up with Tokenstars Predictions Module.</p>
                <p class="medium-font">Here is your confirmation code</p>
                <p class="medium-font">{{ $code }}</p>
                <p class="medium-font">Please send it back to {{ $bot_username }}</p>
                <p class="medium-font">Yours, ⭐ TokenStars team.</p>
                <p class="medium-font">If you didn't sign up for TokenStars please ignore this email.</p>
                <br><br>
            </td>
        </tr>
    </tbody>
@endsection
