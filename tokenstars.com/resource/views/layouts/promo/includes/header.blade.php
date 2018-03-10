@guest

<div class="menu-cell">
    <div class="menu-user">
        <a href="{{ route('login') }}" class="menu__link" onclick="ga('send', 'event', 'login_lp', 'login'@isset($gaLabel), '{{ $gaLabel }}'@endisset );">Log in</a>
        <span class="menu__sep">/</span>
        <a href="{{ route('register') }}" class="menu__link" onclick="ga('send', 'event', 'signup_lp', 'signup'@isset($gaLabel), '{{ $gaLabel }}'@endisset );">Sign up</a>
    </div>
    {{--
    <select class="select">
    <option selected="selected">En</option>
    <option>Ru</option>
    <option>Cn</option>
    </select>
    --}}
</div>

@endguest

@auth

<div class="menu-cell">

</div>

<div class="menu-cell">
    <div class="menu-user">
        <a href="{{ route('profile') }}" class="menu__link">{{ Auth::user()->email  }}</a>
        <span class="menu__sep">/</span>
        <a href="{{ route('auth.logout') }}" class="menu__link">Logout</a>
    </div>
    {{--
    <select class="select">
    <option selected="selected">En</option>
    <option>Ru</option>
    <option>Cn</option>
    </select>
    --}}
</div>

@endauth
