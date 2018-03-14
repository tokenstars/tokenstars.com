<div class="popup">
   <div class="popup-box el-login" style="padding-top: 0;">
       <form action="{{ route('auth.loginCheck') }}" class="cabinet-form js-login-form">
           {{ csrf_field() }}
           @if (session('status'))
               <div class="alert alert-success">
                   {{ session('status') }}
               </div>
           @endif
           @if (session('error'))
               <div class="alert alert-danger">
                   {{ session('error') }}
               </div>
           @endif
           <span class="cabinet__title">Login</span>

           <div class="alert alert-danger hide">
                <ul></ul>
           </div>

           <div class="cabinet-form-line">
               <span class="cabinet-form__field">Email</span>
               <input type="email" name="email" id="email" class="input" value="{{ old('email') }}" required />
               @if ($errors->has('email'))
                   <p class="st-red">{{$errors->first('email') }}</p>
               @endif
           </div>

           <div class="cabinet-form-line">
               <span class="cabinet-form__field">Password</span>
               <a class="cabinet-form__field-anchor" href="{{ route('password.request') }}"
                  onclick="ga('send', 'event', 'Click', 'frg_password', 'forgot password');">Forgot password?</a>

               <input type="password" name="password" id="password" class="input" required />
               @if ($errors->has('password'))
                   <p class="st-red">{{$errors->first('password') }}</p>
               @endif
           </div>
           <div class="cabinet-form-footer">
               <button class="button" id="login_btn" onclick="ga('send', 'event', 'Click', 'login', 'Login');" >Login</button>

               <p>No account? <a href="#signup" onclick="ga('send', 'event', 'Click', 'sign_up', 'Sign up');">Sign Up</a></p>
           </div>
       </form>
    </div>
</div>
