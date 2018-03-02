@extends('layouts.promo.cabinet_layout')
@section('title', 'TokenStars | Celebrities on Blockchain — Login')

@section('content')


    <form method="post" action="{{ route('auth.loginCheck') }}" class="cabinet-form">
        {{ csrf_field() }}
        @if (isset($intended) && $intended)
            <input type="hidden" value="{{ $intended }}" name="intended" />
        @endif
        <!--
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif-->
        <span class="cabinet__title">Login</span>

        <div class="cabinet-form-line">
            <span class="cabinet-form__field">Email</span>
            <input type="email" name="email" class="input" value="{{ old('email') }}" required />
            @if ($errors->has('email'))
                <!--<p class="st-red">{{$errors->first('email') }}</p>-->
            @endif
        </div>

        <div class="cabinet-form-line">
            <span class="cabinet-form__field">Password</span>


            <input type="password" name="password" class="input" required />
            @if ($errors->has('password'))
            <!--    <p class="st-red">{{$errors->first('password') }}</p>-->
            @endif
        </div>
        <div style="display: none" id="auth-status">
            @if ($errors->has('password'))
                <p class="st-red">We discovered that you haven't updated account password for a long time. To sign in, click Remind and check the link in email!</p>
            @endif

            @if ($errors->has('email'))
                <p class="st-red">We discovered that you haven't updated account password for a long time. To sign in, click Remind and check the link in email!</p>
            @endif
        </div>
        <!--
        <div class="cabinet-form-line">
            @captcha
            <input type="text" id="captcha" name="captcha">
        </div>-->
        <div class="cabinet-form-footer">
            <input type="submit" value="Login" class="button" onclick="ga('send', 'event', 'Click', 'login', 'Login');" />
             <p class="text-left">Forgot password? <a href="{{ route('password.request') }}"
               onclick="ga('send', 'event', 'Click', 'frg_password', 'forgot password');">Remind</a></p>
            <p class="text-left">No account? <a href="{{ route('register') }}" onclick="ga('send', 'event', 'Click', 'sign_up', 'Sign up');">Sign Up</a></p>
        </div>
    </form>


@endsection
