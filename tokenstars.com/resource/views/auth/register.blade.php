@extends('layouts.promo.cabinet_layout')
@section('title', 'TokenStars | Celebrities on Blockchain — Sign Up')

@section('content')
    <form method="post" class="cabinet-form" id="cab-form">
        {{ csrf_field() }}

        <span class="cabinet__title">Sign Up</span>

        <div class="cabinet-form-line">
            <label for="id_email" class="cabinet-form__field">Email</label>
            <input id="id_email" type="email" name="email" class="input" required
                   value="{{ old('email') ? old('email') : Cookie::get('email') }}" />
            <!--@if ($errors->get('email'))
                <p class="st-red">{{$errors->first('email') }}</p>
            @endif-->
        </div>

        <div class="cabinet-form-line">
            <label for="id_password" class="cabinet-form__field">Password</label>
            <input id="id_password" type="password" name="password" class="input" required />
           <!-- @if ($errors->get('password'))
                <p class="st-red">{{$errors->first('password') }}</p>
            @endif-->
        </div>

        <div style="display: none" id="auth-status">
            @if ($errors->get('password'))
                <p class="st-red">{{$errors->first('password') }}</p>
            @endif
            @if ($errors->get('email'))
                <p class="st-red">{{$errors->first('email') }}</p>
            @endif
        </div>

        <div class="cabinet-form-line">
            <label for="id_passwordc" class="cabinet-form__field">Repeat password</label>
            <input id="id_passwordc" type="password" name="password_confirmation" class="input" required />
        </div>
<div class="cabinet-form-line" style="text-align: left; margin-top: 10px;">
        <p>
<b>Your password must be at least 10 charecters long and should contain at least 3 categories among the following: <br>
- Uppercase characters (A-Z)<br>
- Lowercase characters (a-z)<br>
- Digits (0-9)<br>
- Special characters (~!@#$%^&amp;*_-+=`|\(){}[]:;"'&lt;&gt;,.?/)<br></b>
</p>
              </div>
        <div class="field big-margin-before align-left">
            <style>
                a, .fake-link, .highlight-link {
                    text-decoration: none !important;
                    color: white;
                    cursor: pointer;
                }
                .link_default {
                    text-decoration: none;
                    color: #1DE9B6;
                }

            </style>
            <div class="field big-margin-before align-left" style="color: white; padding-top: 10px">
                <label for="user_registration_agreement">
                    <input type="checkbox" value="1" name="" id="terms" required="required">
                    I agree with
                    <a href="/pdfs/Terms_of_Use.pdf" target="_blank" class="link_default">Terms of Use</a>
                </label>

            </div>
            <div class="field big-margin-before align-left" style="color: white; padding-top: 10px">
                <label for="user_registration_agreement">
                    <input type="checkbox" value="1" name="" id="privacy" required="required">
                    I agree with
                    <a href="/pdfs/Privacy_Policy.pdf" target="_blank" class="link_default">Privacy Policy</a>
                </label>

            </div>

        </div>
        {{--<div class="cabinet-form-line">
            <input type="checkbox" name="use_2fa" id="use_2fa" hidden />
            <label class="checkbox" for="use_2fa">Use <a href="https://support.google.com/accounts/answer/1066447" target="_blank">Google Authenticator</a></label>
            @if ($errors->has('use_2fa'))
                <p class="st-red">{{ $errors->first('use_2fa') }}</p>
            @endif
        </div>--}}

        <div class="cabinet-form-footer">
            <input type="submit" value="Sign up" class="button"  />

            <p>Already have an account? <a href="{{ route('login') }}">Sign In</a></p>
        </div>
    </form>
    <script>
        var form = document.getElementById('cab-form');
        form.addEventListener('submit', function(e){
            var privacy = document.getElementById('privacy');
            var terms = document.getElementById('terms');

            if(!terms.checked && !privacy.checked) {
                e.preventDefault();
                return false;
            }
        });
    </script>
@endsection
