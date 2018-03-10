@extends('layouts.promo.auth_layout')

@section('title', 'Tokenstars')

@section("header.promo")
    <div class="page__layout">
        <div class="header-box" style="padding-bottom: 20px;">
            <span class="header__title">The best token sales with<br /><strong>everyday discount up to 80%</strong></span>
        </div>
    </div>
@endsection

@section('content')
    <section class="dashboard profile">
        <div class="page__layout">
            <div class="dashboard__row">
                <form method="post" class="cabinet-form">
                    {{ csrf_field() }}
                    <span class="cabinet__title">Profile</span>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {!! session('status') !!}
                        </div>
                    @endif

                    <div class="cabinet-form-line">
                        <span class="cabinet-form__field">Email</span>
                        <input type="text" name="email" class="input" value="{{ $user->email }}" disabled/>
                        @if ($errors->get('email'))
                            <p class="st-red">{{$errors->first('email') }}</p>
                        @endif
                    </div>

                    <div class="cabinet-form-line">
                        <span class="cabinet-form__field">Name</span>
                        <input type="text" name="name" class="input" value="{{ $user->name }}" />
                        @if ($errors->get('name'))
                            <p class="st-red">{{$errors->first('name') }}</p>
                        @endif
                    </div>
                    <div class="cabinet-form-line">
                        <label for="wallet" class="cabinet-form__field">The ETH wallet you are going to place the bids from</label>
                        <input id="wallet" type="text" name="wallet" class="input" value="{{ $user->wallet or '' }}" />
                        @if ($errors->get('wallet'))
                            <p class="st-red">{{$errors->first('wallet') }}</p>
                        @endif
                    </div>
                    {{--
                    <div class="cabinet-form-line">
                        <input type="checkbox" name="use_2fa" id="use_2fa" hidden @if($user->use_2fa) checked @endif />
                        <label class="checkbox checkbox-w-button" for="use_2fa">Use
                            <a href="https://support.google.com/accounts/answer/1066447" target="_blank">Google Authenticator</a>
                        </label>
                        @if($user->use_2fa)
                            <label for="id_request_code" class="button checkbox-button">Send QR Code to my Email</label>
                        @endif
                        <div class="clear-fix"></div>
                        @if ($errors->has('use_2fa'))
                            <p class="st-red">{{ $errors->first('use_2fa') }}</p>
                        @endif
                    </div>
                    --}}
                    <div class="cabinet-form-line">
                        <label for="id_password" class="cabinet-form__field">New Password (leave blank if you don't need to change your password)</label>
                        <input id="id_password" type="password" name="password" class="input" />
                        @if ($errors->get('password'))
                            <p class="st-red">{{$errors->first('password') }}</p>
                        @endif
                    </div>
                    <div class="cabinet-form-line">
                        <label for="id_passwordc" class="cabinet-form__field">Repeat new password (leave blank if you don't need to change your password)</label>
                        <input id="id_passwordc" type="password" name="password_confirmation" class="input" />
                    </div>
                    <div class="cabinet-form-line">
                        <span class="cabinet-form__field">Current password</span>
                        <input type="password" name="current_password" class="input" />
                        @if ($errors->get('current_password'))
                            <p class="st-red">{{$errors->first('current_password') }}</p>
                        @endif
                    </div>

                    <div class="cabinet-form-footer">
                        <input type="submit" value="Save" class="button" onclick="ga('send', 'event', 'profile', 'save');" />
                    </div>
                </form>
                <form method="post" action="{{ route('auth.requestCode') }}">
                    {{ csrf_field() }}
                    <input id="id_request_code" type="submit" hidden>
                </form>
            </div>
        </div>
    </section>

    {{--@include('popups.wallet_notify',[$show_wallet_notify])--}}
    <script type="text/javascript">
        window.show_wallet_notify = @json($show_wallet_notify);
    </script>
@endsection
