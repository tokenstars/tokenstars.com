<div class="popup">
   <div class="popup-box el-signup" style="padding-top: 0;">
       <form  class="cabinet-form" id="sign_up_form" action="{{ route('register') }}">
           {{ csrf_field() }}

           <span class="cabinet__title">Sign Up</span>

           <div class="alert alert-danger hide">
               <ul></ul>
           </div>


           <div class="cabinet-form-line">
               <label for="id_email" class="cabinet-form__field">Email</label>
               <input id="id_email" type="email" name="email" class="input" required
                      value="{{ old('email') ? old('email') : Cookie::get('email') }}" />
               @if ($errors->get('email'))
                   <p class="st-red">{{$errors->first('email') }}</p>
               @endif
           </div>

           <div class="cabinet-form-line">
               <label for="id_password" class="cabinet-form__field">Password</label>
               <input id="id_password" type="password" name="password" class="input" required />
               @if ($errors->get('password'))
                   <p class="st-red">{{$errors->first('password') }}</p>
               @endif
           </div>

           <div class="cabinet-form-line">
               <label for="id_passwordc" class="cabinet-form__field">Repeat password</label>
               <input id="id_passwordc" type="password" name="password_confirmation" class="input" required />
           </div>

           {{--<div class="cabinet-form-line">
               <input type="checkbox" name="use_2fa" id="use_2fa" hidden />
               <label class="checkbox" for="use_2fa">Use <a href="https://support.google.com/accounts/answer/1066447" target="_blank">Google Authenticator</a></label>
               @if ($errors->has('use_2fa'))
                   <p class="st-red">{{ $errors->first('use_2fa') }}</p>
               @endif
           </div>--}}

           <div class="cabinet-form-footer">
               <button class="button">Sign up</button>

               <p>Already have an account? <a href="#login">Sign In</a></p>
           </div>
       </form>
    </div>
</div>
