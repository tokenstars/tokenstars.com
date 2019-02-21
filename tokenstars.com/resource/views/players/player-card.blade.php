<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Players</title>
    <link href="/build/fresh.css?5" rel="stylesheet" />
    <!--<link rel="stylesheet" href="/assets/players/app.css">-->
    @include('layouts.styles')
    @include('scouting.app-icons')
    <style>
        .header-container a {
            font-family: "Exo 2", "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }
    </style>
</head>
<body class="page-body">
@include('layouts.cabinet.header')
<div class="page-wrapper">

    <div class="bg-light">
        <div class="jumbotron jumbotron-intro jumbotron-fluid text-white bg-blue-darker position-relative jumbotron-players d-flex align-items-center">
            <div class="jumbotron-image bg-players container"></div>
            <div class="container jumbotron-container">
                <div class="row">
                    <div class="col-7">
                        <h1 class="text-uppercase jumbotron-title">
                            <small class="jumbotron-sup-title text-pink d-block font-weight-bold">Module</small>
                            Players
                        </h1>
                        <div class="lead jumbotron-lead">
                            <p>TokenStars supports professional and junior talents.
                                “Players + Supported Talents” module represents TokenStars’ core asset - athletes, who joined and actively participate in platform’s activities.
                                Through our ecosystem token holders can connect with them: join players’ fan clubs and earn ACE & TEAM tokens by completing bounty tasks, purchase exclusive activities with the stars, buy merchandise, promote athletes to bring in new brands and sponsors.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @yield('content')
    </div>

</div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!--<script src="/js/app-scouting.js"></script>-->
@include('layouts.javascripts')
<script>$( ".dotdotdot__toggle" ).click();</script>

</body>
</html>
