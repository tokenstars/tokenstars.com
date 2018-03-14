<style>
    .header-brand {
        font-size: 1.5rem;
    }
</style>
<header class="navbar navbar-dark header bg-blue-darker">
<div class="container header-container">
    <a class="navbar-brand font-weight-bold header-brand" href="/">TokenStars</a>
    <ul class="navbar-nav flex-row align-items-center header-nav">
      <li class="nav-item">
        <a class="nav-link px-3 header-link" href="/" target="_blank">Buy tokens</a>
      </li>
      <li class="nav-item dropdown header-dropdown">
        <a class="nav-link header-link dropdown-toggle px-3" href="#" id="navbarPlatform" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Platform</a>
        <div class="dropdown-menu position-absolute" aria-labelledby="navbarPlatform">
          <a class="dropdown-item" href="/charity">Auctions</a>
          <a class="dropdown-item" href="/voting">Voting</a>
          <a class="dropdown-item" href="/predictions">Predictions</a>
          <a class="dropdown-item" href="/scouting">Scouting</a>
            <a class="dropdown-item" href="/brand">Brand relations</a>
            <a class="dropdown-item" href="/achievements">Achievements</a>
</div>
      </li>
    </ul>
    <div class="d-flex flex-row align-items-center ml-auto">
    @guest
      <div class="navbar-text header-text">
         <a class="text-white font-weight-bold" href="/signin">@lang('messages.menu.login')</a>
         <span class="text-white-50">/</span>
         <a class="text-white font-weight-bold" href="/signup">@lang('messages.menu.signup')</a>
       </div>
    @endguest
    @auth
      <div class="navbar-text header-text">
        <span class="text-white-50 mx-1">Total:</span>
        <span class="d-inline-block mx-1"><span class="text-success" id="ace_balance"><img src="/images/25.gif" style="width: 20px;vertical-align: bottom;" /></span>&nbsp;<span class="text-white-50">ACE</span></span>
        <span class="d-inline-block mx-1"><span class="text-success" id="team_balance"><img src="/images/25.gif" style="width: 20px;vertical-align: bottom;" /></span>&nbsp;<span class="text-white-50">TEAM</span></span>
       <!-- <a class="text-white-50 icon icon-sm icon-reload hoverable mx-1" href="">
          <svg viewBox="0 0 1 1"><use xlink:href='../images/icons.svg#reload'></use></svg>
        </a>-->
        </a>
      </div>
      <span class="text-white-50 mx-3">|</span>
      <ul class="navbar-nav flex-row align-items-center ml-1">
        <li class="nav-item dropdown header-dropdown">
          <a class="text-white pr-0" href="{{route('profile.dashboard')}}">
            <span class="text-truncate d-inline-block align-middle header-text">@if(Auth::user()->oldCabinet->first_name != '') {{ mb_strimwidth(Auth::user()->oldCabinet->first_name, 0, 18)}} {{mb_strimwidth(Auth::user()->oldCabinet->last_name, 0,18)}} @else {{ Auth::user()->oldCabinet->email  }} @endif</span>
            <img class="rounded-circle ml-2" src="/upload/avatars/{{ '40_40_'.Auth::user()->oldCabinet->photo  }}" alt="" width="40" height="40">
          </a>
          <a class="nav-link dropdown-toggle pr-0 d-inline" href="#" data-toggle="dropdown">&nbsp</a>
          <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="{{asset("/dashboard")}}">Dashboard</a>
            <a class="dropdown-item" href="{{asset("/logout")}}">@lang('messages.menu.logout')</a>
          </div>
        </li>
      </ul>
    </div>
    @endauth
  </div>
    <script type="text/javascript">
        function getBalance() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var j = JSON.parse(this.responseText)
                    var ace = document.getElementById('ace_balance');
                    var team = document.getElementById('team_balance');
                    ace.innerText = j.ace;
                    team.innerText = j.team;
                    console.log(j)

                }
            };
            xmlhttp.open("GET", "/dashboard/ajax_balance", true);
            xmlhttp.send();
        }
        getBalance();
    </script>
</header>